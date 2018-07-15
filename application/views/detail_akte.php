<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Unggah Syarat Pendaftaran Akte
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
            <div class="box-header with-border">
              <h3 class="box-title">Detail Unggah Syarat Pendaftaran</h3>
            </div>
  
       <?php foreach($datapendaftaran as $data){ ?>
              <section class="panel">
               <center>
                <div class="panel-body" style="text-align:center;">
                      <table class="table" width="100%" > 
                      <?php foreach($datapendaftaran as $data){ ?>
                      <tr>
                        <th style="width:18%;">Nomor Registrasi </th>
                        <td style="width:%"> : </td>
                        <td align="left"> <?php echo $data->no_registrasi; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">NIK </th>
                        <td style="width:%"> : </td>
                        <td align="left"> <?php echo $data->nik; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Nama Lengkap</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_lengkap; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Tempat/Tanggal Lahir </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->tempat_lahir; ?>, <?php echo $data->tanggal_lahir; ?></td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Jenis Kelamin</th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->jenis_kelamin; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Alamat </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->alamat; ?>, RT <?php echo $data->rt; ?> / RW <?php echo $data->rw; ?>, <?php echo $data->nama_desakelurahan; ?>, <?php echo $data->nama_kecamatan; ?></td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Nama Petugas</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_petugas; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Tanggal Daftar</th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->tgl_daftar; ?> </td>
                      </tr> 
                      <tr>
                        <th style="width:18%;">Tanggal Jadi</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->tgl_jadi; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Jenis Akte</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->jenis_akte; ?></td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Status Pendaftaran</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_status_pendaftaran; ?> </td>
                      </tr>
                      <?php  } ?>
                    </table>
                <center>
                  <div class="panel-body" encrypt="multipart/form-data">         
                    <table class="table table-hover" border="1" width="100%" align="left">  
                      <thead>
                          <tr>
                            <th style="border: 2.3px solid;"><center> No </center></th>
                            <th style="border: 2.3px solid;"><center> Nama Syarat Pendaftaran </center></th>
                            <th style="border: 2.3px solid;"><center> Syarat</center></th>
                          </tr>
                      </thead> 
                      <tbody>  
                        <?php echo form_open_multipart('PendafAkteC/uploadSyarat/'.$dok[0]->id_pendaftaranFK);?>
                        <?php $no=1; foreach ($dok as $value):; ?>
                        <input type="hidden" name="id_pendaftaran" id="id_pendaftaran[]" value="<?php echo $value->id_pendaftaran; ?>">
                          <input type="hidden" name="id_detail_syarat[]" id="id_detail_syarat[]" value="<?php echo $value->id_detail_syarat; ?>">
                          <tr>
                            <td><center><?php echo $no; ?></center></td>
                            <td><center><?php echo $value->judul_syarat ; ?></center></td>
                            <td><center><input type="file" name="userfile[<?=$no?>]" id="userfile[]" multiple="" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <?php echo form_error('gambar');?>
                            </center></td>
                      <?php   $no++;endforeach; ?>
                      </tbody> 
                    </table>
                          <?php } ?>
                      <a href="<?php echo base_url('PendafAkteC/tambahsyaratakte/'.$value->id_pendaftaranFK) ?>"><button class="btn btn-primary" name="tambah" type="button">Edit Syarat Pendaftaran</button></a>
                      <a data-popup="tooltip" data-placement="top"><button class="btn btn-primary" name="simpan" type="submit" value="upload">Simpan</button></a>
                      <a href="<?php echo base_url('PendafAkteC/syaratpendafakte') ?>"><button class="btn btn-default" name="batal" type="button">Kembali</button></a>
                  </div>
                  <?php echo form_close(); ?>
                </div>
            </div>      
              </center>
            </section>
          </div>
        </div>

       <div>
              </div>
            </section>
          </body>