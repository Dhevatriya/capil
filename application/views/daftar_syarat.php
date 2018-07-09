  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Syarat Pendaftaran 
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
        <button type="button" style="background-color: #3C8DBC; color: #fff; padding-right: 15px" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah"><i class="icon-file-plus"></i>&nbsp Tambah Syarat</button>
        <br>
        <br>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Syarat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Syarat</center></th>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                    <tbody>
                      <?php $no=0; foreach ($syrt as $value): $no++; ?>
                      <input type="hidden" name="id_syarat" id="id_syarat" value="<?php echo $value->id_syarat ;?>">
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td ><center><?php echo $value->judul_syarat; ?></center></td> 
                      <td><center>
                        <a data-toggle="modal" data-target="#myModalEdit<?=$value->id_syarat; ?>"><button type="submit" class="btn btn-info btn-xs tooltips" data-popup="tooltip" data-original-title="Ubah Data" data-placement="top"><span class="icon-pencil5"></span></button></a>
                        <a class="btn btn-danger btn-xs tooltips"  data-popup="tooltip" data-original-title="Hapus Data" data-placement="top" href="<?php echo site_url('AdminC/hapusSyarat/'.$value->id_syarat); ?>" ><i class="fa fa-times" onclick="return confirm('Apakah anda yakin ingin menghapus syarat <?php echo getsyaratpen($value->id_syarat);?> ?')"></i></a>
                          
                      </td>
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
                <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>AdminC/tambahSyarat">
                <div>
                <input type="hidden" name="id_syarat" id="id_syarat" value="<?php echo $value->id_syarat; ?>">
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Judul Syarat<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="judul_syarat" name="judul_syarat" type="text" placeholder="Masukkan Judul Syarat" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                              </div>
                          </div>
<!--                           <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Status Pendaftaran<span class="required">*</span></label>
                            <div class="col-lg-8">
                            <select class="form-control m-bot15" name="id_status_pendaftaranFK" id="id_status_pendaftaranFK" required>
                            <option value="" disabled selected><i>---Pilih Status Pendaftaran---</i></option>
                            <?php foreach ($statuspendaf as $data2) {  ?>
                              <option value="<?php echo $data2->id_status_pendaftaran;?>"><?php echo $data2->nama_status_pendaftaran;?></option>
                            <?php  } ?>
                            </select>
                            </div>
                          </div> -->
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

          <?php $no=0; foreach ($syrt as $value): $no++; ?>
 <div class="modal fade" id="myModalEdit<?=$value->id_syarat; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ubah Syarat</h4>
            </div>
            <div class="modal-body">
        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/editSyaratPendaftaranProses">
          <div>
            <input type="hidden" name="id_syarat" id="id_syarat" value="<?php echo $value->id_syarat; ?>">
            <!-- <input type="hidden" name="id_status_pendaftaranFK" id="id_status_pendaftaranFK" value="<?php echo $value->id_status_pendaftaranFK; ?>"> -->
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Judul Syarat<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="judul_syarat" name="judul_syarat" type="text" placeholder="Masukkan Judul Syarat" value="<?php echo $value->judul_syarat ;?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
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