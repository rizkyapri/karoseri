<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat permission dengan spatie models
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'hapus-role']);
        Permission::create(['name' => 'lihat-role']);

        Permission::create(['name' => 'tambah-permission']);
        Permission::create(['name' => 'edit-permission']);
        Permission::create(['name' => 'hapus-permission']);
        Permission::create(['name' => 'lihat-permission']);

        Permission::create(['name' => 'tambah-produk']);
        Permission::create(['name' => 'edit-produk']);
        Permission::create(['name' => 'hapus-produk']);
        Permission::create(['name' => 'lihat-produk']);

        Permission::create(['name' => 'tambah-supplier']);
        Permission::create(['name' => 'edit-supplier']);
        Permission::create(['name' => 'hapus-supplier']);
        Permission::create(['name' => 'lihat-supplier']);

        Permission::create(['name' => 'tambah-barang-masuk']);
        Permission::create(['name' => 'edit-barang-masuk']);
        Permission::create(['name' => 'hapus-barang-masuk']);
        Permission::create(['name' => 'lihat-barang-masuk']);

        Permission::create(['name' => 'tambah-barang-keluar']);
        Permission::create(['name' => 'edit-barang-keluar']);
        Permission::create(['name' => 'hapus-barang-keluar']);
        Permission::create(['name' => 'lihat-barang-keluar']);
        Permission::create(['name' => 'print-barang-keluar']);

        Permission::create(['name' => 'tambah-komponen']);
        Permission::create(['name' => 'edit-komponen']);
        Permission::create(['name' => 'hapus-komponen']);
        Permission::create(['name' => 'lihat-komponen']);

        // buat role dengan spatie models
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Purchasing']);
        Role::create(['name' => 'Gudang']);

        // cari role berdasarkan name
        $roleAdmin = Role::findByName('Admin');
        $rolePurchasing = Role::findByName('Purchasing');
        $roleGudang = Role::findByName('Gudang');

        // memberikan permission ke role
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleAdmin->givePermissionTo('tambah-produk');
        $roleAdmin->givePermissionTo('edit-produk');
        $roleAdmin->givePermissionTo('hapus-produk');
        $roleAdmin->givePermissionTo('lihat-produk');

        $roleAdmin->givePermissionTo('tambah-role');
        $roleAdmin->givePermissionTo('edit-role');
        $roleAdmin->givePermissionTo('hapus-role');
        $roleAdmin->givePermissionTo('lihat-role');

        $roleAdmin->givePermissionTo('tambah-permission');
        $roleAdmin->givePermissionTo('edit-permission');
        $roleAdmin->givePermissionTo('hapus-permission');
        $roleAdmin->givePermissionTo('lihat-permission');

        $roleAdmin->givePermissionTo('tambah-supplier');
        $roleAdmin->givePermissionTo('edit-supplier');
        $roleAdmin->givePermissionTo('hapus-supplier');
        $roleAdmin->givePermissionTo('lihat-supplier');

        $roleAdmin->givePermissionTo('tambah-barang-masuk');
        $roleAdmin->givePermissionTo('edit-barang-masuk');
        $roleAdmin->givePermissionTo('hapus-barang-masuk');
        $roleAdmin->givePermissionTo('lihat-barang-masuk');

        $roleAdmin->givePermissionTo('tambah-barang-keluar');
        $roleAdmin->givePermissionTo('edit-barang-keluar');
        $roleAdmin->givePermissionTo('hapus-barang-keluar');
        $roleAdmin->givePermissionTo('lihat-barang-keluar');
        $roleAdmin->givePermissionTo('print-barang-keluar');

        $roleAdmin->givePermissionTo('tambah-komponen');
        $roleAdmin->givePermissionTo('edit-komponen');
        $roleAdmin->givePermissionTo('hapus-komponen');
        $roleAdmin->givePermissionTo('lihat-komponen');

        $rolePurchasing->givePermissionTo('tambah-produk');
        $rolePurchasing->givePermissionTo('edit-produk');
        $rolePurchasing->givePermissionTo('hapus-produk');
        $rolePurchasing->givePermissionTo('lihat-produk');

        $rolePurchasing->givePermissionTo('tambah-supplier');
        $rolePurchasing->givePermissionTo('edit-supplier');
        $rolePurchasing->givePermissionTo('hapus-supplier');
        $rolePurchasing->givePermissionTo('lihat-supplier');

        $rolePurchasing->givePermissionTo('tambah-barang-masuk');
        $rolePurchasing->givePermissionTo('edit-barang-masuk');
        $rolePurchasing->givePermissionTo('hapus-barang-masuk');
        $rolePurchasing->givePermissionTo('lihat-barang-masuk');
        $rolePurchasing->givePermissionTo('print-barang-keluar');

        $roleGudang->givePermissionTo('tambah-barang-masuk');
        $roleGudang->givePermissionTo('edit-barang-masuk');
        $roleGudang->givePermissionTo('hapus-barang-masuk');
        $roleGudang->givePermissionTo('lihat-barang-masuk');
    }
}
