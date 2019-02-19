<?php
include 'fungsi/config.php';
include 'fungsi/fungsi_youtube.php';


if (isset($_POST['inputvideo']))
{
	$date_video = $_POST['date_video'];
	$judul_video = $_POST['judul_video'];
	$url_video = $_POST['url_video'];
	$id_login = $_POST['id_login'];

	if (cek_youtube($url_video) == 1) {
		echo"<script> alert('Link Tidak Diperbolehkan, Silahkan copy link dari youtube') ; window.location.href='video.php'; </script>";
	} 
	else
	{
		$url_embed_youtube = cek_youtube($url_video);
		$data = mysqli_query($koneksi,"insert into tb_video (id_login,judul_video,	url_video,date_video) values ('$id_login','$judul_video','$url_embed_youtube','$date_video')");
		if($data)
		{
			echo"<script> alert('Data Berhasil Diinput') ; window.location.href='video.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Diinput, silahkan ulangi') ; window.location.href='video.php'; </script>";
		}
	}
}
else if (isset($_POST['editvideo']))
{
	$date_video = $_POST['date_video'];
	$judul_video = $_POST['judul_video'];
	$url_video = $_POST['url_video'];
	$id_login = $_POST['id_login'];

	if (cek_youtube($url_video) == 1) {
		echo"<script> alert('Link Tidak Diperbolehkan, Silahkan copy link dari youtube') ; window.location.href='video.php'; </script>";
	} 
	else
	{
		$url_embed_youtube = cek_youtube($url_video);
		$hapus = mysqli_query($koneksi,"delete from tb_video");
		if ($hapus)
		{
			$data = mysqli_query($koneksi,"insert into tb_video (id_login,judul_video,	url_video,date_video) values ('$id_login','$judul_video','$url_embed_youtube','$date_video')");
			if($data)
			{
				echo"<script> alert('Data Berhasil Diinput') ; window.location.href='video.php'; </script>";
			}
			else {
				echo"<script> alert('Data Gagal Diinput, silahkan ulangi') ; window.location.href='video.php'; </script>";
			}
		}
		else {
			echo"<script> alert('Data Gagal Diinput, silahkan ulangi') ; window.location.href='video.php'; </script>";
		}
		
	}
}
else if ($_GET['proses_hapus'])
{
	$id = $_GET['proses_hapus'];
	$data = mysqli_query($koneksi,"delete from tb_video where id_video ='$id'");
		if($data)
		{
			echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='video.php'; </script>";
		}
		else {
			echo"<script> alert('Data Gagal Dihapus, silahkan ulangi') ; window.location.href='video.php'; </script>";
		}

}

?>