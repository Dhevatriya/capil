    <!--  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafAkteC/buatakte');?>">
        <div class="col-md-12 portlets">
          <div class="col-lg-12">
              <section class="panel">
                  <header class="panel-heading">
                      <b>Data Penduduk</b>
                  </header>
        <div class="panel-body">
            <div class="form">
                <div class="form-group">
                    <label class="control-label col-xs-3" >Nomor Induk Kependudukan</label>
                    <div class="col-lg-8">
                        <input name="noNIK" class="form-control" type="text" placeholder="Nomor Induk Kependudukan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Nama Lengkap</label>
                    <div class="col-lg-8">
                        <input name="nama_lengkap" class="form-control" type="text" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Jenis Kelamin</label>
                    <div class="col-lg-8">
                        <input name="jenis_kelamin" class="form-control" type="text" placeholder="Jenis Kelamin">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Tempat Lahir</label>
                    <div class="col-lg-8">
                        <input name="tempat_lahir" class="form-control" type="text" placeholder="Tempat Lahir" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Tanggal Lahir</label>
                    <div class="col-lg-8">
                        <input name="tanggal_lahir" class="form-control" type="date" placeholder="Tanggal Lahir" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Agama</label>
                    <div class="col-lg-8">
                        <input name="agama" class="form-control" type="text" placeholder="Agama">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Pendidikan</label>
                    <div class="col-lg-8">
                        <input name="pendidikan" class="form-control" type="text" placeholder="Pendidikan" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Jenis Pekerjaan</label>
                    <div class="col-lg-8">
                        <input name="jenis_pekerjaan" class="form-control" type="text" placeholder="Jenis Pekerjaan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Status Perkawinan</label>
                    <div class="col-lg-8">
                        <input name="status_perkawinan" class="form-control" type="text" placeholder="Status Perkawinan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Status Hubungan Dalam Keluarga</label>
                    <div class="col-lg-8">
                        <input name="status_hub_dalam_keluarga" class="form-control" type="text" placeholder="Status Hubungan Dalam Keluarga" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Kewarganegaraan</label>
                    <div class="col-lg-8">
                        <input name="kewarganegaraan" class="form-control" type="text" placeholder="Kewarganegaraan" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Nomor Paspor</label>
                    <div class="col-lg-8">
                        <input name="no_paspor" class="form-control" type="text" placeholder="Nomor Paspor">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Nomor KITAS / KITAP</label>
                    <div class="col-lg-8">
                        <input name="noKITASKITAP" class="form-control" type="text" placeholder="Nomor KITAS KITAP" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Ayah</label>
                    <div class="col-lg-8">
                        <input name="ayah" class="form-control" type="text" placeholder="Ayah">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Ibu</label>
                    <div class="col-lg-8">
                        <input name="ibu" class="form-control" type="text" placeholder="Ibu">
                    </div>
                </div>
        </div>
    </div>
</section>
</div>
</div>
 <center> 
                <button type="submit" class="btn btn-primary">Buat Akte</button>
                <button type="submit" class="btn btn-primary"> Simpan</a></button>
                <button type="submit" class="btn btn-default">Batal</button>
                </center>    
</form> 
                       
   <!-- <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=base_url();?>TemplateC/search"> -->
</section>
 
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $('#btn-search').click(function(){
                 // $('#btn-search').on(function(){
                var noNIK=$('#noNIK').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/PendafAkteC/get_noNIK')?>",
                    dataType : "JSON",
                    data : {noNIK: noNIK},
                    cache:false,
                    success: function(data){
                        $.each(data,function(noNIK, noKK_FK, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,jenis_pekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, noKITASKITAP, ayah, ibu){
                            $('[name="noNIK"]').val(data.noNIK);
                            $('[name="nama_lengkap"]').val(data.nama_lengkap);
                            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
                            $('[name="tempat_lahir"]').val(data.tempat_lahir);
                            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
                            $('[name="agama"]').val(data.agama);
                            $('[name="pendidikan"]').val(data.pendidikan);
                            $('[name="jenis_pekerjaan"]').val(data.jenis_pekerjaan);
                            $('[name="status_perkawinan"]').val(data.status_perkawinan);
                            $('[name="status_hub_dalam_keluarga"]').val(data.status_hub_dalam_keluarga);
                            $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
                            $('[name="no_paspor"]').val(data.no_paspor);
                            $('[name="noKITASKITAP"]').val(data.noKITASKITAP);
                            $('[name="ayah"]').val(data.ayah);
                            $('[name="ibu"]').val(data.ibu);
                             
                        });
                         
                    }
                });
                return false;
           });
        // });
        });
    </script>
    <script type="text/javascript">
         $(document).ready(function(){
            $('#btn-search').click(function(){
                var noNIK=$('#noNIK').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/PendafAkteC/get_noNIK')?>",
                    dataType : "JSON",
                    data : {noNIK: noNIK},
                    cache:false,
                    success: function(data){
                        $.each(data,function(noNIK, noKK_FK, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,jenis_pekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, noKITASKITAP, ayah, ibu){
                            $('[name="noNIK"]').val(data.noNIK);
                            $('[name="nama_lengkap"]').val(data.nama_lengkap);
                            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
                            $('[name="tempat_lahir"]').val(data.tempat_lahir);
                            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
                            $('[name="agama"]').val(data.agama);
                            $('[name="pendidikan"]').val(data.pendidikan);
                            $('[name="jenis_pekerjaan"]').val(data.jenis_pekerjaan);
                            $('[name="status_perkawinan"]').val(data.status_perkawinan);
                            $('[name="status_hub_dalam_keluarga"]').val(data.status_hub_dalam_keluarga);
                            $('[name="kewarganegaraan"]').val(data.kewarganegaraan);
                            $('[name="no_paspor"]').val(data.no_paspor);
                            $('[name="noKITASKITAP"]').val(data.noKITASKITAP);
                            $('[name="ayah"]').val(data.ayah);
                            $('[name="ibu"]').val(data.ibu); 
                             
                        });
                         
                    }
                });
                return false;
            }
      //      $('#btn-search').click(function(){
      //           search();

      //      });

      //       $('#noKK').keyup(function(e) {
      //     if(e.keyCode == 13) {
      //       search();
      // }        // });
      //   });
    });
    </script>