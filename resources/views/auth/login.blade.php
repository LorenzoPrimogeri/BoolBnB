@extends('layouts.app')
@section('content')
<div class="form-container">
    <div class="cnt-blur"></div>
    {{-- <form class="formLog form-1" name="form_registration" method="POST" action=""> --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="cnt-ttl">
                <span>Login</span>
            </div>
            <div class="row-log-reg">
                <span class="icon">
                    <i class="mail"></i>
                </span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row-log-reg">
                <span class="icon">
                    <i class="psw"></i>
                </span>
                <div class="contInput">
                    <input id="password" class="txtNewPassword inputLog input-1" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" placeholder="Password">
                    {{-- <span toggle="#psw" class="field-icon toggle-password fa-eye-slash"></span> --}}
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    {{-- <input id="psw" class="txtNewPassword inputLog input-1" type="password" name="password_reg"
                        placeholder="Password">
                    <span toggle="#psw" class="field-icon toggle-password fa-eye-slash"></span> --}}
                </div>
            </div>
            <div class="main-check">
                <div class="cnt-checkbox">
                    <input class="input-check" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </div>
                <label for="remember">
                    Ricordami
                </label>
            </div>
            <button type="submit" class="btn-logReg">
                {{ __('Login') }}
            </button>

        </form>
</div>
@endsection