<?php
session_start();
?>



<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mojo Customs Commission</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#44a5de">
    <meta name="msapplication-navbutton-color" content="#44a5de">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#44a5de">
    <link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="includes/dist/css/adminlte.min.css">
    <link href="/static/css/main.da1a2e85.chunk.css" rel="stylesheet">
</head>

<body class="login-page" id="body" style="min-height: 437.359px;">
    <div id="root">
        <div class="login-box text-center">
            <div class="login-logo"><a href="http://www.ecc.gov.et/"><img src="includes/images/mojo_customs_commission.png"
                        alt="AdminLTE Logo" class="img-circle" width="45%"><br><b>Mojo</b> Customs Commission</a>
            </div>
            <div class="card mb-4">
                <div class="card-body login-card-body">
                    <p style="color:red" class="login-box-msg">For Approved Users Only</p>
                    <form method="POST" action="Auth/login.inc.php">
                        <div class="input-group mb-3"><input id="user_name" name="username" type="text"
                                class="form-control" placeholder="Username" value="">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                        </div>
                        <div class="input-group mb-3"><input class="form-control" placeholder="Password" id="password"
                                name="password" type="password" value="">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>
                        <div class="form-group text-left"><button type="submit" name="login" class="btn btn-primary"><i
                                    class="fas fa-sign-in-alt mr-2"></i>Sign in</button></div>
                    </form>
                    <p class="mt-4 text-left"><a href="forgotpassword.php">Forgot Password ?</a></p>
                    
                    <div class="form-group text-left">

                    <p><a class="btn btn-warning" href="signup.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
    <?php require_once('includes/notify.php') ?>

            <script src="includes/plugins/jquery/jquery.min.js"></script>
            <script src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="includes/dist/js/adminlte.min.js"></script>

            
                    
                    </body>

                    </html>