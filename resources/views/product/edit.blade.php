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
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-panel.show title="Edit" subtitle="Produk">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('product.index') }}">Kembali</a>
                        </div>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" name="kode_produk" id="kode_produk" class="form-control"
                        value="{{ old('kode_produk', $product->kode_produk) }}">
                    @error('kode_produk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $product->name) }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuantitas">Kuantitas</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ old('quantity', $product->quantity) }}">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="unit" id="unit" class="form-control"
                        value="{{ old('unit', $product->unit) }}">
                    @error('unit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" name="price" id="price" class="form-control"
                        value="{{ old('price', $product->price) }}">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">List Komponen</label>
                    <table id="components-table" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>Nama Komponen</th>
                                <th>Kuantitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (old('components'))
                                @foreach (old('components') as $index => $oldComponent)
                                    <tr>
                                        <td>
                                            <select name="components[]"
                                                class="select2-placeholder-multiple form-control select-component">
                                                <option value="" disabled>Pilih Komponen</option>
                                                @foreach ($components as $component)
                                                    <option value="{{ $component->name }}"
                                                        {{ $oldComponent == $component->name ? 'selected' : '' }}>
                                                        {{ $component->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[]" class="form-control" min="0"
                                                placeholder="0" value="{{ old('kuantitas')[$index] }}">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove-row">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($product->components as $component)
                                    <tr>
                                        <td>
                                            <select name="components[]"
                                                class="select2-placeholder-multiple form-control select-component">
                                                <option value="" disabled>Pilih Komponen</option>
                                                @foreach ($componens as $availableComponent)
                                                    <option value="{{ $availableComponent->name }}"
                                                        {{ $component->name == $availableComponent->name ? 'selected' : '' }}>
                                                        {{ $availableComponent->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[]" class="form-control" min="0"
                                                placeholder="0" value="{{ $component->pivot->kuantitas }}">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove-row">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary" id="add-row">Tambah Komponen</button>
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
        document.getElementById('add-row').addEventListener('click', function() {
            var table = document.getElementById('components-table').getElementsByTagName('tbody')[0];
            var row = table.insertRow();
            row.innerHTML = `
                <td>
                    <select name="components[]" class="select2-placeholder-multiple form-control select-component">
                        <option value="" disabled selected>Pilih Komponen</option>
                        @foreach ($components as $component)
                            <option value="{{ $component->name }}">{{ $component->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="quantities[]" class="form-control" min="0" placeholder="0"></td>
                <td><button type="button" class="btn btn-danger remove-row">Hapus</button></td>
            `;
        });

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-row')) {
                var row = event.target.closest('tr');
                row.parentNode.removeChild(row);
            }
        });
    </script>
@endsection
