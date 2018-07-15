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
        Detail Syarat Pendaftaran Surat Pindah Datang
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
              <h3 class="box-title">Detail Syarat Surat Pendaftaran Pindah</h3>
            </div>
                <center>
                  <div class="panel-body" encrypt="multipart/form-data">        
                      <table class="table" width="100%" > 
                      <?php foreach($datapendaftaran as $data){ ?>
                      <tr>
                        <th style="width:18%;">Nomor Registrasi </th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->no_registrasi; ?> </td>
                      </tr> 
                      <tr>
                        <th style="width:18%;">NIK </th>
                        <td style="width: 3%"> : </td>
                        <td align="left"> <?php echo $data->nik; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Nama Lengkap</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_lengkap; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Jenis Kelamin </th>
                        <td style="width: 3%"> : </td>
                        <td align="left"> <?php echo $data->jenis_kelamin; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Tempat/Tanggal Lahir </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->tempat_lahir; ?>, <?php echo $data->tanggal_lahir; ?></td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Jumlah Anngota Pindah </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->jumlah_anggota_pindah; ?></td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Asal</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->data_asal; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%;">Alamat Tujuan </th>
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
                        <th style="width:18%;">Status Pendaftaran</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_status_pendaftaran; ?> </td>
                      </tr>
                      <tr>
                        <td colspan="3"> </td>
                      </tr>
                      <?php  } ?>
                    </table>
                  <div class="panel-body" encrypt="multipart/form-data">  <table class="table table-hover" border="1" width="100%" align="left">  
                      <thead>
                          <tr>
                            <th style="border: 2.3px solid;"><center> No </center></th>
                            <th style="border: 2.3px solid;"><center> Nama Syarat Pendaftaran </center></th>
                            <th style="border: 2.3px solid;"><center> Syarat</center></th>
                          </tr>
                      </thead> 
                      <tbody>  
                        <?php echo form_open_multipart('PendafPindahC/uploadSyaratPindahD/'.$dok[0]->id_pendaftaranFK);?>
                        <?php $no=1; foreach ($dok as $value):; ?>

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
                      <a href="<?php echo base_url('PendafPindahC/tambahsyaratpinpd/'.$value->id_pendaftaranFK) ?>"><button class="btn btn-primary" name="tambah" type="button">Edit Syarat Pendaftaran</button></a>
                      <a data-popup="tooltip" data-placement="top"><button class="btn btn-primary" name="simpan" type="submit" value="upload">Simpan</button></a>
                       <a href="<?php echo base_url('PendafPindahC/syaratpendafpindah') ?>"><button class="btn btn-default" name="batal" type="button">Kembali</button></a>
                       </center>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                </div>
              </center>
            </section>
                
              

          </div>
        </div>

      </form>
       <div>
              </div>
            </section>
          </body>