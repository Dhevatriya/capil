<body>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><b>Laporan Pendaftaran Kartu Keluarga </b></li>
          </ol>
        </div>
      </div>
      <!-- <br> -->
        <div class="row">

          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading" >
                <a href="<?php echo site_url('PendafKKC/cetaklaporankkhari/'); ?>" ><button type="submit" class="btn btn-danger btn-sm"><span class="icon_printer-alt"></span></button></a>
                <b>Jumlah Pendaftaran KK Perhari</b>
              </header>
              <center>
                <div class="panel-body" style="text-align:center;">
                  <table class="table table-bordered datatable-columns" >
                    <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tanggal </center></th>
                          <th><center> Total </center></th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0; foreach ($pendafkkhari as $value): $no++; ?>

                      <tr>   
                          <td colspan="1"></td>
                          <td><center><?php echo $value->tanggal; ?></center></td>
                          <td><center><?php echo $value->total; ?></center></td>
                          <td colspan="2"><?php echo $no ?></td>
                      </tr>
                      
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </center>
            </section>
          </div>

          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading" >
                <a href="<?php echo site_url('PendafKKC/cetaklaporankkbulan/'); ?>" ><button type="submit" class="btn btn-danger btn-sm"><span class="icon_printer-alt"></span></button></a>
                <b>Jumlah Pendaftaran KK Perbulan</b>
              </header>
              <center>
                <div class="panel-body" style="text-align:center;">
                  <table class="table table-bordered datatable-columns" >
                    <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Bulan </center></th>
                          <th><center> Total </center></th>
                          <th></th>
                          <!-- <th><center>Keluar</center></th> -->
                        </tr>
                    </thead>
                    <tbody> 
                     <?php $no=0; foreach ($pendafkkbulan as $value): $no++; ?>

                      <tr>   
                          <td colspan="1"></td>
                          <td><center>Bulan ke <?php echo $value->bulan; ?> Tahun <?php echo $value->tahun; ?></center></td>
                          <td><center><?php echo $value->total; ?></center></td>
                          <td colspan="2"><?php echo $no ?></td>
                      </tr>
                      
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </center>
            </section>
          </div>

          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading" >
                <a href="<?php echo site_url('PendafKKC/cetaklaporankktahun/'); ?>" ><button type="submit" class="btn btn-danger btn-sm"><span class="icon_printer-alt"></span></button></a>
                <b>Jumlah Pendaftaran KK Pertahun</b>
              </header>
              <center>
                <div class="panel-body" style="text-align:center;">
                  <table class="table table-bordered datatable-columns" >
                    <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tahun </center></th>
                          <th><center> Total </center></th>
                          <th></th>
                          <!-- <th><center>Keluar</center></th> -->
                        </tr>
                    </thead>
                    <tbody> 
                     <?php $no=0; foreach ($pendafkktahun as $value): $no++; ?>

                      <tr>   
                          <td colspan="1"></td>
                          <td><center><?php echo $value->tahun; ?></center></td>
                          <td><center><?php echo $value->total; ?></center></td>
                          <td colspan="2"><?php echo $no ?></td>
                      </tr>
                      
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </center>
            </section>
          </div>
  </section>
</section>
  </div>
</section>
</body>
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

  

