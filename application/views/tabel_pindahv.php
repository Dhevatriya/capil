<section id="main-content">
<html>
<body>
    <?php
  header("Cache-control:no cache");
  session_cache_limiter("private_no_expire");
  ?>
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><b>Data Penduduk</b></li>
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
        <!-- <?php foreach ($pemlk as $value); ?> -->

  <form class="form-validate form-horizontal" id="feedback" method="POST" >
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
                      <?php $no=0; foreach ($dataPenduduk as $value): $no++; ?>
                      <input type="hidden" name="nik" id="nik" value="<?php echo $value->nik; ?>">
                      <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?php echo $value->nama_lengkap; ?>">
                      <tr>
                      <td><center><?php echo $no; ?></center></td> 
                        <td><center><?php echo $value->nik; ?></center></td>
                        <td><center><?php echo $value->nama_lengkap; ?></center></td>
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
                          <a class="btn btn-info btn-xs tooltips"  data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo site_url('PendafPindahC/datapendudukeditpindah/'.$value->nik); ?>" ><i class="icon-pencil5"></i></a></td>
                          </center></td>

                      </tr>
                      <?php  endforeach; ?>

                    </tbody>
              </table>
                </div>


            </section>
          </div>
<!--           <center> 
                <button type="submit" value = "pindah" class="btn btn-primary">Buat Surat Pindah</button>
                <button type="submit" value = "pindahdatang" class="btn btn-primary">Buat Surat Pindah Datang</button>
                <a href="<?php echo site_url('PendafPindahC/') ?>"><button class="btn btn-default" name="batal" type="button">Batal</button></a>
                </center> -->
        </div>
    
                
      </form>
      <?php $no=0; foreach ($dataPenduduk as $value): $no++; ?>
                <input type="hidden" name="nik" id="nik" value="<?php echo $value->nik; ?>">
                <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?php echo $value->nama_lengkap; ?>" method="POST">
                 <center>
                 <a href="<?=site_url('PendafPindahC/buatpindah/'.$value->nik);?>"><button type="button " id="pindah" class="btn btn-info">Buat Surat Pindah </button></a>
                  <a href="<?=site_url('PendafPindahC/buatpindahdatang/'.$value ->nik);?>"><button type="button " id="pindahdatang" class="btn btn-info">Buat Surat Pindah Datang </button></a>
              <a href="<?php echo site_url('PendafPindahC ') ?>"><button class="btn btn-info" name="batal" type="button">Batal</button></a>
              </center> 
                      <?php  endforeach; ?>

</center>
</td>
</tr>
</tbody>
</table>
</div>
</center>
</section>
</form>
</section>
</body>
