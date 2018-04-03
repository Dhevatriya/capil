<section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!-- <h3 class="page-header"><i class="fa fa-files-o"></i>Edit Data Petugas</h3> -->
          <ol class="breadcrumb">
            <li><i class="icon-pencil5"></i>Edit Data Petugas</li>
          </ol>
        </div>
      </div>

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
       <a data-toggle="modal" href="#myModalreset"><button type="submit" class="btn btn-danger"><span class="icon_document_alt"></span> &nbsp; Reset Password </button></a>
       
        <br>
        <br>
              <!-- Form validations -->              
      <div class="row">
        <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/petugaseditproses">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      Form Edit Data Petugas
                  </header>
                  <div class="panel-body">
                      <div class="form"> 
                          <!-- <input type="hidden" id="no_pendaftaran" name="no_pendaftaran" value="<?php echo getId('pendaftaran_pemeriksaan','no_pendaftaran'); ?>" readonly class="form-control" > -->
                          
                          <!-- <input type="hidden" id="id_petugas" name="id_petugas" value="3" readonly class="form-control" > -->
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-2">ID <span class="required">*</span></label>
                              <div class="col-lg-10">
                                  <input class="form-control" id="id_petugas" name="id_petugas" type="number" value="<?php echo $get_petugas['id_petugas'] ;?>" readonly/>
                              </div>
                            </div> 
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-2">Nama Petugas<span class="required">*</span></label>
                              <div class="col-lg-10">
                                  <input class="form-control" id="nama_petugas" name="nama_petugas" type="text" placeholder="Masukkan Nama Petugas" value="<?php echo $get_petugas['nama_petugas'] ;?>" readonly/>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-2">Alamat Petugas<span class="required">*</span></label>
                              <div class="col-lg-10 <?php if(form_error('alamat_petugas')!='') echo $id2; ?>">
                                  <input class="form-control" id="alamat_petugas" name="alamat_petugas" type="text" placeholder="Masukkan Alamat Petugas" value="<?php if($dataE=='y'){ echo $alamat_petugas;} else {echo $get_petugas['alamat_petugas'] ;} ?>"></input><?php echo form_error('alamat_petugas');?>
                              </div>
                          </div>    
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2">No Hp Petugas<span class="required">*</span></label>
                              <div class="col-lg-10 <?php if(form_error('no_hp_petugas')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_hp_petugas" type="text" name="no_hp_petugas" placeholder="Masukkan No Hp Petugas" value="<?php if($dataE=='y'){ echo $no_hp_petugas;} else {echo $get_petugas['no_hp_petugas'] ;} ?>"/><?php echo form_error('no_hp_petugas');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2">Username<span class="required">*</span></label>
                              <div class="col-lg-10 <?php if(form_error('username')!='') echo $id2; ?>">
                                  <input class="form-control " id="username" type="text" name="username" placeholder="Masukkan Username" value="<?php if($dataE=='y'){ echo $username;} else {echo $get_petugas['username'];} ?>"/><?php echo form_error('username');?>
                              </div>
                          </div>
                          <?php $this->session->unset_userdata('petEdit');?>
                          <!-- <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2">Password<span class="required">*</span></label>
                              <div class="col-lg-10">
                                  <input class="form-control " id="password" type="password" name="password" placeholder="Masukkan Password" value="<?php echo $get_petugas['password'] ;?>" readonly/>
                              </div>
                          </div> -->
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-2">Peran<span class="required">*</span></label>
                              <div class="col-lg-10">
                                  <input class="form-control" id="peran" name="peran" type="text" value="<?php echo $get_petugas['peran'] ;?>" readonly/>
                              </div>
                            </div> 
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="edit" type="submit">Edit</button>
                                  <a href="<?php echo site_url('AdminC') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
          </div>
              </section>
          </div>
        </form>
      </div>
    </section>
</section>
<!-- <div class="<?php echo $cls;?>" id="myModalreset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="<?php echo $ah;?>" style="display: <?php echo $display;?>;"> -->
<div class="modal fade" id="myModalreset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Reset Password</h4>
            </div>
<!-- 
            <?php 
            $data2=$this->session->flashdata('error');
            if($data2!=""){ ?>
            <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
            <?php } ?>
             -->
            <div class="modal-body">
              <form class="form-validate form-horizontal" id="form_reset" method="POST" action="<?=base_url();?>AdminC/resetpass/">
              <!-- <form class="form-validate form-horizontal" id="form_reset"> -->
               <input class="hidden" id="id_petugas" name="id_petugas" type="number" value="<?php echo $get_petugas['id_petugas'] ;?>" readonly/>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Password baru<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="password" name="password" placeholder="Masukkan Password Baru" type="password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Ulang password baru<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="repassword" name="repassword" placeholder="Masukkan Kembali Password Baru" type="password" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                      </div>
                  </div>
                  <center><div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" onclick="Anda yakin ingin merubah password?" type="submit">Simpan</button>
                          <a href="<?php echo site_url('AdminC/adminedit/'.$id_pet) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                      </div>
                  </center></div>
              </form>
            </div>
        </div>
    </div>
</div>

<div class="text-right">
  <div class="credits">
      <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">BBTKLPP Yogyakarta</a>
  </div>
</div>

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
