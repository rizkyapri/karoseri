<?php

namespace App\Http\Controllers;

use App\Models\Incoming;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomings = Incoming::with('product', 'supplier')->get();
        return view('incoming.index', compact('incomings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('incoming.create', compact('suppliers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(), [
            'id_supplier' => 'required|integer',
            'id_product' => 'required|integer',
            'kode_masuk' => 'required|string|min:3|max:255',
            'unit' => 'required|string',
            'keterangan' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
            'tanggal' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        Incoming::create([
            'id_product' => $request->id_product,
            'id_supplier' => $request->id_supplier,
            'creator_id' => Auth::user()->id,
            'kode_penerimaan' => $request->kode_masuk,
            'kuantitas' => $request->quantity,
            'unit' => $request->unit,
            'start_date' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        // Update the product's stock
        $product = Product::find($request->id_product);
        // dd($product);

        if ($product) {
            $product->quantity += $request->quantity;
            $product->save();

            return redirect()->route('incoming.index')->with('success', 'Barang Masuk berhasil dibuat.');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Incoming $incoming, $id)
    {
        $incoming = Incoming::with('product', 'supplier', 'creator', 'updater')->find($id);

        return view('incoming.show', compact('incoming'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incoming $incoming, $id)
    {
        $incoming = Incoming::with('product', 'supplier')->find($id);
        $suppliers = Supplier::all();
        $products = Product::all();
        // dd($incoming);
        return view('incoming.edit', compact('incoming', 'suppliers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validation = Validator::make($request->all(), [
            'id_supplier' => 'required|integer',
            'id_product' => 'required|integer',
            'kode_masuk' => 'required|string|min:3|max:255',
            'unit' => 'required|string',
            'keterangan' => 'nullable|string',
            'quantity' => 'required|integer|min:1', // Kuantitas minimal adalah 1
            'tanggal' => 'required|date',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        // Temukan data barang masuk berdasarkan ID
        $incoming = Incoming::find($id);
        if (!$incoming) {
            return redirect()->route('incoming.index')->with('error', 'Barang Masuk tidak ditemukan.');
        }

        // Temukan produk yang terkait
        $product = Product::find($incoming->id_product);
        if (!$product) {
            return redirect()->route('incoming.index')->with('error', 'Produk tidak ditemukan.');
        }

        
        // Hitung selisih kuantitas
        $selisih = $request->quantity - $incoming->kuantitas;
        // dd($product, $request->quantity, $incoming, $selisih);

        // Perbarui stok produk (pastikan stok tidak menjadi negatif)
        $newqty = $product->quantity + $selisih;
        if ($newqty < 0) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk pembaruan.')->withInput();
        }
        $product->quantity = $newqty;
        $product->save();

        // Update data barang masuk
        $incoming->update([
            'id_product' => $request->id_product,
            'id_supplier' => $request->id_supplier,
            'updater_id' => Auth::user()->id,
            'kuantitas' => $request->quantity,
            'unit' => $request->unit,
            'start_date' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('incoming.index')->with('success', 'Barang Masuk berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incoming $incoming, $id)
    {
        $incoming = Incoming::find($id);
        if ($incoming) {
            $product = Product::find($incoming->id_product);
            $product->quantity -= $incoming->kuantitas;
            $product->save();
            $incoming->delete();

            return redirect()->route('incoming.index')->with('success', 'Barang Masuk berhasil dihapus.');
        } else {
            return redirect()->route('incoming.index')->with('error', 'Barang Masuk tidak ditemukan.');
        }
    }
}
