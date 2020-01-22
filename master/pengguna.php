<?php 
	include '../koneksi.php';
	error_reporting(0);
	if (isset($_POST['simpan'])){
		$pas = md5($_POST['password']);
		$sql = mysqli_query($con, "INSERT INTO tb_pengguna VALUES ('','$_POST[nama]','$_POST[jabatan]','$_POST[username]','$pas')");
		if ($sql){
			echo "<script>alert('data berhasil disimpan');
			document.location.href='?menu=pengguna';</script>";
		}else{
		    echo "<script>alert('data gagal disimpan');
			document.location.href='?menu=pengguna';</script>";
		}
		}
	if (isset($_GET['edit'])){
	  $sql = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$_GET[id]'");
	  $isi = mysqli_fetch_array ($sql);
	
	}
	if (isset($_GET['hapus'])){
	  $sql = mysqli_query($con, "DELETE FROM tb_pengguna WHERE id_pengguna = '$_GET[id]'");
	  if ($sql){
			echo "<script>alert('data berhasil dihapus');
			document.location.href='?menu=pengguna';</script>";
			}else{
		    echo "<script>alert('data gagal dihapus');
			document.location.href='?menu=pengguna';</script>";
		}
	}
	if (isset($_POST['update'])){
		$sql = mysqli_query($con, "UPDATE  tb_pengguna SET id_pengguna = '$_POST[id_pengguna]',nama_pengguna = '$_POST[nama_pengguna]',level = '$_POST[level]',username = '$_POST[username]',password= '$_POST[password]' WHERE id_pengguna ='GET[id_pengguna]'");
	  if ($sql){
	  	echo "<script>alert('data berhasil diubah');document.location.href='pengguna.php';</script>";
	}
}
		
 ?>
<html>
<head>	 
	<title></title>
</head>
	<form method ="post">
<body>
	<table align="center">
		<tr>
			<td>nama pengguna</td>
		    <td>:</td>
		    <td><input type ="text" name = "nama"  value="<?php echo $isi ['nama_pengguna']?>"></td> 
		</tr>
		<tr>
			<td>jabatan</td>
			<td>:</td>
			<td>
			  <select name ="jabatan">
			     <option value ="" disable selected>
			     -- pilih jabaatan -- 
			     </option> 
			     <option value ="admin">admin</option>
			     <option value ="manager">manager</option>
			     <option value ="kasir">kasir</option>
			  </select>
			 </td>
			</tr>
			<tr>
				<td>username</td>
				<td>:</td>
				<td><input type = "text" name = "username" value="<?php echo $isi ['username']?>"></td>
			</tr>
			<tr>
				<td>password</td>
				<td>:</td>
				<td><input type = "text" name = "password"  value="<?php echo $isi ['password']?>"></td>
			</tr>
			<tr>
				<td><input type = "submit" name = "simpan" value ="SIMPAN"></td>
			</tr>

	</table>
	<table border = "1" align="center">
		<tr>
			<td>No.</td>
			<td>Nama pengguna</td>
			<td>Jabatan</td>
			<td>Username</td>
			<td>Password</td>
			<td colspan="2">Aksi</td>
		</tr>
		<?php 
		$no=0;
		$sql= mysqli_query($con, "SELECT * FROM tb_pengguna");
		while($r=mysqli_fetch_array($sql)){
			$no++;?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r['nama_pengguna']; ?></td>
				<td><?php echo $r['level']; ?></td>
				<td><?php echo $r['username']; ?></td>
				<td><?php echo $r['password']; ?></td>
				<td><a href="?menu=penggunaan&edit&id=<?php echo $r ['id_pengguna'] ?>"> edit </a></td>
				<td><a href="?menu=penggunaan&hapus&id=<?php echo $r ['id_pengguna'] ?>" onCLick="return confirm('anda yakin')"> hapus </a></td>
			</tr>
		<?php } ?>
	</table>

</body>
</form>
</html>