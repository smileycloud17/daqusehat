<?php

session_start();
if(!isset($_SESSION["nama_pengguna"])) {
    header("Location: login.html");
}

?>
