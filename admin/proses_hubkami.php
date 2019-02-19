<?php

include ("fungsi/config.php");

if(isset($_POST['inputhubkami']))
{
	$id_login = $_POST['id_login'];
	$date_hubkami = $_POST['date_hubkami'];
	$nama_hubkami = $_POST['nama_hubkami'];
	$alamat_hubkami =$_POST['alamat_hubkami'];
	$telp_hubkami = $_POST['telp_hubkami'];
	$email_hubkami = $_POST['email_hubkami'];

	$data = mysqli_query($koneksi,"insert into tb_hubkami (id_login,date_hubkami,nama_hubkami,alamat_hubkami,telp_hubkami,email_hubkami) values ('$id_login','$date_hubkami','$nama_hubkami','$alamat_hubkami','$telp_hubkami','$email_hubkami') ");
	if($data)
	{
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_contact.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diinput') ; window.location.href='tampil_contact.php'; </script>";
	}
}
else if(isset($_POST['edithubkami']))
{
	$id_login = $_POST['id_login'];
	$date_hubkami = $_POST['date_hubkami'];
	$nama_hubkami = $_POST['nama_hubkami'];
	$alamat_hubkami =$_POST['alamat_hubkami'];
	$telp_hubkami = $_POST['telp_hubkami'];
	$email_hubkami = $_POST['email_hubkami'];
	$id_hubkami = $_POST['id_hubkami'];

	$data = mysqli_query($koneksi,"update tb_hubkami set id_login ='$id_login',date_hubkami='$date_hubkami',nama_hubkami='$nama_hubkami',alamat_hubkami='$alamat_hubkami',telp_hubkami='$telp_hubkami',email_hubkami='$email_hubkami' where id_hubkami = '$id_hubkami'");
	if($data)
	{
		echo"<script> alert('Data Berhasil Diganti') ; window.location.href='tampil_contact.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diganti') ; window.location.href='tampil_contact.php'; </script>";
	}
}
else if(isset($_GET['hapus_proses']))
{
	$id = $_GET['hapus_proses'];
	$data = mysqli_query($koneksi,"delete from tb_hubkami where id_hubkami ='$id'");
	if($data)
	{
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_contact.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Dihapus') ; window.location.href='tampil_contact.php'; </script>";
	}
}