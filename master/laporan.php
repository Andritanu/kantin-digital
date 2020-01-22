<?php 
	if (isset($_POST['cetak'])){
		echo "<script>document.location.href='cetak.php'</script>";
	}
?>
<body>
	<table>
		<tr>
			<td>dari</td>
			<td>:</td>
			<td><input type="date" name="awal"></td>
			<td>sampai</td>
			<td><input type="date" name="akhir"></td>
			<td><input type="submit" name="cari" value="cari"></td>
		</tr>
	</table>
	<table border = "1">
		<tr>
			<td>no</td>
			<td>id transaksi</td>
			<td>nama menu</td>
			<td>jumlah</td>
			<td>tanggal pesan</td>
		</tr>
		<?php if(isset($_POST['cari'])){ ?>
		<?php 
			$_SESSION['awal'] = $_POST['awal'];
			$_SESSION['akhir'] = $_POST['akhir'];
			$no=0;
		$sql = mysqli_query($con, "SELECT*FROM qw_laporan WHERE tgl_pesan BETWEEN '$_POST[awal]' AND '$_POST[akhir]' AND status = '1'");
			while($r=mysqli_fetch_array($sql)){
				$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $r['id_transaksi']; ?></td>
				<td><?php echo $r['nama_menu']; ?></td>
				<td><?php echo $r['jumlah']; ?></td>
				<td><?php echo $r['tgl_pesan']; ?></td>
				
			</tr>
			<?php } ?>
			<?php }else{ ?>
				<tr>
					<td colspan="5" align="center">tanggal belum di input</td>
				</tr>
			<?php  } ?>
		</table>
		<br>
		<input type="submit" name="cetak" value= "CETAK" >


</body>