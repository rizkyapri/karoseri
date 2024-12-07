<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permissions = $request->input('permissions', []); // Default ke array kosong jika tidak ada data

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with([
            'success' => 'Role created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);
        $permissions = $role->permissions;
        return view('role.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cari Role berdasarkan ID
        $role = Role::findOrFail($id);

        // Ambil semua Permissions yang tersedia
        $allPermissions = Permission::all();

        // Ambil Permissions yang sudah dimiliki Role ini
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        // Kirim data ke view
        return view('role.edit', compact('role', 'allPermissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        // Cari Role
        $role = Role::findOrFail($id);

        // Update nama Role
        $role->name = $request->input('name');
        $role->save();

        // Sinkronisasi Permissions
        $permissions = $request->input('permissions', []);
        $role->syncPermissions($permissions);

        // Redirect dengan pesan sukses
        return redirect()->route('roles.index')->with('success', 'Role berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari Role berdasarkan ID
        $role = Role::findOrFail($id);

        // Cegah penghapusan Role tertentu
        if (in_array($role->name, ['Admin'])) {
            return redirect()->route('roles.index')->with('error', 'Role ini tidak dapat dihapus.');
        }

        // Hapus semua permission terkait dengan Role
        $role->permissions()->detach();

        // Hapus Role
        $role->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('roles.index')->with('success', 'Role dan semua permission terkait berhasil dihapus.');
    }
}
