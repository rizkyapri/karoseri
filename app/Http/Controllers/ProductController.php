<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
        $lastProduct = Product::orderBy('id', 'desc')->first();

        if ($lastProduct) {
            $lastCode = $lastProduct->kode_produk;
            $lastNumber = (int) substr($lastCode, 4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $newCode = 'BRG-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return view('product.create', compact('newCode'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil kode terakhir dari database
        $lastProduct = Product::orderBy('id', 'desc')->first();

        if ($lastProduct) {
            // Ambil kode terakhir dan pecahkan
            $lastCode = $lastProduct->kode_produk; // Contoh: BRG-0004
            $lastNumber = (int) substr($lastCode, 4); // Ambil bagian numerik: 0004
            $newNumber = $lastNumber + 1; // Tambahkan 1
        } else {
            // Jika belum ada data, mulai dari 1
            $newNumber = 1;
        }

        // Format kode baru
        $kodeProdukBaru = 'BRG-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $product = Product::create([
            'kode_produk' => $kodeProdukBaru,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);

        // dd($product);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $old_product = Product::find($request->id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $product = Product::where('id', $request->id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'price' => $request->price,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
