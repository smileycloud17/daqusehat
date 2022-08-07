<?php
session_start();
include '../koneksi.php';
$kta = $_SESSION['kta'];
$time=time()+10;
$res=mysqli_query($koneksi,"update tb_user_admin set last_login=$time where kta=$kta");
?>