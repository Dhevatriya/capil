<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Syarat Pendaftaran Pindah
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('eror');
        if($data2!=""){ ?>
        <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
      <?php } ?>
      <!-- <br> -->
    <div class="row">
      <div class="col-lg-12">
        <!-- <section class="content"> -->
          <div class="box box-primary">
            <div class="box-header with-border ">
              <h3 class="box-title">Detail Syarat Pendaftaran</h3>
            </div>

   <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/datapendudukeditproses');?>">
        <div>
              <section class="panel">
                  <div class="panel-body">
                      <div class="form">
                <?php $dataE=$this->session->userdata('petEdit'); ?>
                  <div class="form-group ">
                    <label for="curl" class="control-label col-lg-2" >Syarat</label>
                      <div class="col-lg-9">
                        <?php foreach ($dok as $data) { ?>
                          <?php foreach ($syarat as $data1): ?>
                          <div class="checkbox">
                            <input type="checkbox" name="id_syarat[]" <?php if($data->id_syarat == $data1['id_syaratFK']) {echo "checked";} ?> value="<?php echo $data->id_syarat ?>" ><?php echo $data->judul_syarat ?>
                          </div>
                          <?php endforeach ?>
                        <?php } ?>
                        </div>
                  </div>
              </form>
              </div>
          </div>
        </div>
    </div>
  <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
  <script type="text/javascript">
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