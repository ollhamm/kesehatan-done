@extends('layouts.app')

@section('title', 'manajemen')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="text-center mb-5 display-6" style="font-weight: bold; color: #428842;">
                Monitoring Instrumen
            </div>
            <form action="{{ route('instrumen') }}" method="GET" class="mb-3 fade-in-left">
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
                        <a href="{{ route('instrumen') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>
                </div>
            </form>
            <a href="{{ route('instrumen.create') }}" class="btn mb-3 "
                style="background-color: #4ca64c; color: white"><i class="fa-solid_pasien fa-plus"></i> Tambah Pasien</a>
            <table class="table rounded fade-in-right">
                <thead>
                    <tr class="text-sm">
                        <th>No</th>
                        <th>Instrumen</th>
                        <th>Jumlah Instrumen</th>
                        <th class="text-center">Tanggal <br/>
                             Maintenance Terakhir</th>
                        <th>Deskripsi</th>
                        <th class="text-center">Tanggal <br/>
                             Maintenance Berikutnya</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($instrumen as $ins)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $ins->instrumen }}</td>
                            <td>{{ $ins->jumlah_instrumen }}</td>
                            <td class="text-center">{{ $ins->tanggal_t_maintenance }}</td>
                            <td>{{ $ins->deskripsi }}</td>
                            <td class="text-center">{{ $ins->tanggal_b_maintenance }}</td>
                            <td class="text-center">
                                <a href="{{ route('instrumen.edit', $ins->id_instrumen) }}"
                                    class="text-warning px-2"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('instrumen.destroy', $ins->id_instrumen) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-danger border-0 bg-light" type="submit"
                                        ><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <a href="{{ route('instrumen.details', $ins->id_instrumen) }}" class="px-2"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
