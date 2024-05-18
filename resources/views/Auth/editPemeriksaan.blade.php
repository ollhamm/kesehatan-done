@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #c6dfc6;">
                    <div class="card-body">
                        <div class="text-center mb-2 display-6" style="font-weight: bold; color: #428842;">
                            Edit Pemeriksaan
                        </div>
                        <form action="{{ route('pemeriksaan.update', $pemeriksaans->id_periksa) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="id_pasien" class="form-label">ID Pasien:</label>
                                <input type="text" class="form-control" id="id_pasien" name="id_pasien"
                                    value="{{ $pemeriksaans->id_pasien }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_pemeriksaan" class="form-label">Tanggal Pemeriksaan:</label>
                                <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"
                                    value="{{ $pemeriksaans->tanggal_pemeriksaan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="unit_pemeriksaan" class="form-label">Unit Pemeriksaan:</label>
                                <select class="form-control" id="unit_pemeriksaan" name="unit_pemeriksaan" required>
                                    <option value="Unit_1" @if ($pemeriksaans->unit_pemeriksaan === 'Unit_1') selected @endif>Unit 1</option>
                                    <option value="Unit_2" @if ($pemeriksaans->unit_pemeriksaan === 'Unit_2') selected @endif>Unit 2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="rujukan_pemeriksaan" class="form-label">Rujukan Pemeriksaan:</label>
                                <select class="form-control" id="rujukan_pemeriksaan" name="rujukan_pemeriksaan" required>
                                    <option value="Rujukan_1" @if ($pemeriksaans->rujukan_pemeriksaan === 'Rujukan_1') selected @endif>Rujukan 1</option>
                                    <option value="Rujukan_2" @if ($pemeriksaans->rujukan_pemeriksaan === 'Rujukan_2') selected @endif>Rujukan 2</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="rincian_pemeriksaan" class="form-label">Rincian Pemeriksaan:</label>
                                <input type="text" class="form-control" id="rincian_pemeriksaan" name="rincian_pemeriksaan"
                                    value="{{ $pemeriksaans->rincian_pemeriksaan }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran:</label>
                                <select class="form-control" id="jenis_pembayaran" name="jenis_pembayaran" required>
                                    <option value="BPJS" @if ($pemeriksaans->jenis_pembayaran === 'BPJS') selected @endif>BPJS</option>
                                    <option value="NON-BPJS" @if ($pemeriksaans->jenis_pembayaran === 'NON-BPJS') selected @endif>NON-BPJS</option>
                                </select>
                            </div>
                            <!-- Validasi untuk kolom tambahan -->
                            <div class="mb-3">
                                <label for="WBC" class="form-label">WBC:</label>
                                <input type="number" step="0.01" class="form-control" id="WBC" name="WBC"
                                    value="{{ $pemeriksaans->WBC }}">
                            </div>
                            <div class="mb-3">
                                <label for="RBC" class="form-label">RBC:</label>
                                <input type="number" step="0.01" class="form-control" id="RBC" name="RBC"
                                    value="{{ $pemeriksaans->RBC }}">
                            </div>
                            <!-- Lanjutkan dengan validasi untuk kolom tambahan lainnya -->
                            <div class="mb-3">
                                <label for="PLT" class="form-label">PLT:</label>
                                <input type="number" step="0.01" class="form-control" id="PLT" name="PLT" value="{{ $pemeriksaans->PLT }}">
                            </div>
                            <div class="mb-3">
                                <label for="HGB" class="form-label">HGB:</label>
                                <input type="number" step="0.01" class="form-control" id="HGB" name="HGB" value="{{ $pemeriksaans->HGB }}">
                            </div>
                            <div class="mb-3">
                                <label for="HTM" class="form-label">HTM:</label>
                                <input type="number" step="0.01" class="form-control" id="HTM" name="HTM" value="{{ $pemeriksaans->HTM }}">
                            </div>
                            <div class="mb-3">
                                <label for="Neu" class="form-label">Neu:</label>
                                <input type="number" step="0.01" class="form-control" id="Neu" name="Neu" value="{{ $pemeriksaans->Neu }}">
                            </div>
                            <div class="mb-3">
                                <label for="Eos" class="form-label">Eos:</label>
                                <input type="number" step="0.01" class="form-control" id="Eos" name="Eos" value="{{ $pemeriksaans->Eos }}">
                            </div>
                            <div class="mb-3">
                                <label for="Bas" class="form-label">Bas:</label>
                                <input type="number" step="0.01" class="form-control" id="Bas" name="Bas" value="{{ $pemeriksaans->Bas }}">
                            </div>
                            <div class="mb-3">
                                <label for="Bas" class="form-label">Lym:</label>
                                <input type="number" step="0.01" class="form-control" id="Lym" name="Lym" value="{{ $pemeriksaans->Lym }}">
                            </div>
                            <div class="mb-3">
                                <label for="Bas" class="form-label">Mon:</label>
                                <input type="number" step="0.01" class="form-control" id="Mon" name="Mon" value="{{ $pemeriksaans->Mon }}">
                            </div>
                            <div class="mb-3">
                                <label for="Bas" class="form-label">MCV:</label>
                                <input type="number" step="0.01" class="form-control" id="MCV" name="MCV" value="{{ $pemeriksaans->MCV }}">
                            </div>
                            <div class="mb-3">
                                <label for="Bas" class="form-label">MCH:</label>
                                <input type="number" step="0.01" class="form-control" id="MCH" name="MCH" value="{{ $pemeriksaans->MCH }}">
                            </div>
                            <div class="mb-3">
                                <label for="Bas" class="form-label">MCHC:</label>
                                <input type="number" step="0.01" class="form-control" id="MCHC" name="MCHC" value="{{ $pemeriksaans->MCHC }}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
