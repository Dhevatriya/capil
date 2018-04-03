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
            <!-- <input type="hidden" name="noKK" id="noKK" value="<?php echo $noKK; ?>"> -->
              <section class="panel">
                  <header class="panel-heading">
                      <b>Tambah Data Penduduk</b>
                  </header>
                  <div class="panel-body">
                      <div class="form">
                        <!-- <input type="hidden" name="noKK" id="noKK" value="<?php echo $noKK; ?>" readonly class="form-control" >  -->
                     <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor KK<span class="required">*</span></label>
                            <div class="col-lg-8 <?php if(form_error('noKK')!='') echo $id2; ?>">
                                <input class="form-control" id="noKK" name="noKK" type="text" placeholder="Masukkan Nomor KK" value="<?php echo $noKK; ?>" readonly/>
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
                              <div class="col-lg-8 <?php if(form_error('pendidikan')!='') echo $id2; ?>">
                                 <select class="form-control m-bot15" name="pendidikan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                  <option disabled selected><i>---Pilih Pendidikan---</i></option>
                                    <option value="Tidak/Belum Sekolah" <?php if ($pendidikan=='Tidak/Belum Sekolah') { ?> <?php echo 'selected';} ?> >Tidak/Belum Sekolah</option>
                                    <option value="Belum Tamat SD/Sederajat" <?php  if ($pendidikan=='Belum Tamat SD/Sederajat') { ?><?php echo 'selected'; }?> >Belum Tamat SD/Sederajat</option>
                                    <option value="Tamat SD/Sederajat" <?php if ($pendidikan=='Tamat SD/Sederajat') { ?> <?php echo 'selected';} ?> >Tamat SD / Sederajat</option>
                                    <option value=" SLTP/Sederajat" <?php  if ($pendidikan==' SLTP/Sederajat') { ?><?php echo 'selected'; }?> > SLTP/Sederajat</option>
                                    <option value="SLTA/Sederajat" <?php if ($pendidikan=='SLTA/Sederajat') { ?> <?php echo 'selected';} ?> >SLTA/Sederajat</option>
                                    <option value="Diploma I/II" <?php  if ($pendidikan=='Diploma I/II') { ?><?php echo 'selected'; }?> >Diploma I/II</option>
                                    <option value="Akademi/Diploma III/Sarjana Muda" <?php if ($pendidikan=='Akademi/Diploma III/Sarjana Muda') { ?> <?php echo 'selected';} ?> >Akademi/Diploma III/Sarjana Muda</option>
                                    <option value="Diploma IV/Sastra I" <?php  if ($pendidikan=='Diploma IV/Sastra I') { ?><?php echo 'selected'; }?> >Diploma IV/Sastra I</option>
                                    <option value="Sastra II" <?php if ($pendidikan=='Sastra II') { ?> <?php echo 'selected';} ?> >Sastra II</option>
                                    <option value="Sastra III" <?php  if ($pendidikan=='Sastra III') { ?><?php echo 'selected'; }?> >Sastra III</option>
                                  </select>
                              </div>
                          </div>
   
                          <div class="form-group">
                            <label class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Jenis Pemeriksaan<span class="required">*</span></label>
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
                              <div class="col-lg-8 <?php if(form_error('status_hub_dalam_keluarga')!='') echo $id2; ?>">
                                   <select class="form-control m-bot15" name="status_hub_dalam_keluarga" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                    <option disabled selected><i>---Pilih Status Hubungan Dalam Keluarga---</i></option>
                                    <option value="Kepala Keluarga" <?php if ($status_hub_dalam_keluarga=='Kepala Keluarga') { ?> <?php echo 'selected';} ?> >Kepala Keluarga</option>
                                    <option value="Suami" <?php  if ($status_hub_dalam_keluarga=='Suami') { ?><?php echo 'selected'; }?> >Suami</option>
                                    <option value="Istri" <?php if ($status_hub_dalam_keluarga=='Istri') { ?> <?php echo 'selected';} ?> >Istri</option>
                                    <option value="Anak" <?php  if ($status_hub_dalam_keluarga=='Anak') { ?><?php echo 'selected'; }?> >Anak</option>
                                    <option value="Menantu" <?php if ($status_hub_dalam_keluarga=='Menantu') { ?> <?php echo 'selected';} ?> >Menantu</option>
                                    <option value="Cucu" <?php  if ($status_hub_dalam_keluarga=='Cucu') { ?><?php echo 'selected'; }?> >Cucu</option>
                                    <option value="Orangtua" <?php if ($status_hub_dalam_keluarga=='Orangtua') { ?> <?php echo 'selected';} ?> >Orangtua</option>
                                    <option value="Mertua" <?php  if ($status_hub_dalam_keluarga=='Mertua') { ?><?php echo 'selected'; }?> >Mertua</option>
                                    <option value="Famili Lain" <?php if ($status_hub_dalam_keluarga=='Famili Lain') { ?> <?php echo 'selected';} ?> >Famili Lain</option>
                                    <option value="Lainnya" <?php  if ($status_hub_dalam_keluarga=='Lainnya') { ?><?php echo 'selected'; }?> >Lainnya</option>
                                </select>
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
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Paspor<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('no_paspor')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_paspor" type="text" name="no_paspor" placeholder="Masukkan Nomor Paspor" value="<?php echo $no_paspor; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                  <?php echo form_error('no_paspor');?>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Kitas / Kitap<span class="required">*</span></label>
                              <div class="col-lg-8 <?php if(form_error('no_kitas_kitap')!='') echo $id2; ?>">
                                  <input class="form-control " id="no_kitas_kitap" type="text" name="no_kitas_kitap" placeholder="Masukkan Nomor Kitas / Kitap" value="<?php echo $no_kitas_kitap; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
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
                                  <a href="<?php echo site_url('PendafKKC/caridatakk/'.$noKK) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
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
