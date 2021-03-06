  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Riwayat Pendaftaran
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
        <div class="alert alert-danger"><strong>Error! </strong> <?=$data;?></div>
        <?php } ?>
        <div class=" row">
          <div class=" col-lg-12  "> 
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pendaftaran Surat Pindah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center>No</center></th>
                          <th><center>Nomor Registrasi</center></th>
                          <th><center>NIK</center></th>
                          <th><center>Nama Lengkap</center></th>
                          <th><center>Alamat Asal</center></th>
                          <th><center>Tujuan</center></th>
                          <th><center>Tanggal Daftar</center></th>
                          <th><center>Tanggal Jadi</center></th>
                          <th><center>Status Dokumen</center></th>
                          <th><center>Detail</center></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach ($pem as $value): $no++; ?>
                      <tr>   
                        <td><center><?php echo $no; ?></center></td>
                        <td ><center><?php echo $value->no_registrasi; ?></center></td>
                        <td ><center><?php echo $value->nik; ?></center></td>
                        <td colspan=""><center><?php echo $value->nama_lengkap; ?></center></td>
                        <td colspan=""><?php echo $value->alamat; ?>, RT <?php echo $value->rt; ?>/RW <?php echo $value->rw; ?>, <?php echo $value->nama_desakelurahan; ?>, <?php echo $value->nama_kecamatan; ?></td>
                        <td colspan=""> <?php echo $value->data_tujuan; ?></td>
                        <td colspan=""><?php echo $value->tgl_daftar; ?></td>
                        <td colspan=""> <?php echo $value->tgl_jadi; ?></td>
                        <td colspan=""> <?php echo $value->status_unggah; ?></td>
                        <td colspan=""><center><a href="<?php echo base_url('PendafPindahC/detailsyaratpindah/'.$value->id_pendaftaran); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
                      </tr>
                      <?php  endforeach; ?>

                    </tbody>
                  </table>
                </div>
          </div> 
        </div>
      </div>
        <div class=" row">
          <div class=" col-lg-12  "> 
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pendaftaran Surat Pindah Datang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center>No</center></th>
                          <th><center>Nomor Registrasi</center></th>
                          <th><center>NIK</center></th>
                          <th><center>Nama Lengkap</center></th>
                          <th><center>Asal</center></th>
                          <th><center>Alamat Tujuan</center></th>
                          <th><center>Tanggal Daftar</center></th>
                          <th><center>Tanggal Jadi</center></th>
                          <th><center>Status Dokumen</center></th>                          
                          <th><center>Detail</center></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach ($pen as $value): $no++; ?>
                      <tr>   
                        <td><center><?php echo $no; ?></center></td>
                        <td ><center><?php echo $value->no_registrasi; ?></center></td>
                        <td ><center><?php echo $value->nik; ?></center></td>
                        <td colspan=""><center><?php echo $value->nama_lengkap; ?></center></td>
                        <td colspan=""><?php echo $value->data_asal; ?></td>
                        <td colspan=""><?php echo $value->alamat; ?>, RT <?php echo $value->rt; ?>/RW <?php echo $value->rw; ?>, <?php echo $value->nama_desakelurahan; ?>, <?php echo $value->nama_kecamatan; ?></td>
                        <td colspan=""><?php echo $value->tgl_daftar; ?></td>
                        <td colspan=""> <?php echo $value->tgl_jadi; ?></td>
                        <td colspan=""> <?php echo $value->status_unggah; ?></td>
                        <td colspan=""><center><a href="<?php echo base_url('PendafPindahC/detailsyaratpindahd/'.$value->id_pendaftaran); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
                      </tr>
                      <?php  endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </center>
            </section>
          </div> 
        </div>
    </section>
</section>
