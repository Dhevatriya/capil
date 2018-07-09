<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pendaftaran Kartu Keluarga
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class=" row">
        <div class="col-lg-6 ">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafKKC/cetaklaporankkhari/" ><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran KK Perhari</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tanggal </center></th>
                          <th><center> Total </center></th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0; foreach ($perhari as $value): $no++; ?>
                      <tr>   
                          <td><center><?php echo $no ?></center></td>
                          <td><center><?php echo $value->kategori_hari; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
              </table>
                </div>
              </div>
            </div>
                    <div class="col-lg-6 ">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafKKC/cetaklaporankkbulan/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran KK Perbulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                                 <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Bulan </center></th>
                          <th><center> Total </center></th>
                          <!-- <th></th> -->
                          <!-- <th><center>Keluar</center></th> -->
                        </tr>
                    </thead>
                    <tbody id="bulantahun"> 
                     <?php $no=0; foreach ($perbulan as $value): $no++; ?>
                      <tr>   
                          <td><center>  <?php echo $no ?></center></td>
                          <td><center><?php echo getnamabulan($value->kategori_bulan) ?>  <?php echo $value->kategori_tahun; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                          <!-- <td colspan="2"><?php echo $no ?></td> -->
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
              </table>
                </div>
              </div>
            </div>
      <div class="col-lg-6 ">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafKKC/cetaklaporankktahun/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran KK Pertahun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tahun </center></th>
                          <th><center> Total </center></th>
                          <!-- <th></th> -->
                          <!-- <th><center>Keluar</center></th> -->
                        </tr>
                    </thead>
                    <tbody> 
                     <?php $no=0; foreach ($pertahun as $value): $no++; ?>

                      <tr>   
                          <td><center>  <?php echo $no ?></center></td>
                          <td><center><?php echo $value->kategori_tahun; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                          <!-- <td colspan="2"><?php echo $no ?></td>/ -->
                      </tr>
                      
                      <?php endforeach; ?>

                    </tbody>
              </table>
                </div>
              </div>
            </div>
      <!-- <br> -->
          </div>
  </section>
</section>
</body>

  <script> 
    function getbulan(){
      var pilih_tahun = $("#pilih_tahun").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url(); ?>PendafAkteC/getbulan",
        data: "pilih_tahun="+pilih_tahun,
        success: function(msg){
          $('#bulantahun').html(msg);
        }
      });
    };
  </script>