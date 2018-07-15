  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Laporan Pendaftaran
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
              <?php $no=0; foreach ($perharitp as $value): $no++; ?>
              <h3 class="box-title"><a href="<?php echo base_url('PendafAkteC/cetaklapdetailakteharitp/'.$value['tgl_daftar']); ?>" ><button type="submit" class="btn btn-danger btn-sm"><span class="fa fa-print"></span></button></a>Detail Laporan Tanggal <?php echo $value['tgl_daftar'] ?></h3>
            <?php endforeach ?>
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
                          <th><center>Jenis Kelamin</center></th>
                          <th><center>Alamat</center></th>
                          <th><center>Tanggal Daftar</center></th>
                          <th><center>Tanggal Jadi</center></th>
                </tr>
                </thead>
                    <tbody>
                      <?php $no=0; foreach ($perhariantp as $value): $no++; ?>
                      <!-- <input type="hidden" name="id_pendaftaran" id="id_pendaftaran" value="<?php echo $value->id_pendaftaran ;?>"> -->
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                        <td ><center><?php echo $value->no_registrasi; ?></center></td>
                        <td ><center><?php echo $value->nik; ?></center></td>
                        <td colspan=""><center><?php echo $value->nama_lengkap; ?></center></td>
                        <td ><center><?php echo $value->jenis_kelamin; ?></center></td>
                        <td colspan=""><?php echo $value->alamat; ?>, RT <?php echo $value->rt; ?>/RW <?php echo $value->rw; ?>, <?php echo $value->nama_desakelurahan; ?>, <?php echo $value->nama_kecamatan; ?></td>
                        <td colspan=""><?php echo $value->tgl_daftar; ?></td>
                        <td colspan=""> <?php echo $value->tgl_jadi; ?></td>
                      </tr>
                      <?php  endforeach; ?>
                    </tbody>
              </table>
                </div>
              </div>
        </section>
      </div>
        </form>
              </div>
          </div>
        </div>
    </div>