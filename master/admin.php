<?php 
	session_start();
	include '../koneksi.php';
 ?>
<html>
<head>
	<title>Kantin Digital | Master</title>
</head>
<form method ="post" enctype="multipart/form-data">
<body>
	<h1>Selamat Datang <?php $_SESSION ['nama'] ?> </h1>
		<ul>
			<li><a href="?menu=pengguna">Kelola pengguna </a></li>
			<li><a href="?menu=menu">Kelola menu </a></li>
			<li><a href="?menu=laporan">Kelola laporan </a></li>
			<li><a href="index.php">logout </a></li>
		</ul>
		<?php 
			switch (@$_GET['menu']) {
				case 'pengguna':
					include 'pengguna.php';
					break;
				case 'menu':
					include 'menu.php';
					break;
				case 'laporan':
					include 'laporan.php';
					break;
				default:
					include 'pengguna.php';
					break;
			}

		 ?>
      </body>
   </form>
</html>