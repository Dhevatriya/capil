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
      //total jumlah pendaftaran kk
      $totalPendaftaran = $conn->query("select * from pendaftaran where id_status_pendafFK='1'");
      $totalPendaftaran = mysqli_num_rows($totalPendaftaran);
      //total jumlah pendaftaran kk perhari
      $totalPendaftaranperhari = $conn->query("SELECT * FROM pendaftaran where id_status_pendafFK='1' and SUBSTR(pendaftaran.tgl_buat, 1,10)=DATE(NOW()) GROUP BY id_pendaftaran");
      $totalPendaftaranperhari = mysqli_num_rows($totalPendaftaranperhari);
      //jumlah pendaftaran kk berdasarkan kecamatan
      $kkkec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=1");
      $kkkec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=2");
      $kkkec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=3");
      $kkkec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=4");
      $kkkec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=5");
      $kkkec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=6");
      $kkkec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=7");
      $kkkec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=8");
      $kkkec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=9");
      $kkkec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=10");
      $kkkec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=11");
      $kkkec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=12");
      $kkkec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=13");
      $kkkec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=14");
      $kkkec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=15");
      $kkkec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=16");
      $kkkec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=17");
      //kk
      $kkkec1 = mysqli_num_rows($kkkec1);
      $kkkec2 = mysqli_num_rows($kkkec2);
      $kkkec3 = mysqli_num_rows($kkkec3);
      $kkkec4 = mysqli_num_rows($kkkec4);
      $kkkec5 = mysqli_num_rows($kkkec5);
      $kkkec6 = mysqli_num_rows($kkkec6);
      $kkkec7 = mysqli_num_rows($kkkec7);
      $kkkec8 = mysqli_num_rows($kkkec8);
      $kkkec9 = mysqli_num_rows($kkkec9);
      $kkkec10 = mysqli_num_rows($kkkec10);
      $kkkec11 = mysqli_num_rows($kkkec11);
      $kkkec12 = mysqli_num_rows($kkkec12);
      $kkkec13 = mysqli_num_rows($kkkec13);
      $kkkec14 = mysqli_num_rows($kkkec14);
      $kkkec15 = mysqli_num_rows($kkkec15);
      $kkkec16 = mysqli_num_rows($kkkec16);
      $kkkec17 = mysqli_num_rows($kkkec17);

      ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <center>
              <h3><?php echo $totalPendaftaran ?></h3>
              <p>Total Jumlah Pendaftaran KK</p>
              </center>
            </div>
          </div>
        </div>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <center>
            <h3><?php echo $totalPendaftaranperhari ?></h3>
            <p>Total Pendaftaran KK Hari Ini</p>  
            </center> 
            </div>
          </div>
        </div>
      </div>
            <div class="row">  
        <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran KK Berdasarkan Kecamatan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChartKK" width="150" height="50"></canvas>
            </div>
            <!-- /.box-body -->
          </div> 
        </div> 
        </div>
        
  </section>
</section>
<script>
   var ctx = document.getElementById("pieChartKK");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Colomadu","Gondangrejo","Jaten","Jatipuro"," Jatioso","Jenawi","Jumantono","Jumapolo","Karanganyar","Karangpandan","Kebakramat","Kerjo","Matesih","Mojogedang","Ngargoyoso","Tasikmadu","Tawangmangu"],
       datasets: [{
         label: 'Jumlah Pendaftaran KK Berdasarkan Kecamatan',
         data: [<?php echo $kkkec1 ?>,<?php echo $kkkec2 ?>,<?php echo $kkkec3 ?>,<?php echo $kkkec4 ?>,<?php echo $kkkec5 ?>,<?php echo $kkkec6 ?>,<?php echo $kkkec7 ?>,<?php echo $kkkec8 ?>,<?php echo $kkkec9 ?>,<?php echo $kkkec10 ?>,<?php echo $kkkec11 ?>,<?php echo $kkkec12 ?>,<?php echo $kkkec13 ?>,<?php echo $kkkec14 ?>,<?php echo $kkkec15 ?>,<?php echo $kkkec16 ?>,<?php echo $kkkec17 ?>],
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

  

