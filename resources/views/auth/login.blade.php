@extends('layouts.app')
@section('content')
    <div class="form-container">
        {{-- <form class="formLog form-1" name="form_registration" method="POST" action=""> --}}
        <form class="formLog form-1" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="cnt-ttl">
                <span>Login</span>
            </div>
            <div class="row-log-reg">
                <span class="ico">
                    <div class="mail"></div>
                </span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="row-log-reg">
                <span class="ico">
                    <div class="psw"></div>
                </span>
                <div class="contInput">
                    <input id="password" class="txtNewPassword inputLog input-1" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="main-check">
                <div class="cnt-checkbox">
                    <input class="input-check" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </div>
                <label class="remember" for="remember">
                    Ricordami
                </label>
            </div>
            <button type="submit" class="btn-logReg">
                {{ __('Login') }}
            </button>

        </form>
    </div>
@endsection
