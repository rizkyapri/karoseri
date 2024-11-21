@extends('inc.main')
@section('title', 'Produk')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Master',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'shopping-bag',
                'heading1' => 'Produk',
                'heading2' => 'Karoseri',   
            ])
            @endcomponent
        </div>
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <x-panel.show title="Tambah" subtitle="Produk">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.index') }}">Kembali</a>

                        </div>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" readonly name="kode_produk" id="kode_produk" class="form-control" value="{{ old('kode_produk') }}">
                    @error('kode_produk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>  
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuantitas">Kuantitas</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="unit" id="unit" class="form-control"
                        value="{{ old('unit') }}">
                    @error('unit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" name="price" id="price" class="form-control"
                        value="{{ old('price') }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <x-slot name="panelcontentfoot">
                    <x-button type="submit" color="primary" :label="__('Save')" class="ml-auto" />
                </x-slot>
            </x-panel.show>
        </form>
    </main>
@endsection
@section('pages-script')
<script>
    // Generate the product code when the page loads
    document.addEventListener("DOMContentLoaded", function() {
    var kodeProdukField = document.getElementById('kode_produk');

    // Ambil nomor terakhir dari localStorage
    var lastNumber = localStorage.getItem('lastProductNumber') || 0;

    // Tambahkan 1 ke nomor terakhir
    var nextNumber = parseInt(lastNumber) + 1;

    // Formatkan ke BRG-0001
    var kodeProduk = 'BRG-' + nextNumber.toString().padStart(4, '0');

    // Simpan nomor terakhir yang baru ke localStorage
    localStorage.setItem('lastProductNumber', nextNumber);

    // Set nilai ke field
    kodeProdukField.value = kodeProduk;
});

</script>
@endsection
