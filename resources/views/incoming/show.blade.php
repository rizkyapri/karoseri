@extends('inc.main')
@section('title', 'incoming')
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
                'icon' => 'sign-in',
                'heading1' => 'Barang Masuk',
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
                        <a class="dropdown-item" href="{{ route('incoming.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <x-slot name="tagpanel">
                <div class="flex justify-between items-center p-4 border-b border-gray-200">
                    <!-- Bagian Kiri: Dibuat oleh -->
                    <div class="flex items-center">
                        <p class="text-sm text-gray-600 mr-4">
                            <strong>Dibuat oleh:</strong> {{ $incoming->creator->name ?? 'Tidak diketahui' }}
                        </p>
                        <p class="text-xs text-gray-500">
                            <em>{{ $incoming->created_at ? $incoming->created_at->format('d M Y, H:i') : '-' }}</em>
                        </p>
                    </div>

                    <!-- Bagian Kanan: Diperbarui oleh -->
                    @if ($incoming->updater_id)
                        <div class="flex items-center text-right">
                            <p class="text-sm text-gray-600 mr-4">
                                <strong>Diperbarui oleh:</strong> {{ $incoming->updater->name ?? 'Tidak diketahui' }}
                            </p>
                            <p class="text-xs text-gray-500">
                                <em>{{ $incoming->updated_at ? $incoming->updated_at->format('d M Y, H:i') : '-' }}</em>
                            </p>
                        </div>
                    @endif
                </div>
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Tanggal:</strong> {{ $incoming->start_date }}</p>
                    <p><strong>Kode:</strong> {{ $incoming->kode_penerimaan }}</p>
                    <p><strong>Nama Barang:</strong> {{ $incoming->product->name }}</p>
                    <p><strong>Kuantitas: </strong>{{ $incoming->kuantitas }}</p>
                    <p><strong>Satuan:</strong> {{ $incoming->unit }}</p>
                    <p><strong>Nama Supplier:</strong> {{ $incoming->supplier->name }}</p>
                    <p><strong>Keterangan:</strong> {{ $incoming->keterangan }}</p>
                    <p><strong>price:</strong>
                        Rp. {{ number_format($incoming->product->price * $incoming->kuantitas, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('incoming.edit', $incoming) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('incoming.destroy', $incoming) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('incoming.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
