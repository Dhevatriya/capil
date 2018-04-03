<section id="main-content">
    <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-user-md"></i>Data Petugas</li>                                  
              </ol>
          </div>
        </div>
        <?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>
        <?php 
        $data2=$this->session->flashdata('error');
        if($data2!=""){ ?>
        <div class="alert alert-success"><strong>Error! </strong> <?=$data;?></div>
        <?php } ?>

        <a class="btn btn-primary" href="<?php echo site_url('AdminC/tambah_petugas') ?>" title="Bootstrap 3 themes generator"><i class="icon-file-plus"></i> &nbsp Tambah Petugas</a>
       
        <br>
        <br>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading" >
                <b>Data Petugas</b>
              </header>
               <center>
                <div class="panel-body" style="text-align:center;">
                <table id="example2" class="table table-bordered">
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Petugas</center>
                  <th><center>Alamat Petugas</center>
                  <th><center>No HP Petugas</center></th>
                  <th><center>Username</center></th>
                  <th><center>Peran</center></th>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                    <tbody>
                      <?php $no=0; foreach ($petugas as $value): $no++; ?>
<!--                       <input type="hidden" name="noKK" id="noKK" value="<?php echo $value->noKK; ?>">
                      <input type="hidden" name="nama_kepala_keluarga" id="nama_kepala_keluarga" value="<?php echo $value->nama_kepala_keluarga; ?>"> -->
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                       <td ><center><?php echo $value->nama_petugas; ?></center></td> 
                       <td ><center><?php echo $value->alamat_petugas; ?></center></td>  
                        <td ><center><?php echo $value->no_hp_petugas; ?></center></td> 
                        <td ><center><?php echo $value->username; ?></center></td>
                        <td ><center><?php echo $value->peran; ?></center></td>
                        <td><center>
                        <a class="btn btn-info btn-xs tooltips"  data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo site_url('AdminC/adminedit/'.$value->id_petugas); ?>" ><i class="icon-pencil5"></i></a>
                          
                        </td>
                      </tr>
                      <?php  endforeach; ?>
                    </tbody>
              </table>
                </div>
              </center>
        </section>
      </div>
    </div>
  </section>
</section>
