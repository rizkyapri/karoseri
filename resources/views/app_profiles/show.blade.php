@extends('inc.main')
@section('title', 'App Profile')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb')
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'cog',
                'heading1' => 'App Profile',
            ])
            @endcomponent
        </div>
        <x-panel.show title="Profile" subtitle="Application">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar class="ml-2">
                    <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fal fa-ellipsis-v"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                        <a class="dropdown-item" href="/dashboard">Kembali</a>
                        {{--
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        --}}
                    </div>
                </x-panel.tool-bar>
            </x-slot>
            <x-col size1=6 size2=6>
                <x-slot name="content1">
                    <table class="table table-hover table-clean">
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $appProfile->app_nama }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>:</td>
                            <td>{{ $appProfile->app_deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Tahun</th>
                            <td>:</td>
                            <td>{{ $appProfile->app_tahun }}</td>
                        </tr>
                        <tr>
                            <th>Pengembang</th>
                            <td>:</td>
                            <td>{{ $appProfile->app_pengembang }}</td>
                        </tr>
                    </table>
                </x-slot>
                <table class="table table-clean">
                    <tr>
                        <th style="align-content: center">Icon</th>
                        <td style="align-content: center">:</td>
                        <td><img src="{{ asset('admin/img/' . $appProfile->app_icon) }}" alt="Icon" width="50"></td>
                    </tr>
                    <tr>
                        <th style="align-content: center">Logo</th>
                        <td style="align-content: center">:</td>
                        <td><img src="{{ asset('admin/img/' . $appProfile->app_logo) }}" alt="Logo" width="50"></td>
                    </tr>
                </table>
                <x-slot name="Content2">
                </x-slot>
            </x-col>
            <x-slot name="panelcontentfoot">
                <x-button href="{{ route('app_profiles.edit') }}" size="sm" :label="__('Edit')" class="ml-auto" />
            </x-slot>
        </x-panel.show>
    </main>
@endsection
@section('pages-script')

@endsection
