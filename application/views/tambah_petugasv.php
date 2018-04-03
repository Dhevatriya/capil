<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!-- <h3 class="page-header"><i class="fa fa-files-o"></i>DataPetugas</h3> -->
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('AdminC//'); ?>"><i class="fa fa-user-md"></i> Data Petugas</a></li>
            <li><i class="icon-file-plus"></i>Tambah Petugas</li>
          </ol>
        </div>
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
        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('AdminC/inputpetugas');?>">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      Form Tambah Petugas
                  </header>
                  <div class="panel-body">
                      <div class="form">
                        <!--  <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;"> ID <span class="required">*</span></label>
                            <div class="col-lg-8">
                                <input class="form-control " id="id_petugas" name="id_petugas" type="number" value="<?php echo getId('petugas','id_petugas'); ?>" readonly/>
                            </div>
                          </div>  -->
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
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Username<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('username')!='') echo $id2; ?>">
                                  <input class="form-control " id="username" type="text" name="username" placeholder="Masukkan Username" value="<?php echo $username; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('username');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Password<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('password')!='') echo $id2; ?>">
                                  <input class="form-control " id="password" type="password" name="password" placeholder="Masukkan Password" value="<?php echo $password; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('password');?>
                              </div>
                          </div>
                         <!--  <div class="form-group ">
                              <label for="cname" class="control-label col-lg-2">Peran<span class="required">*</span></label>
                              <div class="col-lg-10">
                                  <input class="form-control" id="peran" name="peran" type="text" value="analis>" readonly/>
                              </div>
                            </div>  -->
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                                  <a href="<?php echo site_url('AdminC/') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
          </div>
        </form>
      </div>
    </section>
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
