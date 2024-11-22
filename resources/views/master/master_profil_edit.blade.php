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
                'heading1' => 'Edit Profil',
                'heading2' => 'Admin',
            ])
            @endcomponent
        </div>
        <x-row-column :column="1">
            <x-slot name='column1'>
                <x-panel.show title="Profil" subtitle="{{ auth()->user()->role }}">
                    <form action="{{ route('profil_admin.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row no-gutters row-grid">
                            <div class="col-12">
                                <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                    <!-- Gambar profil berbentuk lingkaran -->
                                    <label for="image" class="position-relative">
                                        <img id="profileImage" src="{{ auth()->user()->image ? asset('storage/profile/' . auth()->user()->image) : asset('admin/img/users/user.jpg') }}"
                                            class="rounded-circle shadow-2 img-thumbnail transition-transform duration-300 ease-in-out transform hover:scale-125"
                                            style="width: 120px; height: 120px;">
                                        <!-- Icon untuk mengganti gambar -->
                                        <span class="position-absolute" style="bottom: 5px; right: 5px;">
                                            <i class="fas fa-camera" style="font-size: 20px; color: #007bff;"></i>
                                        </span>
                                    </label>

                                    <!-- Input file tersembunyi untuk mengubah gambar -->
                                    <input type="file" id="image" name="image" class="d-none" accept="image/*"
                                        onchange="previewImage(event)">
                                    <h5 class="mb-0 fw-700 text-center mt-3">
                                        <label for="name">Username</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}"
                                            class="form-control text-center">
                                    </h5>
                                    <h5 class="text-center fw-700 mt-3 mb-0">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" value="{{ auth()->user()->email }}"
                                            class="form-control text-center">
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </x-panel.show>
            </x-slot>
        </x-row-column>
    </main>
@endsection

@section('pages-script')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
