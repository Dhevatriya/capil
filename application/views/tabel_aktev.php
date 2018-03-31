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
<?php $no=0; foreach ($dataPenduduk as $value): $no++; ?>
  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafAkteC/buatakte/'.$value->nik);?>">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Data Penduduk</b>
                  </header>
               <center>

                <div class="panel-body" style="text-align:center;">
<!-- 
                      <table class="table" width="100%" > 
                      <?php foreach($dataPenduduk as $value){ ?>
                                            <input type="hidden" name="nik" id="nik" value="<?php echo $value->nik; ?>">
                      <input type="hidden" name="nama_lengkap" id="nama_lengkap" value="<?php echo $value->nama_lengkap; ?>">
                      <tr>
                        <tr>
                        <th>NIK </th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->nik; ?> </td>
                      </tr>
                        <th>Nama Lengkap</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->nama_lengkap; ?> </td>
                      </tr>
                      <tr>
                        <th>Jenis Kelamin</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->jenis_kelamin; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:25%">Tempat Lahir</th>
                        <td style="width:5%"> : </td>
                        <td align="left"> <?php echo $value->tempat_lahir; ?> </td>
                      </tr> 
                      <tr>
                        <th>Tanggal Lahir</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->tanggal_lahir; ?> </td>
                      </tr>
                      <tr>
                        <th>Agama </th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->agama; ?> </td>
                      </tr>
                        <th>Pendidikan</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->pendidikan; ?> </td>
                      </tr>
                      <tr>
                        <th>Jenis Pekerjaan</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->jenis_pekerjaan; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%">Status Perkawinan</th>
                        <td style="width:2%"> : </td>
                        <td align="left"> <?php echo $value->status_perkawinan; ?> </td>
                      </tr> 
                      <tr>
                        <th>Status Hubungan Dalam Keluarga</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->status_hub_dalam_keluarga; ?> </td>
                      </tr>
                      <tr>
                        <th>Kewarganegaraan</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->kewarganegaraan; ?> </td>
                      </tr>
                      <tr>
                        <th>Nomor Paspor </th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->no_paspor; ?> </td>
                      </tr>
                        <th>Nomor KITAS / KITAP</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->noKITASKITAP; ?> </td>
                      </tr>
                      <tr>
                        <th>Ayah</th>
                        <td> : </td>
                        <td align="left"> <?php echo $value->ayah; ?> </td>
                      </tr>
                      <tr>
                        <th style="width:18%">Ibu</th>
                        <td style="width:2%"> : </td>
                        <td align="left"> <?php echo $value->ibu; ?> </td>
                      </tr> 
                      <tr>
                         
                        <td colspan="3"> </td>
                      </tr>

                      <?php  } ?>
                    </table> 
                       <td><center>
                          <a  data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo site_url('PendafAkteC/datapendudukedit/'.$value->nik); ?>" ><button class="btn btn-info" name="batal" type="button">Ubah Data</button></a></td>
                         
              <button type="button " id="buatakte" class="btn btn-info">Buat Akte </button>
              <a href="<?php echo site_url('PendafAkteC ') ?>"><button class="btn btn-info" name="batal" type="button">Batal</button></a>
               </center></td> -->

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
                          <a class="btn btn-info btn-xs tooltips"  data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo site_url('PendafAkteC/datapendudukedit/'.$value->nik); ?>" ><i class="icon-pencil5"></i></a></td>
                          </center></td>

                      </tr>
                      <?php  endforeach; ?>

                    </tbody>
              </table>
                </div>


            </section>
          </div>
        </div>
                 <center>
                 <button type="button " id="buatakte" class="btn btn-info">Buat Akte </button>
              <a href="<?php echo site_url('PendafAkteC ') ?>"><button class="btn btn-info" name="batal" type="button">Batal</button></a>
              </center>      
                
      </form>
    <?php  endforeach; ?>
</center>
</section>
</form>
</section>
</body>