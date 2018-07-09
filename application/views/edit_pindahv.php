<section id="main-content">
<body>
        <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Form Edit Data Pindah</h3>
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

       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafPindahC/datapendafeditproses');?>">
        <div>
              <section class="panel">
                    <input type="hidden" name="id_pendaftaran" id="id_pendaftaran" value="<?php echo $get_datapenduduk['id_pendaftaran']; ?>">
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
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="alamat" name="alamat" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['alamat']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RT<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="rt" name="rt" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['rt']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RW<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="rw" name="rw" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['rw']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kecamatan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" id= "nama_kecamatan" name="nama_kecamatan" onchange="get_desa();" required>
                          <?php
                            foreach ($keca as $data) {
                          ?>
                            <option <?php if ($data->nama_kecamatan == $get_datapenduduk['nama_kecamatan']) {echo "selected";} ?> value="<?php echo $data->id_kecamatan ?>" ><?php echo $data->nama_kecamatan ?></option>
                          <?php
                          } ?>
                        </select>
                        </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Desa/Kelurahan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" id= "nama_desakelurahan" name="nama_desakelurahan" onchange="get_kode();" required>
                          <?php
                            foreach ($desa as $data) {
                          ?>
                            <option <?php if ($data->nama_desakelurahan == $get_datapenduduk['nama_desakelurahan']) {echo "selected";} ?> value="<?php echo $data->id_desakelurahan ?>" ><?php echo $data->nama_desakelurahan ?></option>
                          <?php
                          } ?>
                        </select>
                        </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Data Asal<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="data_asal" name="data_asal" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['data_asal']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Data Tujuan<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="data_tujuan" name="data_tujuan" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['data_tujuan']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tanggal Jadi<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="tgl_jadi" name="tgl_jadi" type="date" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datapenduduk['tgl_jadi']; ?>"/>
                      </div>
                  </div>
                  <center>
                    <div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo site_url('PendafPindahC/inputpendafpindah/'.$get_datapenduduk['id_pendaftaran']) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
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