@extends('inc.main')
@section('title', 'Izin')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/datagrid/datatables/datatables.bundle.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', [
            'category_1' => 'Settings',
        ])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'Izin',
                'heading1' => 'Izin Pengguna',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Daftar" subtitle="Izin Pengguna">
            <x-slot name="paneltoolbar">
                @can('tambah-permission')
                    <x-panel.tool-bar>
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </x-panel.tool-bar>
                @endcan
            </x-slot>
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            @canany(['edit-permission', 'hapus-permission'])
                                <td>
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info">Detail</a>

                                    {{-- Tombol Edit --}}
                                    @can('edit-permission')
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus --}}
                                    @can('hapus-permission')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $permission->id }})">Hapus</button>
                                    @endcan

                                    {{-- Form Hapus --}}
                                    @can('hapus-permission')
                                        <form id="delete-form-{{ $permission->id }}"
                                            action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
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
