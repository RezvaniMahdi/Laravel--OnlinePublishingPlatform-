@extends('layouts.app')

@section('styles')
<style>

body{
    background-color:rgb(190, 190, 255)
}

</style>
@endsection


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 mt-5">
            <div class="card text-white" id="card">
                <div class="card-header text-white" style="background-color: rgb(55, 55, 94)"><b>{{ __('Login') }}</b></div>

                <div class="card-body" style="background-color: rgb(111, 111, 161)">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 mt-5">
                            <label for="email" class="col-md-4 col-form-label text-md-end mb-3"><b>{{ __('Email Address') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><b>{{ __('Password') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-3 justify-content-center">
                                <button type="submit" class="btn btn-primary" style="width: 40%;height: 40px">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
