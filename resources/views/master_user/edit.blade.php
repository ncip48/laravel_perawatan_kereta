@extends('layouts.app')
@section('title', 'User')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data User</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Edit Data User</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-content">
                                    <form action="{{ route('user.update', $users->id) }}" autocomplete="off"
                                        id="form-edit-user">
                                        @csrf
                                        @method('post')
                                        {{-- <input type="hidden" name="id" value="{{ $users->id }}"> --}}
                                        <div class="form-group mb-3">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="form-select">
                                                <option>Pilih Role</option>
                                                <option value="0" {{ $users->role == 0 ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="1" {{ $users->role == 1 ? 'selected' : '' }}>Assman UPT
                                                    DEPO</option>
                                                <option value="1" {{ $users->role == 2 ? 'selected' : '' }}>SPV Ruas
                                                    Luar</option>
                                                <option value="1" {{ $users->role == 3 ? 'selected' : '' }}>Teknisi
                                                </option>
                                            </select>
                                            @error('role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kereta">Nama Kereta</label>
                                            <select name="id_kereta" id="id_kereta" class="form-select">
                                                <option value="0">Pilih Kereta</option>
                                                @foreach ($keretas as $item)
                                                    <option value="{{ $item->id }}" {{ $users->id_kereta == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_kereta }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kereta')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" id="nip" class="form-control" name="nip" value="{{ $users->nip }}">
                                            @error('nip')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" id="name" class="form-control"
                                                placeholder="Masukkan Nama Karyawan" name="name" value="{{ $users->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control"
                                                placeholder="Masukkan email Karyawan" name="email" value="{{ $users->email }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="text" id="password" class="form-control"
                                                placeholder="Masukkan password Karyawan" name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer py-0 border-top-0 pb-4">
                                <button type="submit" class="btn btn-primary" form="form-edit-user"><i
                                        class="bi bi-save me-2"></i>
                                    Simpan</button>
                                <a href="{{ route('user.index') }}" class="btn btn-danger ms-2"><i
                                        class="bi bi-x-circle me-2"></i>
                                    Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
