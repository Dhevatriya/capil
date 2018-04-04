<div style="position: absolute; top:180; left:40; font-size: 12pt; color: black;">
    <table border="0" align="left" cellspacing="0" cellpadding="10">
      <tbody>
   
        <tr>
          <br>
          <br>
          <th style="position:absolute; width:0; text-align:left; padding:5; padding-top: 30; padding-left: 50;"> Nomor KK </th>
          <td style="padding:5; padding-top: 30; padding-left: 40;"> : </td>
          <td style="position:absolute; width:350; text-align:left; padding:5; padding-top: 30; padding-left: 10;" ><?php echo $d['noKK']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Nama Kepala Keluarga </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:20%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['nama_kepala_keluarga']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5;padding-top: 10; padding-left: 50;"> Alamat </th>
          <td style="padding:5; padding-top: 10; padding-left: 40"> : </td>
          <td style="text-align:left; width:50%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['alamat']; ?>, RT <?php echo $d['rt']; ?> / RW <?php echo $d['rw;'] ?>, <?php echo $d['desa']; ?>, <?php echo $d['kelurahan']; ?>, <?php echo $d['kecamatan']; ?></td>
        </tr> 
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Tanggal Buat </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:20%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['tgl_buat']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:0; text-align:left; padding:5;padding-top: 10; padding-left: 50;"> Tanggal Jadi</th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:20%; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['tgl_jadi']; ?></td>
        </tr>

      </tbody>

    </table>   
</div>
