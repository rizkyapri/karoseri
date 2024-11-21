@extends('inc.main')
@section('title', 'outcoming')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
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
                'icon' => 'sign-out',
                'heading1' => 'Barang Keluar',
                'heading2' => 'Karoseri',
            ])
            @endcomponent
        </div>
        <form action="{{ route('outcoming.store') }}" method="POST">
            @csrf
            <x-panel.show title="Tambah" subtitle="Barang Keluar">
                <x-slot name="paneltoolbar">
                    <x-panel.tool-bar class="ml-2">
                        <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('outcoming.index') }}">Kembali</a>

                        </div>
                    </x-panel.tool-bar>
                </x-slot>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="tanggal" id="tanggal"
                            value="{{ old('tanggal', now()) }}" readonly placeholder="Select date" id="datepicker-2">
                        @error('tanggal')
                            <span class="text-danger help-block">{{ $message }}</span>
                        @enderror
                        <div class="input-group-append">
                            <span class="input-group-text fs-xl">
                                <i class="fal fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kode_keluar">Kode Barang Keluar</label>
                    <input type="text" readonly name="kode_keluar" id="kode_keluar" class="form-control"
                        value="{{ old('kode_keluar') }}">
                    @error('kode_keluar')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <select class="select2 form-control @error('id_product') is-invalid @enderror" aria-label="id_product"
                        id="id_product" name="id_product">
                        <option selected disabled>- Pilih Produk -</option>
                        @foreach ($products as $cat)
                            <option value="{{ $cat->id }}" {{ old('id_product') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('id_product')
                        <small class="text-danger help-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Kuantitas</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="unit" id="unit" class="form-control"
                        value="{{ old('unit') }}">
                    @error('unit')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Bagian</label>
                    <input type="text" name="bagian" id="bagian" class="form-control"
                        value="{{ old('bagian') }}">
                    @error('bagian')
                        <span class="text-danger help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan">Nomor SPK</label>
                    <input type="text" name="no_spk" id="no_spk" class="form-control"
                        value="{{ old('no_spk') }}">
                    @error('no_spk')
                        <span class="text-danger help-block">{{ $message }}</span>
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
    <script src="/admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="/admin/js/formplugins/select2/select2.bundle.js"></script>
    <script>
        // Generate the product code when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            var kodeProdukField = document.getElementById('kode_keluar');

            // Ambil bulan dengan penyesuaian +1
            var month = new Date().getMonth() + 1;
            var day = new Date().getDate();
            var hours = new Date().getHours();
            var minutes = new Date().getMinutes();
            var seconds = new Date().getSeconds();

            // Gabungkan nilai untuk kode produk
            var kodeProduk = 'OUT-' + month + day + hours + minutes + seconds;
            kodeProdukField.value = kodeProduk;
        });
        $(document).ready(function() {
            $(function() {
                $('.select2').select2();
            });
        });
        // Class definition

        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }

        var runDatePicker = function() {
            // input group layout
            $('#datepicker-2').datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls
            });
        }

        $(document).ready(function() {
            runDatePicker();
        });
    </script>

@endsection
