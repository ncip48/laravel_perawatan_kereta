@extends('layouts.app')
@section('title', 'Data Foto')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Checksheet</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Laporan Checksheet</h5>
                        </div>
                        <div class="card-body">
                            @if (session()->has('status'))
                                <div class="alert alert-success alert-style-light" role="alert">
                                    {{ session()->get('status') }}
                                </div>
                            @endif
                            <div class="table table-responsive">
                                <table id="datatable1" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Checksheet Bulan {{ $item->nama_bulan }}</td>
                                                <td>
                                                    <a href="{{ route('report.checksheet.print', ['bulan' => $item->month, 'tahun' => $item->year]) }}"
                                                        class="btn btn-sm btn-success mb-1" target="_blank">
                                                        {{-- <a href="" class="btn btn-sm btn-success mb-1"> --}}
                                                        <i class="material-icons">print</i>Cetak
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Tidak ada data</td>
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
    </div>
@endsection
