<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>KREDIT | <?=$data['title']?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('resources/css/style.css'); ?>">
        <style>
            .containerr {
                display: flex;
                height: 60vh;
                justify-content: center;
                align-items: center;
                direction: row;
            }
         
            @media screen {
                #print {
                    font-family:verdana, arial, sans-serif;
                }
                .screen{
                    display:none;
                }
            }

            @media print {
                #print {font-family:georgia, times, serif;}
                .screen{
                    display:block;
                }
            }
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">
                        <img src="<?php echo site_url('resources/img/logom.png'); ?>" width="100%" alt="">
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Kelayakan Kredit</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li>
                                <a href="<?= base_url('auth/logout')?>" ><i class="fa fa-logout"></i> LOGOUT</a>
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
                    <!-- <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Alexander Pierce</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div> -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="<?php echo site_url(); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Kriteria</span>
                            </a>
                            <ul class="treeview-menu">
								<li>
                                    <a href="<?php echo site_url('kriterium/index'); ?>"><i class="fa fa-list-ul"></i> Data Kriteria</a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo site_url('kriterium/bobot'); ?>"><i class="fa fa-plus"></i> Bobot Kriteria</a>
                                </li>
                                <li class="active">
                                    <a href="<?php echo site_url('subkriteria/index'); ?>"><i class="fa fa-plus"></i> Sub Kriteria</a>
                                </li>
							</ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Periode</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('periode/add'); ?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('periode/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Nasabah</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('nasabah/add'); ?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('nasabah/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('analisa/index'); ?>">
                                        <i class="fa fa-dashboard"></i> <span>Analisa</span>
                                    </a>
                                </li>
							</ul>
                        </li>
						<!-- <li>
                            <a href="#">
                                <i class="fa fa-user"></i> <span>User</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('user/add'); ?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('user/index'); ?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li> -->
                        <li>
                                    <a href="<?php echo site_url('laporan/index'); ?>">
                                        <i class="fa fa-file"></i> <span>Laporan</span>
                                    </a>
                                </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content-header">
                    <h1>
                        <?=$data['header']?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?=$data['title']?></li>
                    </ol>
                </section>
                <section class="content">
                    <?php
                    if(!$this->session->userdata('username')){
                        redirect('auth');
                    }
if (isset($_view) && $_view) {
    $this->load->view($_view);
}

?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    Metode AHP
                </div>
                <strong>SPK Kelayakan Penerima Kredit</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->

                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/plugins/angular/angular.min.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/apps.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/controllers/admin.controller.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/helpers/helper.services.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/services/admin.service.js'); ?>"></script>

        <script src="<?php echo site_url('resources/js/bootstrap.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js'); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js'); ?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/global.js'); ?>"></script>
        <script src="<?php echo site_url('resources/js/jquery.PrintArea.js'); ?>"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
</html>
