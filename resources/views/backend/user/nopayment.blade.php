<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Flora Care</title>
    <!-- Favicon-->
    <link rel="icon" href="/backend/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link href="/backend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="/backend/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/backend/css/style.css" rel="stylesheet">
</head>

<body class="four-zero-four">
    <div class="four-zero-four-container">
        <div class="error-code" style="color:#ff6961;">Warning</div>
        <div class="error-message">You need to pay the bill before using</div>
        <div class="button-place">
        <form action="/backend/payment/create" method="post" >
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            
            <button type="submit" class="btn btn-default btn-lg waves-effect">GO TO Payment Page</button>
            </form>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="/backend//plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/backend/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/backend/plugins/node-waves/waves.js"></script>
</body>

</html>