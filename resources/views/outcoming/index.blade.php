@extends('inc.main')
@section('title', 'outcoming')
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
                'icon' => 'sign-out',
                'heading1' => 'Barang Keluar',
                'heading2' => 'Karoseri',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Daftar" subtitle="Barang Keluar">
            <x-slot name="paneltoolbar">
                @can('tambah-barang-keluar')
                    <x-panel.tool-bar>
                        <a href="{{ route('outcoming.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
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
                        <th>No SPK</th>
                        <th>Bagian</th>
                        @canany(['edit-barang-keluar', 'hapus-barang-keluar'])
                            <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($outcomings as $outcoming)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $outcoming->purchase_date ? $outcoming->purchase_date : 'No date' }}
                            </td>
                            <td>{{ $outcoming->kode }}</td>
                            <td>{{ $outcoming->product->name }}</td>
                            <td>{{ $outcoming->quantity }}</td>
                            <td>{{ $outcoming->unit }}</td>
                            <td>{{ $outcoming->no_spk }}</td>
                            <td>{{ $outcoming->bagian }}</td>
                            @canany(['edit-barang-keluar', 'hapus-barang-keluar', 'print-barang-keluar'])
                                <td>
                                    <div class="btn-group" role="group" aria-label="Outcoming Actions">
                                        <a href="{{ route('outcoming.show', $outcoming->id) }}"
                                            class="btn btn-info btn-sm">Detail</a>

                                        {{-- Tombol Edit --}}
                                        @can('edit-barang-keluar')
                                            <a href="{{ route('outcoming.edit', $outcoming->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endcan

                                        {{-- Tombol Hapus --}}
                                        @can('hapus-barang-keluar')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $outcoming->id }})">Hapus</button>
                                        @endcan

                                        {{-- Tombol Print --}}
                                        @can('print-barang-keluar')
                                            <a href="{{ route('outcoming.print', $outcoming->id) }}" class="btn btn-success btn-sm"
                                                target="_blank">Print</a>
                                        @endcan
                                    </div>

                                    {{-- Form Hapus --}}
                                    @can('hapus-barang-keluar')
                                        <form id="delete-form-{{ $outcoming->id }}"
                                            action="{{ route('outcoming.destroy', $outcoming->id) }}" method="POST"
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
