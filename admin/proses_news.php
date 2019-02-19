<?php

include "fungsi/config.php";

if(isset($_POST['inputnews']))
{
	$img_news = $_FILES['img_news']['name'];
	$judul_news = $_POST['judul_news'];
	$date_news = $_POST['date_news'];
	$id_login = $_POST['id_login'];
	$news =  $_POST['news'];

	$data = mysqli_query($koneksi,"insert into tb_news (img_news,judul_news,date_news,id_login,news) values ('$img_news','$judul_news','$date_news','$id_login','$news')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_news']['tmp_name'], "news/".$_FILES['img_news']['name']);
		echo"<script> alert('Berita Berhasil Diinput') ; window.location.href='news.php'; </script>";
	}
	else {
		echo"<script> alert('Berita Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='news.php'; </script>";
	}
}
else if(isset($_POST['editnews']))
{
	$img_news = $_FILES['img_news']['name'];
	$img_news_old = $_POST['img_news_old'];
	$judul_news = $_POST['judul_news'];
	$date_news = $_POST['date_news'];
	$id_login = $_POST['id_login'];
	$news =  $_POST['news'];
	$id_news = $_POST['id_news'];

	if(!empty($img_news))
	{
		$data = mysqli_query($koneksi,"update tb_news set img_news='$img_news' ,judul_news ='$judul_news', date_news='$date_news', id_login='$id_login', news ='$news' where id_news ='$id_news'");
		if ($data)
		{
			unlink("news/$img_news_old");
			move_uploaded_file($_FILES['img_news']['tmp_name'], "news/".$_FILES['img_news']['name']);
			echo"<script> alert('Berita Berhasil Diinput') ; window.location.href='news.php'; </script>";
		}
		else {
			echo"<script> alert('Berita Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='news.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update tb_news set judul_news ='$judul_news', date_news='$date_news', id_login='$id_login', news ='$news' where id_news ='$id_news'");
		if ($data)
		{
			echo"<script> alert('Berita Berhasil Diinput') ; window.location.href='news.php'; </script>";
		}
		else {
			echo"<script> alert('Berita Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='news.php'; </script>";
		}
	}
	
}
else if ($_GET['proses_hapus'])
{
	$id = $_GET['proses_hapus'];
	$data = mysqli_query($koneksi,"select * from tb_news where id_news = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_news'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from tb_news where id_news = '$id'");
		if($proses)
		{
			unlink("news/$foto");
			echo"<script> alert('Berita Berhasil Dihapus') ; window.location.href='news.php'; </script>";
		}
		else {
			echo"<script> alert('Berita Gagal Dihapus, Silahkan Ulangi') ; window.location.href='news.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Berita Gagal Dihapus, Silahkan Ulangi') ; window.location.href='news.php'; </script>";
	}
}

