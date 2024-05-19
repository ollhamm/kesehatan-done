@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        {{-- Konten Kiri start --}}
                        <div class="col-md-6 position-relative">
                            <img src="{{ asset('images/login.png') }}" alt="Image" class="img-fluid ">

                            <div class="text-center" style="font-weight: bold; color: #7fbf7f;">
                                “CARE, RESPONSIVE AND FRIENDLY”
                            </div>
                        </div>
                        {{-- Konten Kiri End --}}
                        {{-- Konten Kanan Start --}}
                        <div class="col-md-6">
                            <div class="card mt-5 shadow border-0">
                                <div class="text-center position-relative">
                                    <div class="rounded-circle position-absolute"
                                        style="background-color: #7fbf7f; width: 80px; height: 80px; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                        <i class="fa-solid fa-user fa-4x" style="color: white; margin-top:1.4rem;"></i>
                                    </div>
                                </div>

                                <div class="card-body ">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group row mt-5">
                                            <label style="color: #7fbf7f; font-weight: bold; font-size:14px" for="email"
                                                class="col-md-4 col-form-label text-md-right">
                                                <i class="fa-solid fa-envelope"> </i> {{ __('E-Mail') }}
                                            </label>
                                            <div class="col-md-8">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label style="color: #7fbf7f; font-weight: bold;font-size:14px " for="password"
                                                class="col-md-4 col-form-label text-md-right">
                                                <i class="fa-solid fa-key"></i> {{ __('Password') }}
                                            </label>
                                            <div class="col-md-8">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-md-8 offset-md-4 text-right">
                                                <button type="submit" class="btn btn text-light float-end"
                                                    style="background-color: #7fbf7f">
                                                    {{ __('Login') }}
                                                </button>
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
