<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo $title; ?> | Dinas Kependudukan dan Catatan Sipil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Tell the browser to be responsive to screen width -->
   <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/dist/css/skins/_all-skins.min.css')?>">

  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')?>">
  <link href="<?php echo base_url('assets/css1/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/select2/dist/css/select2.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('AdminLTE/plugins/iCheck/flat/blue.css')?>">
<!--   <link rel="stylesheet" href="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/css/custom1.css')?>"> -->

  <!-- Google Font -->
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <span class="logo-lg"><b>Disdukcapil</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username"><font size="4"> 
                            <?php 
                                $data=$this->session->userdata('user');
                                $data1=$this->session->userdata('pass');
                                if($data!=""){ ?>
                                <?=$data;?>
                                <input type="hidden" id="username" name="username" value="<?php echo $data; ?>" readonly class="form-control" >
                                <input type="hidden" id="password" name="password" value="<?php echo $data1; ?>" readonly class="form-control" >
                            <?php } ?>
                            </font></span>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu extended">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="<?php echo base_url(); ?>AdminC/logout" onclick="return confirm('Apakah anda yakin ingin keluar?');"><i class="icon_key_alt"></i> Keluar</a>
                            </li>
                        </ul>
                    </li>
            <!-- </ul> -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php echo menuaktif('admin',$aktif); ?>"> 
          <a class="" href="<?php echo base_url() ?>AdminC"> 
          <i class="fa fa-dashboard" ></i> 
          <span>Beranda</span> 
          </a>
        </li>  
        <li class="<?php echo menuaktif('petugas',$aktif); ?>"> 
          <a class="" href="<?php echo base_url() ?>AdminC/daftarPetugas" class=""> 
          <i class="fa fa-user" ></i> 
          <span>Data Petugas</span> 
          </a>
        </li>
                    <li class="<?php echo menuaktif('kecamatan',$aktif); ?>"> 
                        <a class="" href="<?php echo base_url() ?>AdminC/daftarKecamatan" class=""> 
                          <i class="fa fa-map-pin" ></i> 
                          <span>Data Kecamatan</span> 
                        </a>
                    </li>
                    <li class="<?php echo menuaktif('syarat',$aktif); ?>"> 
                        <a class="" href="<?php echo base_url() ?>AdminC/daftarSyarat" class=""> 
                          <i class="fa fa-file" ></i> 
                          <span>Syarat Pendaftaran</span> 
                        </a>
                    </li>
        <li class="treeview">
          <a href="javascript:;" class="">
            <i class="fa fa-edit"></i>  
            <span>Pendaftaran</span>
            <span class="menu-arrow arrow_carrot-right"></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li class="<?php echo menuaktif('dtkk',$aktif); ?>">
                <a  href="<?php echo base_url() ?>PendafKKC/inputPendaftaran">Pendaftaran KK</a>
              </li>
              <li class="<?php echo menuaktif('dtakte',$aktif); ?>">
                <a  href="<?php echo base_url() ?>PendafAkteC/inputpendaftaran">Pendaftaran Akte</a>
              </li>
              <li class="<?php echo menuaktif('dtpindah',$aktif); ?>">
                <a  href="<?php echo base_url() ?>PendafPindahC/inputpendaftaran">Pendaftaran Pindah</a>
              </li>
              <li class="<?php echo menuaktif('dtpindahd',$aktif); ?>">
              <a href="<?php echo base_url() ?>PendafPindahC/inputpendaftaranpd">Pendaftaran Pindah Datang</a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:;" class="">
            <i class="fa fa-file-image-o"></i>  
            <span>Unggah Syarat</span>
            <span class="menu-arrow arrow_carrot-right"></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li class="<?php echo menuaktif('adsyaratkk',$aktif); ?>">
              <a class="" href="<?php echo base_url() ?>PendafKKC/syaratpendafkk">Unggah Syarat KK</a>
              </li>
              <li class="<?php echo menuaktif('adsyaratakte',$aktif); ?>">
                <a class="" href="<?php echo base_url() ?>PendafAkteC/syaratpendafakte">Unggah Syarat Akte</a>
              </li>
              <li class="<?php echo menuaktif('adsyaratpindah',$aktif); ?>">
                <a class="" href="<?php echo base_url() ?>PendafPindahC/syaratpendafpindah">Unggah Syarat Pindah</a>
              </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:;" class="">
            <i class="fa fa-book"></i>  
            <span>Riwayat Pendaftaran</span>
            <span class="menu-arrow arrow_carrot-right"></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
                          <li class="<?php echo menuaktif('riwkk',$aktif); ?>">
                            <a href="<?php echo base_url() ?>PendafKKC/riwayatpendafkk">Riwayat Pendaftaran KK</a>
                          </li>
                          <li class="<?php echo menuaktif('riwakte',$aktif); ?>">
                            <a class="" href="<?php echo base_url() ?>PendafAkteC/riwayatpendafakte">Riwayat Pendaftaran Akte</a>
                          </li>
                          <li class="<?php echo menuaktif('riwpindah',$aktif); ?>">
                            <a  href="<?php echo base_url() ?>PendafPindahC/riwayatpendafpindah">Riwayat Pendaftaran Pindah</a>
                          </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:;" class="">
            <i class="fa fa-table"></i>  
            <span>Laporan Pendaftaran </span>
            <span class="menu-arrow arrow_carrot-right"></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li class="<?php echo menuaktif('lapkk',$aktif); ?>">
                            <a href="<?php echo base_url() ?>PendafKKC/laporanpendaftarankk">Laporan Pendaftaran KK</a>
                          </li>
                          <li class="<?php echo menuaktif('lapakte',$aktif); ?>">
                            <a  href="<?php echo base_url() ?>PendafAkteC/laporanpendaftaranakte">Laporan Pendaftaran Akte</a>
                          </li>
                          <li class="<?php echo menuaktif('lappindah',$aktif); ?>">
                            <a  href="<?php echo base_url() ?>PendafPindahC/laporanpendaftaranpindah">Laporan Pendaftaran Pindah</a>
                          </li>
          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?php echo $body ?>
  </div>
<!-- jQuery 3 -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('AdminLTE/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('AdminLTE/dist/js/demo.js')?>"></script>
<!-- Select2 -->
<!-- <script src="<?php echo base_url('AdminLTE/bower_components/chart.js/Chart.bundle.js'); ?>"></script> -->
<!-- ChartJS -->
<script src="<?php echo base_url('AdminLTE/bower_components/chart.js/Chart.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('AdminLTE/plugins/iCheck/icheck.min.js')?>"></script>
<!-- Page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example4').DataTable()
    $('#example5').DataTable()
    $('#example6').DataTable()
    $('#example7').DataTable()
    $('#example8').DataTable()
    $('#example9').DataTable()
    $('#example10').DataTable()
    $('#example11').DataTable()
    $('#example12').DataTable()
    $('#example13').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
