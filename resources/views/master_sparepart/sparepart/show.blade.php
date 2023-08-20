@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data Sparepart</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Sparepart Perawatan</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{route('sparepart.create')}}" class="btn btn-primary"><i class="material-icons">add</i>Tambah</a>
                            <table id="datatable1" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Sparepart</th>
                                        <th>Nama Sparepart</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trains as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>kategori</td>
                                            <td>{{$item->nama_kereta}}</td>
                                            <td>{{$item->username}}</td>
                                            <td>{{$item->foto}}</td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="material-icons">edit</i>Edit   
                                                </a>
                                                <form action="#"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-sm btn-danger"><i class="material-icons">delete</i>Hapus</button>      
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
