@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-4 display-6" style="font-weight: bold; color: #428842;">
                            Create Pemeriksaan
                        </div>
                        <form action="{{ route('pemeriksaan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_pasien" class="form-label">Pilih Pasien:</label>
                                <select class="form-select" id="id_pasien" name="id_pasien" required>
                                    @foreach ($pemeriksaan as $periksa)
                                    <option value="{{ $periksa->id_pasien }}">{{ $periksa->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pemeriksaan" class="form-label">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal_pemeriksaan"
                                    name="tanggal_pemeriksaan" required>
                            </div>
                            <div class="mb-3">
                                <label for="unit_pemeriksaan" class="form-label">Unit:</label>
                                <select class="form-control" id="unit_pemeriksaan" name="unit_pemeriksaan" required>
                                    <option value="Unit_1">Unit 1</option>
                                    <option value="Unit_2">Unit 2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="rujukan_pemeriksaan" class="form-label">Rujukan:</label>
                                <select class="form-control" id="rujukan_pemeriksaan" name="rujukan_pemeriksaan" required>
                                    <option value="Rujukan_1">Rujukan 1</option>
                                    <option value="Rujukan_2">Rujukan 2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="rincian_pemeriksaan" class="form-label">Rincian:</label>
                                <input type="text" class="form-control" id="rincian_pemeriksaan"
                                    name="rincian_pemeriksaan" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pembayaran" class="form-label">Jenis Pembaran:</label>
                                <select class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" required>
                                    <option value="BPJS">BPJS</option>
                                    <option value="NON-BPJS">NON-BPJS</option>
                                </select>
                            </div>
                            <button style="background-color: #7fbf7f;" type="submit" class="btn text-light float-end">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
