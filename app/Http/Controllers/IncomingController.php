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
        $validation = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_supplier' => 'required|integer',
            'id_product' => 'required|integer',
            'kode_masuk' => 'required|string|min:3|max:255',
            'unit' => 'required|string',
            'keterangan' => 'nullable|string',
            'quantity' => 'required|integer',
            'tanggal' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        Incoming::create([
            'id_user' => $request->id_user,
            'id_product' => $request->id_product,
            'id_supplier' => $request->id_supplier,
            'creator_id' => Auth::user()->id,
            'kode_penerimaan' => $request->kode_masuk,
            'kuantitas' => $request->quantity,
            'unit' => $request->unit,
            'start_date' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('incoming.index')->with('success', 'Barang Masuk berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incoming $incoming, $id)
    {
        $incoming = Incoming::with('product', 'supplier','creator', 'updater')->find($id);
        
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
    public function update(Request $request, Incoming $incoming, $id)
    {
        $validation = Validator::make($request->all(), [
            'id_supplier' => 'required|integer',
            'id_product' => 'required|integer',
            'kode_masuk' => 'required|string|min:3|max:255',
            'unit' => 'required|string',
            'keterangan' => 'nullable|string',
            'quantity' => 'required|integer',
            'tanggal' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        Incoming::where('id', $id)->update([
            'id_product' => $request->id_product,
            'id_supplier' => $request->id_supplier,
            'updater_id' => Auth::user()->id,
            'kode_penerimaan' => $request->kode_masuk,
            'kuantitas' => $request->quantity,
            'unit' => $request->unit,
            'start_date' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('incoming.index')->with('success', 'Barang Masuk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incoming $incoming, $id)
    {
        $incoming = Incoming::find($id);
        $incoming->delete();

        return redirect()->route('incoming.index')->with('success', 'Barang Masuk berhasil dihapus.');
    }
}
