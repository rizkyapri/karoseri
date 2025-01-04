@extends('inc.main')
@section('title', 'Produk')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
    <!-- DEMO related CSS below -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-brands.css">
    <!-- page related CSS below -->
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/select2/select2.bundle.css">
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
                    <input type="text" name="kode_produk" id="kode_produk" class="form-control">
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
                    <input type="text" name="unit" id="unit" class="form-control" value="{{ old('unit') }}">
                    @error('unit')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
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
                            <tr>
                                <td>
                                    <select name="components[]"
                                        class="select2-placeholder-multiple form-control select-component">
                                        <option value="" disabled selected>Pilih Komponen</option>
                                        @foreach ($components as $component)
                                            <option value="{{ $component->name }}">{{ $component->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control" min="0"
                                        placeholder="0">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove-row">Hapus</button>
                                    <button type="button" class="btn btn-primary" id="add-row">Tambah Komponen</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="form-group">
                    <label class="form-label" for="multiple-placeholder">
                        List Komponen
                    </label>
                    <select class="select2-placeholder-multiple form-control" multiple="multiple" id="multiple-placeholder"
                        name="components[]">
                        @foreach ($components as $component)
                            <option value="{{ $component->name }}">{{ $component->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <x-slot name="panelcontentfoot">
                    <x-button type="submit" color="primary" :label="__('Save')" class="ml-auto" />
                </x-slot>
            </x-panel.show>
        </form>
    </main>
@endsection
@section('pages-script')
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */
        $(document).ready(function() {
            $('#components-table').dataTable({
                responsive: true,
                searching: false
            });

            // Fungsi untuk menambah baris baru
            $('#components-table').on('click', '#add-row', function() {
                let newRow = `
            <tr>
                <td>
                    <select name="components[]" class="select2-placeholder-multiple form-control select-component">
                        <option value="" disabled selected>Pilih Komponen</option>
                        @foreach ($components as $component)
                            <option value="{{ $component->name }}">{{ $component->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="quantities[]" class="form-control" min="0" placeholder="0">
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">Hapus</button>
                </td>
            </tr>`;
                $('#components-table tbody').append(newRow);
            });

            // Fungsi untuk menghapus baris
            $('#components-table').on('click', '.remove-row', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const componentsTable = document.getElementById("components-table").querySelector("tbody");
            const addRowButton = document.getElementById("add-row");
    
            // Fungsi untuk menambahkan baris
            function addRow(selectedComponent = "", quantity = "") {
                const newRow = document.createElement("tr");
    
                newRow.innerHTML = `
                    <td>
                        <select name="components[]" class="select2-placeholder-multiple form-control select-component">
                            <option value="" disabled ${!selectedComponent ? "selected" : ""}>Pilih Komponen</option>
                            @foreach ($components as $component)
                                <option value="{{ $component->name }}" ${selectedComponent === "{{ $component->name }}" ? "selected" : ""}>
                                    {{ $component->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="quantities[]" class="form-control" min="0" placeholder="0" value="${quantity}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-row">Hapus</button>
                    </td>
                `;
    
                componentsTable.appendChild(newRow);
    
                // Tambahkan event listener untuk tombol "Hapus"
                newRow.querySelector(".remove-row").addEventListener("click", function () {
                    newRow.remove();
                });
            }
    
            // Tambahkan baris baru saat tombol "Tambah Komponen" diklik
            addRowButton.addEventListener("click", function () {
                // Tambahkan baris baru tanpa melibatkan localStorage
                addRow();
            });
        });
    </script> --}}


    <script>
        $(document).ready(function() {
            $(function() {
                $('.select2').select2();

                $(".select2-placeholder-multiple").select2({
                    placeholder: "Pilih Komponen",
                    allowClear: true
                });
            });
        });
    </script>
@endsection
