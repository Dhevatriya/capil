<!DOCTYPE html>
<html lang="en">
<head>
	<script type="text/javascript">
            var txt="Disdukcapil -  ";
            var speed=300;
            var refresh=null;
            function action(){
                document.title=txt;
                txt=txt.substring(1,txt.length)+txt.charAt(0);
                refresh=setTimeout("action()",speed);
            }
            action();
        </script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  	<meta name="author" content="GeeksLabs">
  	<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

	<!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/elegant-icons-style.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css1/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css1/minified/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css1/minified/core.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css1/minified/components.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css1/minified/colors.min.css'); ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo base_url('assets/css/bootstrap-theme.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/font-awesome.css');?>" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/style-responsive.css');?>" rel="stylesheet" />
  <!-- /global stylesheets -->

  <body class="login-img3-body">
  <div class="container">

	<center>
    <form class="login-form" action="<?php echo base_url(); ?>LoginC/signin" method="post">
      <div class="login-wrap">
      			  	<center><h3><b>SISTEM PENDAFTARAN DINAS KEPENDUDUKAN DAN CATATAN SIPIL</b></h3></center>
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <?php 
		$data=$this->session->flashdata('sukses');
		if($data!=""){ ?>
		<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
		<?php } ?>
		<?php 
		$data2=$this->session->flashdata('error');
		if($data2!=""){ ?>
		<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
		<?php } ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="username" class="form-control" placeholder="Nama Pengguna" autofocus required oninvalid="this.setCustomValidity('Nama pengguna tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required oninvalid="this.setCustomValidity('Kata sandi tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>
        
      </div>
    </form>
    </center>
  </div>


</body>

</head>

