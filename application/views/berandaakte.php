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
      $totalPendaftaran = $conn->query("select * from pendaftaran where id_status_pendafFK='2' and pendaftaran.Deleted='0'");

      $totalPendaftaran = mysqli_num_rows($totalPendaftaran);

      //jumlah pendaftaran akte berdasarkan jenis kelamin
      $laki=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_kelamin='Laki-laki' and pendaftaran.Deleted='0'");
      $perem=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_kelamin='Perempuan' and pendaftaran.Deleted='0'"); 

            //jumlah pendaftaran akte berdasarkan jenis akte
      $umum=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_akte='Umum' and pendaftaran.Deleted='0'");
      $tp=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_akte='Terlambat Pendaftaran' and pendaftaran.Deleted='0'"); 

      //jumlah pendaftaran akte berdasarkan kecamatan
      $aktekec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=1 and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=2  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=3  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=4  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=5  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=6  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=7  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=8  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=9 and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=10  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=11  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=12  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=13  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=14  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=15  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=16  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $aktekec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=17  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");

            //jumlah pedaftaran akte berdasarkan jenis kelamin
      $laki = mysqli_num_rows($laki);
      $perem = mysqli_num_rows($perem);

                  //jumlah pedaftaran akte berdasarkan jenis akte
      $umum = mysqli_num_rows($umum);
      $tp = mysqli_num_rows($tp);

      //akte
      $aktekec1 = mysqli_num_rows($aktekec1);
      $aktekec2 = mysqli_num_rows($aktekec2);
      $aktekec3 = mysqli_num_rows($aktekec3);
      $aktekec4 = mysqli_num_rows($aktekec4);
      $aktekec5 = mysqli_num_rows($aktekec5);
      $aktekec6 = mysqli_num_rows($aktekec6);
      $aktekec7 = mysqli_num_rows($aktekec7);
      $aktekec8 = mysqli_num_rows($aktekec8);
      $aktekec9 = mysqli_num_rows($aktekec9);
      $aktekec10 = mysqli_num_rows($aktekec10);
      $aktekec11 = mysqli_num_rows($aktekec11);
      $aktekec12 = mysqli_num_rows($aktekec12);
      $aktekec13 = mysqli_num_rows($aktekec13);
      $aktekec14 = mysqli_num_rows($aktekec14);
      $aktekec15 = mysqli_num_rows($aktekec15);
      $aktekec16 = mysqli_num_rows($aktekec16);
      $aktekec17 = mysqli_num_rows($aktekec17);

      ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <center>
              <h3><?php echo $totalPendaftaran ?></h3>
              <p>Total Jumlah Pendaftaran Akte</p>
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
          <div class="small-box bg-primary">
            <div class="inner">
              <center>
            <h3><?php echo $dataperhari ?></h3>
            <p>Total Pendaftaran Akte Hari Ini</p>  
            </center> 
            </div>
          </div>
        </div>
      </div>
      <div class="row">  
        <div class="col-md-6">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran Akte Berdasarkan Jenis Kelamin</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChartAkteJK" width="150" height="50"></canvas>
            </div>
            <!-- /.box-body -->
          </div> 
        </div> 

        <div class="col-md-6">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran Akte Berdasarkan Jenis Akte</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChartAkteJA" width="150" height="50"></canvas>
            </div>
            <!-- /.box-body -->
          </div> 
        </div> 
        </div>
      <div class="row">  
        <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran Akte Berdasarkan Kecamatan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChartAkte" width="150" height="50"></canvas>
            </div>
            <!-- /.box-body -->
          </div> 
        </div> 
        </div>  
  </section>
</section>
<script>
   var ctx = document.getElementById("pieChartAkteJA");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Umum","Terlambat Pendaftaran"],
       datasets: [{
         label: 'Jumlah Pendaftaran Akte Berdasarkan Jenis Akte',
         data: [<?php echo $umum ?>,<?php echo $tp ?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //hijau
         // 'rgba(52, 152, 219, 1)', //biru
         'rgba(69, 92, 115, 1)', //biru tua
         // 'rgba(155, 89, 182, 1)',//ungu
         // 'rgba(231, 76, 60, 1)', //merah
         // 'rgba(189, 195, 199, 1)',//abu abu
         // 'rgba(150, 202, 89, 1)', //hijau muda
         // 'rgba(255, 159, 64, 1)',//orange
         // 'rgba(255, 99, 132, 1)', //pink
         // 'rgba(188, 143, 143, 1)',
         // 'rgba(255, 99, 71, 1)',
         // 'rgba(238, 203, 173, 1)',
         // 'rgba(191, 239, 255, 1)',
         // 'rgba(0, 191, 255, 1)',
         // 'rgba(255, 255, 0, 1)',
         // 'rgba(154, 255, 154, 1)',
         // 'rgba(139, 26, 26, 1)'
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
   var ctx = document.getElementById("pieChartAkteJK");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Laki-laki","Perempuan"],
       datasets: [{
         label: 'Jumlah Pendaftaran Akte Berdasarkan Jenis Kelamin',
         data: [<?php echo $laki ?>,<?php echo $perem ?>],
         backgroundColor: [
         // 'rgba(38, 185, 154, 1)', //hijau
         // 'rgba(52, 152, 219, 1)', //biru
         // 'rgba(69, 92, 115, 1)', //biru tua
         // 'rgba(155, 89, 182, 1)',//ungu
         'rgba(231, 76, 60, 1)', //merah
         // 'rgba(189, 195, 199, 1)',//abu abu
         // 'rgba(150, 202, 89, 1)', //hijau muda
         // 'rgba(255, 159, 64, 1)',//orange
         // 'rgba(255, 99, 132, 1)', //pink
         // 'rgba(188, 143, 143, 1)',
         // 'rgba(255, 99, 71, 1)',
         // 'rgba(238, 203, 173, 1)',
         // 'rgba(191, 239, 255, 1)',
         // 'rgba(0, 191, 255, 1)',
         // 'rgba(255, 255, 0, 1)',
         // 'rgba(154, 255, 154, 1)',
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
   var ctx = document.getElementById("pieChartAkte");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Colomadu","Gondangrejo","Jaten","Jatipuro"," Jatioso","Jenawi","Jumantono","Jumapolo","Karanganyar","Karangpandan","Kebakramat","Kerjo","Matesih","Mojogedang","Ngargoyoso","Tasikmadu","Tawangmangu"],
       datasets: [{
         label: 'Jumlah Pendaftaran Akte Berdasarkan Kecamatan',
         data: [<?php echo $aktekec1 ?>,<?php echo $aktekec2 ?>,<?php echo $aktekec3 ?>,<?php echo $aktekec4 ?>,<?php echo $aktekec5 ?>,<?php echo $aktekec6 ?>,<?php echo $aktekec7 ?>,<?php echo $aktekec8 ?>,<?php echo $aktekec9 ?>,<?php echo $aktekec10 ?>,<?php echo $aktekec11 ?>,<?php echo $aktekec12 ?>,<?php echo $aktekec13 ?>,<?php echo $aktekec14 ?>,<?php echo $aktekec15 ?>,<?php echo $aktekec16 ?>,<?php echo $aktekec17 ?>],
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

  

