<section id="main-content">
<body>
    <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Edit Data Petugas
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
        <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
      <?php } ?>
        <a data-toggle="modal" href="#myModalreset"><button type="submit" class="btn btn-danger"><span class="icon_document_alt"></span> &nbsp; Ubah Kata Sandi </button></a>
        <br>
        <br>
<div class="box box-primary">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Petugas</h3>
            </div>
       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/editPetugasProses">
        <div>
            <input type="hidden" name="id_petugas" id="id_petugas" value="<?php echo $get_petugas['id_petugas']; ?>">
              <section class="panel">
                  <div class="panel-body">
                  <div class="form">
                <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Petugas<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="nama_petugas" name="nama_petugas" type="text" placeholder="Masukkan Nama Petugas" value="<?php echo $get_petugas['nama_petugas'] ;?>" readonly/>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat Petugas<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('alamat_petugas')!='') echo $id2; ?>">
                                  <input class="form-control" id="alamat_petugas" name="alamat_petugas" type="text" placeholder="Masukkan Alamat Petugas" value="<?php if($dataE=='y'){ echo $alamat_petugas;} else {echo $get_petugas['alamat_petugas'] ;} ?>"></input><?php echo form_error('alamat_petugas');?>
                              </div>
                          </div>    
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">No Hp Petugas<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('no_hp_petugas')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_hp_petugas" type="text" name="no_hp_petugas" placeholder="Masukkan No Hp Petugas" value="<?php if($dataE=='y'){ echo $no_hp_petugas;} else {echo $get_petugas['no_hp_petugas'] ;} ?>"/><?php echo form_error('no_hp_petugas');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Pengguna<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('username')!='') echo $id2; ?>">
                                  <input class="form-control " id="username" type="text" name="username" placeholder="Masukkan Nama Pengguna" value="<?php if($dataE=='y'){ echo $username;} else {echo $get_petugas['username'];} ?>"/><?php echo form_error('username');?>
                              </div>
                          </div>
                          <?php $this->session->unset_userdata('petEdit');?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Peran<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="peran" name="peran" type="text" value="<?php echo $get_petugas['peran'] ;?>" readonly/>
                              </div>
                            </div> 
                  <center>
                      <div class="box-footer">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo base_url() ?>AdminC/daftarPetugas"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                      </div>
                  </center></div>
              </form>
            </center>
          </div>
        </div>
      </section>
    </form>
  </section>
  <div class="modal fade" id="myModalreset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ubah Kata Sandi</h4>
            </div>
            <div class="modal-body">
              <form class="form-validate form-horizontal" id="form_reset" method="POST" action="<?=base_url();?>AdminC/resetpass/">
               <input class="hidden" id="id_petugas" name="id_petugas" type="number" value="<?php echo $get_petugas['id_petugas'] ;?>" readonly/>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Kata Sandi Baru<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="password" name="password" placeholder="Masukkan Kata Sandi Baru" type="password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Ulang Kata Sandi Baru<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="repassword" name="repassword" placeholder="Masukkan Kembali Kata Sandi Baru" type="password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                      </div>
                  </div>
                  <center><div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" onclick="Anda yakin ingin merubah password?" type="submit">Simpan</button>
                          <a href="<?php echo site_url('AdminC/editPetugas/'.$id_pet) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                      </div>
                  </center>
                </form>
              </div>
          </div>
        </div>
    </div>
</div>
</body>
