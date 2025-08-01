@extends('layouts.app')

@section('content')

<div class="admin_login_section d-flex py-4 justify-content-around">
    <div class="col-lg-6 col-12 d-flex align-items-center">
        <img class="mw-100" src="{{ URL::asset('/public/themes/th3/assets//img/login_left.jpg')}}" alt="">
    </div>

    <div class="col-lg-4 col-12 login_container " style="border: 2px solid rgb(16, 137, 211);">
        <div class="heading">{{ __('Login') }}</div>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error')}}
        </div>
        @endif

        @if(Session::has('sessionTimeout'))
        <div class="alert alert-danger">
            {{ Session::get('sessionTimeout')}}
        </div>
        @endif
        @if(Session::has('change_pass_success'))
        <div class="alert alert-danger">
            {{ Session::get('change_pass_success')}}
        </div>
        @endif
        <form method="POST" class="form" action="{{ route('login') }}" id="login-form">
            @csrf
            <input class="input @error('email') is-invalid @enderror" type="email" name="email" id="email"
                placeholder="{{ __('Email Address') }}">
            @error('email')
            <span class=" text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input class="input @error('password') is-invalid @enderror" type="password" name="password" id="password"
                placeholder="{{ __('Password') }}">

            @error('password')
            <span class=" text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="row my-3 justify-content-center">



                <div class="col-md-10 captcha_start d-flex">
                    {!! captcha_image_html('ExampleCaptcha') !!}
                    <br />
                    <input type="text" class="input mx-3 my-0 @error('CaptchaCode') is-invalid @enderror"
                        id="CaptchaCode" placeholder="{{ __('Captcha') }}" name="CaptchaCode">
                    @error('CaptchaCode')
                    <span class="text-danger invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="hidden" value="{{ session()->get('salt') }}" name="salttaxt">
                </div>
            </div>
            <div class="d-flex justify-content-center gap-5">
                <div class="">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <span class="forgot-password">
                    @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </span>
            </div>

            <input class="login-button" type="submit" value="Sign In">

        </form>
    </div>
</div>
<script src="{{ URL::asset('/public/assets/modules/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/public/assets/js/sha512.js')}}"></script>
<script src="{{ URL::asset('/public/assets/js/getpwd.js')}}"></script>

<script>
    function getPass() {

        var salt = $('#BDC_VCID_ExampleCaptcha').val();


        var exp = /((?=.*\d)(?=.*[a-z])(?=.*[@#$%]).{6,10})/;

        var pvalue = $('#password').val();

        if (pvalue == '') {
            alert("Please enter Password");
        }

        if (pvalue != '') {
            if (pvalue.search(exp) == -1) {
                //  return false;
            }
            if (pvalue != '') {

                var tttt = pvalue;
                var hash = sha512(pvalue);
                $('#password').val(hash);

            }
        }
        //$('#loginSubBTN').trigger('click');
    }



</script>

<script src="{{ URL::asset('/public/themes/th3/assets/JS/crypto-js.min.js')}}"></script>
<script>
    const secretKey = CryptoJS.enc.Utf8.parse("12345678901234567890123456789012"); // 32-byte key
    const iv = CryptoJS.enc.Utf8.parse("1234567890123456"); // 16-byte IV

    document.getElementById("login-form").addEventListener("submit", function (e) {
        e.preventDefault();

        const password = document.getElementById("password").value;
        //alert(password);
        // Encrypt Password using AES-256-CBC
        const encrypted = CryptoJS.AES.encrypt(password, secretKey, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        }).toString();

        // console.log("Encrypted Password:", encrypted); // Debug
        // alert(encrypted);
        // Store encrypted password in hidden input
        document.getElementById("password").value = encrypted;

        // Submit the form
        this.submit();
    });
</script>
@endsection