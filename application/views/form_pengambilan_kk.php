<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pendaftaran Kartu Keluarga
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
      <div class="col-lg-6">
<!--         <section class="content"> -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pendaftar</h3>
            </div>
              <center>
                <?php foreach($datapendaf as $data){ ?>        
                <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url('PendafKKC/cetakpendaftarankk/'.$data->id_pendaftaran)?>">
                <div class="panel-body" style="text-align:center;">

                   <table class="table" width="100%" > 
                      <?php foreach($datapendaf as $data){ ?>
                      <tr>
                        <th style="width:23%;">Nomor Registrasi </th>
                        <td style="width: 3%"> : </td>
                        <td align="left"> <?php echo $data->no_registrasi; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:20%;">Nomor KK </th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->nokk; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:20%;">NIK </th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->nik; ?> </td>
                      </tr>                      
                      <tr>
                        <th style="width:20%;">Nama Kepala Keluarga </th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->nama_kepala_keluarga; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:20%;">Alamat </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->alamat; ?>, RT <?php echo $data->rt; ?> / RW <?php echo $data->rw; ?>, <?php echo $data->nama_desakelurahan; ?>, <?php echo $data->nama_kecamatan; ?></td>
                      </tr>
                      <tr>
                        <th style="width:20%;">Tanggal Daftar</th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->tgl_daftar; ?> </td>
                      </tr> 
                      <tr>
                        <th style="width:20%;">Tanggal Jadi</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->tgl_jadi; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:20%;">Status Pendaftaran</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_status_pendaftaran; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:20%;">Syarat</th>
                        <td style="width:3%"> : </td>
                        <td align="left">
                          <?php foreach ($dok as $data1) { ?>
                          <div>
                            <span value="<?php echo $data1->id_syaratFK;?>"/><?php echo $data1->judul_syarat;?>
                          </div>
                           <?php  } ?>
                        </td>
                      </tr>           
                    <?php  } ?>
                  </table>
                  <div class="box-footer">
                  <button type="submit" id = "cetak" class="btn btn-primary">Cetak</button>
                  </div>
                </div>
                  </form>
                <?php  } ?>
              </center>
          
          </div>
      </div>
          <div class="col-lg-6">
             <!--  <section class="content"> -->
      <div class="box box-primary">
        <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pendaftar</h3>
            </div>
                <div class="panel-body" style="text-align:center;">
                  <div class="form ">
                    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/editpendaftarankkproses');?>">
                      <input type="hidden" name="id_pendaftaran" id="id_pendaftaran" value="<?php echo $datapendaftaran['id_pendaftaran']; ?>">
                        <?php $dataE=$this->session->userdata('petEdit'); ?>
                      <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor Registrasi<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="no_registrasi" name="no_registrasi" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $datapendaftaran['no_registrasi']; ?>"/>
                      </div>
                  </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nomor KK</label>
                        <div class="col-lg-8">
                          <input class="form-control " id="noKK" name="noKK" type="text" value="<?php echo $datapendaftaran['noKK']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">NIK</label>
                        <div class="col-lg-8">
                          <input class="form-control " id="nik" name="nik" type="text" value="<?php echo $datapendaftaran['nik']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Nama Kepala Keluarga<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="nama_kepala_keluarga" name="nama_kepala_keluarga" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $datapendaftaran['nama_kepala_keluarga']; ?>"/>
                      </div>
                    </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Alamat<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="alamat" name="alamat" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $datapendaftaran['alamat']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RT<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="rt" name="rt" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $datapendaftaran['rt']; ?>"/>
                      </div>
                  </div>
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">RW<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="rw" name="rw" type="text" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $datapendaftaran['rw']; ?>"/>
                      </div>
                  </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Kecamatan<span class="required">*</span></label>
                        <div class="col-lg-8">
                        <select class="form-control m-bot15" id= "nama_kecamatan" name="nama_kecamatan" onchange="get_desa();" required>
                          <?php
                            foreach ($keca as $data) {
                          ?>
                            <option <?php if ($data->nama_kecamatan == $datapendaftaran['nama_kecamatan']) {echo "selected";} ?> value="<?php echo $data->id_kecamatan ?>" ><?php echo $data->nama_kecamatan ?></option>
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
                            <option <?php if ($data->nama_desakelurahan == $datapendaftaran['nama_desakelurahan']) {echo "selected";} ?> value="<?php echo $data->id_desakelurahan ?>" ><?php echo $data->nama_desakelurahan ?></option>
                          <?php
                          } ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3" style="text-align: left; padding-left: 7%;">Tanggal Jadi<span class="required">*</span></label>
                      <div class="col-lg-8">
                           <input class="form-control " id="tgl_jadi" name="tgl_jadi" type="date" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $datapendaftaran['tgl_jadi']; ?>"/>
                      </div>
                    </div>
                    <center>
                    <div class="form-group ">
                      <div class="box-footer">
                          <button class="btn btn-primary" name="simpan" id="simpan" type="submit">Simpan</button>
                      </div>
                    </div>
                    </center>
              </form>
      </div>
    </div>
  </section>
  </div>
</section>
</body>

  <script> 
    function getbulan(){
      var pilih_tahun = $("#pilih_tahun").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url(); ?>PendafAkteC/getbulan",
        data: "pilih_tahun="+pilih_tahun,
        success: function(msg){
          $('#bulantahun').html(msg);
        }
      });
    };
    function get_desa(){
      var nama_kecamatan = $("#nama_kecamatan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url();?>PendafKKC/getdesa",
        data: "nama_kecamatan="+nama_kecamatan,
        success: function(msg){
          $('#nama_desakelurahan').html(msg);
        }
      });
    };
  </script>