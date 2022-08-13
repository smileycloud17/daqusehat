<?php 
require_once("auth.php"); 

$keterangan = $_SESSION["keterangan"];
require_once("authuser.php");
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="shortcut icon" href="../assets/Proyek Baru.png">
    <title>Klinik Daqu Sehat</title>

</head>

<body onload="hide_loading()">
    <!-- Loading First -->
    <div class="loading overlayer">
        <div class="spinner"></div>
    </div>
    <!-- Loading End -->
    <div class="contain">
        <div class="navigasi">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../assets/Proyek Baru.png" alt="">
                        </span>
                        <span class="judul1">DAQU Sehat</span>
                    </a>
                </li>
                <li>
                    <a href="lab">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="judul">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="dashboard">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="judul">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pasien">
                        <span class="icon"><i class="far fa-plus-square"></i></span>
                        <span class="judul">Pasien Baru</span>
                    </a>
                </li>
                <li>
                    <a href="datapasien">
                        <span class="icon"><i class="fas fa-file-medical"></i></span>
                        <span class="judul">Data Pasien</span>
                    </a>
                </li>
                <!-- <h3>Admin</h3>
                <li>
                    <a href="#">
                        <span class="icon"><i class='far fa-address-book'></i></span>
                        <span class="judul">Data User</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fa fa-user-plus"></i></span>
                        <span class="judul">Tambah User</span>
                    </a>
                </li> -->
            </ul>
            <div class="bottom-content">
                <li class="mode">
                    <div class="bulan-bintang">
                        <i class='fas fa-sun sun'></i>
                        <i class='fas fa-moon moon'></i>
                    </div>
                    <span class="mode-text">Dark Mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </div>

    <!-- ISI DARI KENYATAAN -->
    <div class="main">
        <div class="topbar">
            <div class="">
                <div class="kotak">
                    <i class='fas fa-list-ul bar'></i>
                </div>
                <span class="title-main">Edit Profile User<span>
            </div>
            <!-- Mesin Pencari -->
            <!-- <div class="search">
                <label>
                    <input type="text" placeholder="Search">
                    <i class='fas fa-search'></i>
                </label>
            </div> -->
            <!-- User -->
            <div class="profile">
                <div class="info">
                    <button class="profilemenu"><?php $long = 11;
                                        $nama = $_SESSION['nama_pengguna'];
                                        echo substr($nama,0,$long).'...'; ?></button>
                    <div class="sub">
                        <div class="prof">
                            <img src="../assets/Ellipse 8.png" alt="">
                            <p>Hey, <b> <?php $long = 8;
                                        $nama = $_SESSION['nama_pengguna'];
                                        echo substr($nama,0,$long).'...'; ?></b></p>
                            <small class="text-mode"><?php 
                                        echo $_SESSION['keterangan']; ?></small>
                        </div>
                        <a href="editprofile"><button class="links sub1"><i class="fas fa-user-alt"></i>Edit Profile</button></a>
                        <a href="../logout"><button class="links sub2"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Registration  -->
        <div class="edit">
            <div class="user-profil">
                <h2>Edit Profile User</h2>
                <div class="fotoprofile">
                    <div class="foto">
                        <img src="../assets/123.jpg" alt="">
                    </div>
                    <a href="">Change Profile Picture</a>
                    <p><br>*Dimohon untuk menggunakan Pasfoto Formal</p>
                </div>
                <form action="">
                    <div class="inputan-profil">
                        <div class="inputProfil">
                            <span class="detil">No. KTA</span>
                            <input class="forminput" type="text" id="noKta" name="" style="background: #C9CCD5;"
                                readonly>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">Username</span>
                            <input class="forminput" type="text" id="usrnmusr" name="" style="background: #C9CCD5;"
                                readonly>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">Nama User</span>
                            <input class="forminput" type="text" id="namUs" name="" required>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">Tanggal Lahir</span>
                            <input class="forminput" type="date" id="ttl" name="" required>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">Gender</span>
                            <input class="forminput" type="text" id="gndr" name="" required>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">No.Telp</span>
                            <input class="forminput" type="text" id="hpUser" name="" required>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">Password</span>
                            <input class="forminput formpass" type="password" id="passusr" name="" required>
                            <span class="matabatin" onclick="matabatinn()">
                                <i id="hide1" class='far fa-eye'></i>
                                <i id="hide2" class='far fa-eye-slash'></i>
                            </span>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">E-mail</span>
                            <input class="forminput" type="text" id="mailus" name="" required>
                        </div>
                        <div class="inputProfil">
                            <span class="detil">Confirm Password</span>
                            <input class="forminput" type="password" id="consusr" name="" required>
                            <span class="mata-mata" onclick="matamataa()">
                                <i id="hide3" class='far fa-eye'></i>
                                <i id="hide4" class='far fa-eye-slash'></i>
                            </span>
                        </div>
                    </div>
                    <div class="tombol">
                        <button class="button-submit" type="submit" id="">Submit Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <footer style="margin-top: 50px;">
            <p>Copyright © 2022, Powered by Smiley Cloud ッ All rights reserved.</p>
        </footer>

    </div>

    <script src="../js/script.js"></script>
    <script src="../js/load.js"></script>


    <script>
        // ToggleMenu
        let toggle = document.querySelector('.bar');
        let menu = document.querySelector('.navigasi');
        let main = document.querySelector('.main');

        toggle.onclick = function () {
            navigasi.classList.toggle('active');
            main.classList.toggle('active');
        }

        // script buat hover stuck
        let list = document.querySelectorAll(".navigasi li");

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink));
    </script>
</body>

</html>