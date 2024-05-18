@extends('layouts.app')

@section('title', 'Pemeriksaan')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="header-container rounded text-center mb-4" style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
                <h1 class="display-5 font-weight-bold text-success">Pemeriksaan</h1>
            </div>
            <form action="{{ route('pemeriksaan') }}" method="GET" class="mb-4 fade-in-left">
                <!-- Form pencarian -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control mb-2" placeholder="Search by name pasien....click enter">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="rujukan" class="form-control mb-2" placeholder="Search by rujukan....click enter">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_pemeriksaan" class="form-control" placeholder="Search by date....click enter">
                            <div class="input-group-append">
                                <a href="{{ route('pemeriksaan') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button> 
                </div>
            </form>
            <a href="{{ route('pemeriksaan.create') }}" class="btn mb-3 btn-success">
                <i class="fa-solid_pasien fa-plus"></i> Create</a>
            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Rujukan</th>
                            <th scope="col">Rincian</th>
                            <th scope="col">Jenis Pembayaran</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pemeriksaans as $periksa)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $periksa->patients->nama }}</td>
                                <td>{{ $periksa->tanggal_pemeriksaan }}</td>
                                <td>{{ $periksa->unit_pemeriksaan }}</td>
                                <td>{{ $periksa->rujukan_pemeriksaan }}</td>
                                <td>{{ $periksa->rincian_pemeriksaan }}</td>
                                <td>{{ $periksa->jenis_pembayaran }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pemeriksaan.edit', $periksa->id_periksa) }}" class="btn btn-warning btn-sm mr-2"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('pemeriksaan.destroy', $periksa->id_periksa) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('pemeriksaan.details', $periksa->id_periksa) }}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
