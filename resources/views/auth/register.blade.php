@extends('layouts.app')
@section('content')
<div class="form-container">
    <form class="formLog form-1" name="form_registration" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="cnt-ttl">
            <span>Signup</span>
        </div>
        <div style="width: 60%;
        margin:0 auto 20px;">
            <p class="grey">(*) i campi contrassegnati con l’asterisco sono obbligatori</p>
        </div>
        <div class="row-log-reg">
            <span class="icon">
                <i class="usr"></i>
            </span>
            <input id="name" type="text" placeholder="nome" class="inpt-nm-srnm @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="surname" type="text" class="inpt-nm-srnm @error('surname') is-invalid @enderror" name="surname"
                placeholder="cognome" value="{{ old('surname') }}" autocomplete="surname" autofocus>
            @error('surname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row-log-reg">
            <input type="date" name="date_of_birth">
        </div>
        <div class="row-log-reg">
            <span class="icon">
                <i class="mail"></i>
            </span>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="email *" value="{{ old('email') }}" required autocomplete="email">
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
                <input id="password" type="password"
                    class="txtNewPassword inputLog input-1 @error('password') is-invalid @enderror" name="password"
                    placeholder="password *" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                {{-- <span toggle="#psw" class="field-icon toggle-password fa-eye-slash"></span> --}}
            </div>
            <div class="progress-bar_wrap">
                <div class="progress-bar_item progress-bar_item-1"></div>
                <div class="progress-bar_item progress-bar_item-2"></div>
                <div class="progress-bar_item progress-bar_item-3"></div>
            </div>
            <span class="progress-bar_text">La Password è vuota</span>
            <div class="contInput">
                <input id="password-rpt" type="password" class="txtConfirmPassword inputLog"
                    name="password_confirmation" placeholder="conferma password *" required autocomplete="new-password">
                   {{-- <span toggle="#psw-rpt" class="field-icon-rpt toggle-password fa-eye-slash"></span> --}}
            </div>
            <div id="CheckPasswordMatch"></div>
        </div>
        <button type="submit" class="btn-logReg">
            Registrati
        </button>
    </form>
</div>
@endsection