

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
            <a href="javascript:void(0);"><p style="color:#E91E63;"><i>Payment Form</ii></p></b></a>
        </div>
        <div class="card">
            <div class="body">
            <form action="/backend/payment/store" method="POST" enctype="multipart/form-data">
        @csrf
                    <div class="msg">In here, you can pay the bill to login into doctor</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                        <div class="form-line">
                        <select class="form-control" name="bank_id" value="bank_id" id="">
                            @foreach($bank as $ban)
                                <option value="{{ $ban->id }}">{{ $ban->name }}->{{ $ban->number }}</option>
                            @endforeach
                        </select>

            @error('bank_id')
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red;">{{ $message }}</strong>
                </span>
            @enderror
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">image</i>
                        </span>
                        <div class="form-line">
                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="image" required autocomplete="">

@error('image')
    <span class="invalid-feedback" role="alert">
        <strong style="color:red;">{{ $message }}</strong>
    </span>
@enderror
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">attach_money</i>
                        </span>
                        <div class="form-line">
                        <input type="text" placeholder="Input Amount 30000 MMK" class="form-control @error('number') is-invalid @enderror" name="amount" required autocomplete="">

@error('amount')
    <span class="invalid-feedback" role="alert">
        <strong style="color:red;">{{ $message }}</strong>
    </span>
@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Confirm</button>
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
