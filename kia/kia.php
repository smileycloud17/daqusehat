<?php require_once("auth.php"); 

$keterangan = $_SESSION["keterangan"];
    if($keterangan != "KIA") {
        header("Location: ../configuser.php");
    }
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
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
                    <a href="kia">
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
                <span class="title-main">Beranda<span>
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
        <!-- Greeting Card -->
        <div class="cardbox">
            <div class="cardkia">
                <div>
                    <h2>Selamat Datang</h2><br>
                    <h3> <?php 
                            echo $_SESSION['nama_pengguna']; ?></h3><br>
                    <span>Kesehatan Ibu dan Anak</span><br>
                    <span>Daqu Sehat Malang</span>
                </div>
            </div>
        </div>
        <div class="cardbox2">
            <div class="card-1">
                <div>
                    <h2>About DAQU</h2><br>
                    <p>&nbsp;&nbsp; Pada tahun 2010 Klinik Daqu Sehat didirikan di Kota Malang, pendirian Klinik ini 
                        sebagai ikhtiar untuk memberikan fasilitas kesehatan yang berkualitas dan murah 
                        bagi ibu hamil dan sesuai dengan ajaran Islam. Dengan sistem subsidi silang Klinik 
                        Daqu Sehat memberikan pelayan cuma-cuma bagi masyarakat Dhuafa. Selain di Malang 
                        Daqu Sehat juga telah didirikan di Kota Magelang, Jawa Tengah. Insya Allah klinik 
                        Daqu Sehat juga akan didirikan di beberapa kota di Indonesia lainnya. Tahun ini Klinik 
                        Daqu Sehat Magelang dan Malang telah melakukan melayani lebih dari 20.000 pasien 
                        ibu hamil dan pasien umum. Selain itu juga telah melakukan pengobatan gratis kepada 
                        3.565 jiwa serta melakukan pendampingan riyadhoh kepada pasien.</p>
                </div>
            </div>
            <div class="card-1">
                <div>
                <h2>Visi Misi DAQU</h2><br>
                    <p><b> VISI </b><br>
                        Mewujudkan Pelayanan Kesehatan Bebasis Al-Qur'an <br> <br>
                        <b> MISI </b> <br>
                        1. Memberikan Pelayanan Kesehatan Masyarakat <br>
                        2. Menjadi Rujukan Pengelola Layanan Kesehatan yang dikelala secara Islami <br>
                        3. Menjadikan Pelayanan Kesehatan sebagai sarana Pendekatan kepada Al-Qur'an</p>
                </div>
            </div>
        </div>
        <footer>
                <p>&copy 2022 Klinik Daqu Sehat Malang</p>
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