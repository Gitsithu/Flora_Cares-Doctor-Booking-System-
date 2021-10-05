
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Flora Cares</title>
    <!-- Favicon-->
    <link rel="icon" href="/backend/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="/backend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/backend/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/backend/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/backend/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Flora<b>Cares</b></a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red;">{{ $message }}</strong>
                </span>
            @enderror
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink" {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
        <!-- Jquery Core Js -->
        <script src="/backend/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="/backend/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="/backend/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="/backend/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="/backend/js/admin.js"></script>
<script src="/backend/js/pages/examples/sign-in.js"></script>
</body>

</html>