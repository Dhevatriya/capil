  <div class="content-wrapper">
          <?php
      header("Cache-control:no cache");
      session_cache_limiter("private_no_expire");
      ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Petugas
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
        <div class="alert alert-danger"><strong>Error! </strong> <?=$data;?></div>
        <?php } ?>

        <a class="btn btn-primary" href="<?php echo base_url() ?>AdminC/tambahPetugas" title="Tambah Petugas"><i class="icon-file-plus"></i> &nbsp Tambah Petugas</a>
       
        <br>
        <br>

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Petugas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>No</center></th>
                  <th><center>Nama Petugas</center>
                  <th><center>Alamat Petugas</center>
                  <th><center>No HP Petugas</center></th>
                  <th><center>Nama Pengguna</center></th>
                  <th><center>Peran</center></th>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                    <tbody>
                      <?php $no=0; foreach ($petugas as $value): $no++; ?>
                      <tr>
                      <td><center><?php echo $no; ?></center></td>
                       <td ><center><?php echo $value->nama_petugas; ?></center></td> 
                       <td ><center><?php echo $value->alamat_petugas; ?></center></td>  
                        <td ><center><?php echo $value->no_hp_petugas; ?></center></td> 
                        <td ><center><?php echo $value->username; ?></center></td>
                        <td ><center><?php echo $value->peran; ?></center></td>
                        <td><center>
                        <a class="btn btn-info btn-xs tooltips"  data-popup="tooltip" data-original-title="Ubah Data" data-placement="top" href="<?php echo base_url('AdminC/editPetugas/'.$value->id_petugas); ?>" ><i class="icon-pencil5"></i></a>
                        <?php if($value->peran !== 'admin'){  ?> 
                        <a class="btn btn-danger btn-xs tooltips"  data-popup="tooltip" data-original-title="Hapus Data" data-placement="top" href="<?php echo base_url('AdminC/hapusPetugas/'.$value->id_petugas); ?>" ><i class="fa fa-times" onclick="return confirm('Apakah anda yakin ingin menghapus petugas <?php echo getnamapetugas($value->id_petugas);?> ?')"></i></a>
                        <?php }else{ echo "";} ?>
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
</script>
