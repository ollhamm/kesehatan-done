@extends('layouts.app')

@section('title', 'Kunjungan Laboratorium')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="header-container rounded text-center mb-4" style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
                <h1 class="display-5 font-weight-bold text-success">Kunjungan Lab</h1>
            </div>
            <form action="{{ route('kunjunganLabolaturium') }}" method="GET" class="mb-4 fade-in-left">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control mb-2" placeholder="Cari berdasarkan nama">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="tanggal_kunjunggan" class="form-control mb-2" placeholder="Cari berdasarkan rujukan">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_selesai" class="form-control">
                            <div class="input-group-append">
                                <a href="{{ route('kunjunganLabolaturium') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button>
                </div>
            </form>
            <a href="{{ route('kunjunganLabolaturium.create') }}" class="btn mb-3 btn-success">
                <i class="fa-solid_pasien fa-plus"></i> Create</a>
            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Pemeriksaan</th>
                            <th scope="col">Tanggal Pemeriksaan</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($kunjunganLabolaturium as $kunjungan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kunjungan->pemeriksaan->patients->nama }}</td>
                                <td>{{ $kunjungan->pemeriksaan->rincian_pemeriksaan }}</td>
                                <td>{{ $kunjungan->pemeriksaan->tanggal_pemeriksaan }}</td>
                                <td class="text-danger">{{ $kunjungan->tanggal_kunjungan }}</td>
                                <td class="text-success">{{ $kunjungan->tanggal_selesai }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kunjunganLabolaturium.edit', $kunjungan->id) }}" class="btn btn-warning btn-sm mr-2"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('kunjunganLabolaturium.destroy', $kunjungan->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('kunjunganLabolaturium.details', $kunjungan->id) }}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
