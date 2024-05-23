@extends('layouts.app')
@section('title', 'Data Kereta')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Kereta Perawatan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Daftar Kereta</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('kereta.store') }}" autocomplete="off"
                                        id="form-tambah-kereta" enctype="multipart/form-data">
                                        {{-- create input with csrf token and bootstrap class --}}
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_kereta">Nama Kereta</label>
                                            <input type="text" id="nama_kereta" class="form-control"
                                                placeholder="Masukkan nama kereta" name="nama_kereta">
                                            @error('nama_kereta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_kereta" class="col-sm-2 col-form-label">Nomor Kereta</label>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <input type="text" id="nomor_kereta" class="form-control "
                                                        placeholder="Masukkan Nomor Kereta " name="nomor_kereta[]" multiple>
                                                    @error('nomor_kereta')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div id="nomor_lain">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="btn btn-primary" id="tambah-nomor-kereta"
                                                        onclick="tambahNomorKereta()">
                                                        <i class="material-icons">add</i> Tambah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="car" class="col-sm-2 col-form-label">Car</label>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <input type="text" id="car" class="form-control "
                                                        placeholder="Masukkan Car" name="car[]" multiple>
                                                    @error('car')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div id="car_lain">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="btn btn-primary" id="tambah-car" onclick="tambahCar()">
                                                        <i class="material-icons">add</i> Tambah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control" placeholder="Masukkan username"
                                                name="username">
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" id="password" class="form-control" placeholder="Masukkan password"
                                                name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" id="foto" class="form-control" placeholder="Masukkan foto"
                                                name="foto">
                                            @error('foto')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-tambah-kereta"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{ route('kereta.index') }}" class="btn btn-danger ms-2"><i
                                        class="bi bi-x-circle me-2"></i>
                                    Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @push('scripts')
        <script>
            function tambahNomorKereta() {
                const count = $('#nomor_lain #opsi-nomor').length
                $('#nomor_lain').append(
                    '<div class="mt-2 d-flex align-items-center" id="opsi-nomor" data-index="' + count + '"">' +
                    '<input type="text" class="form-control" id="nomor_kereta_add" name="nomor_kereta[]" multiple>' +
                    '<a class="btn btn-danger m-1" id="hapus-nomor-' + count +
                    '"><i class="material-icons">delete</i></a>' +
                    '</div>');
            }

            function tambahCar() {
                const count = $('#car_lain #opsi-car').length
                $('#car_lain').append(
                    '<div class="mt-2 d-flex align-items-center" id="opsi-car" data-index="' + count + '"">' +
                    '<input type="text" class="form-control" id="car_add" name="car[]" multiple>' +
                    '<a class="btn btn-danger m-1" id="hapus-car-' + count +
                    '"><i class="material-icons">delete</i></a>' +
                    '</div>');
            }

            $(document).on('click', '[id^=hapus-nomor-]', function() {
                // Find the closest parent with class 'opsi-nomor'
                var parentOpsiNomor = $(this).closest('#opsi-nomor');

                // Get the value of data-index attribute
                var dataIndex = parentOpsiNomor.attr('data-index');

                // Remove the parent element
                parentOpsiNomor.remove();

                // Now you can use the dataIndex as needed
                console.log('Removed element with data-index:', dataIndex);
            });

            $(document).on('click', '[id^=hapus-car-]', function() {
                var parentOpsiCar = $(this).closest('#opsi-car');
                var dataIndex = parentOpsiCar.attr('data-index');
                parentOpsiCar.remove();
                console.log('Removed element with data-index:', dataIndex);
            });
        </script>
    @endpush
@endsection
