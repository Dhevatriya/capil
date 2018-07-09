      <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <div class="row">
      <div class="col-lg-12" style="padding-left: 10%; padding-right: 10% ">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Dokumen Persyaratan Pendaftaran KK</b>
                  </header>
                  <div class="panel-body">
                      <div class="form">
                        <?php 
                          $data2=$this->session->flashdata('eror1');
                          if($data2!=""){ ?>
                          <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
                        <?php } ?>
                        <?php echo form_error('id_dok[]'); ?>
           
                              <?php foreach ($dok as $data1) { ?>
                                <div class="col-lg-8">
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="id_dok[]" id="id_dok[]" value="<?php echo $data1->id_syarat;?>" class="ue" /><?php echo $data1->nama_syarat;?>
                                    </label>
                                  </div>
                                </div>
                                 
                              <?php  } ?>
                          
                          <center>
                              <div class="col-lg-12">
                                  <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                                  <a href="<?php echo site_url('TemplateC') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                              </div>
                          </center>
                      </div>
                  </div>
              </section>
          </div>
        </div>