@extends('layouts.app')

@section('title', 'manajemen')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="text-center mb-5 display-6" style="font-weight: bold; color: #428842;">
                Manajemen Pasien
            </div>
            <form action="{{ route('mpasient') }}" method="GET" class="mb-3 fade-in-left">
                <!-- Form pencarian -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control" placeholder="Cari berdasarkan nama">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="rujukan" class="form-control" placeholder="Cari berdasarkan rujukan">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Cari berdasarkan tanggal">
                    </div>
                    <div class="col-md-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-magnifying-glass"></i></i> Cari</button>
                        <a href="{{ route('mpasient') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>
                </div>
            </form>
            <a href="{{ route('mpasient.creatempasient') }}" class="btn mb-3 "
                style="background-color: #4ca64c; color: white"><i class="fa-solid_pasien fa-plus"></i> Tambah Pasien</a>
            <table class="table rounded shadow fade-in-right">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>RM</th>
                        <th>Rujukan</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $patient->nama }}</td>
                            <td>{{ $patient->umur }}</td>
                            <td>{{ $patient->jenis_kelamin }}</td>
                            <td>{{ $patient->alamat }}</td>
                            <td>{{ $patient->rm }}</td>
                            <td>{{ $patient->rujukan }}</td>
                            <td>
                                @if ($patient->status == 'Aktif')
                                    <p style="color: green;">{{ $patient->status }}</p>
                                @else
                                    <p style="color: red;">{{ $patient->status }}</p>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('mpasient.editmpasient', $patient->id_pasien) }}"
                                    class="text-warning px-2"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('mpasient.destroympasient', $patient->id_pasien) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-danger border-0 bg-light" type="submit"
                                        ><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <a href="{{ route('patient.details.pemeriksaan', $patient->id_pasien) }}" class="px-2"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
