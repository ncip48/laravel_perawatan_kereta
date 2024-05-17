@extends('layouts.app')
@section('title', 'Data Kereta')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Kelompok Pekerjaan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Edit Kelompok Pekerjaan</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form method="POST" action="{{ route('item_checksheet.update', $items->id) }}"
                                        autocomplete="off" id="form-edit-pekerjaan">
                                        {{-- create input with csrf token and bootstrap class --}}
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="id_kereta">Nama Kereta</label>
                                            <select name="id_kereta" id="id_kereta" class="form-select">
                                                @foreach ($keretas as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_kereta }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kereta')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori_checksheet">Kelompok Pekerjaan</label>
                                            <select name="id_kategori_checksheet" id="id_kategori_checksheet"
                                                class="form-select">
                                                @foreach ($kategories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori_checksheet')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_item">Uraian Pekerjaan</label>
                                            <input type="text" id="nama_item" class="form-control" name="nama_item"
                                                value="{{ $items->nama_item }}">
                                            @error('nama_item')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="standar">Standar</label>
                                            <textarea type="text" id="standar" class="form-control" name="standar">{{ $items->standar }}</textarea>
                                            @error('standar')
                                                {{-- <span class="text-danger">{{ $message }}</span> --}}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="check_item">Periode Perawatan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="harian" id="harian"
                                                    {{ $items->harian == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="harian">
                                                    Harian
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p1" id="p1" {{ $items->p1 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="p1">
                                                    P1
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p3" id="p3" {{ $items->p3 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="p3">
                                                    P3
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p6" id="p6" {{ $items->p6 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="p6">
                                                    P6
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="p12" id="p12" {{ $items->p12 == 1 ? 'checked' : '' }}>
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
                                <button type="submit" class="btn btn-primary" form="form-edit-pekerjaan"><i
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
