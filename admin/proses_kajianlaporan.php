<?php
include "fungsi/config.php";

if(isset($_POST['inputrencana']))
{
	$date_rencana = $_POST['date_rencana'];
	$id_login = $_POST['id_login'];
	$judul_rencana = $_POST['judul_rencana'];
	$pdf_rencana = $_FILES['pdf_rencana']['name'];


	$data = mysqli_query($koneksi,"insert into tb_kajianlaporan (date_rencana,id_login,judul_rencana,pdf_rencana) values ('$date_rencana','$id_login','$judul_rencana','$pdf_rencana')");
	if($data)
	{
		move_uploaded_file($_FILES['pdf_rencana']['tmp_name'], "news/pdf/".$_FILES['pdf_rencana']['name']);
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_kajianlaporan.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_kajianlaporan.php'; </script>";
	}
}
else if (isset($_POST['editrencana']))
{
	$date_rencana = $_POST['date_rencana'];
	$id_login = $_POST['id_login'];
	$judul_rencana = $_POST['judul_rencana'];
	$pdf_rencana = $_FILES['pdf_rencana']['name'];
	$id_rencana = $_POST['id_rencana'];
	$pdf_rencana_old = $_POST['pdf_rencana_old'];

	if(!empty($pdf_rencana))
	{
		$data = mysqli_query($koneksi,"update tb_kajianlaporan set date_rencana='$date_rencana', id_login='$id_login',judul_rencana='$judul_rencana',pdf_rencana='$pdf_rencana' where id_rencana ='$id_rencana'");
		if ($data)
		{
			unlink("news/pdf/$pdf_rencana_old");
			move_uploaded_file($_FILES['pdf_rencana']['tmp_name'], "news/pdf/".$_FILES['pdf_rencana']['name']);
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_kajianlaporan.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_kajianlaporan.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update tb_kajianlaporan set date_rencana='$date_rencana', id_login='$id_login',judul_rencana='$judul_rencana' where id_rencana ='$id_rencana'");
		if ($data)
		{
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_kajianlaporan.php' </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_kajianlaporan.php'; </script>";
		}
	}
}
else if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from tb_kajianlaporan where id_rencana ='$id'");
	while ($datapdf = mysqli_fetch_array($data)) {
		$pdf = $datapdf['pdf_rencana'];
	}
	$hapusdata= mysqli_query($koneksi,"delete from tb_kajianlaporan where id_rencana = '$id'");

	if($hapusdata)
	{
		unlink("news/pdf/$pdf");
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_kajianlaporan.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus, Silahkan ulangi lagi') ; window.location.href='tampil_kajianlaporan.php'; </script>";
	}
}
?>