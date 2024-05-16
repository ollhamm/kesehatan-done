@extends('layouts.app')

@section('title', 'Manajemen Kunjungan Laboratorium')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                Hasil Pemeriksaan
            </div>
            <form action="{{ route('kunjunganLabolaturium') }}" method="GET" class="mb-3 fade-in-left">
                <!-- Form pencarian -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control" placeholder="Cari berdasarkan nama">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="rujukan" class="form-control" placeholder="Cari berdasarkan rujukan">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="tanggal" class="form-control" placeholder="Cari berdasarkan tanggal">
                    </div>
                    <div class="col-md-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-magnifying-glass"></i></i> Cari</button>
                        <a href="{{ route('kunjunganLabolaturium') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>
                </div>
            </form>
            <a href="{{ route('kunjunganLabolaturium.create') }}" class="btn mb-3 " style="background-color: #4ca64c; color: white"><i
                    class="fa-solid_pasien fa-plus"></i> Create</a>

            <table class="table rounded fade-in-right">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Pemeriksaan</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

