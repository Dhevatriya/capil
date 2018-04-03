<section id="main-content">
<body>
        <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><b>Form Edit Data Penduduk</b></li>
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

       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafPindahC/datapendudukeditpindahproses');?>">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Edit Data Penduduk</b>
                  </header>
                  <div class="panel-body">
                      <div class="form">
                <?php $dataE=$this->session->userdata('petEdit'); ?>
                  <!-- <input type="hidden" name="id_penduduk" value="<?php echo $id; ?>" readonly > -->
                   <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Induk Kependudukan<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="nik" name="nik" type="text" value="<?php echo $get_datapenduduk['nik']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Lengkap<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="nama_lengkap" name="nama_lengkap" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['nama_lengkap']; ?>"/>
                      </div>
                  </div>
                 <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Jenis Kelamin<span class="required">*</span></label>
                      <div class="col-lg-8">
                            <select class="form-control m-bot15" name="jenis_kelamin" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    <?php
                                      $jenis_kelamin=$get_datapenduduk['jenis_kelamin'];
                                      if ($jenis_kelamin== "Laki-laki") echo "<option value='Laki-laki' selected>Laki-laki</option>";
                                      else echo "<option value='Laki-laki'>Laki-laki</option>";
                                      if ($jenis_kelamin== "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                                      else echo "<option value='Perempuan'>Perempuan</option>";                      
                                    ?>
                                </select>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tempat Lahir<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="tempat_lahir" name="tempat_lahir" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['tempat_lahir']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tanggal Lahir<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="tanggal_lahir" name="tanggal_lahir" type="date" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['tanggal_lahir']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Agama<span class="required">*</span></label>
                      <div class="col-lg-8">
                            <select class="form-control m-bot15" name="agama" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    <?php
                                      $agama=$get_datapenduduk['agama'];
                                      if ($agama== "Islam") echo "<option value='Islam' selected>Islam</option>";
                                      else echo "<option value='Islam'>Islam</option>";
                                      if ($agama== "Kristen") echo "<option value='Kristen' selected>Kristen</option>";
                                      else echo "<option value='Kristen'>Kristen</option>";
                                      if ($agama== "Katolik") echo "<option value='Katolik' selected>Katolik</option>";
                                      else echo "<option value='Katolik'>Katolik</option>";
                                      if ($agama== "Hindu") echo "<option value='Hindu' selected>Hindu</option>";
                                      else echo "<option value='Hindu'>Hindu</option>";
                                      if ($agama== "Buddha") echo "<option value='Buddha' selected>Buddha</option>";
                                      else echo "<option value='Buddha'>Buddha</option>";   
                                      if ($agama== "Konghucu") echo "<option value='Konghucu' selected>Konghucu</option>";
                                      else echo "<option value='Konghucu'>Konghucu</option>";                      
                                    ?>
                                </select>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Pendidikan<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <select class="form-control m-bot15" name="pendidikan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    <?php
                                      $pendidikan=$get_datapenduduk['pendidikan'];
                                      if ($pendidikan== "Tidak/Belum Sekolah") echo "<option value='Tidak/Belum Sekolah' selected>Tidak/Belum Sekolah</option>";
                                      else echo "<option value='Tidak/Belum Sekolah'>Tidak/Belum Sekolah</option>";
                                      if ($pendidikan== "Belum Tamat SD/Sederajat") echo "<option value='Belum Tamat SD/Sederajat' selected>Belum Tamat SD/Sederajat</option>";
                                      else echo "<option value='Belum Tamat SD/Sederajat'>Belum Tamat SD/Sederajat</option>";
                                      if ($pendidikan== "Tamat SD/Sederajat") echo "<option value='Tamat SD/Sederajat' selected>Tamat SD/Sederajat</option>";
                                      else echo "<option value='Tamat SD/Sederajat'>Tamat SD/Sederajat</option>";
                                      if ($pendidikan== "SLTP/Sederajat") echo "<option value='SLTP/Sederajat' selected>SLTP/Sederajat</option>";
                                      else echo "<option value='SLTP/Sederajat'>SLTP/Sederajat</option>";
                                      if ($pendidikan== "SLTA/Sederajat") echo "<option value='SLTA/Sederajat' selected>SLTA/Sederajat</option>";
                                      else echo "<option value='SLTA/Sederajat'>SLTA/Sederajat</option>";   
                                      if ($pendidikan== "Diploma I/II") echo "<option value='Diploma I/II' selected>Diploma I/II</option>";
                                      else echo "<option value='Diploma I/II'>Diploma I/II</option>";
                                      if ($pendidikan== "Akademi/Diploma III/Sarjana Muda") echo "<option value='Akademi/Diploma III/Sarjana Muda' selected>Akademi/Diploma III/Sarjana Muda</option>";
                                      else echo "<option value='Akademi/Diploma III/Sarjana Muda'>Akademi/Diploma III/Sarjana Muda</option>";
                                      if ($pendidikan== "Diploma IV/Sastra I") echo "<option value='Diploma IV/Sastra I' selected>Diploma IV/Sastra I</option>";
                                      else echo "<option value='Diploma IV/Sastra I'>Diploma IV/Sastra I</option>";
                                      if ($pendidikan== "Sastra II") echo "<option value='Sastra II' selected>Sastra II</option>";
                                      else echo "<option value='Sastra II'>Sastra II</option>";   
                                      if ($pendidikan== "Sastra III") echo "<option value='Sastra III' selected>Sastra III</option>";
                                      else echo "<option value='Sastra III'>Sastra III</option>";                        
                                    ?>
                                </select>
                      </div>
                  </div>
               <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Jenis Pekerjaan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" id= "nama_jenispekerjaan" name="nama_jenispekerjaan" required>
                          <?php
                            // foreach ($get_datapenduduk['nama_jenispekerjaan'] as $value);
                            foreach ($jenis as $data) {
                          ?>
                            <option <?php if ($data->nama_jenispekerjaan == $get_datapenduduk['nama_jenispekerjaan']) {echo "selected";} ?> value="<?php echo $data->id_jenispekerjaan ?>" ><?php echo $data->nama_jenispekerjaan ?></option>
                          <?php
                          } ?>
                        </select>
                        </div>
                  </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Status Perkawinan<span class="required">*</span></label>
                      <div class="col-lg-8">
                            <select class="form-control m-bot15" name="status_perkawinan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    <?php
                                      $status_perkawinan=$get_datapenduduk['status_perkawinan'];
                                      if ($status_perkawinan== "Belum Kawin") echo "<option value='Belum Kawin' selected>Belum Kawin</option>";
                                      else echo "<option value='Belum Kawin'>Belum Kawin</option>";
                                      if ($status_perkawinan== "Kawin") echo "<option value='Kawin' selected>Kawin</option>";
                                      else echo "<option value='Kawin'>Kawin</option>";
                                      if ($status_perkawinan== "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                                      else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
                                      if ($status_perkawinan== "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                                      else echo "<option value='Cerai Mati'>Cerai Mati</option>";                   
                                    ?>
                                </select>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Status Hubungan Dalam Keluarga<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <select class="form-control m-bot15" name="status_hub_dalam_keluarga" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    <?php
                                      $status_hub_dalam_keluarga=$get_datapenduduk['status_hub_dalam_keluarga'];
                                      if ($status_hub_dalam_keluarga== "Kepala Keluarga") echo "<option value='Kepala Keluarga' selected>Kepala Keluarga</option>";
                                      else echo "<option value='Kepala Keluarga'>Kepala Keluarga</option>";
                                      if ($status_hub_dalam_keluarga== "Suami") echo "<option value='Suami' selected>Suami</option>";
                                      else echo "<option value='Suami'>Suami</option>";
                                      if ($status_hub_dalam_keluarga== "Istri") echo "<option value='Istri' selected>Istri</option>";
                                      else echo "<option value='Istri'>Istri</option>";
                                      if ($status_hub_dalam_keluarga== "Anak") echo "<option value='Anak' selected>Anak</option>";
                                      else echo "<option value='Anak'>Anak</option>";
                                      if ($status_hub_dalam_keluarga== "Menantu") echo "<option value='Menantu' selected>Menantu</option>";
                                      else echo "<option value='Menantu'>Menantu</option>";   
                                      if ($status_hub_dalam_keluarga== "Cucu") echo "<option value='Cucu' selected>Cucu</option>";
                                      else echo "<option value='Cucu'>Cucu</option>";
                                      if ($status_hub_dalam_keluarga== "Orangtua") echo "<option value='Orangtua' selected>Orangtua</option>";
                                      else echo "<option value='Orangtua'>Orangtua</option>";
                                      if ($status_hub_dalam_keluarga== "Mertua") echo "<option value='Mertua' selected>Mertua</option>";
                                      else echo "<option value='Mertua'>Mertua</option>";
                                      if ($status_hub_dalam_keluarga== "Famili Lain") echo "<option value='Famili Lain' selected>Famili Lain</option>";
                                      else echo "<option value='Famili Lain'>Famili Lain</option>";   
                                      if ($status_hub_dalam_keluarga== "Lainnya") echo "<option value='Lainnya' selected>Lainnya</option>";
                                      else echo "<option value='Lainnya'>Lainnya</option>";                        
                                    ?>
                                </select>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kewarganegaraan<span class="required">*</span></label>
                      <div class="col-lg-8">
                            <select class="form-control m-bot15" name="kewarganegaraan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
                                    <?php
                                      $kewarganegaraan=$get_datapenduduk['kewarganegaraan'];
                                      if ($kewarganegaraan== "WNI") echo "<option value='WNI' selected>WNI</option>";
                                      else echo "<option value='WNI'>WNI</option>";
                                      if ($kewarganegaraan== "WNA") echo "<option value='WNA' selected>WNA</option>";
                                      else echo "<option value='WNA'>WNA</option>";
                                    ?>
                                </select>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Paspor<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="no_paspor" name="no_paspor" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['no_paspor']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Kitas / Kitap<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="no_kitas_kitap" name="no_kitas_kitap" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['no_kitas_kitap']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Ayah<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="ayah" name="ayah" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['ayah']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Ibu<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="ibu" name="ibu" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['ibu']; ?>"/>
                      </div>
                  </div>
                  <center>
                    <div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo site_url('PendafPindahC/caridatapindah/'.$get_datapenduduk['nik']) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                      </div>
                  </center>
                </div>
              </form>
            </center>
          </div>
        </div>
      </section>
    </form>
  </section>
</body>