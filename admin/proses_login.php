<?php

include 'fungsi/config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$ceklogin = mysqli_num_rows(mysqli_query($koneksi, "select * from tb_login where username = '$username' AND password = '$password' "));

if($ceklogin == 1)
{
	session_start();
	$data = mysqli_query($koneksi, "select * from tb_login where username = '$username' AND password = '$password' ");
	while ($datasession= mysqli_fetch_array($data))
	{
		$_SESSION['user'] = $datasession['id_login'];
	}
	echo"<script> alert('LOGIN SUKSES') ; window.location.href='beranda.php'; </script>";
}
else {
	echo"<script> alert('USERNAME ATAU PASSWORD SALAH') ; window.location.href='index.php'; </script>";
}