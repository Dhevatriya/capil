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
            <li><b>Pendaftaran Kartu Keluarga</b></li>
          </ol>
        </div>
      </div>
        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>
<?php foreach ($peml as $value); ?>
  <a   href="<?php echo site_url('PendafKKC/daftarkk') ?>"> <button class="btn btn-primary" type="submit"><i class="icon-file-plus"></i>Daftar KK Baru</button></a>
  <br>
  <br>
    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/searchdatakk/');?>">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Pencarian Nomor Kartu Keluarga</b>
                  </header>
                  <div class="panel-body">
                <div class="form">
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 10%;">Nomor Kartu Keluarga<span class="required">*</span></label>
                            <div class="col-lg-7 <?php if(form_error('noKK')!='') echo $id2; ?>">
                                <input class="form-control" id="noKK" name="noKK" type="text" placeholder="Masukkan Nomor Kartu Keluarga" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('noKK');?>
                            </div>
                                <button class="btn btn-primary" type="submit " >Cari</button>
                          </div>
                    <center>
                        <div class="col-lg-12">
             
                        </div>
                    </center>  
                      </div>
                      </div>
              </section>
        <div class="col-lg-12">                     
        </div>
    </form>
     
       <div>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</section>