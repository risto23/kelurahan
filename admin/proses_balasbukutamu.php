<?php
date_default_timezone_set('Asia/Jakarta');
include 'fungsi/config.php';

$date = date('Y-m-d');
$time = date('H:i:s');
$pesan_balasan = $_POST['pesan_balasan'];
$id_bukutamu = $_POST['id_bukutamu'];
$id_login = $_POST['id_login'];

$data = mysqli_query($koneksi,"update tb_balasan_bukutamu set id_login='$id_login', pesan_balasan='$pesan_balasan', date_balasan='$date', time_balasan='$time' where id_bukutamu='$id_bukutamu' ");

if ($data)
{
	echo"<script> alert('Terima Kasih Sudah membalas') ; window.location.href='beranda.php'; </script>";
}
else {
	echo"<script> alert('Maaf Gagal, Silahkan Ulangi') ; window.location.href='beranda.php'; </script>";
}