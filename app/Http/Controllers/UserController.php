<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // dd(request()->all());

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'max:255'],
        ];

        $validated = $request->validate($rules, [
            'email.unique' => 'Email already exists.',
        ]);

        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);


        // menampilkan message success
        session()->flash('added', 'Data Berhasil Ditambahkan.');

        // Arahkan ke halaman
        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan.');;
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        // dd($users->name);

        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ];

        $validated = $request->validate($rules, [
            'email.unique' => 'Email already exists.',
        ]);

        // update ke database
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // dd($users);
        return view('user.show', compact('user'));
    }
    public function destroy($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);
        // dd($user);

        // Hapus data user
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus.');
    }
}
