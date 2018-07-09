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
       Form Pendaftaran KK
      </h1>
    </section>

    <!-- Main content -->
   <section class="content">
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


      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#bnokk" data-toggle="tab">Pendaftaran KK</a></li>
            </ul>
                <div class="tab-content">
                  <div id="bnokk" class="tab-pane active">
                    <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?=site_url('PendafKKC/inputPendaftaranKKProses/');?>" >
                       <div class="form">
                        <br>
                         <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nomor KK</label>
                            <div class="col-lg-9 <?php if(form_error('noKK')!='') echo $id2; ?>">
                                <input class="form-control" id="noKK" name="noKK" type="text" placeholder="Masukkan Nomor KK" value="<?php echo $noKK; ?>" class="form-control m-bot15" oninput="setCustomValidity('')"/>
                                <?php echo form_error('noKK');?>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">NIK</label>
                            <div class="col-lg-9 <?php if(form_error('nik')!='') echo $id2; ?>">
                                <input class="form-control" id="nik" name="nik" type="text" placeholder="Masukkan NIK" value="<?php echo $nik; ?>" class="form-control m-bot15" oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nik');?>
                            </div>
                          </div>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Nama Kepala Keluarga<span class="required">*</span></label>
                            <div class="col-lg-9 <?php if(form_error('nama_kepala_keluarga')!='') echo $id2; ?>">
                                <input class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" type="text" placeholder="Masukkan Nama Kepala Keluarga" value="<?php echo $nama_kepala_keluarga; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                <?php echo form_error('nama_kepala_keluarga');?>
                            </div>
                          </div>
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Alamat<span class="required">*</span></label>
                              <div class="col-lg-9 <?php if(form_error('alamat')!='') echo $id2; ?>">
                                  <input class="form-control " id="alamat" type="text" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $alamat; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('alamat');?>
                              </div>
                          </div>   
                          <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >RT<span class="required">*</span></label>
                              <div class="col-lg-4 <?php if(form_error('rt')!='') echo $id2; ?>">
                                  <input class="form-control " id="rt" type="text" name="rt" placeholder="Masukkan RT" value="<?php echo $rt; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('rt');?>
                              </div>
                              <label for="curl" class="control-label col-lg-1">RW<span class="required">*</span></label>
                              <div class="col-lg-4 <?php if(form_error('rw')!='') echo $id2; ?>">
                                  <input class="form-control " id="rw" type="text" name="rw" placeholder="Masukkan RW" value="<?php echo $rw; ?>" class="form-control m-bot15" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')"/>
                                   <?php echo form_error('rw');?>
                          </div>
                        </div>
                        <?php $dataE=$this->session->userdata('parEdit'); ?>
                          <div class="form-group ">
                                  <label for="cname" class="control-label col-lg-2">Kecamatan <span class="required">*</span></label>
                                  <div class="col-lg-9">
                                      
                                        <select class="form-control m-bot15" name="nama_kecamatan" id="nama_kecamatan" onchange="get_desa();" required>
                                            <option value="" disabled selected><i>---Pilih Kecamatan---</i></option>
                                            <?php foreach ($kec as $data) {  ?>
                                              <option value="<?php echo $data->id_kecamatan;?>"><?php echo $data->nama_kecamatan;?></option>
                                        
                                            <?php  } ?>
                                        </select>
                                            
                                  </div>
                              </div>
                              <div class="form-group ">
                                  <label for="cemail" class="control-label col-lg-2">Desa/Kelurahan<span class="required">*</span></label>
                                  <div class="col-lg-9">
                                      <select class="form-control m-bot15" name="nama_desakelurahan" id="nama_desakelurahan" onchange="get_kode();" required>
                                        <option value="" disabled selected><i>---Pilih Desa/Kelurahan---</i></option>
                                          <?php if(count($des)>0) { ?>
                                              <?php foreach ($des as $data1) {  ?>
                                                <option value="<?php echo $data1->id_desakelurahan;?>"><?php echo $data1->nama_desakelurahan;?></option>
                                              <?php } ?>
                                          <?php  } else { ?>
                                              <option>- Data Belum Tersedia -</option>

                                        <?php } ?>
                                      </select>
                                  </div>
                              </div>
                            <div class="form-group ">
                              <label for="cname" class="control-label col-lg-2">Nama Petugas <span class="required">*</span></label>
                              <div class="col-lg-9">
                                  <input class="form-control " id="id_petugasFK" type="hidden" name="id_petugasFK" value="<?php echo $petugasUP['id_petugas'];?>" readonly />
                                  <input class="form-control " id="nama_petugas" type="text" name="nama_petugas" value="<?php echo $petugasUP['nama_petugas'];?>" readonly />
                              </div>                              
                            </div>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Tanggal Jadi<span class="required">*</span></label>
                              <div class="col-lg-9 <?php if(form_error('tgl_jadi')!='') echo $id2; ?>">
                                  <input  class="form-control pull-right" id="tgl_jadi" type="date" name="tgl_jadi" id="datepicker" placeholder="Masukkan Tanggal Jadi" value="<?php echo $tgl_jadi; ?>" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" min="<?php echo date('Y-m-d')?>" oninput="setCustomValidity('')" id="datepicker"/>
                                   <?php echo form_error('tgl_jadi');?>
                              </div>
                            </div>
                            <?php echo form_error('id_syarat[]'); ?>
                            <div class="form-group ">
                              <label for="curl" class="control-label col-lg-2" >Syarat</label>
                               <div class="col-lg-9">
                                <?php foreach ($dok as $data1) { ?>
                                  <div class="checkbox">
                                    <input type="checkbox" name="id_syarat[]" id="id_syarat[]" value="<?php echo $data1->id_syarat;?>" class="required"/><?php echo $data1->judul_syarat;?>
                                  </div>
                                <?php  } ?>
                            </div>
                          </div>
                          <center>
                              <div class="box-footer">
                                  <button class="btn btn-primary" name="simpan" type="submit">Daftar</button>
                              </div>
                          </center>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
  </section>
</body>
</html>
</section>
<script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
  <script type="text/javascript">
    $(function(){
      $(":checkbox.cb").click(function(){
        $("#form1, #form2").hide()
        if($(this).val() == "1"){
          $("#form1").show();
        }else{
          $("#form2").show();
        }
      });
    });
  </script>
      <script src="<?php echo base_url(); ?>/assets/js/jquery-1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.8.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/chartjs.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
    // <![CDATA[
function get_desa(){
      var nama_kecamatan = $("#nama_kecamatan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url();?>PendafKKC/getdesa",
        data: "nama_kecamatan="+nama_kecamatan,
        success: function(msg){
          $('#nama_desakelurahan').html(msg);
        }
      });
    };
   function get_kode(){
      var nama_desakelurahan = $("#nama_desakelurahan").val();
      $.ajax({
        type: "POST",
        url : "<?php echo base_url();?>PendafKKC/getkode",
        data: "nama_desakelurahan="+nama_desakelurahan,
        success: function(msg){
          $('#kode_pos').html(msg);
        }
      });
    };
     function validate(){
      if(isset($_POST['simpan'])){
        var check = document.getElementsByName('id_syarat[]');
        var hasChecked = false;
        for (var i = 0; i<check.length; i++){
          if (check[i].hasChecked) {
              hasChecked=true;
              break;
          }
        }
        if (hasChecked == false){
          alert("Syarat tidak terpenuhi !");
          return false;
        }
        return true;
      }
  }
    </script>
<!-- 
    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script> -->