<script src="<?php echo base_url(); ?>/assets/admin/js/Chart.bundle.js"></script>
<link href="<?php echo base_url(); ?>/assets/admin/css/custom1.css" rel="stylesheet">
<!-- page content -->
<div class="col" role="main">
   <!-- top tiles -->
   <div class="row tile_count">
      <?php
         $conn = new mysqli('localhost', 'root', '', 'perpus');
         $totalAnggota = $conn->query("select * from anggota");
         // $laki = $conn->query("select * from anggota where jenkel='Laki-laki'");
         // $perempuan = $conn->query("select * from anggota where jenkel='Perempuan'");
         $buku = $conn->query("select * from buku");
         $koleksiBuku = $conn->query("select id_koleksi from buku, koleksi where buku.id_buku=koleksi.id_buku");
         $petugas = $conn->query("select * from petugas where petugas.type='petugas'");
         $jenis = $conn->query("select buku.id_jenis_buku from buku, jenis WHERE buku.id_jenis_buku=jenis.id_jenis_buku");
         $fiksi = $conn->query("select buku.id_jenis_buku from buku, jenis where buku.id_jenis_buku=jenis.id_jenis_buku AND nama_jenis_buku='Fiksi'");
         $nonfiksi = $conn->query("select buku.id_jenis_buku from buku, jenis where buku.id_jenis_buku=jenis.id_jenis_buku AND nama_jenis_buku='Non Fiksi'");
         $lakiP = $conn->query("SELECT Presensi.id_anggota FROM presensi, anggota WHERE anggota.id_anggota=presensi.id_anggota AND anggota.jenkel='Laki-laki'");
         $perempuanP = $conn->query("SELECT Presensi.id_anggota FROM presensi, anggota WHERE anggota.id_anggota=presensi.id_anggota AND anggota.jenkel='Perempuan'");
         $kelas1 = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='1' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $kelas2 = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='2' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $kelas3 = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='3' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $kelas4 = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='4' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $kelas5 = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='5' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $kelas6 = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='6' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $guru = $conn->query("SELECT presensi.id_anggota FROM anggota, presensi WHERE presensi.id_anggota=anggota.id_anggota AND anggota.kelas='Guru' AND presensi.created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $senin = $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Monday' AND created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $selasa= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Tuesday' AND created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $rabu= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Wednesday' AND created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $kamis= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Thursday' AND created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $jumat= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Friday' AND created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         $sabtu= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Saturday' AND created_at BETWEEN date_sub(now(), INTERVAL 1 WEEK) and now()");
         
         $senin1= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Monday'");
         $selasa1= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Tuesday'");
         $rabu1= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Wednesday'");
         $kamis1= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Thursday'");
         $jumat1= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Friday'");
         $sabtu1= $conn->query("SELECT DAYNAME(created_at) FROM presensi WHERE DAYNAME(created_at)='Saturday'");
         
         $anggota1= $conn->query("SELECT a.id_anggota,a.nama,COUNT(a.id_anggota) AS anggota FROM anggota a,transaksi t WHERE a.id_anggota=t.id_anggota GROUP BY id_anggota ORDER BY anggota DESC LIMIT 0,1");
         
         // $lakilaki = mysqli_num_rows($laki);
         // $perempuan = mysqli_num_rows($perempuan);
         $petugas = mysqli_num_rows($petugas);
         $buku = mysqli_num_rows($buku);
         $koleksi = mysqli_num_rows($koleksiBuku);
         $jenis = mysqli_num_rows($jenis);
         $total = mysqli_num_rows($totalAnggota);
         
         $fiksi = mysqli_num_rows($fiksi);
         $nonfiksi = mysqli_num_rows($nonfiksi);
         
         $lakiP = mysqli_num_rows($lakiP);
         $perempuanP = mysqli_num_rows($perempuanP); 
         
         $kelas1 = mysqli_num_rows($kelas1);
         $kelas2 = mysqli_num_rows($kelas2);
         $kelas3 = mysqli_num_rows($kelas3);
         $kelas4 = mysqli_num_rows($kelas4);
         $kelas5 = mysqli_num_rows($kelas5);
         $kelas6 = mysqli_num_rows($kelas6);
         $guru = mysqli_num_rows($guru); 
         
         $senin = mysqli_num_rows($senin); 
         $selasa = mysqli_num_rows($selasa); 
         $rabu = mysqli_num_rows($rabu); 
         $kamis = mysqli_num_rows($kamis); 
         $jumat = mysqli_num_rows($jumat); 
         $sabtu = mysqli_num_rows($sabtu); 
         
         $senin1 = mysqli_num_rows($senin1); 
         $selasa1 = mysqli_num_rows($selasa1); 
         $rabu1 = mysqli_num_rows($rabu1); 
         $kamis1 = mysqli_num_rows($kamis1); 
         $jumat1 = mysqli_num_rows($jumat1); 
         $sabtu1 = mysqli_num_rows($sabtu1);
         
         $anggota1 = mysqli_num_rows($anggota1);  
         ?>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-users"></i> Total Anggota</span>
         <div class="count"><?php echo $total?></div>
         <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
      </div>
<!--       <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-male"></i> Anggota Laki-laki</span>
         <div class="count green"><?php echo $lakilaki?></div>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-female"></i> Anggota Perempuan</span>
         <div class="count"><?php echo $perempuan?></div>
      </div> -->
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-book"></i> Total Judul Buku</span>
         <div class="count green"><?php echo $buku?></div>
         <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-tasks"></i> Total Koleksi Buku</span>
         <div class="count"><?php echo $koleksi?></div>
         <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-user"></i> Petugas</span>
         <div class="count"><?php echo $petugas?></div>
         <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
      </div>
   </div>
   <!-- /top tiles -->
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="dashboard_graph">
            <div class="row x_title">
               <div class="col-md-6">
                  <h3>Statistik <small>Pengunjung Perpustakaan</small></h3>
               </div>
               <!--<div class="col-md-6">
                  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                  </div>
                  </div> -->
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
               <canvas id="grafikStatistik" height="100" width="250"></canvas>
               <!-- <div id="chart_plot_02" class="demo-placeholder"></div> -->
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
               <div class="x_title">
                  <h2>Jumlah Pengunjung <small>Keseluruhan</small></h2>
                  <div class="clearfix"></div>
               </div>
               <canvas id="grafikPresensi3" height="50" width="50"></canvas>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
   </div>
   <br/>
   <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="x_panel tile fixed_height_330 overflow_hidden">
            <div class="x_title">
               <h2>Perbandingan Jenis Kelamin <small>Pengunjung</small></h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <td>
                        <canvas id="grafikPresensi1" height="150" width="150"></canvas>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="x_panel tile fixed_height_330 overflow_hidden">
            <div class="x_title">
               <h2>Perbandingan Kelas Pengunjung<small>Mingguan</small></h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <td>
                        <canvas id="grafikPresensi2" height="150" width="150"></canvas>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
         <div class="x_panel tile fixed_height_330 overflow_hidden">
            <div class="x_title">
               <h2>Perbandingan Jenis Buku</h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <td>
                        <canvas id="grafik2" height="150" width="150"></canvas>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4">
         <div class="x_panel">
            <div class="x_title">
               <h2>Peminjaman Buku Terbanyak<small>Bulanan</small></h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <?php
                  $no = 0;
                  foreach ($queryAnggotaTerbanyak as $row) {
                    $no++;
                    echo "
                    <article class='media event'>
                    <a class='pull-left date'>
                    <p class='month'>" . $row['no_anggota'] . "</p>
                    <p class='day'>" . $no . "</p>
                    </a>
                    <div class='media-body'>
                    <a class='title'>" . $row['nama'] . "</a>
                    <p>" . $row['anggota'] . " kali peminjaman</p>
                    </div>
                    </article>";
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="x_panel">
            <div class="x_title">
               <h2>Pengunjung Terbanyak <small>Mingguan</small></h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <?php
                  $no = 0;
                  foreach ($queryPengunjungTerbanyak as $row) {
                    $no++;
                    echo "
                    <article class='media event'>
                    <a class='pull-left date'>
                    <p class='month'>" . $row['no_anggota'] . "</p>
                    <p class='day'>" . $no . "</p>
                    </a>
                    <div class='media-body'>
                    <a class='title'>" . $row['nama'] . "</a>
                    <p>" . $row['presensi'] . " kali kehadiran</p>
                    <p>" . $row['jenis'] . "</p>
                    </div>
                    </article>";
                  }
                  ?>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="x_panel">
            <div class="x_title">
               <h2>Judul Buku Terlaris<small>Mingguan</small></h2>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <?php
                  $no = 0;
                  foreach ($queryBukuTerbanyak as $row) {
                    $no++;
                    echo "
                    <article class='media event'>
                    <a class='pull-left date'>
                    <p class='month'>" . $row['id_buku'] . "</p>
                    <p class='day'>" . $no . "</p>
                    </a>
                    <div class='media-body'>
                    <a class='title'>" . $row['judul'] . "</a>
                    <p>" . $row['pengarang'] . " - " .  $row['koleksi'] . " kali dipinjam</p>
                    </div>
                    </article>";
                  }
                  ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /page content -->
<script>
   var ctx = document.getElementById("grafik2");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Fiksi","Non Fiksi"],
       datasets: [{
         label: 'Jenis Buku',
         data: [<?php echo $fiksi?> , <?php echo $nonfiksi?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //kuning
         // 'rgba(54, 162, 235, 1)', //biru
         // 'rgba(255, 99, 132, 1)', //pink
         'rgba(69, 92, 115, 1)', //hijau
         // 'rgba(153, 102, 255, 1)',//ungu
         // 'rgba(255, 159, 64, 1)'//orange
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
   var ctx = document.getElementById("grafikPresensi1");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Laki-laki","Perempuan"],
       datasets: [{
         label: 'Jenis Kelamin',
         data: [<?php echo $lakiP?> , <?php echo $perempuanP?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //kuning
         // 'rgba(54, 162, 235, 1)', //biru
         // 'rgba(255, 99, 132, 1)', //pink
         'rgba(69, 92, 115, 1)', //hijau
         // 'rgba(153, 102, 255, 1)',//ungu
         // 'rgba(255, 159, 64, 1)'//orange
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
   var ctx = document.getElementById("grafikPresensi2");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Kelas 1","Kelas 2","Kelas 3","Kelas 4","Kelas 5","Kelas 6","Guru"],
       datasets: [{
         label: 'Kelas',
         data: [<?php echo $kelas1?> , <?php echo $kelas2?> , <?php echo $kelas3?>, <?php echo $kelas4?>, <?php echo $kelas5?>, <?php echo $kelas6?>, <?php echo $guru?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //hijau
         'rgba(52, 152, 219, 1)', //biru
         'rgba(69, 92, 115, 1)', //biru tua
         'rgba(155, 89, 182, 1)',//ungu
         'rgba(231, 76, 60, 1)', //merah
         'rgba(189, 195, 199, 1)',//abu abu
         'rgba(150, 202, 89, 1)' //hijau muda
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
   var ctx = document.getElementById("grafikPresensi3");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],
       datasets: [{
         label: 'Hari Pengunjung',
         data: [<?php echo $senin1?> , <?php echo $selasa1?> , <?php echo $rabu1?>, <?php echo $kamis1?>, <?php echo $jumat1?>, <?php echo $sabtu1?>],
         backgroundColor: [
         'rgba(38, 185, 154, 1)', //hijau
         'rgba(52, 152, 219, 1)', //biru
         'rgba(69, 92, 115, 1)', //biru tua
         'rgba(155, 89, 182, 1)',//ungu
         'rgba(231, 76, 60, 1)', //merah
         'rgba(189, 195, 199, 1)'//abu abu
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
   var ctx = document.getElementById("grafikStatistik");
   var myChart = new Chart(ctx, {
     type: 'line',
     data: {
       labels: ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],
       datasets: [{
         label: 'Jumlah Pengunjung Harian',
         data: [<?php echo $senin ?>,<?php echo $selasa ?>,<?php echo $rabu ?>,<?php echo $kamis ?>,<?php echo $jumat ?>,<?php echo $sabtu ?>,],
         backgroundColor: [
                         // 'rgba(255, 206, 86, 1)', //kuning
                         // 'rgba(54, 162, 235, 1)', //biru
                         // 'rgba(255, 99, 132, 1)', //pink
                         'rgba(150, 202, 89, 1)', //hijau
                         // 'rgba(153, 102, 255, 1)',//ungu
                         // 'rgba(255, 159, 64, 1)'//orange
                         ],
                         borderColor: [
                         'rgba(255, 206, 86, 0.2)',
                         // 'rgba(54, 162, 235, 0.2)',
                         // 'rgba(255,99,132,1)',
                         'rgba(75, 192, 192, 1)',
                         // 'rgba(153, 102, 255, 1)',
                         // 'rgba(255, 159, 64, 1)'
                         ],
                         borderWidth: 1
                       }]
                     },
                     options: {
                       scales: {
                         yAxes: [{
                           ticks: {
                             beginAtZero: true
                           }
                         }]
                       }
                     }
                   });
                 
</script>