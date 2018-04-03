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
            <li><b>Tanda Terima Pengambilan Berkas KK</b></li>
          </ol>
        </div>
      </div>
        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>

           <?php foreach($datapendafkkbaru as $data){ ?>
       
             <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/cetakpendaftarankk/'.$data->id_pendaftaran)?>">

              <section class="panel">
                  <header class="panel-heading">
                      <b>Tanda Terima Pengambilan Berkas KK</b>
                  </header>
               <center>
                <div class="panel-body" style="text-align:center;">
                      <table class="table" width="100%" > 
                      <?php foreach($datapendafkkbaru as $data){ ?>
                      
                      <tr>
                        <th>Nama </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->nama_kepala_keluarga; ?> </td>
                      </tr>
                      <tr>
                        <th>Alamat </th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->alamat; ?>, RT <?php echo $data->rt; ?> / RW <?php echo $data->rw; ?>, <?php echo $data->nama_desakelurahan ?>, <?php echo $data->nama_kecamatan; ?></td>
                      </tr>
                      <tr>
                        <th style="width:18%">Tanggal Buat</th>
                        <td style="width:2%"> : </td>
                        <td align="left"> <?php echo $data->tgl_buat; ?> </td>
                      </tr> 
                      <tr>
                        <th>Tanggal Jadi</th>
                        <td> : </td>
                        <td align="left"> <?php echo $data->tgl_jadi; ?> </td>
                      </tr>
                   
                      <tr>
                        <td colspan="3"> </td>
                      </tr>
                      <?php  } ?>
                    </table>
                <button type="submit" id = "cetak" class="btn btn-primary">Cetak</button>
                </div>
              </center>
            </section>

                
              

          </div>
        </div>

      </form>
                   <?php  } ?>
       <div>
              </div>
            </section>
          </body>