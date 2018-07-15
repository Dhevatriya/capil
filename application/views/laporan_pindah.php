<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pendaftaran Pindah
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#Lapap" data-toggle="tab">Laporan Pendaftaran Jumlah Anggota Pindah</a></li>
              <li class="active"><a href="#Lapsp" data-toggle="tab">Laporan Pendaftaran Surat Pindah</a></li>
              <li class="pull-left header"><i class="fa fa-th"></i> Laporan Pendaftaran</li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
    <div class="tab-pane active" id="Lapsp">
     <div class=" row">
      <div class="col-lg-6 ">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahhari/" ><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Surat Pindah Perhari</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tanggal </center></th>
                          <th><center> Total </center></th>
                          <th><center> Detail </center></th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0; foreach ($perharipindah as $value): $no++; ?>
                      <tr>   
                          <td><center><?php echo $no ?></center></td>
                          <td><center><?php echo $value->kategori_hari; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                          <td><center> <a href="<?php echo base_url('PendafPindahC/detaillaporanpendaftaransp/'.$value->kategori_hari); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahbulan/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Surat Pindah Perbulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                                 <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Bulan </center></th>
                          <th><center> Total </center></th>
                          <th><center> Detail </center></th>
                          <!-- <th></th> -->
                          <!-- <th><center>Keluar</center></th> -->
                        </tr>
                    </thead>
                    <tbody id="bulantahun"> 
                     <?php $no=0; foreach ($perbulanpindah as $value): $no++; ?>
                      <tr>   
                          <td><center>  <?php echo $no ?></center></td>
                          <td><center><?php echo getnamabulan($value->kategori_bulan) ?>  <?php echo $value->kategori_tahun; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                          <td><center> <a href="<?php echo base_url('PendafPindahC/detaillaporanpendaftaranspb/'.$value->kategori_bulan); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahtahun/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Surat Pindah Pertahun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tahun </center></th>
                          <th><center> Total </center></th>
                          <th><center> Detail </center></th>
                          <!-- <th></th> -->
                          <!-- <th><center>Keluar</center></th> -->
                        </tr>
                    </thead>
                    <tbody> 
                     <?php $no=0; foreach ($pertahunpindah as $value): $no++; ?>

                      <tr>   
                          <td><center>  <?php echo $no ?></center></td>
                          <td><center><?php echo $value->kategori_tahun; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                          <td><center> <a href="<?php echo base_url('PendafPindahC/detaillaporanpendaftaranspt/'.$value->kategori_tahun); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
                          <!-- <td colspan="2"><?php echo $no ?></td>/ -->
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahdatanghari/" ><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Surat Pindah Datang Perhari</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example5" class="table table-bordered table-striped">
              <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tanggal </center></th>
                          <th><center> Total </center></th>
                          <th><center> Detail </center></th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0; foreach ($perhari as $value): $no++; ?>
                      <tr>   
                          <td><center><?php echo $no ?></center></td>
                          <td><center><?php echo $value->kategori_hari; ?></center></td>
                          <td><center><?php echo $value->jum; ?></center></td>
                          <td><center> <a href="<?php echo base_url('PendafPindahC/detaillaporanpendaftaranspd/'.$value->kategori_hari); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahdatangbulan/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Surat Pindah Datang Perbulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example6" class="table table-bordered table-striped">
                                 <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Bulan </center></th>
                          <th><center> Total </center></th>
                          <th><center> Detail </center></th>
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
                          <td><center> <a href="<?php echo base_url('PendafPindahC/detaillaporanpendaftaranspdb/'.$value->kategori_bulan); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahdatangtahun/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Surat Pindah Datang Pertahun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example7" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tahun </center></th>
                          <th><center> Total </center></th>
                          <th><center> Detail </center></th>
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
                          <td><center> <a href="<?php echo base_url('PendafPindahC/detaillaporanpendaftaranspdt/'.$value->kategori_tahun); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
                          <!-- <td colspan="2"><?php echo $no ?></td>/ -->
                      </tr>
                      
                      <?php endforeach; ?>

                    </tbody>
              </table>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div class="tab-pane" id="Lapap">
     <div class=" row">
      <div class="col-lg-6 ">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahharia/" ><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Jumlah Anggota Pindah Perhari</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example8" class="table table-bordered table-striped">
              <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tanggal </center></th>
                          <th><center> Total </center></th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0; foreach ($perharipindaha as $value): $no++; ?>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahbulana/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Jumlah Anggota Pindah Perbulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example9" class="table table-bordered table-striped">
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
                     <?php $no=0; foreach ($perbulanpindaha as $value): $no++; ?>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahtahuna/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Jumlah Anggota Pindah Pertahun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example10" class="table table-bordered table-striped">
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
                     <?php $no=0; foreach ($pertahunpindaha as $value): $no++; ?>

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
                 <div class="col-lg-6 ">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahdatangharia/" ><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Jumlah Anggota Pindah Datang Perhari</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example11" class="table table-bordered table-striped">
              <thead>
                        <tr>
                          <th><center> No </center></th>
                          <th><center> Tanggal </center></th>
                          <th><center> Total </center></th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $no=0; foreach ($perharia as $value): $no++; ?>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahdatangbulana/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Jumlah Anggota Pindah Datang Perbulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example12" class="table table-bordered table-striped">
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
                     <?php $no=0; foreach ($perbulana as $value): $no++; ?>
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
              <h3 class="box-title"><a href="<?php echo base_url(); ?>PendafPindahC/cetaklaporanpindahdatangtahuna/"><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Laporan Pendaftaran Jumlah Anggota Pindah Datang Pertahun</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example13" class="table table-bordered table-striped">
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
                     <?php $no=0; foreach ($pertahuna as $value): $no++; ?>

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
          </div>
        </div>
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