<?php
include "fungsi/config.php";

if(isset($_POST['inputstruktur']))
{
	$date_struktur = $_POST['date_struktur'];
	$id_login = $_POST['id_login'];
	$judul_struktur = $_POST['judul_struktur'];
	$pdf_struktur = $_FILES['pdf_struktur']['name'];


	$data = mysqli_query($koneksi,"insert into tb_strukturorganisasi (date_struktur,id_login,judul_struktur,pdf_struktur) values ('$date_struktur','$id_login','$judul_struktur','$pdf_struktur')");
	if($data)
	{
		move_uploaded_file($_FILES['pdf_struktur']['tmp_name'], "news/pdf/".$_FILES['pdf_struktur']['name']);
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
	}
}
else if (isset($_POST['editstruktur']))
{
	$date_struktur = $_POST['date_struktur'];
	$id_login = $_POST['id_login'];
	$judul_struktur= $_POST['judul_struktur'];
	$pdf_struktur = $_FILES['pdf_struktur']['name'];
	$id_struktur = $_POST['id_struktur'];
	$pdf_struktur_old = $_POST['pdf_struktur_old'];

	if(!empty($pdf_struktur))
	{
		$data = mysqli_query($koneksi,"update tb_strukturorganisasi set date_struktur='$date_struktur', id_login='$id_login',judul_struktur='$judul_struktur',pdf_struktur='$pdf_struktur' where id_struktur ='$id_struktur'");
		if ($data)
		{
			unlink("news/pdf/$pdf_struktur_old");
			move_uploaded_file($_FILES['pdf_struktur']['tmp_name'], "news/pdf/".$_FILES['pdf_struktur']['name']);
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update tb_strukturorganisasi set date_struktur='$date_struktur', id_login='$id_login',judul_struktur='$judul_struktur' where id_struktur ='$id_struktur'");
		if ($data)
		{
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_strukturorganisasi.php' </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
		}
	}
}
else if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from tb_strukturorganisasi where id_struktur ='$id'");
	while ($datapdf = mysqli_fetch_array($data)) {
		$pdf = $datapdf['pdf_struktur'];
	}
	$hapusdata= mysqli_query($koneksi,"delete from tb_strukturorganisasi where id_struktur = '$id'");

	if($hapusdata)
	{
		unlink("news/pdf/$pdf");
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus, Silahkan ulangi lagi') ; window.location.href='tampil_strukturorganisasi.php'; </script>";
	}
}
?>