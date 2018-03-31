<body>
        <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><b>Form Tanda Terima Berkas Akte</b></li>
          </ol>
        </div>
      </div>

        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <br>
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
        <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
        <br>
        <?php } ?>
<!-- <?php foreach ($pem as $value); ?> -->

              <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafAkteC/inputpendaftaranakte/')?>">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Form Tanda Terima Berkas Pendaftaran Akte</b>
                  </header>
                  <div class="panel-body">
                      <div class="form"> 
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Induk Kependudukan<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control " id="nik" name="nik"  type="text" value="<?php echo $nik;?>" readonly />
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Lengkap<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control " id="nama_lengkap" name="nama_lengkap"  type="text" value="<?php echo $nama_lengkap; ?>" readonly />
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tanggal Jadi <span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('tgl_jadi')!='') echo $id2; ?>">
                                  <input class="form-control" id="tgl_jadi" name="tgl_jadi" placeholder="Masukkan Tanggal Jadi" type="date" value="<?php echo $tgl_jadi; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('tgl_jadi'); ?>
                              </div>
                          </div>
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                                  <a href="<?php echo site_url('PendafAkteC/caridata/'.$nik) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
          </div>
              </section>
          </div>
        </form>

   <!-- <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>TemplateC/search"> -->
</section>
</body>
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