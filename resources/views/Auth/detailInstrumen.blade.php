@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"
                    style="font-weight: bold; background-color: #7fbf7f; color: white;">
                        Detail Reagensia <br/>
                        Tanggal Maintenance Terakhir :<p class="text-danger">{{ $instrumen->tanggal_t_maintenance }}</p>
                    </div>
                        <ul class="mt-2">
                            <pre>
    Instrumen                       : <strong>{{ $instrumen->instrumen }}</strong>
    Jumlah Instrumen                : <strong>{{ $instrumen->jumlah_instrumen }}</strong>
    Tanggal Maintenance Terakhir    : <strong class="text-danger">{{ $instrumen->tanggal_t_maintenance }}</strong>
    Deskripsi                       : <strong>{{ $instrumen->deskripsi }}</strong>
    Tanggal Maintenance Berikutnya  : <strong class="text-success">{{ $instrumen->tanggal_b_maintenance }}</strong>
                                </pre>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
@endsection
