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
            <li><b>Form Edit Data Keluarga</b></li>
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

       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/datakeluargaeditproses');?>">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Edit Data Keluarga</b>
                  </header>
                  <div class="panel-body">
                      <div class="form">
                <?php $dataE=$this->session->userdata('petEdit'); ?>
              <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor KK<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="noKK" name="noKK" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['noKK']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Kepala Keluarga<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="nama_kepala_keluarga" name="nama_kepala_keluarga" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['nama_kepala_keluarga']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="alamat" name="alamat" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['alamat']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RT<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="rt" name="rt" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['rt']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RW<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="rw" name="rw" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['rw']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Desa/Kelurahan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" id= "nama_desakelurahan" name="nama_desakelurahan" required>
                          <?php
                            // foreach ($get_datapenduduk['nama_jenispekerjaan'] as $value);
                            foreach ($desa as $data) {
                          ?>
                            <option <?php if ($data->nama_desakelurahan == $get_datakeluarga['nama_desakelurahan']) {echo "selected";} ?> value="<?php echo $data->id_desakelurahan ?>" ><?php echo $data->nama_desakelurahan ?></option>
                          <?php
                          } ?>
                        </select>
                        </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kecamatan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" id= "nama_kecamatan" name="nama_kecamatan" required>
                          <?php
                            // foreach ($get_datapenduduk['nama_jenispekerjaan'] as $value);
                            foreach ($keca as $data) {
                          ?>
                            <option <?php if ($data->nama_kecamatan == $get_datakeluarga['nama_kecamatan']) {echo "selected";} ?> value="<?php echo $data->id_kecamatan ?>" ><?php echo $data->nama_kecamatan ?></option>
                          <?php
                          } ?>
                        </select>
                        </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kode Pos<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="kode_pos" name="kode_pos" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['kode_pos']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kabupaten<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="kabupaten" name="kabupaten" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['kabupaten']; ?>" readonly/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Provinsi<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="provinsi" name="provinsi" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $get_datakeluarga['provinsi']; ?>" readonly/>
                      </div>
                  </div>
                  <center><div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo site_url('PendafKKC/caridatakk/'.$get_datakeluarga['noKK']) ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
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