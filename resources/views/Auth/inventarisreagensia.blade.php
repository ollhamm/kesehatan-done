@extends('layouts.app')

@section('title', 'Reagensia')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="header-container rounded text-center mb-4" style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
                <h1 class="display-5 font-weight-bold text-success">Inventaris Reagensia</h1>
            </div>
            <form action="{{ route('reagensia') }}" method="GET" class="mb-4 fade-in-left">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama_reagen_kit" class="form-control mb-2" placeholder="Search by nama reagen....click enter">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="ketersediaan" class="form-control mb-2" placeholder="Search by ketersediaan....click enter">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_kadaluarsa" class="form-control">
                            <div class="input-group-append">
                                <a href="{{ route('reagensia') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button> 
                     
                </div>
            </form>
            <a href="{{ route('reagensia.create') }}" class="btn mb-3 btn-success">
                <i class="fa-solid_pasien fa-plus"></i> Create</a>
            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Reagen Kit</th>
                            <th scope="col">Tanggal Kadaluarsa</th>
                            <th scope="col">Reagen yang Telah Dipakai</th>
                            <th scope="col">Ketersediaan</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($reagensias as $reagensia)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td >
                                    @if ($reagensia->ketersediaan == 0)
                                        <i class="fa-solid fa-triangle-exclamation" style="color: red;"></i>
                                    @endif
                                    {{ $reagensia->nama_reagen_kit }}
                                </td>
                                <td>{{ $reagensia->tanggal_kadaluarsa }}</td>
                                <td>{{ $reagensia->reagen_yang_telah_dipakai }}</td>
                                <td>{{ $reagensia->ketersediaan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('reagensia.edit', $reagensia->id_reagen) }}" class="btn btn-warning btn-sm mr-2"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('reagensia.destroy', $reagensia->id_reagen) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('reagensia.details', $reagensia->id_reagen) }}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
