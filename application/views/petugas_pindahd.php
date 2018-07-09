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
        Form Pendaftaran Pindah Datang
      </h1>
    </section>

    <!-- Main content -->
            <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <section class="content">
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

      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#ppindah" data-toggle="tab">Pendaftaran Pindah Datang</a></li>
            </ul>
            <div class="tab-content">
              <div id="ppindah" class="tab-pane active">
                <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafPindahC/inputdatapindahd/');?>">
                       <div class="form">
                         <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">NIK<span class="required">*</span></label>
                            <div class="col-lg-9 <?php if(form_error('nik')!='') echo $id2; ?>">
                                <input class="form-control" id="nik" name="nik" type="text" placeholder="Masukkan NIK" value="<?php echo $nik; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nik');?>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nama Lengkap<span class="required">*</span></label>
                            <div class="col-lg-9 <?php if(form_error('nama_lengkap')!='') echo $id2; ?>">
                                <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Masukkan Nama Lengkap" value="<?php echo $nama_lengkap; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nama_lengkap');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2">Jenis Kelamin<span class="required">*</span></label>
                              <div class="col-lg-9 <?php if(form_error('jenis_kelamin')!='') echo $id2; ?>">
                                <select class="form-control m-bot15" name="jenis_kelamin" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <option disabled selected><i>---Pilih Jenis Kelamin---</i></option>
                                    <option value="Laki-laki" <?php if ($jenis_kelamin=='Laki-laki') { ?> <?php echo 'selected';} ?> >Laki-laki</option>
                                    <option value="Perempuan" <?php  if ($jenis_kelamin=='Perempuan') { ?><?php echo 'selected'; }?> >Perempuan</option>
                                </select>
                              </div>
                                   <?php echo form_error('jenis_kelamin');?>
                          </div> 
                          <div class="form-group ">
                            <label for="curl" class="control-label col-lg-2">Tempat Lahir<span class="required">*</span></label>
                              <div class="col-lg-4 <?php if(form_error('tempat_lahir')!='') echo $id2; ?>">
                                  <input class="form-control " id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?php echo $tempat_lahir; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('tempat_lahir');?>
                              </div>
<!--                           </div>  
                          <div class="form-group "> -->
                              <label for="curl" class="control-label col-lg-1" >Tanggal Lahir<span class="required">*</span></label>
                              <div class="col-lg-4 <?php if(form_error('tanggal_lahir')!='') echo $id2; ?>">
                                  <input class="form-control " id="tanggal_lahir" type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('tanggal_lahir');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Alamat<span class="required">*</span></label>
                              <div class="col-lg-9 <?php if(form_error('alamat')!='') echo $id2; ?>">
                                  <input class="form-control " id="alamat" type="text" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $alamat; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('alamat');?>
                              </div>
                          </div>   
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >RT<span class="required">*</span></label>
                              <div class="col-lg-4 <?php if(form_error('rt')!='') echo $id2; ?>">
                                  <input class="form-control " id="rt" type="text" name="rt" placeholder="Masukkan RT" value="<?php echo $rt; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('rt');?>
                              </div>
                              <label for="curl" class="control-label col-lg-1">RW<span class="required">*</span></label>
                              <div class="col-lg-4 <?php if(form_error('rw')!='') echo $id2; ?>">
                                  <input class="form-control " id="rw" type="text" name="rw" placeholder="Masukkan RW" value="<?php echo $rw; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('rw');?>
                          </div>
                        </div>
                        <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group ">
                                  <label for="cname" class="control-label col-lg-2" style="padding-left: 7%;">Kecamatan <span class="required">*</span></label>
                                  <div class="col-lg-9">
                                      
                                        <select class="form-control m-bot15" name="nama_kecamatan" id="nama_kecamatan" onchange="get_desa();" required>
                                            <option value="" disabled selected><i>---Pilih Kecamatan---</i></option>
                                            <?php foreach ($kec as $data) {  ?>
                                              <option value="<?php echo $data->id_kecamatan;?>"><?php echo $data->nama_kecamatan;?></option>
                                        
                                            <?php  } ?>
                                        </select>
                                            
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="cemail" class="control-label col-lg-2" style=" padding-left: 7%;">Desa/Kelurahan<span class="required">*</span></label>
                                  <div class="col-lg-9">
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
                            <label for="cname" class="control-label col-lg-2">Asal<span class="required">*</span></label>
                            <div class="col-lg-9 <?php if(form_error('data_asal')!='') echo $id2; ?>">
                                <input class="form-control" id="data_asal" name="data_asal" type="text" placeholder="Masukkan Asal" value="<?php echo $data_asal; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('data_asal');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Tujuan<span class="required">*</span></label>
                              <div class="col-lg-9 <?php if(form_error('data_tujuan')!='') echo $id2; ?>">
                                  <input class="form-control " id="data_tujuan" type="text" name="data_tujuan" placeholder="Masukkan Tujuan" value="<?php echo $data_tujuan; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('data_tujuan');?>
                              </div>
                          </div>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nama Petugas <span class="required">*</span></label>
                              <div class="col-lg-9">
                                  <input class="form-control " id="id_petugasFK" type="hidden" name="id_petugasFK" value="<?php echo $petugasUP['id_petugas'];?>" readonly />
                                  <input class="form-control " id="nama_petugas" type="text" name="nama_petugas" value="<?php echo $petugasUP['nama_petugas'];?>" readonly />
                              </div>                              
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Tanggal Jadi<span class="required">*</span></label>
                              <div class="col-lg-9 <?php if(form_error('tgl_jadi')!='') echo $id2; ?>">
                                  <input class="form-control " id="tgl_jadi" type="date" name="tgl_jadi" placeholder="Masukkan Tanggal Lahir" value="<?php echo $tgl_jadi; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')"  min="<?php echo date('Y-m-d')?>" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('tgl_jadi');?>
                              </div>
                          </div>
                            <?php echo form_error('id_syarat[]'); ?>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Syarat</label>
                               <div class="col-lg-9">
                                <?php foreach ($dok as $data1) { ?>
                                  <div class="checkbox">
                                    <input type="checkbox" name="id_syarat[]" id="id_syarat[]" value="<?php echo $data1->id_syarat;?>" class="required"/><?php echo $data1->judul_syarat;?>
                                  </div>
                                <?php  } ?>
                            </div>
                          </div>
                          <div class="form-group ">
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Daftar</button>
                              </div>
                          </center>
                      </div>
                      </div>
                </form>               
              </div>
            </div>
          </div>
      </div>
  </div>
      </section>
</body>
</section>

  <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
  <script type="text/javascript">
    $(function(){
      $(":submit.btn").click(function(){
        $("#tabel").hide()
        if($(this).val() == "1"){
          $("#tabel").show();
        }
      });
    });
    function get_desa(){
      var nama_kecamatan = $("#nama_kecamatan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url();?>PendafPindahC/getdesa",
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
        url : "<?php echo base_url();?>PendafPindahC/getkode",
        data: "nama_desakelurahan="+nama_desakelurahan,
        success: function(msg){
          $('#kode_pos').html(msg);
        }
      });
    };
    function validate(){
      if(isset($_POST['simpan'])){
        var check = document.getElementsByName('id_syarat[]');
        var hasChecked = false;
        for (var i = 0; i<check.length; i++){
          if (check[i].hasChecked) {
              hasChecked=true;
              break;
          }
        }
        if (hasChecked == false){
          alert("Syarat tidak terpenuhi !");
          return false;
        }
        return true;
      }
  }
  </script>