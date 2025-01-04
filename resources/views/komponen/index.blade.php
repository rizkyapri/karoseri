@extends('inc.main')
@section('title', 'Komponen')
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
                'icon' => 'cart-shopping',
                'heading1' => 'Komponen',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Daftar" subtitle="Komponen">
            <x-slot name="paneltoolbar">
                @can('tambah-komponen')
                    <x-panel.tool-bar>
                        <a href="{{ route('komponen.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
                    </x-panel.tool-bar>
                @endcan
            </x-slot>
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        @canany(['edit-komponen', 'hapus-komponen'])
                            <th>Aksi</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach ($components as $component)
                        <tr>
                            <td>{{ $component->name }}</td>
                            <td>{{ $component->quantity }}</td>
                            <td>Rp. {{ number_format($component->price, 0, 2) }}</td>
                            @canany(['edit-komponen', 'hapus-komponen'])
                                <td>
                                    <a href="{{ route('komponen.show', $component->id) }}" class="btn btn-info">Detail</a>

                                    {{-- Tombol Edit --}}
                                    @can('edit-komponen')
                                        <a href="{{ route('komponen.edit', $component->id) }}" class="btn btn-warning">Edit</a>
                                    @endcan

                                    {{-- Tombol Hapus --}}
                                    @can('hapus-komponen')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete({{ $component->id }})">Hapus</button>
                                    @endcan

                                    {{-- Form Hapus --}}
                                    @can('hapus-komponen')
                                        <form id="delete-form-{{ $component->id }}"
                                            action="{{ route('komponen.destroy', $component->id) }}" method="POST"
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
