@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 border-0 shadow" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                            Tambah Pasien
                        </div>
                        <form action="{{ route('mpasient.storempasient') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur:</label>
                                <input type="number" class="form-control" id="umur" name="umur" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tempat Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <input class="form-control" id="alamat" name="alamat" required></input>
                            </div>
                            <div class="mb-3">
                                <label for="rm" class="form-label">RM (Rekam Medis):</label>
                                <input type="text" class="form-control" id="rm" name="rm"
                                    value="{{ $defaultRM }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="rujukan" class="form-label">Rujukan:</label>
                                <select class="form-control" id="rujukan" name="rujukan" required>
                                    <option value="UMUM">UMUM</option>
                                    <option value="LAB">LABOLATURIUM</option>
                                    <option value="KIA">KIA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_asuransi" class="form-label">Jenis Asuransi:</label>
                                <select class="form-control" id="jenis_asuransi" name="jenis_asuransi" required>
                                    <option value="BPJS-KESEHATAN">BPJS KESEHATAN</option>
                                    <option value="NON-BPJS">NON-BPJS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Nomor Asuransi:</label>
                                <input type="text" class="form-control" id="nomor_asuransi" name="nomor_asuransi"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                            </div>
                            <button style="background-color: #7fbf7f;" type="submit" class="btn btn text-light">Add
                                Pasien</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
