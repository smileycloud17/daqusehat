<?php require_once("../auth.php"); 

$keterangan = $_SESSION["keterangan"];
    if($keterangan != "dokter") {
        header("Location: ../configuser.php");
    }
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
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
                    <a href="poliumum">
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
                <!-- <li>
                    <a href="pasien">
                        <span class="icon"><i class="far fa-plus-square"></i></span>
                        <span class="judul">Pasien Baru</span>
                    </a>
                </li> -->
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
                <span class="title-main">Dashboard<span>
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
                            <p>Hey, <b><?php $long = 8;
                                        $nama = $_SESSION['nama_pengguna'];
                                        echo substr($nama,0,$long).'...'; ?></b></p>
                            <small class="text-mode"><?php 
                                        echo $_SESSION['keterangan']; ?></small>
                        </div>
                        <a href="editprofile"><button class="links sub1"><i class="fas fa-user-alt"></i>Edit Profile</button></a>
                        <a href="../logout.php"><button class="links sub2"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="cardbox3">
            <a href="notfound.html" class="card-2">
                <div>
                    <div class="number">15</div>
                    <div class="keterangan">Pasien Belum Dilayani</div>
                </div>
                <div class="iconCard">
                    <i class='fas fa-hand-holding-medical'></i>
                </div>
            </a>
            <a href="notfound.html" class="card-2">
                <div>
                    <div class="number">30</div>
                    <div class="keterangan">Pasien Sudah Dilayani</div>
                </div>
                <div class="iconCard">
                    <i class='fas fa-hospital-user'></i>
                </div>
            </a>
            <a href="notfound.html" class="card-2">
                <div>
                    <div class="number">250</div>
                    <div class="keterangan">Total Pasien</div>
                </div>
                <div class="iconCard">
                    <i class='fas fa-users'></i>
                </div>
            </a>
        </div>

        <!-- data preview dashboard -->
        <div class="dataDetail">
            <div class="pasien">
                <div class="headeer">
                    <h2>Daftar Tabel Pasien Terakhir</h2>
                    <a href="#" class="tombol">View All</a>
                </div>
                <div class="tabel-dashboard">
                    <table>
                        <thead>
                            <tr>
                                <!-- <td>No</td> -->
                                <td>No.Reg</td>
                                <td>No.RM</td>
                                <td>Nama</td>
                                <td>Jenis Pelayanan</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="tampildata">
                            <!-- <tr>
                                <td>1</td>
                                <td>PLM0001</td>
                                <td>00-01-00</td>
                                <td>Nania Yusuf Eliana</td>
                                <td>5/27/22</td>
                                <td><a href="registration" class="btn-pelayanan belum">Belumdilayani</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <a href="+ linkTo +" class='"+ statusPelayanan + status +"'>"+this['status_pelayanan']+"</a>
            </div>
            <!-- Preview Jam Pengingat -->
            <!-- <div class="clock">
                <div class="headeer">
                    <div class="analog">
                        <div class="jam">
                            <div class="hr" id="hr"></div>
                        </div>
                        <div class="menit">
                            <div class="mn" id="mn"></div>
                        </div>
                        <div class="detik">
                            <div class="sc" id="sc"></div>
                        </div>
                        <div class="date">
                            <span class="dino" id="dayname">Day</span>
                            <span class="wulan" id="month">Month</span>
                            <span class="tanggal" id="daynum">00</span>
                            <span class="taun"id="year">Year</span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div> 
        <!-- teks slide -->
        <div class="teks-slide">
          <marquee behavior="" direction="" style="color: red;"> PERINGATAN !!!  Selalu Displin dan Mematuhi Protokol Kesehatan Dalam Pencegahan Covid-19 Patuhi 5M </marquee>
        </div>
        <footer>
            <p>Copyright © 2022, Powered by Smiley Cloud ッ All rights reserved.</p>
        </footer>

    </div>

    <script src="../js/script.js"></script>
    <script src="../js/load.js"></script>

    <!-- Tampilan data -->
    <script type="text/javascript">
        $(document).ready(function() {
                selesai();
            });
            
            function selesai() {
                setTimeout(function() {
                    update();
                    selesai(); 
                }, 200);
            }
            
            function update() {
                $.getJSON("data_pemeriksaan_masuk_dashboard.php", function(data) {
                    $("tbody").empty();
                    var no = 1;
                    $.each(data.result, function() {
                        if(this['status_pelayanan'] == "Belum Dilayani"){
                            var statusPelayanan = "btn-pelayanan";
                            var status = " 
                            ";
                            var linkTo = "registration?no_reg="+this['no_reg'];
                            var visible = "";
                        } else if(this['status_pelayanan'] == "Sudah Dilayani"){
                            var statusPelayanan = "btn-pelayanan";
                            var status = " sudah";
                            var linkTo = "#";
                            var visible = "Disable";
                        }

                        $("tbody").append("<tr><td>"+this['no_reg']+"</td><td>"+this['no_rm']+"</td><td>"+this['nama_pasien']+"</td><td>"+this['jenis_layanan']+"</td><td><a href="+ linkTo +" class='"+ statusPelayanan + status +"'>"+this['status_pelayanan']+"</a></td></tr>");
                    });
                });
            }
    </script>

    <!-- Tampilan Jumlah -->
    

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