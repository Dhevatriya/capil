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
            <li><b>Pendataran Kartu Keluarga Baru</b></li>
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
        <a href="<?php echo site_url('PendafKKC/tambahkk/') ?>"><button class="btn btn-primary" type="submit " ><i class="icon-file-plus"></i>Tambah Manual</button></a>
        <br>
        <br>
          <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/searchdatanik/');?>">
  
              <section class="panel">
                  <header class="panel-heading">
                      <b>Pencarian Nomor Induk Kependudukan</b>
                  </header>
                  <div class="panel-body">
                <div class="form">
                <div class="form-group">
                    <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Induk Kependudukan<span class="required">*</span></label>
                    <div class="col-lg-7">
                        <input  name="nik" id="nik" class="form-control" type="text" placeholder="Masukkan Nomor Induk Kependudukan"  required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <button class="btn btn-primary" type="submit " >Cari</button>
                </div>
                    <center>  
                    </center> 
                      </div>
                      </div>
              </section>
          </div>
                         
        <div class="col-lg-12">                     
        </div>
        
    </form> 
</section>
</body>

  <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
  <script type="text/javascript">
    $(function(){
      $(":submit.btn").click(function(){
        $("#tabel").hide()
        if($(this).val() == "1"){
          $("#tabel").show();
        }
      });
    });
  </script>
