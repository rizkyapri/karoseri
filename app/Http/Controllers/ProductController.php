<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use App\Models\Product;
use App\Models\product_has_komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $lastProduct = Product::orderBy('id', 'desc')->first();

        // if ($lastProduct) {
        //     $lastCode = $lastProduct->kode_produk;
        //     $lastNumber = (int) substr($lastCode, 4);
        //     $newNumber = $lastNumber + 1;
        // } else {
        //     $newNumber = 1;
        // }

        // $newCode = 'BRG-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        $components = Komponen::get();

        // dd($components);

        return view('product.create', compact('components'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'kode_produk' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'price' => 'required|integer',
            'components' => 'required|array',
            'quantities' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // 1. Simpan Produk Utama
        $product = Product::create([
            'kode_produk' => $request->kode_produk,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'price' => $request->price,
        ]);

        // 2. Persiapkan Data untuk Tabel Pivot
        $pivotData = [];
        foreach ($request->components as $index => $componentName) {
            $component = Komponen::firstOrCreate(['name' => $componentName]); // Buat komponen jika belum ada
            $pivotData[$component->id] = ['kuantitas' => $request->quantities[$index]];
        }

        // 3. Simpan Data ke Tabel Pivot
        $product->components()->sync($pivotData);

        return redirect()->route('product.index')->with('success', 'Produk berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = Product::find($id);
        $pivotData = product_has_komponen::where('id_product', $product->id)->get();
        $komponens = DB::table('product_has_komponens')
            ->join('komponen', 'product_has_komponens.id_komponen', '=', 'komponen.id')
            ->whereIn('product_has_komponens.id_komponen', $pivotData->pluck('id_komponen'))
            ->whereIn('product_has_komponens.id_product', $pivotData->pluck('id_product'))
            ->select('product_has_komponens.*', 'komponen.*')
            ->get();


        // dd($product, $komponens);

        return view('product.show', compact('product', 'komponens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);

        $pivotData = product_has_komponen::where('id_product', $product->id)->get();
        $components = Komponen::whereIn('id', $pivotData->pluck('id_komponen'))->get();
        $componens = Komponen::get();

        // dd($product, $componens);
        return view('product.edit', compact('product', 'components', 'pivotData', 'componens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        // Cari data produk berdasarkan ID
        $products = Product::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_produk' => 'required|string',
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'price' => 'required|integer',
            'components' => 'required|array',
            'quantities' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Update data produk utama
        $products->update([
            'kode_produk' => $request->kode_produk,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'price' => $request->price,
        ]);

        // Periksa dan perbarui data di tabel pivot
        foreach ($request->components as $index => $componentName) {
            // Cari atau buat komponen berdasarkan nama
            $component = Komponen::firstOrCreate(['name' => $componentName]);

            // Periksa apakah data pivot sudah ada
            $existingPivot = DB::table('product_has_komponens')
                ->where('id_product', $products->id)
                ->where('id_komponen', $component->id)
                ->first();

            if ($existingPivot) {
                // Jika sudah ada, perbarui data
                DB::table('product_has_komponens')
                    ->where('id_product', $products->id)
                    ->where('id_komponen', $component->id)
                    ->update([
                        'kuantitas' => $request->quantities[$index],
                        'updated_at' => now(),
                    ]);
            } else {
                // Jika belum ada, tambahkan data baru
                DB::table('product_has_komponens')->insert([
                    'id_product' => $products->id,
                    'id_komponen' => $component->id,
                    'kuantitas' => $request->quantities[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
        }
        return redirect()->route('product.index')->with('error', 'Produk tidak ditemukan.');
    }
}
