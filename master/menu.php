<?php

	if (isset($_POST['simpan'])) {
		$name = $_FILES['foto']['name'];
		$file = $_FILES['foto']['tmp_name'];
		move_uploaded_file($file, '../image/'.$name);

		$sql = mysqli_query($con, "INSERT INTO tb_menu VALUES('','$_POST[namaMenu]','$_POST[jenis]','$_POST[harga]','$name','$_POST[produk]')");

		if ($sql){
			echo "<script>alert('data berhasil disimpan');
			document.location.href='?menu=menu';</script>";
			}else{
		    echo "<script>alert('data gagal disimpan');
			document.location.href='?menu=menu';</script>";
		
	}
}
if (isset($_GET['hapus'])){
	$sql = mysqli_query($con, "DELETE FROM tb_menu WHERE id_menu = '$_GET[id]'");
if ($sql){
			echo "<script>alert('data berhasil dihapus');
			document.location.href='?menu=menu';</script>";
			}else{
		    echo "<script>alert('data gagal dihapus');
			document.location.href='?menu=menu';</script>";
        }
     }
?>

<html>
	<head></head>
	<form method="post" enctype="multipart/form-data">
<body>
		<table>
			<tr>
				<td>nama menu</td>
				<td>:</td>
				<td><input type="text" name="namaMenu"></td>
			</tr>
			<tr>
				<td>jenis</td>
				<td>:</td>
				<td>
					<select name="jenis">
						<option value="" disabled selected>--pilih jenis--</option>
						<option value ="makanan">makanan</option>
						<option value ="minuman">minuman</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>harga</td>
				<td>:</td>
				<td><input type="number" name="harga"></td>
			</tr>
			<tr>
				<td>foto</td>
				<td>:</td>
				<td><input type="file" name="foto"></td>
			</tr>
			<tr>
				<td>produk</td>
				<td>:</td>
				<td><input type="number" name="produk"></td>
			</tr>
			<tr>
				<td><input type="submit" name="simpan" value ="simpan"></td>
			</tr>
		</table>
		<table border="1">
			<tr>
				<td>no.</td>
				<td>nama menu</td>
				<td>jenis</td>
				<td>harga</td>
				<td>foto</td>
				<td>produk</td>
				<td>aksi</td>
		    </tr>
		    <?php 
			$no=0;
			$sql= mysqli_query($con, "SELECT * FROM tb_menu");
			while($r=mysqli_fetch_array($sql)){
			$no++;
			?>

			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r['nama_menu']; ?></td>
				<td><?php echo $r['jenis']; ?></td>
				<td><?php echo $r['harga']; ?></td>
				<td><img src="../image/<?php echo $r['foto'] ?>" width="100px"></td>
				<td><?php echo $r['produk']; ?></td>
				<td><a href="?menu=menu&hapus&id=<?php echo $r ['id_menu'] ?>" onCLick="return confirm('anda yakin')"> hapus </a></td>
			</tr>
		<?php } ?>
			
		</table>
</body>
</form>
</html>
