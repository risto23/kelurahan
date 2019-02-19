<?php

include "fungsi/config.php";

if(isset($_POST['inputprofilkec']))
{
	$judul_profil = $_POST['judul_profil'];
	$date_profil = $_POST['date_profil'];
	$img_profil = $_FILES['img_profil']['name'];
	$id_login = $_POST['id_login'];
	$desc_profil = $_POST['desc_profil'];

	$data = mysqli_query($koneksi,"insert into tb_profilkec (judul_profil,date_profil,img_profil,id_login,desc_profil) values ('$judul_profil','$date_profil','$img_profil','$id_login','$desc_profil')");
	if($data)
	{
		move_uploaded_file($_FILES['img_profil']['tmp_name'], "news/profil/".$_FILES['img_profil']['name']);
		echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_profilkecamatan.php'; </script>";
	}
	else {
		echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_profilkecamatan.php'; </script>";
	}
}
else if(isset($_POST['editprofilkec']))
{
	$judul_profil = $_POST['judul_profil'];
	$date_profil = $_POST['date_profil'];
	$img_profil = $_FILES['img_profil']['name'];
	$img_profil_old = $_POST['img_profil_old'];
	$id_login = $_POST['id_login'];
	$desc_profil = $_POST['desc_profil'];
	$id_profilkec = $_POST['id_profilkec'];

	if(!empty($img_profil))
	{
		$data = mysqli_query($koneksi,"update tb_profilkec set judul_profil='$judul_profil',date_profil='$date_profil',img_profil='$img_profil',id_login='$id_login',desc_profil='$desc_profil' where id_profilkec ='$id_profilkec'");
		if ($data)
		{
			unlink("news/profil/$img_profil_old");
			move_uploaded_file($_FILES['img_profil']['tmp_name'], "news/profil/".$_FILES['img_profil']['name']);
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_profilkecamatan.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_profilkecamatan.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update tb_profilkec set judul_profil='$judul_profil',date_profil='$date_profil',id_login='$id_login',desc_profil='$desc_profil' where id_profilkec ='$id_profilkec'");
		if ($data)
		{
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='tampil_profilkecamatan.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='tampil_profilkecamatan.php'; </script>";
		}
	}

}
else if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from tb_profilkec where id_profilkec ='$id'");
	while ($dataprofil = mysqli_fetch_array($data)) {
		$foto = $dataprofil['img_profil'];
	}
	$hapusdata= mysqli_query($koneksi,"delete from tb_profilkec where id_profilkec = '$id'");

	if($hapusdata)
	{
		unlink("news/profil/$foto");
		echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='tampil_profilkecamatan.php'; </script>";
	}
	else
	{
		echo"<script> alert('Data Gagal Dihapus, Silahkan ulangi lagi') ; window.location.href='tampil_profilkecamatan.php'; </script>";
	}
	
}