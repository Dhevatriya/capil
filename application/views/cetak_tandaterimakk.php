<!-- <div style="position: absolute; top:185; left:92; font-size: 12pt; color: black;"> -->
<div style="position: absolute; top:180; left:40; font-size: 12pt; color: black;">
    <table border="0" align="left" cellspacing="0" cellpadding="10">
      <tbody>
        <?php
            if( ! empty($d)){
                foreach($d as $data){ ?>
        <tr>
          <br>
          <br>
          <th style="position:absolute; width:0; text-align:left; padding:5; padding-top: 30; padding-left: 50;"> Nomor KK </th>
          <td style="padding:5; padding-top: 30; padding-left: 40;"> : </td>
          <td style="position:absolute; width:350; text-align:left; padding:5; padding-top: 30; padding-left: 10;" ><?php echo $data->noKK; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Nama Kepala Keluarga </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:20%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $data->nama_kepala_keluarga; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5;padding-top: 10; padding-left: 50;"> Alamat </th>
          <td style="padding:5; padding-top: 10; padding-left: 40"> : </td>
          <td style="text-align:left; width:50%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $data->alamat; ?>, RT <?php echo $data->rt; ?> / RW <?php echo $data->rw; ?>, <?php echo $data->desa; ?>, <?php echo $data->kelurahan; ?>, <?php echo $data->kecamatan; ?></td>
        </tr> 
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Tanggal Buat </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:20%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $data->tgl_buat; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5;padding-top: 10; padding-left: 50;"> Tanggal Jadi</th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:20%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $data->tgl_jadi; ?></td>
        </tr>
        <?php  } ?>
        <tr>
          <td style="padding:5;"></td>
        </tr>
      </tbody>
    </table>   
            <?php }
        ?> 
</div>
