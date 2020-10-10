
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kelayakan Kredit | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo site_url('resources/plugins/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <img src="<?= base_url('resources/img/logom.png')?>" width="130px" alt=""><br>
    <a href=""><b>SISTEM PENDUKUNG KEPUTUSAN <BR> KELAYAKAN KREDIT</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if($this->session->flashdata('pesan')): ?>
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> <?= $this->session->flashdata('pesan')?></h4>
              </div>
    <?php endif;?>

    <form action="<?= base_url('auth/login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
      </div>
    </form>
    
  </div>
</div>
<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js'); ?>"></script>
<script src="<?php echo site_url('resources/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
