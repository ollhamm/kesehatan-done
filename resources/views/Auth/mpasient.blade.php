@extends('layouts.app')

@section('title', 'Manajemen')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="header-container rounded text-center mb-4"
                style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
                <h1 class="display-5 font-weight-bold text-success">Manajemen Pasien</h1>
            </div>
            <form action="{{ route('mpasient') }}" method="GET" class="mb-4 fade-in-left">
                <!-- Form pencarian -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control mb-2"
                            placeholder="Search by name....click enter">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="rujukan" class="form-control mb-2"
                            placeholder="Search by rujukan....click enter">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_lahir" class="form-control"
                                placeholder="Search by ....click enter">
                            <div class="input-group-append">
                                <a href="{{ route('mpasient') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button>
                </div>
            </form>
            <a href="{{ route('mpasient.creatempasient') }}" class="btn mb-3 btn-success">
                <i class="fa-solid_pasien fa-plus"></i> Create</a>
            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">RM</th>
                            <th scope="col">Rujukan</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
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
                                <td class="alamat">{{ $patient->alamat }}</td>
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
                                        class="btn btn-warning btn-sm mr-2"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('mpasient.destroympasient', $patient->id_pasien) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('patient.details.pemeriksaan', $patient->id_pasien) }}"
                                        class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
