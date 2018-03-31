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

       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/datapendudukeditproses');?>">
              <input id="noKK" name="noKK" type="hidden" value="<?php echo $get_datapenduduk['noKK']; ?>"/>
              <input id="idPenduduk" name="idPenduduk" type="hidden" value="<?php echo $get_datapenduduk['idPenduduk']; ?>"/>
              <section class="panel">
                  <header class="panel-heading">
                      <b>Edit Data Penduduk</b>
                  </header>
                  <div class="panel-body">
                      <div class="form">
                <?php $dataE=$this->session->userdata('petEdit'); ?>
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
                           <input class="form-control " id="pendidikan" name="pendidikan" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['pendidikan']; ?>"/>
                      </div>
                  </div>
                  <input type="hidden" name="id_desa" value="<?php echo $get_datapenduduk['nama_jenispekerjaan']; ?>" readonly class="form-control" >
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Jenis Pekerjaan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" name="id_jenispekerjaanFK" required>
                          <?php
                            // foreach ($get_datapenduduk['nama_jenispekerjaan'] as $value);
                            foreach ($jenis as $data) {
							?>
							<option <?php if ($data->nama_jenispekerjaan == $get_datapenduduk['nama_jenispekerjaan']) {echo "selected";} ?> value="<?php echo $data->id_jenispekerjaanFK ?>" ><?php echo $data->nama_jenispekerjaan ?></option>
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
                           <input class="form-control " id="status_hub_dalam_keluarga" name="status_hub_dalam_keluarga" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['status_hub_dalam_keluarga']; ?>"/>
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
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor KITAS<span class="required">*</span></label>
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
                  <center><div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo site_url('PendafKKC/caridatakk/'.$get_datapenduduk['noKK']) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                      </div>
                  </center></div>
              </form>
            </center>
          </div>
        </div>
      </section>
    </form>
  </section>
</body>
