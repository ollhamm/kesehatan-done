@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center" style="font-weight: bold; background-color: #7fbf7f; color: white;">
                        Detail Pemeriksaan <br/>
                        {{ $pemeriksaan->rincian_pemeriksaan }}
                    </div>
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-4">
                                <pre class="small-text">
Nama Pasien : <strong>{{ $pemeriksaan->patients->nama }}</strong>
Tanggal     : <strong>{{ $pemeriksaan->tanggal_pemeriksaan }}</strong>
Tanggal     : <strong>{{ $pemeriksaan->amnesis_dokter }}</strong>
Unit        : <strong>{{ $pemeriksaan->unit_pemeriksaan }}</strong>
Rujukan     : <strong>{{ $pemeriksaan->rujukan_pemeriksaan }}</strong>
Rincian     : <strong>{{ $pemeriksaan->rincian_pemeriksaan }}</strong>
                                </pre>
                            </div>
                            <div class="col-md-4">
                                <pre class="small-text">
WBC  : <strong>{{ $pemeriksaan->WBC ?: '-' }}</strong>
RBC  : <strong>{{ $pemeriksaan->RBC ?: '-' }}</strong>
PLT  : <strong>{{ $pemeriksaan->PLT ?: '-' }}</strong>
HGB  : <strong>{{ $pemeriksaan->HGB ?: '-' }}</strong>
HTM  : <strong>{{ $pemeriksaan->HTM ?: '-' }}</strong>
Neu  : <strong>{{ $pemeriksaan->Neu ?: '-' }}</strong>
                                </pre>
                            </div>
                            <div class="col-md-4">
                                <pre class="small-banget">
Eos  : <strong>{{ $pemeriksaan->Eos ?: '-' }}</strong>
Bas  : <strong>{{ $pemeriksaan->Bas ?: '-' }}</strong>
Lym  : <strong>{{ $pemeriksaan->Lym ?: '-' }}</strong>
Mon  : <strong>{{ $pemeriksaan->Mon ?: '-' }}</strong>
MCV  : <strong>{{ $pemeriksaan->MCV ?: '-' }}</strong>
MCH  : <strong>{{ $pemeriksaan->MCH ?: '-' }}</strong>
MCHC : <strong>{{ $pemeriksaan->MCHC ?: '-' }}</strong>
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
