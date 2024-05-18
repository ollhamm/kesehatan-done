@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                            Edit Kunjungan Lab
                        </div>
                        <form action="{{ route('kunjunganLabolaturium.update', $kunjungan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_pemeriksaan" class="form-label">ID pasien:</label>
                                <input type="number" class="form-control" id="id_pemeriksaan" name="id_pemeriksaan"
                                    value="{{ $kunjungan->id_pemeriksaan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan:</label>
                                <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan"
                                    value="{{ $kunjungan->tanggal_kunjungan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                                    value="{{ $kunjungan->tanggal_selesai }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="EDTA" class="form-label">EDTA:</label>
                                <select class="form-select" id="EDTA" name="EDTA">
                                    <option value="YA" {{ $kunjungan->EDTA == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option value="Tidak" {{ $kunjungan->EDTA == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Serum" class="form-label">Serum:</label>
                                <select class="form-select" id="Serum" name="Serum">
                                    <option value="YA" {{ $kunjungan->Serum == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option value="Tidak" {{ $kunjungan->Serum == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <!-- Tambahkan dropdown untuk field lainnya seperti Citrate, Urine, Lainya, dan kondisi_sampel -->
                            <!-- Contoh untuk Citrate -->
                            <div class="mb-3">
                                <label for="Citrate" class="form-label">Citrate:</label>
                                <select class="form-select" id="Citrate" name="Citrate">
                                    <option value="YA" {{ $kunjungan->Citrate == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option value="Tidak" {{ $kunjungan->Citrate == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <!-- Contoh untuk Urine -->
                            <div class="mb-3">
                                <label for="Urine" class="form-label">Urine:</label>
                                <select class="form-select" id="Urine" name="Urine">
                                    <option value="YA" {{ $kunjungan->Urine == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option value="Tidak" {{ $kunjungan->Urine == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <!-- Contoh untuk Lainya -->
                            <div class="mb-3">
                                <label for="Lainya" class="form-label">Lainya:</label>
                                <select class="form-select" id="Lainya" name="Lainya">
                                    <option value="YA" {{ $kunjungan->Lainya == 'YA' ? 'selected' : '' }}>YA</option>
                                    <option value="Tidak" {{ $kunjungan->Lainya == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                </select>
                            </div>
                            <!-- Contoh untuk kondisi_sampel -->
                            <div class="mb-3">
                                <label for="kondisi_sampel" class="form-label">Kondisi Sampel:</label>
                                <select class="form-select" id="kondisi_sampel" name="kondisi_sampel">
                                    <option value="Normal" {{ $kunjungan->kondisi_sampel == 'Normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="Sedang" {{ $kunjungan->kondisi_sampel == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                    <option value="Tidak-Normal" {{ $kunjungan->kondisi_sampel == 'Tidak-Normal' ? 'selected' : '' }}>Tidak-Normal</option>
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
