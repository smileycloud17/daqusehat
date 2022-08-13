<?php 
require_once("auth.php"); 

$keterangan = $_SESSION["keterangan"];
require_once("authuser.php");
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
                            <span class="detil">Tanggal Masuk</span>
                            <input class="forminput" type="date" id="indate" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Nama Pasien</span>
                            <input class="forminput" type="text" id="nampas" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Tangga Lahir</span>
                            <input class="forminput" type="date" id="lahirdate" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Jenis Kelamin</span>
                            <select name="" id="sex">
                                <option value="">Laki - Laki</option>
                                <option value="">Perempuan</option>
                                <option value="">Tidak Disebutkan</option>
                            </select>
                        </div>
                        <div class="inputbox">
                            <span class="detil">No. Hp/Telephone</span>
                            <input class="forminput" type="text" id="noTlp" name="" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Alamat</span>
                            <textarea name="" id="alamat" cols="30" rows="5" required></textarea>
                        </div>
                        
                        <div class="inputbox">
                            <span class="detil">Nama Dokter</span>
                            <select name="" id="namdok">
                                <option value="">Dr. Suryanto</option>
                                <option value="">Dr. Pardi Osborn</option>
                                <option value="">Dr. Dicki Herlambang</option>
                            </select>
                        </div>
                        <div class="inputbox">
                            <h3>Jenis Pelayanan</h3>
                            <input class="radiopelayanan" type="radio" name="pelayanan" value="BPJS"> BPJS<br>
                            <input class="radiopelayanan" type="radio" name="pelayanan" value="Umum"> Umum<br>
                        </div>
                    </div>

                    <!-- <div class="pemeriksaan">
                        <h3>Jenis Pemeriksaan</h3>
                        <table class="checkbox">
                            <tr>
                                <td>
                                    <input type="checkbox" id="hematologi">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan drpdwn">Hematologi</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="narkoba" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Narkoba</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="widal" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Widal</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="faalhati" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Faal Hati</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="lemak" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan drpdwn">Lemak</span>
                                </td>
                                <td class="drop">
                                    <select name="" id="lemak">
                                        <option value="">...</option>
                                        <option value="">???</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="faalginjal" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Faal Ginjal</span>
                                </td>
                                <td class="drop">
                                    <select name="" id="faalginjal">
                                        <option value="">...</option>
                                        <option value="">???</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="urinalisa" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Urinalisa</span>
                                </td>
                                <td class="drop">
                                    <select name="" id="urinalisa">
                                        <option value="">...</option>
                                        <option value="">???</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="kdb" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Kimia Darah Diabetes</span>
                                </td>
                                <td class="drop">
                                    <select name="" id="kdb">
                                        <option value="">...</option>
                                        <option value="">???</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="fk" name="">
                                </td>
                                <td>
                                    <span class="detilpemeriksaan">Faktor Koagulasi</span>
                                </td>
                                <td class="drop">
                                    <select name="" id="fk">
                                        <option value="">...</option>
                                        <option value="">???</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div> -->
                    <div class="btnpemeriksaan">
                        <a href="">Kembali</a>
                        <button class="primary" href="">Check Pasien</button>
                        <button class="warning" href="">Bersihkan</button>
                    </div>
                </form>
            </div>
            <footer>
                <p>Copyright © 2022, Powered by Smiley Cloud ッ All rights reserved.</p>
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