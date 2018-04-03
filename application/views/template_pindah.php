<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
<!--     <link rel="shortcut icon" href="<?php echo base_url() ;?>assets/img/a.png"> -->

    <title><?php echo $title; ?> | Dinas Kependudukan dan Catatan Sipil</title>

    <!-- css dari sipudes css1 -->
    <link href="<?php echo base_url('assets/css1/css.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css1/components.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css1/colors.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css1/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css1/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css1/minified/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css1/minified/components.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo base_url('assets/css1/minified/colors.min.css'); ?>" rel="stylesheet" type="text/css"> -->
    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>/assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo base_url(); ?>/assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo base_url(); ?>/assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.css" type="text/css">
    <link href="<?php echo base_url(); ?>/assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/fullcalendar.css">
    <link href="<?php echo base_url(); ?>/assets/css/widgets.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url(); ?>/assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>/assets/css/custom1.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/css/xcharts.min.css" rel=" stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  </head>

    

  <body class="<?php echo $bclass; ?>">
  <!-- <body style class=""> -->
  <section id="container" class="">
  <!-- header -->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                
            </div>

            <a href="#" class="logo">Dinas Kependudukan dan Catatan Sipil</a> 
            
            <div class="top-nav notification-row">  
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span >
                                <i class="icon_profile"></i>
                            </span>
                            <span class="username"><font size="4"> 
                            <!-- &nbsp Analis &nbsp  -->

                            <?php 
                                $data=$this->session->userdata('user');
                                $data1=$this->session->userdata('pass');
                                if($data!=""){ ?>
                                <!-- <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div> -->
                                <?=$data;?>
                                <input type="hidden" id="username" name="username" value="<?php echo $data; ?>" readonly class="form-control" >
                                <input type="hidden" id="password" name="password" value="<?php echo $data1; ?>" readonly class="form-control" >
                            <?php } ?>
                            </font></span>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="<?php echo site_url('PendafPindahC/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar?');"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
      </header> 
  <!-- aside -->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">  
                   <li class="<?php echo menuaktif('pindah',$aktif); ?>"> 
                        <a class="" href="<?php echo site_url('PendafPindahC') ?>" ><i class="icon_document_alt" ></i> <span>Pendaftaran Pindah</span> </a>
                    </li>
                    <li class="<?php echo menuaktif('laporanpindah',$aktif); ?>"> 
                        <a class="" href="<?php echo site_url('PendafPindahC/laporanpendaftaranpindah') ?>"><i class="icon_document_alt" ></i> <span>Laporan Pendaftaran Pindah</span> </a>
                    </li> 
                    
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start--> 
      <?php echo $body; ?>
      <!--main content end-->

    <!-- javascripts -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo base_url(); ?>/assets/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>/assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="<?php echo base_url(); ?>/assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <script src="<?php echo base_url(); ?>/assets/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="<?php echo base_url(); ?>/assets/js/calendar-custom.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url(); ?>/assets/assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo base_url(); ?>/assets/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?php echo base_url(); ?>/assets/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/xcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.autosize.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/gdp-data.js"></script>  
    <script src="<?php echo base_url(); ?>/assets/js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/sparklines.js"></script>  
    <script src="<?php echo base_url(); ?>/assets/js/charts.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.slimscroll.min.js"></script>
     
    <script>
        //knob
        $(function() {
          $(".knob").knob({
            'draw' : function () { 
              $(this.i).val(this.cv + '%')
            }
          })
        });

        //carousel
        $(document).ready(function() {
            $("#owl-slider").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true

            });
        });

        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

    </script>

    <!-- custom pencarian dalam table -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/datatables_advanced.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
  </body>
  <!-- <footer class="footer dark-bg">
      
  </footer> -->
</html>
