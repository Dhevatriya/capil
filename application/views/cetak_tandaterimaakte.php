<div style="position: absolute; top:130; left:40; font-size: 10pt; color: black;">
  <br>
  <br>
    <table border="0" align="left" cellspacing="0" cellpadding="10">
      <tbody>
        <tr>
          <th style="position:absolute; width:auto; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Nomor Registrasi</th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:auto; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['no_registrasi']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:auto; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> NIK </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:auto; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['nik']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:auto; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Nama Lengkap </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:auto; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['nama_lengkap']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:auto; text-align:left; padding:5;padding-top: 10; padding-left: 50;"> Alamat </th>
          <td style="padding:5; padding-top: 10; padding-left: 40"> : </td>
          <td style="text-align:left; width:auto; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['alamat']; ?>, RT <?php echo $d['rt']; ?> / RW <?php echo $d['rw']; ?>, <?php echo $d['nama_desakelurahan']; ?>, <?php echo $d['nama_kecamatan']; ?></td>
        </tr> 
        <tr>
          <th style="position:absolute; width:auto; text-align:left; padding:5; padding-top: 10; padding-left: 50;"> Tanggal Daftar </th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:auto; padding:5; padding-top:10; padding-left: 10;"><?php echo $d['tgl_daftar']; ?></td>
        </tr>
        <tr>
          <th style="position:absolute; width:auto; text-align:left; padding:5;padding-top: 10; padding-left: 50;"> Tanggal Jadi</th>
          <td style="padding:5; padding-top: 10; padding-left: 40;"> : </td>
          <td style="text-align:left; width:auto; padding:5; padding-top: 10; padding-left: 10;"><?php echo $d['tgl_jadi']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="text-align:center; padding:5; padding-top: 30; padding-left: 300; ">Operator<br><br><br><br><br><?php echo $d['nama_petugas']; ?></td>
          </tr>
      </tbody>

    </table>   
</div>
