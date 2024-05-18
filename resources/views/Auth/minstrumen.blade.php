@extends('layouts.app')

@section('title', 'Monitoring instrumen')

@section('content')
    <div class="container">
        <div class="mt-4">
            <div class="header-container rounded text-center mb-4" style="background-color: #caecca; padding-left: 20px; padding-right: 20px;">
                <h1 class="display-5 font-weight-bold text-success">Monitoring Instrumen</h1>
            </div>
            <form action="{{ route('instrumen') }}" method="GET" class="mb-4 fade-in-left">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="instrumen" class="form-control mb-2" placeholder="Search by name instrumen....click enter">
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="jumlah_instrumen" class="form-control mb-2" placeholder="Search by amount instrumen....click enter">
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-2">
                            <input type="date" name="tanggal_t_maintenance" class="form-control">
                            <div class="input-group-append">
                                <a href="{{ route('instrumen') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm mr-2 d-none">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button>
                </div>
            </form>
            <a href="{{ route('instrumen.create') }}" class="btn mb-3 btn-success">
                <i class="fa-solid_pasien fa-plus"></i> Create</a>
            <div class="table-responsive">
                <table class="fade-in table table-bordered table-hover rounded shadow table-rounded">
                    <thead class="thead-light">
                        <tr class="text-sm">
                            <th>No</th>
                            <th>Instrumen</th>
                            <th>Jumlah Instrumen</th>
                            <th class="text-center">Tanggal <br/> Maintenance Terakhir</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Tanggal <br/> Maintenance Berikutnya</th>
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
                                    <a href="{{ route('instrumen.edit', $ins->id_instrumen) }}" class="btn btn-warning btn-sm mr-2"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('instrumen.destroy', $ins->id_instrumen) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('instrumen.details', $ins->id_instrumen) }}" class="btn btn-primary btn-sm ml-2"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
