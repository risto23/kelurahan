<?php
include "fungsi/config.php";

if(isset($_POST['inputrencana']))
{
	$date_rencana_kerja = $_POST['date_rencana_kerja'];
	$id_login = $_POST['id_login'];
	$judul_rencana_kerja = $_POST['judul_rencana_kerja'];
	$pdf_rencana_kerja = $_FILES['pdf_rencana_kerja']['name'];


	$data = mysqli_query($koneksi,"insert into tb_rencanakerja (date_rencana_kerja,id_login,judul_rencana_kerja,pdf_rencana_kerja) values ('$date_rencana_kerja','$id_login','$judul_rencana_kerja','$pdf_rencana_kerja')");
	if($data)
	{
		move_uploaded_file($_FILES['pdf_rencana_kerja']['tmp_name'], "news/pdf/".$_FILES['pdf_rencana_kerja']['name']);
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_rencanakerja.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_rencanakerja.php'; </script>";
	}
}
else if (isset($_POST['editrencana']))
{
	$date_rencana_kerja = $_POST['date_rencana_kerja'];
	$id_login = $_POST['id_login'];
	$judul_rencana_kerja = $_POST['judul_rencana_kerja'];
	$pdf_rencana_kerja = $_FILES['pdf_rencana_kerja']['name'];
	$id_rencana_kerja = $_POST['id_rencana_kerja'];
	$pdf_rencana_kerja_old = $_POST['pdf_rencana_kerja_old'];

	if(!empty($pdf_rencana_kerja))
	{
		$data = mysqli_query($koneksi,"update tb_rencanakerja set date_rencana_kerja='$date_rencana_kerja', id_login='$id_login',judul_rencana_kerja='$judul_rencana_kerja',pdf_rencana_kerja='$pdf_rencana_kerja' where id_rencana_kerja ='$id_rencana_kerja'");
		if ($data)
		{
			unlink("news/pdf/$pdf_rencana_kerja_old");
			move_uploaded_file($_FILES['pdf_rencana_kerja']['tmp_name'], "news/pdf/".$_FILES['pdf_rencana_kerja']['name']);
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_rencanakerja.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_rencanakerja.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update tb_rencanakerja set date_rencana_kerja='$date_rencana_kerja', id_login='$id_login',judul_rencana_kerja='$judul_rencana_kerja' where id_rencana_kerja ='$id_rencana_kerja'");
		if ($data)
		{
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_rencanakerja.php' </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_rencanakerja.php'; </script>";
		}
	}
}
else if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from tb_rencanakerja where id_rencana_kerja ='$id'");
	while ($datapdf = mysqli_fetch_array($data)) {
		$pdf = $datapdf['pdf_rencana_kerja'];
	}
	$hapusdata= mysqli_query($koneksi,"delete from tb_rencanakerja where id_rencana_kerja = '$id'");

	if($hapusdata)
	{
		unlink("news/pdf/$pdf");
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_rencanakerja.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus, Silahkan ulangi lagi') ; window.location.href='tampil_rencanakerja.php'; </script>";
	}
}
	
?>