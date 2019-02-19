<?php

include "fungsi/config.php";

if (isset($_POST['inputuser']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$status =  $_POST['status'];
	$namalengkap = $_POST['namalengkap'];
	
	$cekuser = mysqli_num_rows(mysqli_query($koneksi,"select * from tb_login where username ='$username'"));
	if($cekuser == 0)
	{
		$data = mysqli_query($koneksi,"insert into tb_login (username,password,status) values ('$username','$password','$status')");
		if($data)
		{
			$datauser = mysqli_query($koneksi,"select * from tb_login where username ='$username' AND password='$password'");
			while ($hasil = mysqli_fetch_array($datauser)) {
				$id_login = $hasil['id_login'];
			}
			$inputprofil = mysqli_query($koneksi,"insert into tb_profil (id_login,nama_lengkap) values ('$id_login','$namalengkap')");
			if ($inputprofil)
			{
				echo"<script> alert('Data berhasil diinput') ; window.location.href='tampil_adduser.php'; </script>";
			}
			else {
				$hapus = mysqli_query($koneksi,"delete from tb_login where username ='$username' AND password='$password'");
				echo"<script> alert('Data gagal diinput, Harap ulangi lagi') ; window.location.href='tampil_adduser.php'; </script>";
			}
		}
		else
		{
			echo"<script> alert('Data gagal diinput, Harap ulangi lagi') ; window.location.href='tampil_adduser.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Username sudah ada, username harus diganti') ; window.location.href='tampil_adduser.php'; </script>";
	}
}
else if (isset($_POST['edituser']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status =  $_POST['status'];
	$namalengkap = $_POST['namalengkap'];
	$id_login = $_POST['id_login'];

	$cekuser = mysqli_num_rows(mysqli_query($koneksi,"select * from tb_login where username ='$username'"));
	if($cekuser <= 1)
	{
		if (!empty($password))
		{
			$password_new = md5($password);
			$data = mysqli_query($koneksi,"update tb_login set username='$username',password='$password_new',status='$status' where id_login ='$id_login'");
		}
		else{
			$data = mysqli_query($koneksi,"update tb_login set username='$username',status='$status' where id_login ='$id_login'");
		}


			if($data)
			{
				$inputprofil = mysqli_query($koneksi,"update tb_profil set nama_lengkap='$namalengkap' where id_login='$id_login'");
				if ($inputprofil)
				{
					echo"<script> alert('Data berhasil diinput') ; window.location.href='tampil_adduser.php'; </script>";
				}
				else {
					$hapus = mysqli_query($koneksi,"delete from tb_login where username ='$username' AND password='$password'");
					echo"<script> alert('Data gagal diinput, Harap ulangi lagi') ; window.location.href='tampil_adduser.php'; </script>";
				}
			}
			else
			{
				echo"<script> alert('Data gagal diinput okk, Harap ulangi lagi') ; window.location.href='tampil_adduser.php'; </script>";
			}
			
		
	}
	else {
		echo"<script> alert('Username sudah ada, username harus diganti') ; window.location.href='tampil_adduser.php'; </script>";
	}
}
else if(isset($_GET['proses_hapus']))
{
	$id = $_GET['proses_hapus'];

	$deletelogin = mysqli_query($koneksi,"delete from tb_login where id_login ='$id'");
	$deleteprofil = mysqli_query($koneksi,"delete from tb_profil where id_login ='$id'");
	if($deleteprofil AND $deletelogin)
	{
		echo"<script> alert('Data berhasil dihapus') ; window.location.href='tampil_adduser.php'; </script>";
	}
	else {
	echo"<script> alert('Data gagal dihapus, silahkan ulangi') ; window.location.href='tampil_adduser.php'; </script>";
	}
}