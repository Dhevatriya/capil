<!-- <div style="position: absolute; top:185; left:92; font-size: 12pt; color: black;"> -->
<div style="position: absolute; top:170; left: 10; font-size: 10pt; color: black;" align="center"> 
      <table border="1" align="center" cellspacing="" cellpadding="10" >
        <tbody>
          <tr style="background-color:#D8D8D8;">
            <th style="position:absolute; width:10; padding:5; border: 1x solid; text-align:center;">No </th>
            <th style="position:absolute; width:50; padding:5; border: 1px solid; text-align:center;" > Nomor Registrasi </th>
            <th style="position:absolute; width:100; padding:5; border: 1px solid; text-align:center;"> NIK </th>
            <th style="position:absolute; width:100; padding:5; border: 1px solid; text-align:center;" > Nama Lengkap </th>
            <th style="position:absolute; width:100; padding:5; border: 1px solid; text-align:center;" >Jumlah Anggota Pindah </th>
            <th style="position:absolute; width:100; padding:5; border: 1px solid; text-align:center;"> Alamat Asal </th>
            <th style="position:absolute; width:100; padding:5; border: 1px solid; text-align:center;"> Tujuan </th>
            <th style="position:absolute; width:60; padding:5; border: 1px solid; text-align:center;" > Tanggal Daftar </th>
            <th style="position:absolute; width:60; padding:5; border: 1px solid; text-align:center;"> Tanggal Jadi </th>
          </tr>
          <?php if( ! empty($d)){
            $no=1;
            foreach($d as $val){ ?>
          <tr style="background-color:#F4F4F4;">
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $no; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->no_registrasi; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->nik; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->nama_lengkap; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->jumlah_anggota_pindah; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->alamat; ?>, RT <?php echo $val->rt; ?>/RW <?php echo $val->rw; ?>, <?php echo $val->nama_desakelurahan; ?>, <?php echo $val->nama_kecamatan; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->data_tujuan; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->tgl_daftar; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->tgl_jadi; ?></td>
          </tr>                       
          <?php  $no++;} ?>
        <?php }else{ ?>
          <tr style="background-color:#F4F4F4;">
            <td colspan="5" style="border: 1px solid; text-align:center; padding:5;" ><?php echo "--Data tidak ada--"; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
</div>