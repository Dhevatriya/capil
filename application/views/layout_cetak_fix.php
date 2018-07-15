<html>
	<head>
		<link href="<?php echo base_url(); ?>/assets/css/custom1.css" rel="stylesheet">
	    <title>Cetak PDF</title>
	</head>
	<body>
		<br>
		<div style="position: absolute; text-align: right; top:10; right:10; font-size: 8pt; color: black; font-style: italic;"><?php echo "DISDUKCAPIL".date('-d/m/Y'); ?></div>
		<br>
		<br>
		<img style="position: absolute; top:30; left:3%; align:center;  width:6%;" src="<?php echo base_url(); ?>assets/img/a.png"/>
		<div style="position: absolute; text-align: left; top:20; left:10%; color: black; font-style: bold;">
			<h4 style="font-size: 10pt;">DINAS KEPENDUDUKAN DAN CATATAN SIPIL KABUPATEN KARANGANYAR 
			<h5>Jl. Kapten Mulyadi, Karanganyar | Telp. (0271) 495035, 49540 </h5></h4>
		</div>
		<div style="position: absolute; left:30; text-align: center; top:75; font-size: 10pt; color: black; width: 93%">
			<br>                                    
			<br>
			<hr size="10px" align="center" color="grey" width="100%">
			<h4 style="top: 40; font-size: 10pt;"><?php echo $judul_lap;?></h4>
		</div>

		<?php include $tabel; ?>

		<!-- <div style="position: absolute; text-align: center; bottom:0; left:25%; font-size: 8pt; color: black; font-style: italic;">
			<?php echo "---------"; ?><?php echo "Copyright © DISDUKCAPIL Kabupaten Karanganyar"; ?><?php echo "---------"; ?>
		</div>
		 -->
	</body>
</html>