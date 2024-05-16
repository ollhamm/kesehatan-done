@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                            Edit Pasien
                        </div>
                        <form action="{{ route('mpasient.updatempasient', $patient->id_pasien) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $patient->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur:</label>
                                <input type="number" class="form-control" id="umur" name="umur"
                                    value="{{ $patient->umur }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki"
                                        {{ $patient->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ $patient->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $patient->alamat }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $patient->tanggal_lahir }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="rm" class="form-label">RM (Rekam Medis):</label>
                                <input type="text" class="form-control" id="rm" name="rm"
                                    value="{{ $patient->rm }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="rujukan" class="form-label">Rujukan:</label>
                                <select class="form-control" id="rujukan" name="rujukan" required>
                                    <option value="UMUM" {{ $patient->rujukan == 'UMUM' ? 'selected' : '' }}>UMUM</option>
                                    <option value="LABOLATURIUM"
                                        {{ $patient->rujukan == 'LABOLATURIUM' ? 'selected' : '' }}>LABOLATURIUM</option>
                                    <option value="KIA" {{ $patient->rujukan == 'KIA' ? 'selected' : '' }}>KIA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_asuransi" class="form-label">Jenis Asuransi:</label>
                                <select class="form-control" id="jenis_asuransi" name="jenis_asuransi" required>
                                    <option value="BPJS" {{ $patient->jenis_asuransi == 'BPJS' ? 'selected' : '' }}>BPJS
                                    </option>
                                    <option value="NON-BPJS"
                                        {{ $patient->jenis_asuransi == 'NON-BPJS' ? 'selected' : '' }}>NON-BPJS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_asuransi" class="form-label">Nomor Asuransi:</label>
                                <input type="text" class="form-control" id="nomor_asuransi" name="nomor_asuransi"
                                    value="{{ $patient->nomor_asuransi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Aktif" {{ $patient->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Nonaktif" {{ $patient->status == 'Nonaktif' ? 'selected' : '' }}>
                                        Nonaktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
