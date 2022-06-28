<div class="form-container">
    <div class="cnt-blur"></div>
    {{-- <form class="formLog form-1" name="form_registration" method="POST" action=""> --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf
        {{-- <h3>LogIn</h3> --}}
        <div class="row-login">
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
        <div class="row-login">
            <span class="icon">
                <i class="psw"></i>
            </span>
            <div class="contInput">
                <input id="password" class="txtNewPassword inputLog input-1" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
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
                <input class="input-check" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <span class="checkmark"></span>
            </div>
            <label for="remember">
                Ricordami
            </label>
        </div>
        <button type="submit" class="btn-login">
            {{ __('Login') }}
        </button>
        {{-- <div class="rowFormLogIn">
            Non disponi di un account?
            <a class="aLog-reg" href="signup">Registrati</a>
        </div> --}}
        {{-- <div class="rowFormLogIn conditions">
            <a class="aLog" href="#">Condizioni d'uso</a>
            <a class="aLog" href="#" style="margin:0 15px 0 15px;">Informativa sulla privacy</a>
            <a class="aLog" href="#">Aiuto</a>
        </div> --}}
        {{-- <div class="rowFormLogIn">©<?php echo date('Y'); ?> Your Company.inc</div> --}}
    </form>
</div>
{{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
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

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
    </div> --}}
<script>
    $(document).ready(function() {
        const changeText = function(el, text, color) {
            el.text(text).css('color', color);
        };
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        $('.input-1').keyup(function() {
            let len = this.value.length;
            const pbText = $('.form-1 .progress-bar_text');

            if (len === 0) {
                $('.form-1 .progress-bar_item').each(function() {
                    $(this).removeClass('active')
                });
                $('.form-1 .active').css('background-color', 'transparent');
                changeText(pbText, 'Password è vuota');
            } else if (len > 0 && len <= 4) {
                $('.form-1 .progress-bar_item-1').addClass('active');
                $('.form-1 .progress-bar_item-2').removeClass('active');
                $('.form-1 .progress-bar_item-3').removeClass('active');
                $('.form-1 .active').css('background-color', '#FF4B47');
                changeText(pbText, 'Troppo Debole');
            } else if (len > 4 && len <= 8) {
                $('.form-1 .progress-bar_item-2').addClass('active');
                $('.form-1 .progress-bar_item-3').removeClass('active');
                $('.form-1 .active').css('background-color', '#F9AE35');
                changeText(pbText, 'Potrebbe essere più forte');
            } else {
                $('.form-1 .progress-bar_item').each(function() {
                    $(this).addClass('active');
                });
                $('.form-1 .active').css('background-color', '#2DAF7D');
                changeText(pbText, 'Password Sicura');
            }
        });

        function checkPasswordMatch() {
            var password = $(".txtNewPassword").val();
            var confirmPassword = $(".txtConfirmPassword").val();
            if (password != confirmPassword)
                $("#CheckPasswordMatch").html("Passwords non uguali!").css("color", "red");
            else
                $("#CheckPasswordMatch").html("Passwords uguali.").css("color", "orange");
        }
        $(document).ready(function() {
            $(".txtConfirmPassword").keyup(checkPasswordMatch);
        });
    });
</script>
