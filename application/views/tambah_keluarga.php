
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
            <li><b>Pendaftaran Data Penduduk</b></li>
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

            <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/inputdatakeluarga/');?>">
            <!-- <input type="hidden" name="noKK" id="noKK" value="<?php echo $noKK; ?>"> -->
              <section class="panel">
                  <header class="panel-heading">
                      <b>Tambah Data Penduduk</b>
                  </header>
                  <div class="panel-body">
                      <div class="form">
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Kepala Keluarga<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('nama_kepala_keluarga')!='') echo $id2; ?>">
                                <input class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" type="text" placeholder="Masukkan Nama Kepala Keluarga" value="<?php echo $nama_kepala_keluarga; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nama_kepala_keluarga');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('alamat')!='') echo $id2; ?>">
                                  <input class="form-control " id="alamat" type="text" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $alamat; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('alamat');?>
                              </div>

                          </div>   
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RT<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('rt')!='') echo $id2; ?>">
                                  <input class="form-control " id="rt" type="text" name="rt" placeholder="Masukkan RT" value="<?php echo $rt; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('rt');?>
                              </div>

                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RW<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('rw')!='') echo $id2; ?>">
                                  <input class="form-control " id="rw" type="text" name="rw" placeholder="Masukkan RW" value="<?php echo $rw; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('rw');?>
                              </div>

                          </div>
                          <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Desa / Kelurahan<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('nama_desakelurahan')!='') echo $id2; ?>">
                                <select data-placeholder="Pilih Desa/Kelurahan" name="nama_desakelurahan" id ="nama_desakelurahan" required class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="" disabled selected><i>---Pilih Desa/Kelurahan---</i></option>

                                <?php foreach ($des as $data2) {  ?>
                                    <option value="<?php echo $data2->id_desakelurahan;?>" <?php if ($data2->id_desakelurahan==$idkecamatan_FK): echo "selected"?> <?php endif ?> ><?php echo $data2->nama_desakelurahan;?></option>
                                  <?php  } ?>
                              </select>
                                   <?php echo form_error('nama_desakelurahan');?>
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kecamatan<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('nama_kecamatan')!='') echo $id2; ?>">
                              <select data-placeholder="Pilih Kecamatan" name="nama_kecamatan" id ="nama_kecamatan" required class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="" disabled selected><i>---Pilih Kecamatan---</i></option>

                                <?php foreach ($kec as $data2) {  ?>
                                    <option value="<?php echo $data2->id_kecamatan;?>" <?php if ($data2->id_kecamatan==$idkecamatan_FK): echo "selected"?> <?php endif ?> ><?php echo $data2->nama_kecamatan;?></option>
                                  <?php  } ?>
                              </select>
                              <?php echo form_error('nama_kecamatan');?>
                            </div>
                          </div>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kabupaten<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kabupaten')!='') echo $id2; ?>">
                                  <input class="form-control " id="kabupaten" type="text" name="kabupaten" placeholder="Masukkan Kabupaten" value="<?php echo $kabupaten; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly/>
                                  <?php echo form_error('kabupaten');?>
                              </div>
                          </div>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kode Pos<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kode_pos')!='') echo $id2; ?>">
                                  <input class="form-control " id="kode_pos" type="text" name="kode_pos" placeholder="Masukkan Kode Pos" value="<?php echo $kode_pos; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('kode_pos');?>
                              </div>
                          </div>
                        <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Provinsi<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('provinsi')!='') echo $id2; ?>">
                                  <input class="form-control " id="provinsi" type="text" name="provinsi" placeholder="Masukkan Provinsi" value="<?php echo $provinsi; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly/>
                                  <?php echo form_error('provinsi');?>
                              </div>
                          </div>
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Tambah</button>
                                  <a href="<?php echo site_url('PendafKKC/daftarkk/') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
        <div class="col-lg-12">                     
        </div>
    </form>
   <!-- <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>TemplateC/search"> -->
</section>
</body>
</html>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-1.4.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.8.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
<!--   <script type="text/javascript">
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
    <script> 
    function get_kec(){
      var nama_desakelurahan = $("#nama_desakelurahan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url(); ?>PendafKKC/getkecamatan",
        data: "nama_desakelurahan="+nama_desakelurahan,
        success: function(msg){
          $('#nama_kecamatan').html(msg);
        }
      });
    };
  </script> -->
  <script type="text/javascript">
    // <![CDATA[
    $(document).ready(function () {
        $(function (){
            $( "#autocomplete" ).autocomplete({
                source: function(request, response) {
                    $.ajax({ 
                        url: "<?php echo site_url('PendafKKC/suggestions'); ?>",
                        data: { nama: $("#autocomplete").val()},
                        dataType: "json",
                        type: "POST",
                        success: function(data){
                            response(data);
                        }    
                    });
                },
            });
        });
    });
    // ]]>
    </script>