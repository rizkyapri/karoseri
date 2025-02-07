@extends('inc.main')
@section('title', 'Profil Master')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Master'])
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'user-circle',
                'heading1' => 'Profil',
                'heading2' => 'Admin',
            ])
            @endcomponent
        </div>
        <x-row-column :column="1">
            <x-slot name='column1'>
                <x-panel.show title="Profil" subtitle="{{ auth()->user()->role }}">
                    <x-slot name="paneltoolbar">
                        <x-panel.tool-bar class="ml-2">
                            <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fal fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                                <a class="dropdown-item" href="/dashboard">Kembali</a>
                                <a class="dropdown-item" href="{{ route('profil_admin.edit') }}">Edit</a>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </x-panel.tool-bar>
                    </x-slot>
                    <div class="row no-gutters row-grid">
                        <div class="col-12">
                            <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                {{-- @dd(asset('public/storage/' . auth()->user()->image)) --}}
                                <img src="{{ auth()->user()->image ? asset('storage/profile/' . auth()->user()->image) : asset('admin/img/users/user.jpg') }}"
                                    class="rounded-circle shadow-2 img-thumbnail transition-transform duration-300 ease-in-out transform hover:scale-125"
                                    style="width: 120px; height: 120px;" alt="User Profile Picture">
                                <h5 class="mb-0 fw-700 text-center mt-3">
                                    {{ auth()->user()->name }}
                                    <small class="text-muted mb-0">{{ auth()->user()->email }}</small>
                                </h5>
                                <div class="mt-4 text-center demo">
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#3b5998">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#38A1F3">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#db3236">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#0077B5">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#000000">
                                        <i class="fab fa-reddit-alien"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#00AFF0">
                                        <i class="fab fa-skype"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="fs-xl" style="color:#0063DC">
                                        <i class="fab fa-flickr"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h5 class="mb-0 fw-700">
                                    764
                                    <small class="text-muted mb-0">Connections</small>
                                </h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center py-3">
                                <h5 class="mb-0 fw-700">
                                    1,673
                                    <small class="text-muted mb-0">Followers</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                </x-panel.show>
            </x-slot>
        </x-row-column>
    </main>
@endsection
