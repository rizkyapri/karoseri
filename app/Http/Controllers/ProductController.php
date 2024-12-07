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
        // $lastProduct = Product::orderBy('id', 'desc')->first();

        // if ($lastProduct) {
        //     $lastCode = $lastProduct->kode_produk;
        //     $lastNumber = (int) substr($lastCode, 4);
        //     $newNumber = $lastNumber + 1;
        // } else {
        //     $newNumber = 1;
        // }

        // $newCode = 'BRG-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        return view('product.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'kode_produk' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|string',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $product = Product::create([
            'kode_produk' => $request->kode_produk,
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
            'kode_produk' => $request->kode_produk,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'price' => $request->price,
        ]);

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
