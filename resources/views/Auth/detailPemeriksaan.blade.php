@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"
                    style="font-weight: bold; background-color: #7fbf7f; color: white;">
                        Detail Pemeriksaan <br/>
                        {{ $pemeriksaan->rincian_pemeriksaan }}
                    </div>
                        <ul class="mt-2">
                            <pre>
    Nama Pasien      : <strong>{{ $pemeriksaan->patients->nama }}</strong>
    Tanggal          : <strong>{{ $pemeriksaan->tanggal_pemeriksaan }}</strong>
    Unit             : <strong>{{ $pemeriksaan->unit_pemeriksaan }}</strong>
    Rujukan          : <strong>{{ $pemeriksaan->rujukan_pemeriksaan }}</strong>
    Rincian          : <strong>{{ $pemeriksaan->rincian_pemeriksaan }}</strong>
    Jenis Pembayaran : <strong>{{ $pemeriksaan->jenis_pembayaran }}</strong>
                                </pre>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
@endsection
