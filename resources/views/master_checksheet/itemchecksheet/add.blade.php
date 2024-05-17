@extends('layouts.app')
@section('title', 'Item Checksheet')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Uraian Pekerjaan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tambah Uraian Pekerjaan</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('item_checksheet.store') }}" autocomplete="off"
                                        id="form-tambah-pekerjaan">
                                        {{-- create input with csrf token and bootstrap class --}}
                                        @csrf
                                        <div class="form-group">
                                            <label for="id_kereta">Nama Kereta</label>
                                            <select name="id_kereta" id="id_kereta" class="form-select">
                                                <option value="0">Pilih Kereta</option>
                                                @foreach ($keretas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kereta }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kereta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori_checksheet">Kelompok Pekerjaan</label>
                                            <select name="id_kategori_checksheet" id="id_kategori_checksheet"
                                                class="form-select">
                                                <option value="0">Pilih Kelompok Pekerjaan</option>
                                                @foreach ($kategories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori_checksheet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_item">Uraian Pekerjaan</label>
                                            <input type="text" id="nama_item" class="form-control"
                                                placeholder="Masukkan kelompok pekerjaan" name="nama_item">
                                            @error('nama_item')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="standar">Standar</label>
                                            <textarea type="text" id="standar" class="form-control" name="standar" placeholder="Masukan standar pemeriksaan (opsional)"></textarea>
                                            @error('standar')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="check_item">Periode Perawatan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="harian" id="harian">
                                                <label class="form-check-label" for="harian">
                                                    Harian
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p1" id="p1">
                                                <label class="form-check-label" for="p1">
                                                    P1
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p3" id="p3">
                                                <label class="form-check-label" for="p3">
                                                    P3
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p6" id="p6">
                                                <label class="form-check-label" for="p6">
                                                    P6
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p12" id="p12">
                                                <label class="form-check-label" for="p12">
                                                    P12
                                                </label>
                                            </div>
                                            {{-- @error('check_item')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-tambah-pekerjaan"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{ route('item_checksheet.index') }}" class="btn btn-danger ms-2"><i
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
@endsection
