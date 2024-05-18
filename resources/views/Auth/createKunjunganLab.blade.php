@extends('layouts.app')

@section('title', 'Tambah Kunjungan Laboratorium')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 border-0 shadow" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-4 display-8" style="font-weight: bold; color: #428842;">
                            Create Kunjungan LAB
                        </div>
                        <form action="{{ route('kunjunganLabolaturium.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_pemeriksaan" class="form-label">Pilih Pasien:</label>
                                <select class="form-select" id="id_pemeriksaan" name="id_pemeriksaan" required>
                                    @foreach ($kunjungan as $knj)
                                        <option value="{{ $knj->id_periksa }}">{{ $knj->patients->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_kunjungan" class="form-label">Tanggal Mulai:</label>
                                <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                            </div>
                            <div class="mb-3">
                                <label for="EDTA" class="form-label">EDTA:</label>
                                <select class="form-select" id="EDTA" name="EDTA">
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Serum" class="form-label">Serum:</label>
                                <select class="form-select" id="Serum" name="Serum">
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Citrate" class="form-label">Citrate:</label>
                                <select class="form-select" id="Citrate" name="Citrate">
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Urine" class="form-label">Urine:</label>
                                <select class="form-select" id="Urine" name="Urine">
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Lainya" class="form-label">Lainya:</label>
                                <select class="form-select" id="Lainya" name="Lainya">
                                    <option value="YA">YA</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kondisi_sampel" class="form-label">Kondisi Sampel:</label>
                                <select class="form-select" id="kondisi_sampel" name="kondisi_sampel">
                                    <option value="Normal">Normal</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Tidak-Normal">Tidak-Normal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Kunjungan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
