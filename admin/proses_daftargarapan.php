<?php
include "fungsi/config.php";

if(isset($_POST['inputdaftar']))
{
	$id_login = $_POST['id_login'];
	$date_daftargarapan = $_POST['date_daftargarapan'];
	$nama_daftargarapan =  $_POST['nama_daftargarapan'];
	$sawah_daftargarapan = $_POST['sawah_daftargarapan'];
	$darat_daftargarapan = $_POST['darat_daftargarapan'];
	$status_garapan = $_POST['status_garapan'];
	$jumlah_daftargarapan = $sawah_daftargarapan + $darat_daftargarapan;

	$data = mysqli_query($koneksi,"insert into tb_daftargarapan (id_login,date_daftargarapan,nama_daftargarapan,sawah_daftargarapan,darat_daftargarapan,status_garapan,jumlah_daftargarapan) values ('$id_login','$date_daftargarapan','$nama_daftargarapan','$sawah_daftargarapan','$darat_daftargarapan','$status_garapan','$jumlah_daftargarapan')");
	if($data)
	{
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_daftargarapan.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Diinput') ; window.location.href='tampil_daftargarapan.php'; </script>";
	}
}
else if(isset($_POST['editdaftar']))
{
	$id_daftargarapan = $_POST['id_daftargarapan'];
	$id_login = $_POST['id_login'];
	$date_daftargarapan = $_POST['date_daftargarapan'];
	$nama_daftargarapan =  $_POST['nama_daftargarapan'];
	$sawah_daftargarapan = $_POST['sawah_daftargarapan'];
	$darat_daftargarapan = $_POST['darat_daftargarapan'];
	$status_garapan = $_POST['status_garapan'];
	$jumlah_daftargarapan = $sawah_daftargarapan + $darat_daftargarapan;

	$data = mysqli_query($koneksi,"update tb_daftargarapan set id_login='$id_login',date_daftargarapan='$date_daftargarapan',nama_daftargarapan='$nama_daftargarapan',sawah_daftargarapan='$sawah_daftargarapan',darat_daftargarapan='$darat_daftargarapan',status_garapan='$status_garapan',jumlah_daftargarapan='$jumlah_daftargarapan' where id_daftargarapan = '$id_daftargarapan'");
	if($data)
	{
		echo"<script> alert('Data Berhasil Dirubah') ; window.location.href='tampil_daftargarapan.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dirubah') ; window.location.href='tampil_daftargarapan.php'; </script>";
	}
}
else if($_GET['proses_hapus'])
{
	$id = $_GET['proses_hapus'];
	$data = mysqli_query($koneksi,"delete from tb_daftargarapan where id_daftargarapan = '$id'");
	if($data)
	{
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_daftargarapan.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus') ; window.location.href='tampil_daftargarapan.php'; </script>";
	}
}