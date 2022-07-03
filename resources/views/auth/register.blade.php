@extends('layouts.app')
@section('content')
    <div class="form-container">
        <form id="validate-reg" class="formLog form-1" name="form_registration" method="POST"
            action="{{ route('register') }}">
            @csrf
            <div class="cnt-ttl">
                <span>Signup</span>
            </div>
            <div class="form-field  row-log-reg">
                <label {{-- class="label-required" --}} for="name"></label>
                <span class="ico">
                    <div class="usr"></div>
                </span>
                <input id="name" name="name" onkeypress="return /[a-z]/i.test(event.key)" type="text"
                    placeholder="nome" class="input-log-reg @error('name') is-invalid @enderror" value="{{ old('name') }}"
                    required autocomplete="on">
                <small></small>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-field row-log-reg">
                <label class="label-required" for="surname"></label>
                <span class="ico">
                </span>
                <input id="surname" name="surname" type="text"
                    class="input-log-reg @error('surname') is-invalid @enderror" placeholder="cognome"
                    value="{{ old('surname') }}" required autocomplete="on" autofocus>
                <small></small>
                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-field row-log-reg">
                <label class="label-required" for="email"></label>
                <span class="ico">
                    <div class="mail"></div>
                </span>
                <input id="email" name="email" type="email"
                    class="form-control input-log-reg @error('email') is-invalid @enderror" placeholder="email"
                    value="{{ old('email') }}" required autocomplete="on" autofocus>
                <small></small>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="row-log-reg">
                <input type="date" class="input-date" name="date_of_birth">
            </div> --}}
            <div class="row-psw row-log-reg">
                <span class="ico">
                    <div class="psw"></div>
                </span>
                <input id="psw" type="password"
                    class="txtNewPassword inputLog inpt-log-reg input-1 @error('password') is-invalid @enderror"
                    name="password" placeholder="password" required autocomplete="off">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span toggle="#psw" class="cnt-ico-eye toggle-password eye-slash"></span>
                <div class="progress-bar_wrap">
                    <div class="progress-bar_item progress-bar_item-1"></div>
                    <div class="progress-bar_item progress-bar_item-2"></div>
                    <div class="progress-bar_item progress-bar_item-3"></div>
                </div>
            </div>
            <div class="cnt-txt-psw-check">
                <span class="progress-bar_text">La Password è vuota</span>
            </div>
            <div class="row-psw row-log-reg">
                <input id="psw-rpt" type="password" class="txtConfirmPassword inputLog" name="password_confirmation"
                    placeholder="ridigita password" required autocomplete="off">
                <span toggle="#psw-rpt" class="cnt-ico-eye toggle-password eye-slash"></span>
            </div>
            <div class="cnt-txt-psw-check">
                <div id="CheckPasswordMatch"></div>
            </div>
            <button type="submit" class="btn-logReg">
                Registrati
            </button>
        </form>
        @push('client-validate-reg')
            <script type="text/javascript" src="{{ asset('js/client-validate-reg.js') }}"></script>
        @endpush
    </div>
@endsection
