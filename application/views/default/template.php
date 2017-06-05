<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Qiwi Report</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/report/assets/template/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="/report/assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/report/assets/template/dist/css/skins/skin-blue.min.css">
    <!-- iCheck -->
    <!--<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">-->
    <!-- Morris chart -->
    <!--<link rel="stylesheet" href="plugins/morris/morris.css">-->
    <!-- jvectormap -->
    <!--<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
    <!-- Date Picker -->
    <link rel="stylesheet" href="/report/assets/template/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/report/assets/template/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/report/assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

    <!-- BOOTSTRAP-TABLE CSS -->
    <link rel="stylesheet" href="/report/assets/bootstrap-table/src/bootstrap-table.css">
    <link rel="stylesheet" href="//rawgit.com/wenzhixin/bootstrap-table-fixed-columns/master/bootstrap-table-fixed-columns.css">

    <!-- MODAL STYLE -->
    <link rel="stylesheet" href="/report/assets/pages/css/general/modal-style.css">

    <!-- BOOTSTRAP-TABLE CSS -->
    <link rel="stylesheet" href="/report/assets/css/bootstrap-select.css">

    <!-- DATERANGEPICKER CSS -->
    <link rel="stylesheet" href="/report/assets/css/daterangepicker.css">

    <!-- CUSTOM MONIT TABLE CSS -->
    <link rel="stylesheet" href="/report/assets/css/transaction-monit-style.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="/report/assets/template/dist/img/qiwi3-5050.png" width="40px" height="40px"></img></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="/report/assets/template/dist/img/qiwi3-5050.png" width="40px" height="40px"><font color="#ff9900"><b>  Report</b></font></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <!--<span class="sr-only">Toggle navigation</span>-->
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <sp><span id="user-email-menu" class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="/report/user/logout" class="btn btn-danger">Sair</a>
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
            <!--<div class="pull-left image">
              <img src="/report/assets/template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>-->
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
			<!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>
			-->
            <li id="sidemenu-financial">
              <a href="/report/financialreport/">
                <i class="fa fa-bar-chart"></i> <span>Relatório Financeiro</span>
              </a>
            </li>

            <li id="sidemenu-autopass">
                <a href="/report/autopassreport/">
                    <i class="fa fa-bus"></i> <span>Relatório Autopass</span>
                </a>
            </li>

            <li id="sidemenu-fabioreport">
                <a href="/report/transactionmonit/">
                    <i class="fa fa-list-alt"></i> <span>Monit de Transação</span>
                </a>
            </li>

            <li id="sidemenu-inadim">
                <a href="/report/transactionmonitoring/">
                    <i class="fa fa-bars"></i> <span>Monit de Inadimplência</span>
                </a>
            </li>
			  
			      <li id="sidemenu-pin">
              <a href="/report/pinreport/">
                <i class="fa fa-credit-card"></i> <span>Relatório Estoque PINs</span>
              </a>
            </li>
			  
			<li id="sidemenu-boletos">
              <a href="/report/BoletosVencidos/">
                <i class="fa fa-bullseye"></i> <span>Relatório Boletos Vencidos</span>
              </a>
			</li>

            <li id="sidemenu-sptrans">
              <a href="/report/sptransreport/">
                <i class="fa fa-train"></i> <span>Relatório SPTrans</span>
              </a>
            </li>

            <li id="sidemenu-user">
                <a href="/report/user/">
                    <i class="fa fa-users"></i> <span>Usuários</span>
                </a>
            </li>
            <!--
			<li>
              <a href="#">
                <i class="fa fa-list-alt"></i> <span>Listar Atendimentos</span>
              </a>
            </li>
			-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

    <!-- jQuery 2.1.4 -->
    <script src="/report/assets/template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/report/assets/template/bootstrap/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="/report/assets/template/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/report/assets/template/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/report/assets/template/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/report/assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/report/assets/template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/report/assets/template/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/report/assets/template/dist/js/app.min.js"></script>
    <!-- BOOTSTRAP-TABLE JS -->
    <script src="/report/assets/bootstrap-table/src/bootstrap-table.js"></script>
    <script src="/report/assets/bootstrap-table/src/locale/bootstrap-table-pt-BR.js"></script>
    <script src="//rawgit.com/wenzhixin/bootstrap-table-fixed-columns/master/bootstrap-table-fixed-columns.js"></script>
    <!-- BOOTSTRAP-SELECT SILVIO MORETO -->
    <script src="/report/assets/js/bootstrap-select.js"></script>
    <!-- MOMENT.JS - MANIPULACAO DE DATAS-->
    <script src="/report/assets/js/moment.js"></script>
    <!-- DATERANGEPICKER -->
    <script src="/report/assets/js/daterangepicker.js"></script>
    <!-- SCRIPT PARA DETALHES DO LAYOUT -->
    <script src="/report/assets/pages/js/default/layout.js"></script>
    <!-- SCRIPT PARA MÁSCARA MONETÁRIA -->
    <script src="/report/assets/js/jquery.maskMoney.js"></script>
    <!-- SCRIPT PARA MÁSCARAS CUSTOMIZADAS -->
    <script src="/report/assets/js/jquery.maskedinput.js"></script>



    <!-- IMPORTS GERAIS PRECISAM OCORRER ANTES DO CONTEUDO DA PÁGINA, POIS EXISTEM
         OUTROS IMPORTS ESPECÍFICOS DENTRO DA VIEW QUE DEPENDEM DOS ACIMAS     -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <?php print $content; ?>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versão</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016 Qiwi Brasil.</strong> All rights reserved.
    </footer>

  </body>
</html>
