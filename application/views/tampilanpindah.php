<html>
<body>
    <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
 <!--          <ol class="breadcrumb"> -->
            <center><h1>Pendaftaran Surat Pindah </h1></center>
<!--           </ol> -->
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
<br>
<br>

    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafPindahC/searchdatapindah');?>">
          <!-- <div class="col-lg-12"> -->
      <center>
      <button class="btn btn-primary" type="submit" style="width: 30%; max-height: 30; font-size: 30px">Daftar Surat Pindah</button>
      </center>
      <br>
      <br>
      <br>
      <center>
      <button class="btn btn-primary" type="submit" style="width: 30%; max-height: 30; font-size: 30px">Daftar Surat Pindah Datang</button>
      </center>
          </div>
        </div>

        <div class="col-lg-12">                     
        </div>
        
    </form>

</body>
</html> 


