  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Desa/Kelurahan Kabupaten Karanganyar 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
              <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
          ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $this->session->flashdata('error'); ?>                    
          </div>
          <?php } ?>
          <?php  
          $success = $this->session->flashdata('success');
          if($success)
          {
            ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php } ?>
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


        <button type="button" style="background-color: #3C8DBC; color: #fff; padding-right: 15px" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah"><i class="icon-file-plus"></i>&nbsp Tambah Manual</button>
        <button type="button" style="background-color: #00A65A; border-color: #00A65A color: #fff; padding-right: 15px" class="btn btn-info" data-toggle="modal" data-target="#modal-default">Import Excel</button> 
       
        <br>
        <br>
        <div class="box box-primary">
            <div class="box-header with-border">
               <?php $no=0; foreach ($des as $value): $no++; ?>
              <h3 class="box-title">Daftar Desa/Kelurahan Kecamatan <?php echo $value->nama_kecamatan; ?></h3>
              <?php  endforeach; ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Desa/Kelurahan</center>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                    <tbody>
                      <?php $no=0; foreach ($desak as $value): $no++; ?>
                      <input type="hidden" name="id_desakelurahan" id="id_desakelurahan" value="<?php echo $value->id_desakelurahan ;?>">
                      <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?php echo $value->id_kecamatan; ?>">
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                       <td ><center><?php echo $value->nama_desakelurahan; ?></center></td>
<!--                         <td ><center><?php echo $value->nama_kecamatan; ?></center></td>  -->
                        <td><center>
                           <a data-toggle="modal" data-target="#myModalEdit<?=$value->id_desakelurahan; ?>"><button type="submit" class="btn btn-info btn-xs tooltips" data-popup="tooltip" data-original-title="Ubah Data" data-placement="top"><span class="icon-pencil5"></span></button></a>
                          <a class="btn btn-danger btn-xs tooltips"  data-popup="tooltip" data-original-title="Hapus Data" data-placement="top" href="<?php echo site_url('AdminC/hapusDesa/'.$value->id_desakelurahan ); ?>" ><i class="fa fa-times" onclick="return confirm('Apakah anda yakin ingin menghapus desa <?php echo getdesakel($value->id_desakelurahan);?> ?')"></i></a>
                        </td>
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
<?php $no=0; foreach ($desak as $value): $no++; ?>
 <div class="modal fade" id="myModalEdit<?=$value->id_desakelurahan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ubah Desa / Kelurahan</h4>
            </div>
            <div class="modal-body">
        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/editdesakelurahanproses">
          <div>
            <input type="hidden" name="id_desakelurahan" id="id_desakelurahan" value="<?php echo $value->id_desakelurahan; ?>">
            <input type="hidden" name="id_kecamatanFK" id="id_kecamatanFK" value="<?php echo $value->id_kecamatanFK; ?>">
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Desa/Kelurahan<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="nama_desakelurahan" name="nama_desakelurahan" type="text" placeholder="Masukkan Nama Desa/Kelurahan" value="<?php echo $value->nama_desakelurahan ;?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
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
                       <!-- /.modal -->
            <form action="<?php echo base_url() ?>importDesaKelurahanR" method="POST" enctype="multipart/form-data">
              <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title"><center>Import Desa/Kelurahan</center></h4>
                      <input type="text" name="id_kecamatanFK_import" value="<?php echo $this->uri->segment(2);?>" hidden>
                      <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?php echo $value->id_kecamatan; ?>">
                    </div>
                    <div class="modal-body">
                      <div class="callout callout-danger">
                        <h4>PERHATIAN</h4>
                          <p>Pastikan format penulisan sudah sesuai dengan contoh agar data dapat dibaca oleh sistem. Sistem hanya membaca file dalam format <b> xlsx</b></p>
                          <p>Dokumen excel bisa diunduh <a href="<?php echo base_url('berkas/desakelurahann.xlsx')?>"><b> di sini</b></a></p>
                      </div>
<!--                       <img src="<?php echo base_url('gambar/KelasMahasiswaAdmin.png')?>" style="width: 100%;height: 40%; padding-bottom: 15px;"> -->
                      <label for="importDesaKelurahanR"><b>Jika format sudah sesuai, silahkan unggah file</b></label>
                      <input name="file" type="File" id="importDesaKelurahanR" required="">
                      <p class="help-block">File maksimal 10 MB</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" class="btn btn-primary" name="simpan" value="Simpan" style="background-color: #00A65A; border-color: #00A65A;" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                      <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </form>
            <!-- modal tambah manual -->
            <div class="modal fade" id="modal-tambah">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tambah Desa/Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                <form class="form-horizontal" method="POST" action="<?php echo base_url() ?>AdminC/tambahDesaKelurahan">
                <div>
                <input type="hidden" name="id_desakelurahan" id="id_desakelurahan" value="<?php echo $value->id_desakelurahan; ?>">
                <input type="hidden" name="id_kecamatanFK" id="id_kecamatanFK" value="<?php echo $value->id_kecamatanFK; ?>">
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Desa/Kelurahan<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="nama_desakelurahan" name="nama_desakelurahan" type="text" placeholder="Masukkan Nama Desa/Kelurahan" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
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