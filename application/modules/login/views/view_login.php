

    <!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>-->

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href=<?php echo base_url()."assets/bootstrap/css/bootstrap.min.css"?>>
    <link rel="stylesheet" href=<?php echo base_url()."assets/font-awesome/css/font-awesome.min.css"?>>
    <!--<link rel="stylesheet" href="login/assets/login-page/assets/css/form-elements.css">-->
    <link rel="stylesheet" href=<?php echo base_url()."assets/pages/login/css/form-elements.css"?>>
    <link rel="stylesheet" href=<?php echo base_url()."assets/pages/login/css/style.css"?>>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->

    <!-- Favicon and touch icons -->
    <!--<link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/login-page/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/login-page/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/login-page/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/login-page/assets/ico/apple-touch-icon-57-precomposed.png">-->


<body>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <div class="description">
                        <h1><strong>Fiscaluno</strong></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Acesso ao sistema</h3>
                            <p>Entre com o seu login e senha</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="<?php echo base_url().'login/login/connect' ?>" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input id="login-username" type="text" class="form-control" name="userlogin" value="" placeholder="Usuário" required="">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input id="login-password" type="password" class="form-control" name="userpass" placeholder="Senha" required="">
                            </div>
                            <button type="submit" class="btn btn-warning">Fazer Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <div class="social-login-buttons">
                        <!--<a class="btn btn-link-2" href="http://www.facebook.com/qiwibrasil" target="_blank">
                            <i class="fa fa-facebook"></i> Facebook
                        </a>-->
                        <!--<a class="btn btn-link-2" href="#">
                            <i class="fa fa-twitter"></i> Twitter
                        </a>
                        <a class="btn btn-link-2" href="#">
                            <i class="fa fa-google-plus"></i> Google Plus
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src= <?php echo base_url()."assets/js/jquery-1.11.1.min.js"?> ></script>
<script src= <?php echo base_url()."assets/bootstrap/js/bootstrap.min.js"?> ></script>
<script src= <?php echo base_url()."assets/pages/login/js/jquery.backstretch.min.js"?>></script>
<script src= <?php echo base_url()."assets/pages/login/js/scripts.js"?>></script>

<!--[if lt IE 10]>
<script src="assets/login-page/assets/js/placeholder.js"></script>
<![endif]-->


</body>

</html>