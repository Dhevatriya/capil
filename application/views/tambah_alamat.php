<section id="main-content">
<html>
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
<?php foreach ($pem as $value); ?>

              <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafAkteC/inputpendaftaranakte/'.$value->id_pendaftaran);?>">
        <input type="hidden" name="id_pendaftaran" id="id_pendaftaran" value="<?php echo $value->id_pendaftaran; ?>">
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
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat <span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('alamat')!='') echo $id2; ?>">
                                  <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text" value="<?php echo $alamat; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('alamat'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RT <span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('rt')!='') echo $id2; ?>">
                                  <input class="form-control" id="rt" name="rt" placeholder="Masukkan RT" type="text" value="<?php echo $rt; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('rt'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RW <span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('rw')!='') echo $id2; ?>">
                                  <input class="form-control" id="rw" name="rw" placeholder="Masukkan RW" type="text" value="<?php echo $rw; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('rw'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Desa<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('desa')!='') echo $id2; ?>">
                                  <input class="form-control" id="desa" name="desa" placeholder="Masukkan Desa" type="text" value="<?php echo $desa; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('desa'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kelurahan <span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kelurahan')!='') echo $id2; ?>">
                                  <input class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan Kelurahan" type="text" value="<?php echo $kelurahan; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('kelurahan'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kecamatan<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kecamatan')!='') echo $id2; ?>">
                                  <input class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukkan Kecamatan" type="text" value="<?php echo $kecamatan; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('kecamatan'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kabupaten<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kabupaten')!='') echo $id2; ?>">
                                  <input class="form-control" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten" type="text" value="<?php echo $kabupaten; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('kabupaten'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kode Pos<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kode_pos')!='') echo $id2; ?>">
                                  <input class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan Kode Pos" type="text" value="<?php echo $kode_pos; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('kode_pos'); ?>
                              </div>
                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Provinsi<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('provinsi')!='') echo $id2; ?>">
                                  <input class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan Provinsi" type="text" value="<?php echo $provinsi; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/><?php echo form_error('provinsi'); ?>
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
</html>
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
