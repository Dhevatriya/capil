
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
      $totalStatusPendaf = $conn->query("select * from status_pendaftaran where status_pendaftaran.Deleted='0'");
      $totalPendaftaran = $conn->query("select * from pendaftaran where pendaftaran.Deleted='0'");
      $totalDiunggah = $conn->query("select * from detail_syarat, pendaftaran where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK and status_unggah='Sudah Diunggah' and pendaftaran.Deleted='0' and detail_syarat.Deleted='0'");

      //jumlah pendaftaran akte berdasarkan jenis kelamin
      $laki=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_kelamin='Laki-laki' and pendaftaran.Deleted='0' ");
      $perem=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_kelamin='Perempuan' and pendaftaran.Deleted='0'");

      //jumlah pendaftaran akte berdasarkan jenis akte
      $umum=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_akte='Umum'  and pendaftaran.Deleted='0'");
      $tp=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran WHERE id_status_pendafFK=2 and jenis_akte='Terlambat Pendaftaran'  and pendaftaran.Deleted='0'");      

      //jumlah pendaftaran kk berdasarkan kecamatan
      $kkkec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=1  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=2  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=3  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=4  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=5  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=6  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=7  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=8  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=9  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=10  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=11  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=12  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=13  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=14  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=15  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=16  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $kkkec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=1 and id_kecamatanFK=17  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");

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

      //jumlah pendaftaran akte berdasarkan kecamatan
      $pindahkec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=1  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=2  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=3  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=4  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=5  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=6  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=7  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=8  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=9  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=10  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=11  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=12  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=13  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=14  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=15  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=16  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahkec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=3 and id_kecamatanFK=17  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");

      //jumlah pendaftaran pindah datang berdasarkan kecamatan
      $pindahdkec1=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=1  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec2=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=2  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec3=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=3  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec4=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=4  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec5=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=5  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec6=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=6  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec7=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=7  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec8=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=8  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec9=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=9  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec10=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=10  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec11=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=11  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec12=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=12  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec13=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=13  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec14=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=14  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec15=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=15  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec16=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=16  and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");
      $pindahdkec17=$conn->query("SELECT DISTINCT(id_pendaftaran) FROM pendaftaran, desakelurahan WHERE pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and id_status_pendafFK=4 and id_kecamatanFK=17 and pendaftaran.Deleted='0' and desakelurahan.Deleted='0'");

      $totalPendaftaran = mysqli_num_rows($totalPendaftaran);

      //jumlah pedaftaran akte berdasarkan jenis kelamin
      $laki = mysqli_num_rows($laki);
      $perem = mysqli_num_rows($perem);
      
      //jumlah pedaftaran akte berdasarkan jenis akte
      $umum = mysqli_num_rows($umum);
      $tp = mysqli_num_rows($tp);

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
              <h3 class="box-title">Jumlah Pendaftaran Surat Pindah Berdasarkan Kecamatan</h3>
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
              <h3 class="box-title">Jumlah Pendaftaran Surat Pindah Datang Berdasarkan Kecamatan</h3>
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
   var ctx = document.getElementById("pieChartAkteJK");
   var myChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ["Laki-laki","Perempuan"],
       datasets: [{
         label: 'Jumlah Pendaftaran Akte Berdasarkan Jenis Kelamin',
         data: [<?php echo $laki ?>,<?php echo $perem ?>],
         backgroundColor: [
         'rgba(231, 76, 60, 1)', //merah
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
         label: 'Jumlah Pendaftaran Surat Pindah Berdasarkan Kecamatan',
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
         label: 'Jumlah Pendaftaran Surat Pindah Datang Berdasarkan Kecamatan',
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