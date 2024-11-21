@extends('inc.main')
@section('title', 'Supplier')
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
                'icon' => 'cubes',
                'heading1' => 'Supplier',
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
                        <a class="dropdown-item" href="{{ route('supplier.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <x-slot name="tagpanel">
                isi-tag-panel
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Nama:</strong> {{ $supplier->name }}</p>
                    <p><strong>PIC:</strong>{{ $supplier->pic }}</p>
                    <p><strong>Phone:</strong> {{ $supplier->phone }}</p>
                    <a href="{{ route('supplier.edit', $supplier) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('supplier.destroy', $supplier) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
