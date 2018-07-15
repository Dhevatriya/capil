<section id="main-content">
        <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Riwayat Pendaftaran Akte
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
              <h3 class="box-title">Detail Riwayat Pendaftaran</h3>
            </div>
  
       <?php foreach($datapendaftaran as $data){ ?>
             <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url('PendafAkteC/cetakpendaftaranakte/'.$data->id_pendaftaran)?>">
              <!-- <div class="col-lg-12" style="padding-left: 10%; padding-right: 10% "> -->
              <section class="panel">
               <center>
                <div class="panel-body" style="text-align:center;">
                      <table class="table" width="100%" > 
                      <?php foreach($datapendaftaran as $data){ ?>
                      <tr>
                        <th style="width:18%;">Nomor Registrasi </th>
                        <td style="width:3%"> : </td>
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
                     <table class="table table-hover" border="1" width="100%" align="left">  
                      <thead>
                          <tr>
                            <th style="border: 2.3px solid;"><center> No </center></th>
                            <th style="border: 2.3px solid;"><center> Nama Syarat Pendaftaran </center></th>
                            <th style="border: 2.3px solid;"><center> Syarat</center></th>
                          </tr>
                      </thead> 
                      <tbody>  
                        <?php $no=1; foreach ($datapendafsyarat as $value):; ?>                         
                          <tr>
                            <td><center><?php echo $no; ?></center></td>
                            <td><center><?php echo $value->judul_syarat ; ?></center></td>
                           <td><center><img data-imagezoom="true" style="height: 275px; width: 225px;" class="img-responsive" src="<?php echo base_url('images/'.$value->gambar)?>">
                      <?php   $no++;endforeach; ?>
                      </tbody> 
                    </table>
                    <a href="<?php echo base_url('PendafAkteC/riwayatpendafakte') ?>"><button class="btn btn-default" name="batal" type="button">Kembali</button></a>
                <center>
      </form>
      <?php } ?>
       <div>
              </div>
            </section>
          </body>