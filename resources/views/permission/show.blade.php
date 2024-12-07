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
                'icon' => 'user',
                'heading1' => 'Detail Izin',
                'heading2' => 'WebApps',
            ])
            @endcomponent
        </div>

        <x-panel.show title="Izin" subtitle="Hak akses aplikasi">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('permissions.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>Nama Peran:</strong>
                        {{ $permission->name }}
                    </p>
                    <p><strong>Menjaga bagian:</strong>
                        <span class="badge bg-danger text-white">{{ $permission->guard_name }}</span>
                    </p>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
