<?php require_once("auth.php"); 

$keterangan = $_SESSION["keterangan"];
    if($keterangan != "KIA") {
        header("Location: ../configuser.php");
    }
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style2.css">
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
                <span class="title-main">Registration Form<span>
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
        <div class="pendaftaran">
            <div class="registrasi">
                <h2>Data Pemeriksaan</h2>
                <form action="">
                    <div class="input-details">
                        <div class="checkrm">
                            <span class="detil">No.RM</span>
                            <input class="formcheckrm" type="text" id="noRm" name="" required>
                            <button class type="submit" id="noRm">Check</button>
                        </div>
                        <div class="inputbox">
                            <span class="detil">No.Register</span>
                            <input class="forminput" type="text" id="noreg" name="" readonly>
                        </div>
                        <div class="inputbox">
                            <span class="detil">No.BPJS</span>
                            <input class="forminput" type="text" id="nobpjs" name="" readonly>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Nama Pasien</span>
                            <input class="forminput" type="text" id="nampas" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Tanggal Masuk</span>
                            <input class="forminput" type="date" id="indate" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Nama Suami</span>
                            <input class="forminput" type="text" id="namsu" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Berat Badan</span>
                            <input class="forminput" type="text" id="bb" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">HPL</span>
                            <input class="forminput" type="text" id="hpl" name="">
                        </div>
                        <div class="inputbox">
                            <span class="detil">Tinggi Badan</span>
                            <input class="forminput" type="text" id="tb" name="" required>
                        </div>
                        
                        <div class="inputbox">
                            <span class="detil">HPHT</span>
                            <input class="forminput" type="text" id="hpht" name="">
                        </div>
                        
                        <div class="inputbox">
                            <span class="detil">UK</span>
                            <input class="forminput" type="text" id="uk" name="">
                        </div>
                        <div class="inputbox">
                            <span class="detil">KSPR</span>
                            <input class="forminput" type="text" id="kspr" name="">
                        </div>
                        
                        <div class="inputbox">
                            <span class="detil">Diagnosa</span>
                            <input class="forminput" type="text" id="diagnosa" name="">
                        </div>
                        
                        <div class="inputbox">
                            <h3>Jenis Pelayanan</h3>
                            <input class="radiopelayanan" type="radio" name="pelayanan" value="BPJS"> BPJS<br>
                            <input class="radiopelayanan" type="radio" name="pelayanan" value="Umum"> Umum<br>
                        </div>
                    </div>

                    <div class="pemeriksaan">
                        <h3>Pemeriksaan LAB</h3>
                        <table class="periksa-kia" cellspacing="10" >
                            <tr>
                                <th>Golda</th>
                                <th><input type="text" id="golda"></th>
                                <th>Hb</th>
                                <th><input type="text" id="hb"></th>
                                <th>HbsAg</th>
                                <th><input type="text" id="hbsag"></th>
                            </tr>
                            <tr>
                                <th>HIV</th>
                                <th><input type="text" id="hiv"></th>
                                <th>Syphilis</th>
                                <th><input type="text" id="sipilis"></th>
                                <th>Albumin</th>
                                <th><input type="text" id="albuminn"></th>
                            </tr>
                        </table>
                    </div>
                    <div class="btnpemeriksaan">
                        <a href="">Kembali</a>
                        <button class="primary" href="">Submit and Print</button>
                        <button class="warning" href="">Bersihkan</button>
                    </div>
                </form>
            </div>

            <footer>
                <p>&copy 2022 Klinik Daqu Sehat Malang</p>
            </footer>

        </div>

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