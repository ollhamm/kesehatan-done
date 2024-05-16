@extends('layouts.app')

@section('title', 'manajemen')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                Hasil Pemeriksaan
            </div>
            <form action="{{ route('pemeriksaan') }}" method="GET" class="mb-3 fade-in-left">
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
                        <a href="{{ route('mpasient') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>
                </div>
            </form>
            <a href="{{ route('pemeriksaan.create') }}" class="btn mb-3 " style="background-color: #4ca64c; color: white"><i
                    class="fa-solid_pasien fa-plus"></i> Create</a>

            <table class="table rounded fade-in-right">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>tanggal</th>
                        <th>unit</th>
                        <th>Rujukan</th>
                        <th>Rincian</th>
                        <th>Jenis pembayaran</th>
                        <th class="text-center">Aksi</th>
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
                                <a href="{{ route('pemeriksaan.edit', $periksa->id_periksa) }}"
                                    class="text-warning px-2"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('pemeriksaan.destroy', $periksa->id_periksa) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-danger border-0 bg-light" type="submit"
                                        ><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <a href="{{ route('pemeriksaan.details', $periksa->id_periksa) }}"
                                    class="px-2"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
