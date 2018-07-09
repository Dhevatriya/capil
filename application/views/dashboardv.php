
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
      $totalStatusPendaf = $conn->query("select * from status_pendaftaran");
      $totalPendaftaran = $conn->query("select * from pendaftaran");
      $totalDiunggah = $conn->query("select * from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and status_unggah='Sudah Diunggah'");

      //PRESENTASI SYARAT YANG BELUM  DIUNGGAH
      // $statusp1 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and status_unggah='Belum Diunggah'");
      // $statusp2 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and id_status_pendafFK='2' and status_unggah='Belum Diunggah'");
      // $statusp3 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and id_status_pendafFK='3' and status_unggah='Belum Diunggah'");
      // $statusp4 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and id_status_pendafFK='4' and status_unggah='Belum Diunggah'");

      //PRESENTASI SYARAT YANG SUDAH DIUNGGAH
      // $status1 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and status_unggah='Sudah Diunggah'");
      // $status2 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and id_status_pendafFK='2' and status_unggah='Sudah Diunggah'");
      // $status3 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and id_status_pendafFK='3' and status_unggah='Sudah Diunggah'");
      // $status4 = $conn->query("select DISTINCT(id_pendaftaranFK) from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and id_status_pendafFK='4' and status_unggah='Sudah Diunggah'");


      // $senin = $conn->query("SELECT DISTINCT(DAYNAME(CreateDtm)) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Monday' AND CreateDtm BETWEEN date_sub(now(), INTERVAL 1 WEEK) AND now()");
      // $selasa = $conn->query("SELECT DISTINCT(DAYNAME(CreateDtm)) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Tuesday' AND CreateDtm BETWEEN date_sub(now(), INTERVAL 1 WEEK) AND now()");
      // $rabu = $conn->query("SELECT DISTINCT(DAYNAME(CreateDtm)) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Wednesday' AND CreateDtm BETWEEN date_sub(now(), INTERVAL 1 WEEK) AND now()");
      // $kamis = $conn->query("SELECT DISTINCT(DAYNAME(CreateDtm)) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Thursday' AND CreateDtm BETWEEN date_sub(now(), INTERVAL 1 WEEK) AND now()");
      // $jumat = $conn->query("SELECT DISTINCT(DAYNAME(CreateDtm)) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Friday' AND CreateDtm BETWEEN date_sub(now(), INTERVAL 1 WEEK) AND now()");

      //jumlah pendaftaran berdasarkan hari
      // $sen=$conn->query("SELECT DAYNAME(CreateDtm) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Monday'");
      // $sel=$conn->query("SELECT DAYNAME(CreateDtm) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Tuesday'");
      // $rab=$conn->query("SELECT DAYNAME(CreateDtm) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Wednesday'");
      // $kam=$conn->query("SELECT DAYNAME(CreateDtm) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Thursday'");
      // $jum=$conn->query("SELECT DAYNAME(CreateDtm) FROM pendaftaran WHERE DAYNAME(CreateDtm)='Friday'");

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

      //jumlah pendaftaran akte berdasarkan kecamatan
      $aktekec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=1");
      $aktekec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=2");
      $aktekec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=3");
      $aktekec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=4");
      $aktekec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=5");
      $aktekec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=6");
      $aktekec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=7");
      $aktekec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=8");
      $aktekec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=9");
      $aktekec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=10");
      $aktekec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=11");
      $aktekec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=12");
      $aktekec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=13");
      $aktekec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=14");
      $aktekec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=15");
      $aktekec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=16");
      $aktekec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=2 and id_kecamatanFK=17");

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

      $totalPendaftaran = mysqli_num_rows($totalPendaftaran);

      // $sumstatusp1 = mysqli_num_rows($statusp1); 
      // $sumstatusp2 = mysqli_num_rows($statusp2); 
      // $sumstatusp3 = mysqli_num_rows($statusp3); 
      // $sumstatusp4 = mysqli_num_rows($statusp4); 

      // $sumstatus1 = mysqli_num_rows($status1); 
      // $sumstatus2 = mysqli_num_rows($status2); 
      // $sumstatus3 = mysqli_num_rows($status3); 
      // $sumstatus4 = mysqli_num_rows($status4); 

      // $senin = mysqli_num_rows($senin); 
      // $selasa = mysqli_num_rows($selasa); 
      // $rabu = mysqli_num_rows($rabu); 
      // $kamis = mysqli_num_rows($kamis); 
      // $jumat = mysqli_num_rows($jumat);  
         
      // $sen = mysqli_num_rows($sen); 
      // $sel = mysqli_num_rows($sel); 
      // $rab = mysqli_num_rows($rab); 
      // $kam = mysqli_num_rows($kam); 
      // $jum = mysqli_num_rows($jum); 

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
      <div class="row">
        <div class="col-lg-12">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <center>
              <h3><?php echo $totalPendaftaran ?></h3>
              <p>Total Jumlah Pendaftaran</p>
              </center>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3><?php echo $lapkk ?></h3>
            <p>Jumlah Pendaftaran KK</p>  
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>PendafKKC/laporanpendaftarankk" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><?php echo $lapakte ?></h3>
            <p>Jumlah Pendaftaran Akte</p>  
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>PendafAkteC/laporanpendaftaranakte" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
               <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?php echo $lappindah ?></h3>
            <p>Jumlah Pendaftaran Pindah</p>  
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>PendafPindahC/laporanpendaftaranpindah" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><?php echo $lappindahdatang ?></h3>
            <p>Jumlah Pendaftaran Pindah Datang</p>  
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url() ?>PendafPindahC/laporanpendaftaranpindah" class="small-box-footer">Lihat Detail<i class="fa fa-arrow-circle-right"></i></a>
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
        <div class="row">  
        <div class="col-md-12">
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendaftaran Akte Berdasarkan  Kecamatan</h3>
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