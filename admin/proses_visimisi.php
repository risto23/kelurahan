<?php
include "fungsi/config.php";

if(isset($_POST['inputvisimisi']))
{
	$date_visimisi = $_POST['date_visimisi']; 
	$id_login = $_POST['id_login'];
	$desc_visimisi = $_POST['desc_visimisi'];

	$data = mysqli_query($koneksi,"insert into tb_visimisi (date_visimisi,id_login,desc_visimisi) values ('$date_visimisi','$id_login','$desc_visimisi')");
	if($data)
	{
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_visimisi.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Diinput') ; window.location.href='tampil_visimisi.php'; </script>";
	}
}
else if(isset($_POST['editvisimisi']))
{
	$date_visimisi = $_POST['date_visimisi']; 
	$id_login = $_POST['id_login'];
	$desc_visimisi = $_POST['desc_visimisi'];
	$id_visimisi = $_POST['id_visimisi'];

	$data = mysqli_query($koneksi,"update tb_visimisi set date_visimisi='$date_visimisi',id_login='$id_login',desc_visimisi='$desc_visimisi' where id_visimisi='$id_visimisi'");
	if($data)
	{
		echo"<script> alert('Data Berhasil Diganti') ; window.location.href='tampil_visimisi.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Diganti, silahkan ulangi') ; window.location.href='tampil_visimisi.php'; </script>";
	}
}
else if(isset($_GET['id']))
{
	$id=$_GET['id'];

	$hapus = mysqli_query($koneksi,"delete from tb_visimisi where id_visimisi='$id'");
	if($hapus)
	{
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_visimisi.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus, silahkan ulangi') ; window.location.href='tampil_visimisi.php'; </script>";
	}
}