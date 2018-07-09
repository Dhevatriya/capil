  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Kecamatan Kabupaten Karanganyar
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
        <button type="button" style="background-color: #3C8DBC; color: #fff; padding-right: 15px" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah"><i class="icon-file-plus"></i>&nbsp Tambah Kecamatan</button>
        <br>
        <br>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kecamatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Kecamatan</center></th>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                    <tbody>
                      <?php $no=0; foreach ($kec as $value): $no++; ?>
                      <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?php echo $value->id_kecamatan ;?>">
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                       <td ><center><?php echo $value->nama_kecamatan; ?></center></td> 
                      <td colspan=""><center>
                        <a data-toggle="modal" data-target="#myModalEdit<?=$value->id_kecamatan; ?>"><button type="submit" class="btn btn-info btn-xs tooltips" data-popup="tooltip" data-original-title="Ubah Data" data-placement="top"><span class="icon-pencil5"></span></button></a>
                        <a href="<?php echo site_url('AdminC/daftardesakelurahan/'.$value->id_kecamatan); ?>" class="btn btn-success btn-xs tooltips" data-popup="tooltip" data-original-title="Detail Data" data-placement="top"><i class="icon-zoomin3"></i></a>
                      </center></td>
                      </tr>
                      <?php  endforeach; ?>
                    </tbody>
              </table>
                </div>
              </div>
        </section>
      </div>
                <div class="modal fade" id="modal-tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Kecamatan</h4>
                    </div>
                    <div class="modal-body">
                <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>AdminC/tambahKecamatan">
                <div>
                <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?php echo $value->id_kecamatan; ?>">
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Kecamatan<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="nama_kecamatan" name="nama_kecamatan" type="text" placeholder="Masukkan Nama Kecamatan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" />
                              </div>
                          </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Batal</button>
                         <button class="btn btn-info" type="submit"> Tambah</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php $no=0; foreach ($kec as $value): $no++; ?>
 <div class="modal fade" id="myModalEdit<?=$value->id_kecamatan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ubah Kecamatan</h4>
            </div>
            <div class="modal-body">
        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/editKecamatanProses">
          <div>
            <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?php echo $value->id_kecamatan; ?>">
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Kecamatan<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="nama_kecamatan" name="nama_kecamatan" type="text" placeholder="Masukkan Kecamatan" value="<?php echo $value->nama_kecamatan ;?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                              </div>
                          </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> Batal</button>
                        <button class="btn btn-info" type="submit"> Simpan</button>
                      </div>
          </div>
        </form>
              </div>
          </div>
        </div>
    </div>
    <?php  endforeach; ?>