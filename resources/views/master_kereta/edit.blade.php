@extends('layouts.app')
@section('title', 'Data Kereta')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Edit Data Kereta</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('kereta.update', $keretas->id) }}"
                                        autocomplete="off" id="form-edit-kereta" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama_kereta">Nama Kereta</label>
                                            <input type="text" id="nama_kereta" class="form-control"
                                                placeholder="Masukkan nama kereta" name="nama_kereta"
                                                value="{{ $keretas->nama_kereta }}">
                                            @error('nama_kereta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_kereta" class="col-sm-2 col-form-label">Nomor Kereta</label>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div id="nomor_lain">
                                                        @foreach ($keretas->nomor_kereta as $key => $nomor)
                                                            <div class="mt-2 d-flex align-items-center" id="opsi-nomor"
                                                                data-index="{{ $key }}">
                                                                <input type="text" class="form-control"
                                                                    id="nomor_kereta_add" name="nomor_kereta[]" multiple
                                                                    value="{{ $nomor }}">
                                                                <a class="btn btn-danger m-1"
                                                                    id="hapus-nomor-{{ $key }}"><i
                                                                        class="material-icons">delete</i></a>
                                                            </div>
                                                        @endforeach
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
                                                    <div id="car_lain">
                                                        @if (isset($keretas->car))
                                                            @foreach ($keretas->car as $key => $car)
                                                                <div class="mt-2 d-flex align-items-center" id="opsi-car"
                                                                    data-index="{{ $key }}">
                                                                    <input type="text" class="form-control"
                                                                        id="car_add" name="car[]" multiple
                                                                        value="{{ $car }}">
                                                                    <a class="btn btn-danger m-1"
                                                                        id="hapus-car-{{ $key }}"><i
                                                                            class="material-icons">delete</i></a>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a class="btn btn-primary" id="tambah-car" onclick="tambahCar()">
                                                        <i class="material-icons">add</i> Tambah
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-edit-kereta"><i
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
                // Find the closest parent with class 'opsi-car'
                var parentOpsiCar = $(this).closest('#opsi-car');

                // Remove the parent element
                parentOpsiCar.remove();
            });
        </script>
    @endpush
@endsection
