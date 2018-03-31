<!-- <div style="position: absolute; top:185; left:92; font-size: 12pt; color: black;"> -->
<div style="position: absolute; top:210; left:70; font-size: 12pt; color: black;" align="center"> 
      <table border="1" align="center" cellspacing="" cellpadding="10" >
        <tbody>
          <tr style="background-color:#D8D8D8;">
            <th style="position:absolute; width:25; padding:5; border: 1x solid; text-align:center;">No </th>
            <th style="position:absolute; width:220; padding:5; border: 1px solid; text-align:center;" > Tanggal </th>
            <th style="position:absolute; width:150; padding:5; border: 1px solid; text-align:center;"> Total </th>
          </tr>
          <?php if( ! empty($d)){
            $no=1;
            foreach($d as $val){ ?>
          <tr style="background-color:#F4F4F4;">
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $no; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->tanggal; ?></td>
            <td style="border: 1px solid; text-align:center; padding:5;"><?php echo $val->total; ?></td>
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