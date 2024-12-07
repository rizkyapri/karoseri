@extends('inc.main')
@section('title', 'Peran')
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
                'icon' => 'Peran',
                'heading1' => 'Peran Pengguna',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Daftar" subtitle="Peran Pengguna">
            <x-slot name="paneltoolbar">
                @can('tambah-role')
                    <x-panel.tool-bar>
                        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </x-panel.tool-bar>
                @endcan
            </x-slot>
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>Nama</th>
                        @canany(['edit-role', 'hapus-role'])
                            <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            @canany(['edit-role', 'hapus-role'])
                                <td>
                                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">Detail</a>

                                    {{-- Tombol Edit --}}
                                    @can('edit-role')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus --}}
                                    @can('hapus-role')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $role->id }})">Hapus</button>
                                    @endcan

                                    {{-- Form Hapus --}}
                                    @can('hapus-role')
                                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}"
                                            method="POST" style="display:none;">
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
