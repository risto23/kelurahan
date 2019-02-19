<?php

include "fungsi/config.php";

$id = $_GET['id'];

$hapusbalasanbukutamu= mysqli_query($koneksi,"delete from tb_balasan_bukutamu where id_bukutamu = '$id'");
$hapusbukutamu = mysqli_query($koneksi,"delete from tb_bukutamu where id_bukutamu = '$id'");

if ($hapusbukutamu AND $hapusbalasanbukutamu)
{
	echo"<script> alert('Data Berhasil Dihapus') ; window.location.href='beranda.php'; </script>";
}
else {
	echo"<script> alert('Data Gagal Dihapus, Silahkan Ulangi') ; window.location.href='beranda.php'; </script>";
}