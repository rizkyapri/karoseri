<?php

namespace App\Http\Controllers;

use App\Models\outcoming;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutcomingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outcomings = outcoming::all();
        return view('outcoming.index', compact('outcomings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('outcoming.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id_product' => 'required|integer',
            'tanggal' => 'required',
            'unit' => 'required|string',
            'kode_keluar' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer',
            'bagian' => 'required|string',
            'no_spk' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        outcoming::create([
            'id_product' => $request->id_product,
            'creator_id' => auth()->id(),
            'purchase_date' => $request->tanggal,
            'unit' => $request->unit,
            'kode' => $request->kode_keluar,
            'quantity' => $request->quantity,
            'bagian' => $request->bagian,
            'no_spk' => $request->no_spk,
        ]);

        return redirect()->route('outcoming.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(outcoming $outcoming, $id)
    {
        $outcoming = outcoming::find($id)->with('product')->first();

        return view('outcoming.show', compact('outcoming'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(outcoming $outcoming, $id)
    {
        $outcoming = outcoming::find($id);
        $products = Product::all();
        return view('outcoming.edit', compact('outcoming', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, outcoming $outcoming, $id)
    {
        $validation = Validator::make($request->all(), [
            'id_product' => 'required|integer',
            'tanggal' => 'required',
            'unit' => 'string',
            'kode_keluar' => 'string|min:3|max:255',
            'quantity' => 'integer',
            'bagian' => 'string',
            'no_spk' => 'string',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        outcoming::where('id', $id)->update([
            'id_product' => $request->id_product,
            'updater_id' => auth()->id(),
            'purchase_date' => $request->tanggal,
            'unit' => $request->unit,
            'kode' => $request->kode_keluar,
            'quantity' => $request->quantity,
            'bagian' => $request->bagian,
            'no_spk' => $request->no_spk,
        ]);

        return redirect()->route('outcoming.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(outcoming $outcoming, $id)
    {
        $outcoming = outcoming::find($id);
        $outcoming->delete();
        return redirect()->route('outcoming.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak_pdf()
    {
        $outcomings = Outcoming::all();

        // Pastikan data dikirim sebagai array
        $pdf = PDF::loadView('outcoming.print', ['outcomings' => $outcomings]);

        // Download file PDF
        return $pdf->stream();
    }
}
