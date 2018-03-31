<html>
	<head>
		<link href="<?php echo base_url(); ?>/assets/css/custom1.css" rel="stylesheet">
	    <title>Cetak PDF</title>
	</head>
	<body>
		<br>
	<!-- 	<div style="position: absolute; text-align: left; top:10; left:10; font-size: 10pt; color: black; font-style: italic;">http://www.btkljogja.or.id//</div> -->
		<div style="position: absolute; text-align: right; top:10; right:10; font-size: 10pt; color: black; font-style: italic;"><?php echo "DISDUKCAPIL".date('-d/m/Y'); ?></div>
		<br>
		<br>
		<!-- <img style="position: absolute; top:40; left:5%; align:center;  width:8%;" src="<?php echo base_url(); ?>assets/img/logo1.png"/> -->
		<div style="position: absolute; text-align: left; top:30; left:15%; color: black; font-style: bold;">
			<h4 style="font-size: 13pt;">DINAS KEPENDUDUKAN DAN CATATAN SIPIL <br> KABUPATEN KARANGANYAR 
			</h4>
			<h5>Jl. Kapten Mulyadi, Karanganyar | Telp. (0271) 495035, 49540 </h5>
		</div>
		<div style="position: absolute; left:43; text-align: center; top:95; font-size: 10pt; color: black; width: 88%">
			<br>                                    
			<br>
			<hr size="10px" align="center" color="grey" width="100%">
			<h4 style="font-size: 13pt;"><?php echo $judul_lap;?></h4>
		</div>

		<?php include $tabel; ?>

		<div style="position: absolute; text-align: center; bottom:0; left:25%; font-size: 10pt; color: black; font-style: italic;">
			<?php echo "---------"; ?><?php echo "Copyright © DISDUKCAPIL Kabupaten Karanganyar"; ?><?php echo "---------"; ?>
		</div>
		
	</body>
</html>