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
                <input id="name" name="name" {{-- onkeypress="return /[a-z]/i.test(event.key)" --}} type="text" placeholder="nome"
                    class="inpt-nm-srnm @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                    autocomplete="off">
                <small></small>
                {{-- @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
            </div>
            {{-- <div class="row-log-reg">
                <label class="label-required" for="surname">Name <span>(required, at least 3 characters)</span></label>
                <span class="ico">
                </span>
                <input id="surname" type="text" class="inpt-nm-srnm @error('surname') is-invalid @enderror"
                    name="surname" placeholder="cognome" value="{{ old('surname') }}" required autocomplete="surname"
                    autofocus>
                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row-log-reg">
                <label class="label-required" for="name">Name <span>(required, at least 3 characters)</span></label>
                <span class="ico">
                    <div class="mail"></div>
                </span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row-psw row-log-reg">
                <span class="ico">
                    <div class="psw"></div>
                </span>
                <input id="psw" type="password"
                    class="txtNewPassword inputLog input-1 @error('password') is-invalid @enderror" name="password"
                    placeholder="password" required autocomplete="new-password">
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
                    placeholder="ridigita password" required autocomplete="new-password">
                <span toggle="#psw-rpt" class="cnt-ico-eye toggle-password eye-slash"></span>
            </div>
            <div class="cnt-txt-psw-check">
                <div id="CheckPasswordMatch"></div>
            </div> --}}
            <button type="submit" class="btn-logReg">
                Registrati
            </button>
            @push('client-validate-reg')
                <script type="text/javascript" src="{{ asset('js/client-validate-reg.js') }}"></script>
            @endpush
        </form>
    </div>
@endsection
