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
        <x-panel.show title="Daftar" subtitle="Barang Masuk">
            <x-slot name="paneltoolbar">
                @can('tambah-barang-masuk')
                    <x-panel.tool-bar>
                        <a href="{{ route('incoming.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </x-panel.tool-bar>
                @endcan
            </x-slot>
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kuantitas</th>
                        <th>Satuan</th>
                        <th>Nama Supplier</th>
                        {{-- <th>Keterangan</th> --}}
                        @if (Auth::user()->getRoleNames()->first() == 'Admin' || Auth::user()->getRoleNames()->first() == 'Purchasing')
                            <th>Harga Barang</th>
                        @endif
                        @canany(['edit-barang-masuk', 'hapus-barang-masuk'])
                            <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incomings as $incoming)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $incoming->start_date ? $incoming->start_date : 'No date' }}
                            </td>
                            <td>{{ $incoming->kode_penerimaan }}</td>
                            <td>{{ $incoming->product->name }}</td>
                            <td>{{ $incoming->kuantitas }}</td>
                            <td>{{ $incoming->unit }}</td>
                            {{-- <td>{{ $incoming->keterangan }}</td> --}}
                            <td>{{ $incoming->supplier->name }}</td>
                            @if (Auth::user()->getRoleNames()->first() == 'Admin' || Auth::user()->getRoleNames()->first() == 'Purchasing')
                                <td>Rp. {{ number_format($incoming->product->price * $incoming->kuantitas, 0, ',', '.') }}
                                </td>
                            @endif
                            @canany(['edit-barang-masuk', 'hapus-barang-masuk'])
                                <td>
                                    <div class="btn-group" role="group" aria-label="Incoming Actions">
                                        <a href="{{ route('incoming.show', $incoming->id) }}"
                                            class="btn btn-info btn-sm">Detail</a>

                                        {{-- Tombol Edit --}}
                                        @can('edit-barang-masuk')
                                            <a href="{{ route('incoming.edit', $incoming->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endcan

                                        {{-- Tombol Hapus --}}
                                        @can('hapus-barang-masuk')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $incoming->id }})">Hapus</button>
                                        @endcan
                                    </div>
                                    {{-- Form Hapus --}}
                                    @can('hapus-barang-masuk')
                                        <form id="delete-form-{{ $incoming->id }}"
                                            action="{{ route('incoming.destroy', $incoming->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endcan
                                </td>
                            @endcanany

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-panel.show>
    </main>
@endsection
@section('pages-script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    <script src="/admin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script>
        /* demo scripts for change table color */
        /* change background */
        $(document).ready(function() {
            $('#dt-basic-example').dataTable({
                responsive: true
            });

            $('.js-thead-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
            });

            $('.js-tbody-colors a').on('click', function() {
                var theadColor = $(this).attr("data-bg");
                console.log(theadColor);
                $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
            });

        });
    </script>
@endsection
