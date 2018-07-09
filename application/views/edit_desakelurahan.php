<section id="main-content">
<body>
    <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Edit Data Petugas</h3>
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
       <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>AdminC/editPetugasProses">
        <div>
            <input type="hidden" name="id_desakelurahan" id="id_desakelurahan" value="<?php echo $get_desak['id_desakelurahan']; ?>">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Edit Desa/Kelurahan</b>
                  </header>
                  <div class="panel-body">
                  <div class="form">
                    <?php $dataE=$this->session->userdata('petEdit'); ?>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Desa/Kelurahan<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="nama_desakelurahan" name="nama_desakelurahan" type="text" placeholder="Masukkan Nama Desa/Kelurahan" value="<?php echo $get_desak['nama_desakelurahan'] ;?>"/>
                              </div>
                          </div>
                          <div class="form-group ">
                              <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kode Pos<span class="required">*</span></label>
                              <div class="col-lg-8">
                                  <input class="form-control" id="kode_pos" name="nama_desakelurahan" type="text" placeholder="Masukkan Kode Pos" value="<?php echo $get_desak['kode_pos'] ;?>"/>
                              </div>
                          </div>
                    <center>
                      <div class="form-group ">
                        <div class="col-lg-12">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                          <a href="<?php echo base_url() ?>AdminC/daftarPetugas"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                      </div>
                    </div>
                  </center>
                </div>
              </div>
            </section>
          </div>
        </form>
      </section>
</body>
</section>
