  <script src="<?php echo base_url('AdminLTE/bower_components/chart.js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/chart.js/Chart.min.js')?>"></script>
  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
      </h1>
    </section>
     <?php
      $conn= new mysqli('localhost','root','','disdukcapil');
      $totalPendaftaranp = $conn->query("select * from pendaftaran where id_status_pendafFK='3'");
      $totalPendaftaranpd = $conn->query("select * from pendaftaran where id_status_pendafFK='4'");

      $totalPendaftaranp = mysqli_num_rows($totalPendaftaranp);
      $totalPendaftaranpd = mysqli_num_rows($totalPendaftaranpd);

      //jumlah pendaftaran akte berdasarkan kecamatan
      $pindahkec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=1");
      $pindahkec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=2");
      $pindahkec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=3");
      $pindahkec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=4");
      $pindahkec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=5");
      $pindahkec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=6");
      $pindahkec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=7");
      $pindahkec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=8");
      $pindahkec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=9");
      $pindahkec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=10");
      $pindahkec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=11");
      $pindahkec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=12");
      $pindahkec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=13");
      $pindahkec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=14");
      $pindahkec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=15");
      $pindahkec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=16");
      $pindahkec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=17");

      //jumlah pendaftaran pindah datang berdasarkan kecamatan
      $pindahdkec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=1");
      $pindahdkec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=2");
      $pindahdkec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=3");
      $pindahdkec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=4");
      $pindahdkec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=5");
      $pindahdkec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=6");
      $pindahdkec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=7");
      $pindahdkec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=8");
      $pindahdkec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=9");
      $pindahdkec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=10");
      $pindahdkec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=11");
      $pindahdkec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=12");
      $pindahdkec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=13");
      $pindahdkec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=14");
      $pindahdkec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=15");
      $pindahdkec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=16");
      $pindahdkec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=17");

            //pindah
      $pindahkec1 = mysqli_num_rows($pindahkec1);
      $pindahkec2 = mysqli_num_rows($pindahkec2);
      $pindahkec3 = mysqli_num_rows($pindahkec3);
      $pindahkec4 = mysqli_num_rows($pindahkec4);
      $pindahkec5 = mysqli_num_rows($pindahkec5);
      $pindahkec6 = mysqli_num_rows($pindahkec6);
      $pindahkec7 = mysqli_num_rows($pindahkec7);
      $pindahkec8 = mysqli_num_rows($pindahkec8);
      $pindahkec9 = mysqli_num_rows($pindahkec9);
      $pindahkec10 = mysqli_num_rows($pindahkec10);
      $pindahkec11 = mysqli_num_rows($pindahkec11);
      $pindahkec12 = mysqli_num_rows($pindahkec12);
      $pindahkec13 = mysqli_num_rows($pindahkec13);
      $pindahkec14 = mysqli_num_rows($pindahkec14);
      $pindahkec15 = mysqli_num_rows($pindahkec15);
      $pindahkec16 = mysqli_num_rows($pindahkec16);
      $pindahkec17 = mysqli_num_rows($pindahkec17);

      //pindah datang
      $pindahdkec1 = mysqli_num_rows($pindahdkec1);
      $pindahdkec2 = mysqli_num_rows($pindahdkec2);
      $pindahdkec3 = mysqli_num_rows($pindahdkec3);
      $pindahdkec4 = mysqli_num_rows($pindahdkec4);
      $pindahdkec5 = mysqli_num_rows($pindahdkec5);
      $pindahdkec6 = mysqli_num_rows($pindahdkec6);
      $pindahdkec7 = mysqli_num_rows($pindahdkec7);
      $pindahdkec8 = mysqli_num_rows($pindahdkec8);
      $pindahdkec9 = mysqli_num_rows($pindahdkec9);
      $pindahdkec10 = mysqli_num_rows($pindahdkec10);
      $pindahdkec11 = mysqli_num_rows($pindahdkec11);
      $pindahdkec12 = mysqli_num_rows($pindahdkec12);
      $pindahdkec13 = mysqli_num_rows($pindahdkec13);
      $pindahdkec14 = mysqli_num_rows($pindahdkec14);
      $pindahdkec15 = mysqli_num_rows($pindahdkec15);
      $pindahdkec16 = mysqli_num_rows($pindahdkec16);
      $pindahdkec17 = mysqli_num_rows($pindahdkec17);

      ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
            <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <center>
              <h3><?php echo $totalPendaftaranp ?></h3>
              <p>Total Jumlah Pendaftaran Pindah</p>
              </center>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <center>
              <h3><?php echo $totalPendaftaranpd ?></h3>
              <p>Total Jumlah Pendaftaran Pindah Datang</p>
              </center>
            </div>
          </div>
        </div>
      </div>
            <div class="row">
        <!-- ./col -->
        <div class="col-lg-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <center>
            <h3><?php echo $dataperhari ?></h3>
            <p>Total Pendaftaran Pindah Hari Ini</p>  
            </center> 
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <center>
            <h3><?php echo $dataperharipd ?></h3>
            <p>Total Pendaftaran Pindah Hari Ini</p>  
            </center> 
            </div>
          </div>
        </div>
      </div>
          <div class="row">  
        <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran Pindah Berdasarkan Kecamatan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChartPindah" width="150" height="50"></canvas>
            </div>
            <!-- /.box-body -->
          </div> 
        </div> 
        </div>
        <div class="row">  
        <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran Pindah Datang Berdasarkan Kecamatan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChartPindahDatang" width="150" height="50"></canvas>
            </div>
            <!-- /.box-body -->
          </div> 
        </div> 
        </div>
  </section>
</section>
<script>
   var ctx = document.getElementById("pieChartPindah");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Colomadu","Gondangrejo","Jaten","Jatipuro"," Jatioso","Jenawi","Jumantono","Jumapolo","Karanganyar","Karangpandan","Kebakramat","Kerjo","Matesih","Mojogedang","Ngargoyoso","Tasikmadu","Tawangmangu"],
       datasets: [{
         label: 'Jumlah Pendaftaran Pindah Berdasarkan Kecamatan',
         data: [<?php echo $pindahkec1 ?>,<?php echo $pindahkec2 ?>,<?php echo $pindahkec3 ?>,<?php echo $pindahkec4 ?>,<?php echo $pindahkec5 ?>,<?php echo $pindahkec6 ?>,<?php echo $pindahkec7 ?>,<?php echo $pindahkec8 ?>,<?php echo $pindahkec9 ?>,<?php echo $pindahkec10 ?>,<?php echo $pindahkec11 ?>,<?php echo $pindahkec12 ?>,<?php echo $pindahkec13 ?>,<?php echo $pindahkec14 ?>,<?php echo $pindahkec15 ?>,<?php echo $pindahkec16 ?>,<?php echo $pindahkec17 ?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //hijau
         'rgba(52, 152, 219, 1)', //biru
         'rgba(69, 92, 115, 1)', //biru tua
         'rgba(155, 89, 182, 1)',//ungu
         'rgba(231, 76, 60, 1)', //merah
         'rgba(189, 195, 199, 1)',//abu abu
         'rgba(150, 202, 89, 1)', //hijau muda
         'rgba(255, 159, 64, 1)',//orange
         'rgba(255, 99, 132, 1)', //pink
         'rgba(188, 143, 143, 1)',
         'rgba(255, 99, 71, 1)',
         'rgba(238, 203, 173, 1)',
         'rgba(191, 239, 255, 1)',
         'rgba(0, 191, 255, 1)',
         'rgba(255, 255, 0, 1)',
         'rgba(154, 255, 154, 1)',
         'rgba(139, 26, 26, 1)'
         ],
         borderColor: [
         'rgba(255, 255, 255, 0.3)',
         // 'rgba(54, 162, 235, 0.2)',
         // 'rgba(255,99,132,1)',
         'rgba(255, 255, 255, 1)',
         // 'rgba(153, 102, 255, 1)',
         // 'rgba(255, 159, 64, 1)'
         ],
         borderWidth: 2
       }]
     },
   });
</script>
<script>
   var ctx = document.getElementById("pieChartPindahDatang");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Colomadu","Gondangrejo","Jaten","Jatipuro"," Jatioso","Jenawi","Jumantono","Jumapolo","Karanganyar","Karangpandan","Kebakramat","Kerjo","Matesih","Mojogedang","Ngargoyoso","Tasikmadu","Tawangmangu"],
       datasets: [{
         label: 'Jumlah Pendaftaran Pindah Datang Berdasarkan Kecamatan',
         data: [<?php echo $pindahdkec1 ?>,<?php echo $pindahdkec2 ?>,<?php echo $pindahdkec3 ?>,<?php echo $pindahdkec4 ?>,<?php echo $pindahdkec5 ?>,<?php echo $pindahdkec6 ?>,<?php echo $pindahdkec7 ?>,<?php echo $pindahdkec8 ?>,<?php echo $pindahdkec9 ?>,<?php echo $pindahdkec10 ?>,<?php echo $pindahdkec11 ?>,<?php echo $pindahdkec12 ?>,<?php echo $pindahdkec13 ?>,<?php echo $pindahdkec14 ?>,<?php echo $pindahdkec15 ?>,<?php echo $pindahdkec16 ?>,<?php echo $pindahdkec17 ?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //hijau
         'rgba(52, 152, 219, 1)', //biru
         'rgba(69, 92, 115, 1)', //biru tua
         'rgba(155, 89, 182, 1)',//ungu
         'rgba(231, 76, 60, 1)', //merah
         'rgba(189, 195, 199, 1)',//abu abu
         'rgba(150, 202, 89, 1)', //hijau muda
         'rgba(255, 159, 64, 1)',//orange
         'rgba(255, 99, 132, 1)', //pink
         'rgba(188, 143, 143, 1)',
         'rgba(255, 99, 71, 1)',
         'rgba(238, 203, 173, 1)',
         'rgba(191, 239, 255, 1)',
         'rgba(0, 191, 255, 1)',
         'rgba(255, 255, 0, 1)',
         'rgba(154, 255, 154, 1)',
         'rgba(139, 26, 26, 1)'
         ],
         borderColor: [
         'rgba(255, 255, 255, 0.3)',
         // 'rgba(54, 162, 235, 0.2)',
         // 'rgba(255,99,132,1)',
         'rgba(255, 255, 255, 1)',
         // 'rgba(153, 102, 255, 1)',
         // 'rgba(255, 159, 64, 1)'
         ],
         borderWidth: 2
       }]
     },
   });
</script>  
  <script> 
    function getbulan(){
      var pilih_tahun = $("#pilih_tahun").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url(); ?>TemplateC/getbulan",
        data: "pilih_tahun="+pilih_tahun,
        success: function(msg){
          $('#bulantahun').html(msg);
        }
      });
    };
  </script>

  