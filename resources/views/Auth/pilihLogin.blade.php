@extends('layouts.app')

@section('title', 'Pilih Login')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-body text-center">
                    <h4 class="card-title mb-4">Welcome to RSU Cinta Kasih</h4>
                    <p class="card-text mb-4">Please select your login type:</p>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <a href="{{ route('user.login') }}" class="btn btn-outline-primary btn-lg btn-block rounded-pill">
                                <i class="fas fa-user me-2"></i> Login as User
                            </a>
                            <a href="{{ route('admin.login') }}" class="btn btn-outline-success btn-lg btn-block rounded-pill mt-3">
                                <i class="fas fa-user-shield me-2"></i> Login as Admin
                            </a>
                            <a href="{{ route('callcenter.login') }}" class="btn btn-outline-info btn-lg btn-block rounded-pill mt-3">
                                <i class="fas fa-headset me-2"></i> Login as Callcenter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
