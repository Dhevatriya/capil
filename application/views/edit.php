<section id="main-content">
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

       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('AdminC/petugaseditproses');?>">
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
                        <input class="form-control" id="id_petugas" name="id_petugas" type="number" value="<?php echo $get_petugas['id_petugas'] ;?>" readonly/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Petugas<span class="required">*</span></label>
                      <div class="col-lg-8">
                          <input class="form-control" id="nama_petugas" name="nama_petugas" type="text" value="<?php echo $get_petugas['nama_petugas'] ;?>" readonly/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat Petugas<span class="required">*</span></label>
                      <div class="col-lg-8">
                          <input class="form-control" id="alamat_petugas" name="alamat_petugas" type="text" value="<?php echo $get_petugas['alamat_petugas'] ;?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">No HP Petugas<span class="required">*</span></label>
                      <div class="col-lg-8">
                          <input class="form-control" id="no_hp_petugas" name="no_hp_petugas" type="text" value="<?php echo $get_petugas['no_hp_petugas'] ;?>" />
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Username<span class="required">*</span></label>
                      <div class="col-lg-8">
                          <input class="form-control" id="username" name="username" type="text" value="<?php echo $get_petugas['username'] ;?>"  />
                      </div>
                  </div>
                   <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Peran<span class="required">*</span></label>
                      <div class="col-lg-8">
                          <input class="form-control" id="peran" name="peran" type="text" value="<?php echo $get_petugas['peran'] ;?>" readonly />
                      </div>
                  </div>
                  <center>
                    <div class="form-group ">
                      <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo site_url('AdminC') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
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