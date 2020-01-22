<?php 
	session_start();
	include '../koneksi.php';
	 ?>
	 <html>
	 <head>
	 	<title>kantin digital</title>
	 </head>
	 <form method="post">
	 <body>
	 	<center>
	 		<h1><?php echo "selamat datang meja no".$_SESSION['noMeja'];  ?></h1>
	 	</center>
	 	<ul>
	 		<li><a href ="?menu=pesan">pesan </a></li>
	 		<li><a href ="?menu=statuspesan">status pesanan </a></li>
	 	</ul>
	 	<?php 
	 	switch (@$_GET['menu']) {
	 	 	case 'pesan':
	 	 		include 'pesan.php';
	 	 		break;
	 	 	case 'statuspesan':
	 	 		include'statuspesan.php';
	 	 		break;
	 	 	
	 	 	default:
	 	 		include 'pesan.php';
	 	 		break;
	 	 } ?>
	 </form>
	 </body>
	 </html>