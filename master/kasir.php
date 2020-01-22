<?php
	session_start();	
	include '../koneksi.php';
?>
<html>
<head>
	<title>Kantin Digital | Master</title>
</head>
<form method="post" enctype="multipart/form-data"> 
<body>
	<h1> "Selamat Datang "<?php $_SESSION['nama'];  ?></h1>
	<ul>
		<li><a href="?menu=pesanan">Pesanan</a></li>
		<li><a href="?menu=pembayaran">Pembayaran</a></li>
		<li><a href="?menu=logout">Logout</a></li>
	</ul>
	<?php 
			switch (@$_GET['menu']) {
				case 'pesanan':
					include '../pelanggan/statusPesan.php';
					break;
				case 'pembayaran':
					include 'pembayaran.php';
					break;
				case 'logout':
					include 'index.php';
					break;
				default:
					include '../pelanggan/statusPesan.php';
					break;
			}
		?>
	</body>
</form>
</html>