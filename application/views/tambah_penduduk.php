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

            <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/inputdatapenduduk/');?>">
              <div >
              <section class="panel">
                 <input id="idKeluarga" name="idKeluarga" type="hidden" value="<?php echo $get_datakeluarga['idKeluarga']; ?>">
                  <header class="panel-heading">
                      <b>Tambah Data Penduduk</b>
                  </header>
                  <div class="panel-body">
                      <div class="form"> 
                     <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor KK<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('noKK')!='') echo $id2; ?>">
                                <input class="form-control" id="noKK" name="noKK" type="text" placeholder="Masukkan Nomor KK" value="<?php echo $get_datakeluarga['noKK']; ?>" readonly/>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Lengkap<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('nama_lengkap')!='') echo $id2; ?>">
                                <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Masukkan Lengkap" value="<?php echo $nama_lengkap; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nama_lengkap');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Jenis Kelamin<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('jenis_kelamin')!='') echo $id2; ?>">
                                <select class="form-control m-bot15" name="jenis_kelamin" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <option disabled selected><i>---Pilih Jenis Kelamin---</i></option>
                                    <option value="Laki-laki" <?php if ($jenis_kelamin=='Laki-laki') { ?> <?php echo 'selected';} ?> >Laki-laki</option>
                                    <option value="Perempuan" <?php  if ($jenis_kelamin=='Perempuan') { ?><?php echo 'selected'; }?> >Perempuan</option>
                                </select>
                              </div>
                                   <?php echo form_error('jenis_kelamin');?>
                          </div> 
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tempat Lahir<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('tempat_lahir')!='') echo $id2; ?>">
                                  <input class="form-control " id="tempat_lahir" type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?php echo $tempat_lahir; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('tempat_lahir');?>
                              </div>

                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tanggal Lahir<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('tanggal_lahir')!='') echo $id2; ?>">
                                  <input class="form-control " id="tanggal_lahir" type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('tanggal_lahir');?>
                              </div>

                          </div>                        
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Agama<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('agama')!='') echo $id2; ?>">
                                <select class="form-control m-bot15" name="agama" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <option disabled selected><i>---Pilih Agama---</i></option>
                                    <option value="Islam" <?php if ($agama=='Islam') { ?> <?php echo 'selected';} ?> >Islam</option>
                                    <option value="Kristen" <?php  if ($agama=='Kristen') { ?><?php echo 'selected'; }?> >Kristen</option>
                                    <option value="Katolik" <?php if ($agama=='Katolik') { ?> <?php echo 'selected';} ?> >Katolik</option>
                                    <option value="Hindu" <?php  if ($agama=='Hindu') { ?><?php echo 'selected'; }?> >Hindu</option>
                                    <option value="Buddha" <?php if ($agama=='Buddha') { ?> <?php echo 'selected';} ?> >Buddha</option>
                                    <option value="Konghucu" <?php  if ($agama=='Konghucu') { ?><?php echo 'selected'; }?> >Konghucu</option>
                                </select>
                              </div>
                                   <?php echo form_error('agama');?>
                              </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Pendidikan<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('nama_pendidikan')!='') echo $id2; ?>">
                              <select data-placeholder="Pilih Pendidikan" name="nama_pendidikan" required class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="" disabled selected><i>---Pilih Pendidikan---</i></option>
                                <?php foreach ($pendkkn as $data2) {  ?>
                                    <option value="<?php echo $data2->id_pendidikan;?>" <?php if ($data2->id_pendidikan==$id_pendidikanFK): echo "selected"?> <?php endif ?> ><?php echo $data2->nama_pendidikan;?></option>
                                  <?php  } ?>
                              </select>
                              <?php echo form_error('nama_pendidikan');?>
                            </div>
                          </div>
   
                          <div class="form-group">
                            <label class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Jenis Pekerjaan<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('nama_jenispekerjaan')!='') echo $id2; ?>">
                              <select data-placeholder="Pilih Jenis Pemeriksaan" name="nama_jenispekerjaan" required class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="" disabled selected><i>---Pilih Jenis Pekerjaan---</i></option>
                                <?php foreach ($jenis as $data2) {  ?>
                                    <option value="<?php echo $data2->id_jenispekerjaan;?>" <?php if ($data2->id_jenispekerjaan==$id_jenispekerjaanFK): echo "selected"?> <?php endif ?> ><?php echo $data2->nama_jenispekerjaan;?></option>
                                  <?php  } ?>
                              </select>
                              <?php echo form_error('nama_jenispekerjaan');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Status Perkawinan<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('status_perkawinan')!='') echo $id2; ?>">
                                <select class="form-control m-bot15" name="status_perkawinan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <option disabled selected><i>---Pilih Status Perkawinan---</i></option>
                                    <option value="Belum Kawin" <?php if ($status_perkawinan=='Belum Kawin') { ?> <?php echo 'selected';} ?> >Belum Kawin</option>
                                    <option value="Kawin" <?php  if ($status_perkawinan=='Kawin') { ?><?php echo 'selected'; }?> >Kawin</option>
                                    <option value="Cerai Hidup" <?php if ($status_perkawinan=='Cerai Hidup') { ?> <?php echo 'selected';} ?> >Cerai Hidup</option>
                                    <option value="Cerai Mati" <?php  if ($status_perkawinan=='Cerai Mati') { ?><?php echo 'selected'; }?> >Cerai Mati</option>
                                </select>
                              </div>
                                   <?php echo form_error('status_perkawinan');?>
                              </div>

                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Status Hubungan Dalam Keluarga<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('nama_status_hub_dalam_keluarga')!='') echo $id2; ?>">
                              <select data-placeholder="Pilih Status Hub Dalam Keluarga" name="nama_status_hub_dalam_keluarga" required class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="" disabled selected><i>---Pilih Status Hubungan Dalam Keluarga---</i></option>
                                <?php foreach ($stats as $data2) {  ?>
                                    <option value="<?php echo $data2->id_status_hub_dalam_keluarga;?>" <?php if ($data2->id_status_hub_dalam_keluarga==$id_status_hub_dalam_keluargaFK): echo "selected"?> <?php endif ?> ><?php echo $data2->nama_status_hub_dalam_keluarga;?></option>
                                  <?php  } ?>
                              </select>
                              <?php echo form_error('nama_status_hub_dalam_keluarga');?>
                            </div>                        
                          </div>
                        <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kewarganegaraan<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('kewarganegaraan')!='') echo $id2; ?>">
                                <select class="form-control m-bot15" name="kewarganegaraan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <option disabled selected><i>---Pilih Kewarganegaraan---</i></option>
                                    <option value="WNI" <?php if ($kewarganegaraan=='WNI') { ?> <?php echo 'selected';} ?> >WNI</option>
                                    <option value="WNA" <?php  if ($kewarganegaraan=='WNA') { ?><?php echo 'selected'; }?> >WNA</option>
                                </select>
                              </div>
                                   <?php echo form_error('kewarganegaraan');?>
                              </div>
                     
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Paspor</label>
                              <div class="col-lg-8 <?php if(form_error('no_paspor')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_paspor" type="text" name="no_paspor" placeholder="Masukkan Nomor Paspor" value="<?php echo $no_paspor; ?>" />
                                  <?php echo form_error('no_paspor');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Kitas / Kitap</label>
                              <div class="col-lg-8 <?php if(form_error('no_kitas_kitap')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_kitas_kitap" type="text" name="no_kitas_kitap" placeholder="Masukkan Nomor Kitas / Kitap" value="<?php echo $no_kitas_kitap; ?>"/>
                                  <?php echo form_error('no_kitas_kitap');?>
                              </div>
                          </div>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Ayah<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('ayah')!='') echo $id2; ?>">
                                  <input class="form-control " id="ayah" type="text" name="ayah" placeholder="Masukkan Nama Ayah" value="<?php echo $ayah; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('ayah');?>
                              </div>
                          </div>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Ibu<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('ibu')!='') echo $id2; ?>">
                                  <input class="form-control " id="ibu" type="text" name="ibu" placeholder="Masukkan Nama Ibu" value="<?php echo $ibu; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('ibu');?>
                              </div>
                          </div>
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Tambah</button>
                                  <a href="<?php echo site_url('PendafKKC/caridatakk/'.$get_datakeluarga['idKeluarga']) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
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
    </script>