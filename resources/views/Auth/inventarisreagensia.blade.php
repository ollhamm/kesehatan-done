@extends('layouts.app')

@section('title', 'manajemen')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="text-center mb-5 display-6" style="font-weight: bold; color: #428842;">
                Inventaris Reagensia
            </div>
            <form action="{{ route('reagensia') }}" method="GET" class="mb-3 fade-in-left">
                <!-- Form pencarian -->
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="nama_reagen_kit" class="form-control" placeholder="Cari berdasarkan nama">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="tanggal_kadaluarsa" class="form-control" placeholder="Cari berdasarkan tanggal">
                    </div>
                    <div class="col-md-4 mt-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-magnifying-glass"></i></i> Cari</button>
                        <a href="{{ route('reagensia') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>
                </div>
            </form>
            <a href="{{ route('reagensia.create') }}" class="btn mb-3 "
                style="background-color: #4ca64c; color: white"><i class="fa-solid_pasien fa-plus"></i> Tambah Reagensia</a>
            <table class="table rounded fade-in-right">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NAMA REAGEN KIT</th>
                        <th>TANGGAL KADALUARSA</th>
                        <th>REAGEN YANG TELAH DIAPAKAI</th>
                        <th>KETERSEDIAAN</th>
                        <th>AKSI</th>
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
                            <a href="{{ route('reagensia.edit', $reagensia->id_reagen) }}"
                                class="text-warning px-2"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('reagensia.destroy', $reagensia->id_reagen) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger border-0 bg-light" type="submit"
                                    ><i class="fa-solid fa-trash"></i></button>
                            </form>
                            <a href="{{ route('reagensia.details', $reagensia->id_reagen) }}"
                                class="px-2"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
