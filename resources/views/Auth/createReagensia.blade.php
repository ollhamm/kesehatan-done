@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                            Tambah Reagensia
                        </div>
                        <form action="{{ route('reagensia.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_reagen_kit" class="form-label">Nama Reagensia:</label>
                                <input type="text" class="form-control" id="nama_reagen_kit" name="nama_reagen_kit" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa:</label>
                                <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required>
                            </div>
                            <div class="mb-3">
                                <label for="reagen_yang_telah_dipakai" class="form-label">Reagen Yang Telah Di Pakai:</label>
                                <input type="number" class="form-control" id="reagen_yang_telah_dipakai" name="reagen_yang_telah_dipakai" required>
                            </div>
                            <div class="mb-3">
                                <label for="ketersediaan" class="form-label">Ketersediaan:</label>
                                <input type="number" class="form-control" id="ketersediaan" name="ketersediaan" required>
                            </div>
                            <button style="background-color: #7fbf7f;" type="submit" class="btn btn text-light">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
