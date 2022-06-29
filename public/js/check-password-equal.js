$(document).ready(function () {
    const changeText = function (el, text, color) {
        el.text(text).css('color', color);
    };
    $(".toggle-password").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        console.log('prova');
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $('.input-1').keyup(function () {
        let len = this.value.length;
        const pbText = $('.form-1 .progress-bar_text');

        if (len === 0) {
            $('.form-1 .progress-bar_item').each(function () {
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
            $('.form-1 .progress-bar_item').each(function () {
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
    $(document).ready(function () {
        $(".txtConfirmPassword").keyup(checkPasswordMatch);
    });
});
