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
        <x-panel.show title="Default" subtitle="Example">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('product.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <x-slot name="tagpanel">
                isi-tag-panel
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Kode Produk:</strong> {{ $product->kode_produk }}</p>
                    <p><strong>Nama:</strong> {{ $product->name }}</p>
                    <p><strong>Kuantitas:</strong>{{ $product->quantity }}</p>
                    <p><strong>Satuan:</strong> {{ $product->unit }}</p>
                    <p><strong>price:</strong>
                        Rp. {{ number_format($product->price, 0, 2) }}
                    </p>
                    <a href="{{ route('product.edit', $product) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('product.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
