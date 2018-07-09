<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Tambah Data Petugas
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
              <h3 class="box-title">Tambah Petugas</h3>
            </div>

      <?php
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('eror');
        if($data2!=""){ ?>
        <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
      <?php } ?>

              <!-- Form validations -->              
      <div class="row">
        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/tambahPetugasProses">
          <div class="col-lg-12">
              <section class="panel">
                  <div class="panel-body">
                      <div class="form">
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Petugas<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('nama_petugas')!='') echo $id2; ?>">
                                <input class="form-control" id="nama_petugas" name="nama_petugas" type="text" placeholder="Masukkan Nama Petugas" value="<?php echo $nama_petugas; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nama_petugas');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat Petugas<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('alamat_petugas')!='') echo $id2; ?>">
                                  <textarea class="form-control" id="alamat_petugas" name="alamat_petugas" type="text" placeholder="Masukkan Alamat Petugas"  class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $alamat_petugas; ?></textarea>
                                  <?php echo form_error('alamat_petugas');?>
                              </div>
                          </div>    
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">No Hp Petugas<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('no_hp_petugas')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_hp_petugas" type="text" name="no_hp_petugas" placeholder="Masukkan No Hp Petugas" value="<?php echo $no_hp_petugas; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('no_hp_petugas');?>
                              </div>

                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Pengguna<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('username')!='') echo $id2; ?>">
                                  <input class="form-control " id="username" type="text" name="username" placeholder="Masukkan Nama Pengguna" value="<?php echo $username; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('username');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kata Sandi<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('password')!='') echo $id2; ?>">
                                  <input class="form-control " id="password" type="password" name="password" placeholder="Masukkan Kata Sandi" value="<?php echo $password; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('password');?>
                              </div>
                          </div>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Peran<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('peran')!='') echo $id2; ?>">
                              <select data-placeholder="Pilih Peran" name="peran" required class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="" disabled selected><i>---Pilih Peran---</i></option>
                                <?php foreach ($pern as $data2) {  ?>
                                    <option value="<?php echo $data2->id_user_role;?>" <?php if ($data2->id_user_role==$id_user_roleFK): echo "selected"?> <?php endif ?> ><?php echo $data2->peran;?></option>
                                  <?php  } ?>
                              </select>
                              <?php echo form_error('peran');?>
                            </div>
                          </div>
   
                          <center>
                              <div class="box-footer">
                                  <button class="btn btn-primary" name="simpan" type="submit">Tambah</button>
                                  <a href="<?php echo base_url() ?>AdminC/daftarPetugas"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
          </div>

        </form>
      </div>
    </section>
  </div>
</section>

  <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
  <script type="text/javascript">
    $(function(){
      $(":checkbox.cb").click(function(){
        $("#form1, #form2").hide()
        if($(this).val() == "1"){
          $("#form1").show();
        }else{
          $("#form2").show();
        }
      });
    });
  </script>
