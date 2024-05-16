@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                            Edit Instrumen
                        </div>
                        <form action="{{ route('instrumen.update', $instrumen->id_instrumen) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="instrumen" class="form-label">Nama Instrumen:</label>
                                <input type="text" class="form-control" id="instrumen" name="instrumen"
                                    value="{{ $instrumen->instrumen }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_instrumen" class="form-label">Jumlah Instrumen:</label>
                                <input type="number" class="form-control" id="jumlah_instrumen" name="jumlah_instrumen"
                                    value="{{ $instrumen->jumlah_instrumen }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_t_maintenance" class="form-label">Tanggal Terakhir Maintenance:</label>
                                <input type="date" class="form-control" id="tanggal_t_maintenance" name="tanggal_t_maintenance"
                                    value="{{ $instrumen->tanggal_t_maintenance }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $instrumen->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_b_maintenance" class="form-label">Tanggal Berikutnya Maintenance:</label>
                                <input type="date" class="form-control" id="tanggal_b_maintenance" name="tanggal_b_maintenance"
                                    value="{{ $instrumen->tanggal_b_maintenance }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
