<?php
include ('admin/fungsi/config.php');

if(isset($_POST['inputbukutamu']))
{
	$nama = $_POST['nama'];
$pesan = $_POST['pesan'];
$date = $_POST['date'];
$time =  $_POST['time'];
	$prosesbukutamu = mysqli_query($koneksi,"insert into tb_bukutamu (nama,pesan,date,time) values ('$nama','$pesan','$date','$time')");
	if($prosesbukutamu)
	{
		$databukutamu = mysqli_query($koneksi,"select * from tb_bukutamu where nama='$nama' AND time ='$time'");
		while($hasilbukutamu = mysqli_fetch_array($databukutamu))
		{
			$id_bukutamu = $hasilbukutamu['id_bukutamu'];
		}
		$prosesbalasbukutamu = mysqli_query($koneksi,"insert into tb_balasan_bukutamu (id_bukutamu) values ('$id_bukutamu')");
		if($prosesbalasbukutamu)
		{
			echo"<script> alert('Terima Kasih, pesan dari kalian sangat berguna bagi kami') ; window.location.href='index.php'; </script>";
		}
		else {
			$hapus = mysqli_query("delete from tb_bukutamu where nama='$nama' AND time ='$time'");
			echo"<script> alert('Maaf gagal, silahkan ulangi') ; window.location.href='index.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Terima Kasih, pesan dari kalian sangat berguna bagi kami') ; window.location.href='index.php'; </script>";
	}
}