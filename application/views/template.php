<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fiscaluno</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/template/bootstrap/css/bootstrap.min.css" ?>>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href=<?php echo base_url() . "assets/css/font-awesome.min.css" ?>>-->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!--<link rel="stylesheet" href=<?php echo base_url() . "assets/css/ionicons.min.css" ?>>-->
    <!-- Theme style -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/template/dist/css/AdminLTE.min.css" ?>>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/template/dist/css/skins/_all-skins.min.css" ?>>
    <!-- iCheck -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/template/plugins/iCheck/flat/blue.css" ?>>

    <link rel="stylesheet" href=<?php echo base_url() . "assets/bootstrap-table/src/bootstrap-table.css" ?>>

    <link rel="stylesheet" href=<?php echo base_url() . "assets/template/plugins/select2/select2.css" ?>>

    <link rel="stylesheet" href=<?php echo base_url() . "assets/css/daterangepicker.css" ?>>
    <!-- CSS Style -->
    <link rel="stylesheet" href=<?php echo base_url() . "assets/css/style.css" ?>>


    <!-- jQuery 2.2.3 -->
    <script src=<?php echo base_url() . "assets/js/jquery-1.11.1.min.js" ?>></script>
    <!-- jQuery UI 1.11.4 -->
    <!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src=<?php echo base_url() . "assets/template/bootstrap/js/bootstrap.min.js" ?>></script>
    <!-- Sparkline -->
    <script src=<?php echo base_url() . "assets/template/plugins/sparkline/jquery.sparkline.min.js" ?>></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src=<?php echo base_url() . "assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" ?>></script>
    <!-- Slimscroll -->
    <script src=<?php echo base_url() . "assets/template/plugins/slimScroll/jquery.slimscroll.min.js" ?>></script>
    <!-- FastClick -->
    <script src=<?php echo base_url() . "assets/template/plugins/fastclick/fastclick.js" ?>></script>
    <!-- AdminLTE App -->
    <script src=<?php echo base_url() . "assets/template/dist/js/app.min.js" ?>></script>
    <!-- Bootstrap Table -->
    <script src=<?php echo base_url() . "assets/bootstrap-table/src/bootstrap-table.js" ?>></script>
    <!-- Script para montar o template -->
    <script src=<?php echo base_url() . "assets/template/js/info-template.js" ?>></script>
    <!-- Script Select2 -->
    <script src=<?php echo base_url() . "assets/template/plugins/select2/select2.full.min.js" ?>></script>
    <!-- Script ChartJS -->
    <script src=<?php echo base_url() . "assets/template/plugins/chartjs/Chart.js" ?>></script>
    <!-- Moment -->
    <script src=<?php echo base_url() . "assets/js/moment.min.js" ?>></script>
    <!-- DateRangePicker -->
    <script src=<?php echo base_url() . "assets/js/daterangepicker.js" ?>></script>
    <!-- MaskedInput -->
    <script src=<?php echo base_url() . "assets/js/jquery.maskedinput.js" ?>></script>
    <!-- Bootbox Modals -->
    <script src=<?php echo base_url() . "assets/js/bootbox.min.js" ?>></script>
    <!-- Mask Money -->
    <script src=<?php echo base_url() . "assets/js/jquery.maskMoney.js" ?>></script>
    <!-- Componente Combo -->
    <script src=<?php echo base_url() . "assets/pages/components/combos.js" ?>></script>
    <!-- Componente Validation -->
    <script src=<?php echo base_url() . "assets/pages/components/validation.js" ?>></script>
    <!-- bootstrap-validator -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>-->

</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a class="logo">
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><font style="color: black">Fiscaluno</font></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span id="" class="hidden-xs"><font style="color: black">Impacta</font></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href=<?php echo base_url() . "usuario/perfil" ?> class="btn
                                       btn-primary">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href=<?php echo base_url() . "usuario/auth/logout" ?> class="btn
                                       btn-danger">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src=<?php echo base_url() . "assets/images/icon.png" ?> class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p id="">Faculdade Impacta</p>
                    <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                    <a><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MENU</li>

                <!-- =================================================================== -->
                <!-- ====================== MENU CADASTRO ============================== -->
                <!-- =================================================================== -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil-square-o"></i> <span>Avaliações</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>

                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href=<?php echo base_url() . "cadastro/AvaliacoesAlunos" ?>><i
                                        class="fa fa-circle-o"></i>Alunos</a></li>
                    </ul>
                </li>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!--<section class="content">
            <?php //echo $contents ?>
        </section>-->

        <?php echo $contents ?>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; 2017 Fiscaluno.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

</body>
</html>