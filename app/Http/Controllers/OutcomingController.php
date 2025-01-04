<?php

namespace App\Http\Controllers;

use App\Models\Outcoming;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OutcomingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outcomings = Outcoming::all();
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
            'quantity' => 'required|integer|min:1',
            'bagian' => 'required|string',
            'no_spk' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        Outcoming::create([
            'id_product' => $request->id_product,
            'creator_id' => auth()->id(),
            'purchase_date' => $request->tanggal,
            'unit' => $request->unit,
            'kode' => $request->kode_keluar,
            'quantity' => $request->quantity,
            'bagian' => $request->bagian,
            'no_spk' => $request->no_spk,
        ]);
        // Update the product's stock
        $product = Product::find($request->id_product);
        // dd($product);

        if ($product) {
            $product->quantity -= $request->quantity;
            $product->save();

            return redirect()->route('outcoming.index')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('outcoming.index')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Outcoming $outcoming, $id)
    {
        $outcoming = Outcoming::find($id)->with('product')->first();

        return view('outcoming.show', compact('outcoming'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outcoming $outcoming, $id)
    {
        $outcoming = Outcoming::find($id);
        $products = Product::all();
        return view('outcoming.edit', compact('outcoming', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outcoming $outcoming, $id)
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

        // Temukan data barang masuk berdasarkan ID
        $outcoming = Outcoming::find($id);
        if (!$outcoming) {
            return redirect()->route('outcoming.index')->with('error', 'Barang Masuk tidak ditemukan.');
        }

        // Temukan produk yang terkait
        $product = Product::find($outcoming->id_product);
        if (!$product) {
            return redirect()->route('outcoming.index')->with('error', 'Produk tidak ditemukan.');
        }


        // Hitung selisih kuantitas
        $selisih = $request->quantity + $outcoming->quantity;
        // dd($product, $request->quantity, $incoming, $selisih);

        // Perbarui stok produk (pastikan stok tidak menjadi negatif)
        $newqty = $product->quantity - $selisih;
        if ($newqty < 0) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk pembaruan.')->withInput();
        }
        $product->quantity = $newqty;
        $product->save();

        Outcoming::where('id', $id)->update([
            'id_product' => $request->id_product,
            'updater_id' => Auth::user()->id,
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
    public function destroy(Outcoming $outcoming, $id)
    {
        $outcoming = Outcoming::find($id);
        if ($outcoming) {
            $product = Product::find($outcoming->id_product);
            $product->quantity += $outcoming->quantity;
            $product->save();
            $outcoming->delete();

            return redirect()->route('outcoming.index')->with('success', 'Barang Masuk berhasil dihapus.');
        } else {
            return redirect()->route('outcoming.index')->with('error', 'Barang Masuk tidak ditemukan.');
        }
    }

    public function cetak_pdf()
    {
        $outcomings = Outcoming::all();
        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $img_path = public_path('admin/img/logoTRB.png');
        $extencion = pathinfo($img_path, PATHINFO_EXTENSION);
        $data = file_get_contents($img_path, false, stream_context_create($opciones_ssl));
        $img_base_64 = base64_encode($data);
        $path_img = 'data:image/' . $extencion . ';base64,' . $img_base_64;
        // dd($path_img);

        $img_path1 = public_path('admin/img/signature.png');
        $extencion1 = pathinfo($img_path1, PATHINFO_EXTENSION);
        $data1 = file_get_contents($img_path1, false, stream_context_create($opciones_ssl));
        $img_base_641 = base64_encode($data1);
        $path_img1 = 'data:image/' . $extencion . ';base64,' . $img_base_641;

        // Pastikan data dikirim sebagai array
        $pdf = PDF::loadView('outcoming.print', ['outcomings' => $outcomings, 'path_img' => $path_img, 'path_img1' => $path_img1]);

        // Download file PDF
        return $pdf->stream();
    }
}
