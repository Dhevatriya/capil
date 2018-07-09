<section id="main-content">
<body>
    <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Unggah Syarat Pendaftaran
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
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
        <div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
      <?php } ?>
      <div class="box box-primary">
        <div class="box-header with-border">
              <h3 class="box-title">Syarat Pendaftaran</h3>
            </div>
                <center>
                  <div class="panel-body" encrypt="multipart/form-data">         
                    <table class="table table-hover" border="1" width="100%" align="left">  
                      <thead>
                          <tr>
                            <th style="border: 2.3px solid;"><center> No </center></th>
                            <th style="border: 2.3px solid;"><center> Nama Dokumen </center></th>
                            <th style="border: 2.3px solid;"><center> Status Syarat</center></th>
                            <th style="border: 2.3px solid;"><center> Syarat</center></th>
                          </tr>
                      </thead> 
                      <tbody>  
                        <?php $no=0; foreach ($dok as $value): $no++; ?>
                          <input type="hidden" name="id_detail_syarat" id="id_detail_syarat" value="<?php echo $value->id_detail_syarat; ?>">
                          <tr>
                            <td><center><?php echo $no; ?></center></td>
                            <td><center><?php echo $value->judul_syarat ; ?></center></td>
                            <td><center>             <?php echo $value->status_unggah ; ?>
                              
                            </center></td>
                              <?php echo form_open_multipart('PendafPindahC/tambahsyarat/'.$value->id_pendaftaranFK);?>
                              <td><center><input type="file" name="userfile[]" id="userfile[]" multiple="">
                              <?php echo form_error('gambar');?>

                            </center></td>
                      <?php  endforeach; ?>
                      </tbody> 
                    </table>
                      <a data-popup="tooltip" data-placement="top"><button class="btn btn-primary" name="simpan" type="submit" value="upload">Simpan</button></a>
                  </div>
                </div>
            </div>      
   </section>
</section>
<script src="<?php echo base_url(); ?>/assets/js/chartjs.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  <script> 
    function form_hasil(){
      var jenis_pemeriksaan = $("#jenis_pemeriksaan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url(); ?>TemplateC/getformhasil",
        data: "jenis_pemeriksaan="+jenis_pemeriksaan,
        success: function(msg){
          $('#form_hasil').html(msg);
        }
      });
    };
  </script>