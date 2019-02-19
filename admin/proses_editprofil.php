<?php

include ('fungsi/config.php');

if(isset($_POST['inputprofil']))
{
	$nama_lengkap = $_POST['nama_lengkap'];
	$tmpt_lahir = $_POST['tmpt_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$no_telp = $_POST['no_telp'];
	$email = $_POST['email'];
	$id = $_POST['id'];

	$input = mysqli_query($koneksi,"update tb_profil set nama_lengkap='$nama_lengkap', tmpt_lahir='$tmpt_lahir', tgl_lahir = '$tgl_lahir', no_telp='$no_telp', email='$email' where id_login='$id' ");
	if ($input)
	{
		echo"<script> alert('Data Berhasil Dirubah') ; window.location.href='tampil_profil.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Dirubah, Silahkan Ulangi') ; window.location.href='tampil_profil.php'; </script>";
	}
}
else if(isset($_POST['inputprivasi']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if(!empty($password))
	{
		$input = mysqli_query($koneksi,"update tb_login set password='$password'");
		if ($input)
		{
			session_start();
			session_unset();
			session_destroy();
			echo"<script> alert('Password Berhasil Dirubah') ; window.location.href='index.php'; </script>";
		}
		else
		{
			echo"<script> alert('Password Gagal Dirubah') ; window.location.href='tampil_profil.php'; </script>";
		}
	}
	else {
		header('location:tampil_profil.php');
	}
}