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
                    <a href="index">
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
                <span class="title-main">Check Form<span>
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
                <div class="pasien-add">
                    <h2>Check Pasien</h2>
                    <small>Form Check Pasien</small>
                </div>
                <form action="#" >
                <table class="cek-pasien">
                <thead>
                        <tr>
                            <th>No RM
                                <input type="text" id="noRm" placeholder="No RM" readonly>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox"style="margin-left: -30px;" id="hematologi" onclick="hematologidsbl()"> <span style="font-weight: bold;">Hematologi</span><br>
                            </td>
                            <td rowspan="100">
                                <div id="formhematologi" style="display: none;">
                                    <span style="font-weight: bold;">Hematologi</span><br>
                                        <span style="padding-left: 20px; padding-right: 50px;">Hematologi Rutin</span><input type="text" id="hematologirt"><br>
                                        <span style="padding-left: 20px; padding-right: 83.7px;">Hemoglobin</span><input type="text" id="hemoglobin"><br>
                                        <span style="padding-left: 20px; padding-right: 98.3px;">Leuokosit</span><input type="text" id="leukosit"><br>
                                        <span style="padding-left: 20px; padding-right: 106.7px;">Diff/LED</span><input type="text" id="dled"><br>
                                        <span style="padding-left: 20px; padding-right: 96.6px;">Trombosit</span><input type="text" id="trombosit"><br>
                                        <span style="padding-left: 20px; padding-right: 90.3px;">Hematokrit</span><input type="text" id="hematokrit"><br>
                                        <span style="padding-left: 20px; padding-right: 7.9px;">G.Darah/Rhesus Faktor</span><input type="text" id="goldarres"><br>
                                </div>
                                <div id="formnarkoba" style="display: none;">
                                <span style="font-weight: bold;">Narkoba</span><br>
                                    <span style="padding-left: 20px; padding-right: 79px;">Amphetamin</span><input type="text" id="goldarres"><br>
                                </div>
    
                                <div id="formwidal" style="display: none;">
                                    <span style="font-weight: bold;">Widal</span><br>
                                        <span style="padding-left: 20px; padding-right: 123px;">Widal</span><input type="text" id="goldarres"><br>
                                </div>
    
                                <div id="formfaalhati" style="display: none;">
                                    <span style="font-weight: bold;">Faal Hati</span><br>
                                        <span style="padding-left: 20px; padding-right: 74.6px;">SGOT/SGPT</span><input type="text" id="goldarres"><br>
                                </div>
    
                                <div id="formlemak" style="display: none;">
                                    <span id="capslemak" style="font-weight: bold;">Lemak</span><br>
                                    <div id="kolesterolhasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 60.2px;">Kolesterol Total</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="tryglyceridehasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 35.5px;">Tryglyceride Puasa</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="hdlhasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 129.5px;">HDL</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="ldlhasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 132px;">LDL</span><input type="text" id="goldarres"><br>
                                    </div>
                                </div>
    
                                <div id="formurinalisa" style="display: none;">
                                    <span style="font-weight: bold;">Urinalisa</span><br>
                                    <div id="urinehasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 64px;">Urine Lengkap</span><input type="text" id="goldarres" ><br>
                                    </div>
                                    <div id="teshamilhasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 2.5px;">Test kehamilan (PPTest)</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="microalbuminhasil" style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 72px;">Microalbumin</span><input type="text" id="goldarres"><br>
                                    </div>
                                </div>
    
                                <div id="formkdd"style="display: none;">
                                    <span style="font-weight: bold;">Kimia Darah Diabetes</span><br>
                                    <div id="gruphasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 58px;">Grukosa Puasa</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="grupphasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 80px;">Grukosa PP</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="grushasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 44px;">Grukosa Sewaktu</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="hba1chasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 109.5px;">HBA1C</span><input type="text" id="goldarres"><br>
                                    </div>
                                </div>
    
                                <div id="formfaalginjal"style="display: none;">
                                    <span style="font-weight: bold;">Faal Ginjal</span><br>
                                    <div id="ureumhasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 114px;">Ureum</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="creatinhasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 110.5px;">Creatin</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="urichasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 100px;">Uric Acid</span><input type="text" id="goldarres"><br>
                                    </div>
                                </div>
    
                                <div id="formfk"style="display: none;">
                                    <span style="font-weight: bold;">Faktor Koagulasi</span><br>
                                    <div id="waktudarahhasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 34px;">Waktu Pendarahan</span><input type="text" id="goldarres"><br>
                                    </div>
                                    <div id="waktubekuhasil"style="display: none;">
                                        <span style="padding-left: 20px; padding-right: 36px;">Waktu Pembekuan</span><input type="text" id="goldarres"><br>
                                    </div>
                                </div>
    
                                <span style="color: var(--card);">_______________________________________________________</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="narkoba" onclick="narkobadsbl()"> <span style="font-weight: bold;">Narkoba</span><br>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="widal" onclick="widaldsbl()"> <span style="font-weight: bold;">Widal</span><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="faalhati" onclick="faalhatidsbl()"> <span style="font-weight: bold;">Faal Hati</span><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="lemak" onclick="lemakdsbl()"> <span style="font-weight: bold;">Lemak</span><br>
                                <div id="sublemak" style="margin-left: -20px; display: none;">
                                    <input type="checkbox" id="kolesterol" onclick="lemakdsbl()"> <span>Kolesterol Total</span><br>
                                    <input type="checkbox" id="tryglyceride" onclick="lemakdsbl()"> <span>Tryglyceride Puasa</span><br>
                                    <input type="checkbox" id="hdl" onclick="lemakdsbl()"> <span>HDL</span><br>
                                    <input type="checkbox" id="ldl" onclick="lemakdsbl()"> <span>LDL</span><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="urinalisa" onclick="urinalisadsbl()"> <span style="font-weight: bold;">Urinalisa</span><br>
                                <div id="suburinalisa" style="margin-left: -20px; display: none;">
                                    <input type="checkbox" id="urine" onclick="urinalisadsbl()"> <span>Urine Lengkap</span><br>
                                    <input type="checkbox" id="teskehamilan" onclick="urinalisadsbl()"> <span>Test Kehamilan (PPTest)</span><br>
                                    <input type="checkbox" id="microalbumin" onclick="urinalisadsbl()"> <span>Microalbumin</span><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="kdd" onclick="kdddsbl()"> <span style="font-weight: bold;">Kimia Darah Diabetes</span><br>
                                <div id="subkdd" style="margin-left: -20px; display: none;">
                                    <input type="checkbox" id="grukosap" onclick="kdddsbl()"> <span>Grukosa Puasa</span><br>
                                    <input type="checkbox" id="grukosapp" onclick="kdddsbl()"> <span>Grukosa PP</span><br>
                                    <input type="checkbox" id="grukosas" onclick="kdddsbl()"> <span>Grukosa Sewaktu</span><br>
                                    <input type="checkbox" id="hba1c" onclick="kdddsbl()"> <span>HBA1C</span><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="faalginjal" onclick="faalginjaldsbl()"> <span style="font-weight: bold;">Faal Ginjal</span><br>
                                <div id="subfaalginjal" style="margin-left: -20px; display: none;">
                                    <input type="checkbox" id="ureum" onclick="faalginjaldsbl()"> <span>Ureum</span><br>
                                    <input type="checkbox" id="creatin" onclick="faalginjaldsbl()"> <span>Creatin</span><br>
                                    <input type="checkbox" id="uric" onclick="faalginjaldsbl()"> <span>Uric Acid</span><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-left: -30px;" id="fk" onclick="fkdsbl()"> <span style="font-weight: bold;">Faktor Koagulasi</span><br>
                                <div id="subfk" style="margin-left: -20px; display: none;">
                                    <input type="checkbox" id="waktudarah" onclick="fkdsbl()"> <span>Waktu Pendarahan</span><br>
                                    <input type="checkbox" id="waktubeku" onclick="fkdsbl()"> <span>Waktu Pembekuan</span><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="100" style="color: var(--card);">_______________________</td>
                        </tr>
                    </tbody>
<!-- 
                    <tr>
                        <th><input type="checkbox"> Hematologi</th>
                        <th></th>
                        <th>Hematologi</th>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Narkoba</th>
                        <th></th>
                        <td style="padding-left: 20px;">Hematologi Rutin</td>
                        <td><input type="text" id="hematologirt"></td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Widal</th>
                        <th></th>
                        <td style="padding-left: 20px;">Hemoglobin</td>
                        <td><input type="text" id="hemoglobin"></td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Faal Hati</th>
                        <th></th>
                        <td style="padding-left: 20px;">Leuokosit</td>
                        <td><input type="text" id="leukosit"></td>
                    </tr>
                    <tr>
                        <th><input id="lemak" type="checkbox" onclick="lemakdsbl();"> Lemak</th>
                        <th></th>
                        <td style="padding-left: 20px;">Diff/LED</td>
                        <td><input type="text" id="dled"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Kolesterol Total</td>
                        <th></th>
                        <td style="padding-left: 20px;">Trombosit</td>
                        <td><input type="text" id="trombosit"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Tryglyceride Puasa</td>
                        <th></th>
                        <td style="padding-left: 20px;">Hematokrit</td>
                        <td><input type="text" id="hematokrit"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> HDL</td>
                        <th></th>
                        <td style="padding-left: 20px;">G.Darah/Rhesus Faktor</td>
                        <td><input type="text" id="goldarres"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> LDL</td>
                        <th></th>
                        <th>Narkoba</th>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Urinalisa</th>
                        <th></th>
                        <td style="padding-left: 20px;">Amphetamin</td>
                        <td><input type="text" id="amphetamin"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Urine Lengkap</td>
                        <th></th>
                        <th>Widal</th>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Test Kehamilan (PPTest)</td>
                        <th></th>
                        <td style="padding-left: 20px;">Widal</td>
                        <td><input type="text" id="widall"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Microalbumin</td>
                        <th></th>
                        <th>Faal Hati</th>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Kimia Darah Diabetes</th>
                        <th></th>
                        <td style="padding-left: 20px;">SGOT/SGPT</td>
                        <td><input type="text" id="sgot"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Grukosa Puasa</td>
                        <th></th>
                        <th>Lemak</th>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Grukosa PP</td>
                        <th></th>
                        <td style="padding-left: 20px;">Kolesterol Total</td>
                        <td><input type="text" id="Ktotal"></td>
                        </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Grukosa Sewaktu</td>
                        <th></th>
                        <td style="padding-left: 20px;">Tryglyceride Puasa</td>
                        <td><input type="text" id="Tpuasa"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> HBA1C</td>
                        <th></th>
                        <td style="padding-left: 20px;">HDL</td>
                        <td><input type="text" id="HDL"></td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Faal Ginjal</th>
                        <th></th>
                        <td style="padding-left: 20px;">LDL</td>
                        <td><input type="text" id="LDL"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Ureum</td>
                        <th></th>
                        <th>Urinalisa</th>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Creatin</td>
                        <th></th>
                        <td style="padding-left: 20px;">Urine Lengkap</td>
                        <td><input type="text" id="urine"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Uric Acid</td>
                        <th></th>
                        <td style="padding-left: 20px;">Test kehamilan (PPTest)</td>
                        <td><input type="text" id="pptest"></td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"> Faktor Koagulasi</th>
                        <th></th>
                        <td style="padding-left: 20px;">Microalbumin</td>
                        <td><input type="text" id="microa"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Waktu Pendarahan</td>
                        <th></th>
                        <th>Kimia Darah Diabetes</th>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"><input type="checkbox"> Waktu Pembekuan</td>
                        <th></th>
                        <td style="padding-left: 20px;">Grukosa Puasa</td>
                        <td><input type="text" id="gpuasa"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Grukosa PP</td>
                        <td><input type="text" id="gpp"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Grukosa Sewaktu</td>
                        <td><input type="text" id="gsewaktu"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">HBA1C</td>
                        <td><input type="text" id="hba"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <th>Faal Ginjal</th>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Ureum</td>
                        <td><input type="text" id="ureum"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Creatin</td>
                        <td><input type="text" id="creatin"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Uric Acid</td>
                        <td><input type="text" id="UAc"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <th>Faktor Koagulasi</th>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Waktu Pendarahan</td>
                        <td><input type="text" id="wpenda"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 20px;"></td>
                        <th></th>
                        <td style="padding-left: 20px;">Waktu Pembekuan</td>
                        <td><input type="text" id="wbeku"></td>
                    </tr> -->
                    <!-- <tr>
                        <th colspan="4" >
                            <a href="">Kembali</a>
                            <button type="submit" style="margin-right: 320px; margin-top: 20px; background: var(--primary);">Submit And Print</button>
                            <button type="reset" style="margin-right: 20px; margin-top: 20px; background: var(--warning);">Reset</button>
                        </th>
                    </tr> -->
                </table>
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