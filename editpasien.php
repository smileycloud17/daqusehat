<?php 
require_once("auth.php"); 
include 'koneksi.php';

$no_rm = $_GET['no_rm'];

$keterangan = $_SESSION["keterangan"];
require_once("authuser.php");
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="shortcut icon" href="assets/Proyek Baru.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <img src="assets/Proyek Baru.png" alt="">
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
                    <a href="cekpasien">
                        <span class="icon"><i class='fas fa-heartbeat'></i></span>
                        <span class="judul">Pemeriksaan</span>
                    </a>
                </li>
                <li>
                    <a href="datapasien">
                        <span class="icon"><i class="fas fa-file-medical"></i></span>
                        <span class="judul">Data Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="datapemeriksaan">
                        <span class="icon"><i class="fas fa-check-double"></i></span>
                        <span class="judul">Data Pemeriksaan</span>
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
                <span class="title-main">Pasien Baru<span>
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
                            <img src="assets/Ellipse 8.png" alt="">
                            <p>Hey, <b> <?php $long = 8;
                                        $nama = $_SESSION['nama_pengguna'];
                                        echo substr($nama,0,$long).'...'; ?></b></p>
                            <small class="text-mode"><?php 
                                        echo $_SESSION['keterangan']; ?></small>
                        </div>
                        <a href="editprofile"><button class="links sub1"><i class="fas fa-user-alt"></i>Edit Profile</button></a>
                        <a href="logout"><button class="links sub2"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- form edit data pasien -->
        <div class="cardbox">
            <div class="form-pasien">
                <div class="pasien-add">
                    <h2>FORM EDIT</h2>
                    <small> <b>Edit Data Pasien</b> </small>
                </div>
                <form action="proses_edit_pasien.php" method="post">
                <table class="tabel-pasien">
                    <tbody>
                    <?php 
                        $data = mysqli_query($koneksi,"select * from tb_pasien_resepsionis where no_rm='$no_rm'");
                        $nomor = 1;
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <th>No RM</th>
                            <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                            <th><input type="text" name="no_rm" id="noRm" value="<?php echo $d['no_rm']?>" disabled></th>
                            <th align="center">Jenis Kelamin</th>
                            <th><select name="jenis_kelamin" id="sex">
                                <option value="">--Jenis Kelamin--</option>
                                <option value="Laki-laki" <?php echo $d['jenis_kelamin'] == 'Laki-laki' ? 'selected="selected"' : '' ?> >Laki-laki</option>
                                <option value="Perempuan" <?php echo $d['jenis_kelamin'] == 'Perempuan' ? 'selected="selected"' : '' ?> >Perempuan</option>
                                <option value="-" <?php echo $d['jenis_kelamin'] == '-' ? 'selected="selected"' : '' ?> >Tidak disebutkan</option>
                            </select></th>
                        </tr>
                        <tr>
                            <th>Nomor BPJS</th>
                            <th><input type="text" name="no_bpjs" id="nobpjs" value="<?php echo $d['no_bpjs'] ?>"></th>
                            <th align="center">Tanggal Lahir</th>
                            <th><input type="date" name="tanggal_lahir" id="lahirdate" value="<?php echo $d['tanggal_lahir'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th><input type="text" name="nama" id="namalngkp" value="<?php echo $d['nama_pasien'] ?>"></th>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <th><input type="text" name="nik" id="noktp" value="<?php echo $d['nik'] ?>"></th>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <th><input type="text" name="no_telp" id="notlp" value="<?php echo $d['no_telp'] ?>"></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th><textarea name="alamat" id="" cols="35" rows="5"><?php echo $d['alamat'] ?></textarea></th>
                            <th align="center">Alamat Domisili</th>
                            <th><input type="text" name="domisili" id="alamatdom" value="<?php echo $d['domisili'] ?>"</input></th> 
                        </tr>
                    </tbody>
                </table>
                <div class="btnpemeriksaan">
                        <a href="datapasien.php">Kembali</a>
                        <button class="primary"  >Update Pasien</button>
                        <button class="warning" href="">Bersihkan</button>
                </div>
            </form>     
            <?php 
                }
                ?>                                                      
        </div>
        <footer>
            <p>&copy 2022 Klinik Daqu Sehat Malang</p>
        </footer>
    </div>
                
    <script src="js/script.js"></script>
    <script src="js/load.js"></script>
    <script src="js/jquery.js"></script>
                
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