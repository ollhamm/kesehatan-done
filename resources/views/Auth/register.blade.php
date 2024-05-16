@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-md-8">
            <div class="card">
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
                                    <div class="rounded-circle position-absolute" style="background-color: #7fbf7f; width: 80px; height: 80px; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                        <i class="fa-solid fa-user fa-4x" style="color: white; margin-top:1.4rem;"></i>
                                    </div>
                                </div>
                                
                                <div class="card-body ">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row mt-5">
                                            <label style="color: #7fbf7f; font-weight: bold" for="name" class="col-md-4 col-form-label text-md-right">
                                                <i class="fa-solid fa-user"> </i> {{ __('Name') }}
                                            </label>                                            
                                            <div class="col-md-8">
                                               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <label style="color: #7fbf7f; font-weight: bold" for="email" class="col-md-4 col-form-label text-md-right">
                                                <i class="fa-solid fa-envelope"> </i> {{ __('E-Mail') }}
                                            </label>                                            
                                            <div class="col-md-8">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label style="color: #7fbf7f; font-weight: bold" for="password" class="col-md-4 col-form-label text-md-right">
                                                <i class="fa-solid fa-key"></i> {{ __('Password') }}
                                            </label>                                            
                                            <div class="col-md-8">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label style="color: #7fbf7f; font-weight: bold" for="password_confirmation" class="col-md-4 col-form-label text-md-right">
                                                <i class="fa-solid fa-key"></i> {{ __('Confirm Password') }}
                                            </label>                                            
                                            <div class="col-md-8">
                                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-">
                                            <div class="col-md-8 offset-md-4 text-right">
                                                <button type="submit" class="btn text-white" style="background-color: #7fbf7f">
                                                    {{ __('Register') }}
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
                        {{-- Konten Kanan End --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
