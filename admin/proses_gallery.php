<?php

include "fungsi/config.php";

if(isset($_POST['inputgallery']))
{
	$img_gallery = $_FILES['img_gallery']['name'];
	$title_gallery = $_POST['title_gallery'];
	$date_gallery = $_POST['date_gallery'];
	$id_login = $_POST['id_login'];

	$data = mysqli_query($koneksi,"insert into tb_gallery (img_gallery,title_gallery,date_gallery,id_login) values ('$img_gallery','$title_gallery','$date_gallery','$id_login')");

	if ($data)
	{
		move_uploaded_file($_FILES['img_gallery']['tmp_name'], "news/gallery/".$_FILES['img_gallery']['name']);
		echo"<script> alert('Gambar Berhasil Diinput') ; window.location.href='gallery.php'; </script>";
	}
	else {
		echo"<script> alert('Gambar Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='gallery.php'; </script>";
	}
}
else if(isset($_POST['editgallery']))
{
	$img_gallery_old = $_POST['img_gallery_old'];
	$img_gallery = $_FILES['img_gallery']['name'];
	$title_gallery = $_POST['title_gallery'];
	$date_gallery = $_POST['date_gallery'];
	$id_login = $_POST['id_login'];
	$id_gallery = $_POST['id_gallery'];

	if(!empty($img_gallery))
	{
		$data = mysqli_query($koneksi,"update tb_gallery set img_gallery='$img_gallery' ,title_gallery ='$title_gallery', date_gallery='$date_gallery', id_login='$id_login' where id_gallery = '$id_gallery'");
		if ($data)
		{
			unlink("news/gallery/$img_gallery_old");
			move_uploaded_file($_FILES['img_gallery']['tmp_name'], "news/gallery/".$_FILES['img_gallery']['name']);
			echo"<script> alert('Gambar Berhasil Diinput') ; window.location.href='gallery.php'; </script>";
		}
		else {
			echo"<script> alert('Gambar Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='gallery.php'; </script>";
		}	
	}
	else {
		$data = mysqli_query($koneksi,"update tb_gallery set title_gallery ='$title_gallery', date_gallery='$date_gallery', id_login='$id_login' where id_gallery = '$id_gallery'");
		if ($data)
		{
			echo"<script> alert('Gambar Berhasil Diinput') ; window.location.href='gallery.php'; </script>";
		}
		else {
			echo"<script> alert('Gambar Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='gallery.php'; </script>";
		}
	}
	
}
else if ($_GET['proses_hapus'])
{
	$id = $_GET['proses_hapus'];
	$data = mysqli_query($koneksi,"select * from tb_gallery where id_gallery = '$id'");
	while ($hasil = mysqli_fetch_array($data))
	{
		$foto = $hasil['img_gallery'];
	}
	if($foto)
	{
		$proses = mysqli_query($koneksi,"delete from tb_gallery where id_gallery = '$id'");
		if($proses)
		{
			unlink("news/gallery/$foto");
			echo"<script> alert('Gambar Berhasil Dihapus') ; window.location.href='gallery.php'; </script>";
		}
		else {
			echo"<script> alert('Gambar Gagal Dihapus, Silahkan ulangi lagi') ; window.location.href='gallery.php'; </script>";
		}
	}
	else {
		echo"<script> alert('Gambar Gagal Diinput, Silahkan ulangi lagi') ; window.location.href='gallery.php'; </script>";
	}
}

