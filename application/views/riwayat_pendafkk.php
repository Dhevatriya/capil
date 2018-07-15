  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Riwayat Pendaftaran KK
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

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pendaftaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center>No</center></th>
                         <th><center>Nomor Registrasi</center></th> 
                          <th><center>Nomor KK</center></th>
                          <th><center>NIK</center></th>
                          <th><center>Nama Kepala Keluarga</center></th>
                          <th><center>Alamat</center></th>
                          <th><center>Tanggal Daftar</center></th>
                          <th><center>Tanggal Jadi</center></th>
                          <th><center>Detail</center></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=0; foreach ($pem as $value): $no++; ?>
                      <tr>   
                        <td><center><?php echo $no; ?></center></td>
                        <td ><center><?php echo $value->no_registrasi; ?></center></td>
                        <td ><center><?php echo $value->nokk; ?></center></td>
                        <td ><center><?php echo $value->nik; ?></center></td>
                        <td colspan=""><center><?php echo $value->nama_kepala_keluarga; ?></center></td>
                        <td colspan=""><?php echo $value->alamat; ?>, RT <?php echo $value->rt; ?>/RW <?php echo $value->rw; ?>, <?php echo $value->nama_desakelurahan; ?>, <?php echo $value->nama_kecamatan; ?></td>
                        <td colspan=""><?php echo $value->tgl_daftar; ?></td>
                        <td colspan=""> <?php echo $value->tgl_jadi; ?></td>
                        <td colspan=""><center><a href="<?php echo base_url('PendafKKC/detailriwayatkk/'.$value->id_pendaftaran); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a></center></td>
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
