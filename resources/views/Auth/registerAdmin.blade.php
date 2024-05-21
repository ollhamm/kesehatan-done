@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <div class="row">
                        {{-- Konten Kiri --}}
                        <div class="col-md-2 d-none d-md-block">
                            <img src="{{ asset('images/admin_register.png') }}" alt="Image" class="img-fluid rounded-start">
                        </div>
                        {{-- Konten Kanan --}}
                        <div class="col-md-12 col-md-6">
                            <div class="text-center mb-4">
                                <h2 class="font-weight-bold" style="color: #4A90E2;">Register</h2>
                                <p class="text-muted">Create your account. It’s free and only takes a minute.</p>
                            </div>
                            <form method="POST" action="{{ route('admin.register') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label text-muted">{{ __('Name') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-user text-muted"></i>
                                        </span>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="form-label text-muted">{{ __('E-Mail Address') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                               name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-lock text-muted"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                               name="password" required autocomplete="new-password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password-confirm" class="form-label text-muted">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-lock text-muted"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control" 
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>

                            <hr class="my-4">

                            <div class="text-center">
                                <p class="text-muted">Already have an account? <a href="{{ route('admin.login') }}" class="text-primary">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
