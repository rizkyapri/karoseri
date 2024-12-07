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
        <x-panel.show title="Daftar" subtitle="Supplier Karoseri">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    @can('tambah-supplier')
                        <a href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    @endcan
                </x-panel.tool-bar>
            </x-slot>
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>PIC</th>
                        <th>Phone</th>
                        @canany(['edit-supplier', 'hapus-supplier'])
                            <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $supplier->name }}
                            </td>
                            <td>{{ $supplier->pic }}</td>
                            <td>{{ $supplier->phone }}</td>
                            @canany(['edit-supplier', 'hapus-supplier'])
                                <td>
                                    <a href="{{ route('supplier.show', $supplier->id) }}" class="btn btn-info">Detail</a>

                                    {{-- Tombol Edit --}}
                                    @can('edit-supplier')
                                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus --}}
                                    @can('hapus-supplier')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $supplier->id }})">Hapus</button>
                                    @endcan

                                    {{-- Form Hapus --}}
                                    @can('hapus-supplier')
                                        <form id="delete-form-{{ $supplier->id }}"
                                            action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
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
