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


<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Flora<b>Cares</b></a>
        </div>

        
        
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="msg">Register a new membership</div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                        <input id="name" type="text" placeholder="User Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>


                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                        <input id="phone" type="phone" placeholder="Phone Number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
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
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
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
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ route('login') }}">You already have a membership?</a>
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