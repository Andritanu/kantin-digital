<?php 
	session_start();
	include '../koneksi.php';
	if (isset($_POST['login'])){
		$pass = md5 ($_POST['password']);
		$sql = mysqli_query($con,"SELECT * FROM tb_pengguna WHERE username = '$_POST[username]' && password='$pass'");
		$cek = mysqli_num_rows($sql);
		$f = mysqli_fetch_array($sql);
		$_SESSION ['nama'] = $f['nama_pengguna'];
		if($cek > 0){
			if($f['level']=="manager"){
				echo "<script>alert('selamat datang');
				document.location.href ='manager.php';</script>";
			}else if($f['level']=="admin"){
				echo "<script>alert('selamat datang');
				document.location.href ='admin.php';</script>";
			}else if($f['level']=="kasir"){
				echo "<script>alert('selamat datang');
				document.location.href ='kasir.php';</script>";
			}else {	
				echo "<script>alert('gagal login');
				document.location.href ='index.php;</script>";
			}	
	}
			else {
				echo "<script>alert('gagal login');		 
				document.location.href ='index.php;</script>";
			}
	}	
		     
			
 ?>
<html>
<head>
	<title> </title>
</head>
<form method ="post" enctype="multipart/form-data">
<body>
	<center>
		<h1>Selamat Datang</h1>
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type ="text" name ="username"></td>
			</tr>
			<tr>
				<td>password</td>
				<td>:</td>
				<td><input type ="password" name ="password"></td>
			</tr>
			<tr>
				<td><input type = "submit" name ="login" value = "login"></td>
			</tr>



</body>
</html>