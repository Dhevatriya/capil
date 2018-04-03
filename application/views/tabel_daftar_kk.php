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
            <li><b>Data Kartu Keluarga</b></li>
          </ol>
        </div>
      </div>
        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>

   <?php $no=0; foreach ($dataPenduduk as $value): $no++; ?>
          <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/buatkkbaru/'.$value->nik)?>">
<!--      
        <div class="col-md-13 portlets">
          <div class="col-lg-12"> -->
              <section class="panel">
                  <header class="panel-heading">
                      <b>Data Penduduk</b>
                  </header>
               <center>
                <div class="panel-body" style="text-align:center;">
                  <table id="example2" class="table table-bordered">
               <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>NIK</center></th>
                  <th><center>Nama Lengkap</center></th>
                  <th><center>Jenis Kelamin</center></th>
                  <th><center>Tempat Lahir</center></th>
                  <th><center>Tanggal Lahir</center></th>
                  <th><center>Agama</center></th>
                  <th><center>Pendidikan</center></th>
                  <th><center>Jenis Pekerjaan</center></th>
                  <th><center>Status Perkawinan</center></th>                  
                  <th><center>Status Hubungan Keluarga</center></th>
                  <th><center>Kewarga- negaraan</center></th>
                  <th><center>Nomor Paspor</center></th>
                  <th><center>Nomor KITAS / KITAP</center></th>
                  <th><center>Ayah</center></th>
                  <th><center>Ibu</center></th>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                     <tbody>
                      <input type="hidden" name="nik" id="nik" value="<?php echo $value->nik; ?>">
                      <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?php echo $value->nama_lengkap; ?>">
                 
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td><center><?php echo $value->nik; ?></center></td>  
                        <td ><center><?php echo $value->nama_lengkap; ?></center></td>
                        <td ><center><?php echo $value->jenis_kelamin; ?></center></td>
                        <td><center><?php echo $value->tempat_lahir; ?></center></td>
                        <td><center><?php echo $value->tanggal_lahir; ?></center></td>
                        <td><center><?php echo $value->agama;?></center></td> 
                        <td ><center><?php echo $value->pendidikan; ?></center></td>
                        <td><center><?php echo $value->nama_jenispekerjaan; ?></center></td> 
                        <td ><center><?php echo $value->status_perkawinan; ?></center></td>
                        <td ><center><?php echo $value->status_hub_dalam_keluarga; ?></center></td>
                        <td><center><?php echo $value->kewarganegaraan; ?></center></td>
                        <td><center><?php echo $value->no_paspor; ?></center></td>
                        <td><center><?php echo $value->no_kitas_kitap;?></center></td> 
                        <td ><center><?php echo $value->ayah; ?></center></td>
                        <td><center><?php echo $value->ibu; ?></center></td> 
                        <td><center>
                          <a  class="btn btn-info btn-xs tooltips"  data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo site_url('PendafKKC/datapendudukeditkkbaru/'.$value->nik); ?>" ><i class="icon-pencil5"></i></a>
                          </center></td>

                      </tr>


                    </tbody>
              </table>
                </div>
              </center>

            </section>
          </div>
        </div>

                <center> 
                <button type="submit" id = buatkk class="btn btn-primary">Buat KK Baru</button>
                <a href="<?php echo site_url('PendafKKC/') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                </center>
              </div>

      </form>
        <?php  endforeach; ?>

</section>
</body>
