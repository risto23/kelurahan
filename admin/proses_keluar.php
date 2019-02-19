<?php

session_start();
session_unset();
session_destroy();
echo"<script> alert('Terima Kasih, Silahkan Kembali lagi') ; window.location.href='index.php'; </script>";

?>