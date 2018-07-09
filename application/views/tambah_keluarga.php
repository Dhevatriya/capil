<section id="main-content">

<html>
<body>
  <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12" >
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
                <div>
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
                                  <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kecamatan <span class="required">*</span></label>
                                  <div class="col-lg-8">
                                      
                                        <select class="form-control m-bot15" name="nama_kecamatan" id="nama_kecamatan" onchange="get_desa();" required>
                                            <option value="" disabled selected><i>---Pilih Kecamatan---</i></option>

                                            <?php foreach ($kec as $data) {  ?>
                                              <option value="<?php echo $data->id_kecamatan;?>"><?php echo $data->nama_kecamatan;?></option>
                                        
                                            <?php  } ?>
                                        </select>
                                            
                                  </div>
                              </div>
                                   <div class="form-group ">
                                  <label for="cemail" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Desa/Kelurahan<span class="required">*</span></label>
                                  <div class="col-lg-8">
                                      <select class="form-control m-bot15" name="nama_desakelurahan" id="nama_desakelurahan" onchange="get_kode();" required>
                                        <option value="" disabled selected><i>---Pilih Desa/Kelurahan---</i></option>
                                          <?php if(count($des)>0) { ?>
                                              <?php foreach ($des as $data1) {  ?>
                                                <option value="<?php echo $data1->id_desakelurahan;?>"><?php echo $data1->nama_desakelurahan;?></option>
                                              <?php } ?>
                                          <?php  } else { ?>
                                              <option>- Data Belum Tersedia -</option>

                                        <?php } ?>
                                      </select>
                                  </div>
                              </div>
                         <div class="form-group ">
                                  <label for="cemail" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kode Pos<span class="required">*</span></label>
                                  <div class="col-lg-8">
                                      <select class="form-control m-bot15" name="kode_pos" id="kode_pos" required>
                                        <option value="" disabled selected><i>---Pilih Kode Pos---</i></option>
                                          <?php if(count($des)>0) { ?>
                                              <?php foreach ($des as $data1) {  ?>
                                                <option value="<?php echo $data1->id_desakelurahan;?>"><?php echo $data1->kode_pos;?></option>
                                              <?php } ?>
                                          <?php  } else { ?>
                                              <option>- Data Belum Tersedia -</option>

                                        <?php } ?>
                                      </select>
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
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Provinsi<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('provinsi')!='') echo $id2; ?>">
                                  <input class="form-control " id="provinsi" type="text" name="provinsi" placeholder="Masukkan Provinsi" value="<?php echo $provinsi; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" readonly/>
                                  <?php echo form_error('provinsi');?>
                              </div>
                          </div>
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Tambah</button>
                                  <a href="<?php echo base_url() ?>PendafKKC/daftarkk/"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
        <div class="col-lg-12">                     
        </div>
    </form>
    </center>
   <!-- <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>TemplateC/search"> -->
</div>
</center>
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
      <script src="<?php echo base_url(); ?>/assets/js/jquery-1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.8.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/chartjs.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
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
    function get_desa(){
      var nama_kecamatan = $("#nama_kecamatan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url();?>PendafKKC/getdesa",
        data: "nama_kecamatan="+nama_kecamatan,
        success: function(msg){
          $('#nama_desakelurahan').html(msg);
        }
      });
    };
   function get_kode(){
      var nama_desakelurahan = $("#nama_desakelurahan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url();?>PendafKKC/getkode",
        data: "nama_desakelurahan="+nama_desakelurahan,
        success: function(msg){
          $('#kode_pos').html(msg);
        }
      });
    };
    </script>