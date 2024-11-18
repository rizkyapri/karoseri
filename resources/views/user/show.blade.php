@extends('inc.main')
@section('title', 'Pengguna')
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
                'heading1' => 'Pengguna',
                'heading2' => 'WebApps',
            ])
            @endcomponent
        </div>

        <x-panel.show title="Default" subtitle="Example">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('tenaga_pendidik.index') }}">Kembali</a>
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <x-slot name="tagpanel">
                isi-tag-panel
            </x-slot>
            <div class="card">
                <div class="card-body">
                    <p><strong>ID users:</strong> {{ $user->id }}</p>
                    <p><strong>Role:</strong> 
                    @if($user->role == 'Admin')
                        <span class="badge bg-danger text-white">Admin</span>
                    @elseif($user->role == 'Gudang')
                        <span><span class="badge bg-primary text-white">Gudang</span>
                    @endif
                    </p>
                    <p><strong>Nama:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Photo:</strong>
                        @if ($user->image == null)
                            <span class="badge bg-primary text-white">No Image</span>
                        @else
                            <img class="rounded" src="{{ asset('storage/profile/' . $user->image) }}" alt="{{ $user->name }}"
                                style="max-width: 50px">
                        @endif
                    </p>
                    <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('user.destroy', $user) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </x-panel.show>
    </main>
@endsection
