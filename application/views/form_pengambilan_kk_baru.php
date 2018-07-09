<section id="main-content">
<body>
    <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Tanda Terima Berkas KK</h3>
        </div>
      </div>
        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>
       <?php foreach($datakeluargabarumanual as $data){ ?>
             <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/cetakpendaftarankkbynik/'.$data->id_pendaftaran)?>">
             <div class="col-lg-12" style="padding-left: 10%; padding-right: 10% ">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Tanda Terima Pengambilan Berkas KK</b>
                  </header>
               <center>
                <div class="panel-body" style="text-align:center;">
                      <table class="table" width="100%" > 
                      <?php foreach($datakeluargabarumanual as $data){ ?>
                      <tr>
                        <th style="width:23%; padding-left:30px">NIK </th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->nik; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:23%; padding-left:30px">Nama Kepala Keluarga</th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->nama_kepala_keluarga; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:23%; padding-left:30px">Alamat </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->alamat; ?>, RT <?php echo $data->rt; ?> / RW <?php echo $data->rw; ?>, <?php echo $data->nama_desakelurahan; ?>, <?php echo $data->nama_kecamatan; ?></td>
                      </tr>
                      <tr>
                        <th style="width:23%; padding-left:30px">Tanggal Buat</th>
                        <td style="width:3%"> : </td>
                        <td align="left"> <?php echo $data->tgl_buat; ?> </td>
                      </tr> 
                      <tr>
                        <th style="width:23%; padding-left:30px">Tanggal Jadi</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->tgl_jadi; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:23%; padding-left:30px">Status</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_status_pendaftaran; ?> </td>
                      </tr>
                      <tr>
                        <td colspan="3"> </td>
                      </tr>
                      <?php  } ?>
                    </table>
                <a data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo site_url('PendafKKC/datakeluargaeditbynik/'.$data->id_pendaftaran); ?>" ><button class="btn btn-primary" name="edit" type="button">Edit</button></a>
                <button type="submit" id = "cetak" class="btn btn-primary">Cetak</button>
                <a href="<?php echo site_url('PendafKKC/') ?>"><button class="btn btn-default" name="batal" type="button">Kembali</button></a>
                </div>
              </center>
            </section>
                
              

          </div>
        </div>

      </form>
      <?php } ?>
       <div>
              </div>
            </section>
          </body>
          