<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KomponenController extends Controller
{
    public function index()
    {
        $components = Komponen::all();
        return view('komponen.index', compact('components'));
    }

    public function create()
    {
        return view('komponen.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:3', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Komponen::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $komponen = Komponen::find($id);
        return view('komponen.edit', compact('komponen'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $komponen = Komponen::find($id);
        $komponen->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil diperbarui.');
    }

    public function show($id)
    {
        $komponen = Komponen::find($id);
        return view('komponen.show', compact('komponen'));
    }

    public function destroy($id)
    {
        $komponen = Komponen::find($id);
        $komponen->delete();

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil dihapus.');
    }
}
