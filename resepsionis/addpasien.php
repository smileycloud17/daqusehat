<?php 
require_once("../auth.php"); 
include '../koneksi.php';

$keterangan = $_SESSION["keterangan"];
require_once("../authuser.php");

// No RM Sesuai Urutan
error_reporting(0);

    $query = mysqli_query($koneksi,"SELECT LEFT(no_rm,2) as x, MID(no_rm,3,2) as y, RIGHT(no_rm,2) as z FROM tb_pasien_resepsionis ORDER BY id DESC LIMIT 1");

    $d = mysqli_fetch_array($query);

    $x = $d['x'];
    $y = $d['y'];
    $z = $d['z'];
    
    
    $tambahy=$y+1;
        if($tambahy == 100){
            $tambahy = 0;
            $z++;
    
            if($z == 100){
                $z = 0;
                $x++;
                if($x == 100){
                    $y = 99;
                    $z = 99;
                    $x = 99;
                }
            }
        }

//Kode Otomatis
$query = mysqli_query($koneksi, "SELECT max(no_rm) as kodeTerbesar, max(id) as idTerbesar FROM tb_pasien_resepsionis");
$data = mysqli_fetch_array($query);

// $norm = $data['kodeTerbesar'];

// $urutan = (int) substr($norm, 4, 4);

// $urutan++;
// $huruf = "RM";
// $norm = $huruf . sprintf("%04s", $urutan);

//id otomatis
$noid = $data['idTerbesar'];

$urutanid = $noid;
$urutanid++;

$noidlanjut = $urutanid;
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="shortcut icon" href="../assets/Proyek Baru.png">
    <link href="../css/select2.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
    <script src="../js/select2/select2.min.js"></script>
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
        <!-- form data pasien -->
        <div class="cardbox">
            <div class="form-pasien">
                <div class="pasien-add">
                    <h2>FORM PENDAFTARAN</h2>
                    <small> <b>Pasien Baru</b> </small>
                </div>
                <form action="proses_tambah_pasien.php" method="post">
                <table class="tabel-tambah-pasien">
                    <tbody>
                        <tr>
                            <input type="text" name="id" required="required" id="noId" placeholder="Id" value="<?php echo $noidlanjut?>" hidden>
                            <th>No RM</th>
                            <th>
                                <input type="text" name="no_rm1" required="required" id="rm1" style="width: 40px;" maxlength="2" onkeyup="moveField(this,'rm2')" placeholder="No RM" value="<?php echo sprintf("%02d", $x)?>">
                                <p class="pembatas-no-rm">-</p>
                                <input type="text" name="no_rm2" required="required" id="rm2" style="width: 40px;" maxlength="2" onkeyup="moveField(this,'rm3')" placeholder="No RM" value="<?php echo sprintf("%02d", $tambahy)?>">
                                <p class="pembatas-no-rm">-</p>
                                <input type="text" name="no_rm3" required="required" id="rm3" style="width: 40px;" placeholder="No RM" value="<?php echo sprintf("%02d", $z)?>">
                                <i class="info-no-rm">*Angka dapat diganti</i>
                            </th>
                        </tr>
                        <tr>
                            <th>Nomor BPJS</th>
                            <th><input type="text" name="no_bpjs" id="nobpjs" autocomplete="off"></th>
                            <th align="center">Provinsi</th>
                            <th><select name="provinsi" id="form_prov" class="form_prov" required>
                            <option value=""></option>
                            <?php 
                            $daerah = mysqli_query($koneksi,"SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
                            while($d = mysqli_fetch_array($daerah)){
                                ?>
                                <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                <?php 
                            }
                            ?>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <th><input type="text" name="nik" id="noktp" autocomplete="off" required></th>
                            <th align="center">Kab/Kota</th>
                            <th><select name="kabupaten" id="form_kab" required>
                                </select></th>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th><input type="text" name="nama" id="namalngkp" autocomplete="off" required></th>
                            <th align="center">Kecamatan</th>
                            <th><select name="kecamatan" id="form_kec" required>
                                    
                                </select></th>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th><select name="jenis_kelamin" id="sex" required>
                                <option value="">--Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="-">Tidak Disebutkan</option>
                            </select></th>
                            <th align="center">Kelurahan / Desa</th>
                            <th><select name="kelurahan" id="form_des" required>
                                    
                                </select></th>
                        </tr>
                        <tr>
                            <th>Status Menikah</th>
                            <th><select name="status_menikah" id="marid" required>
                                <option value="">--Status Menikah--</option>
                                <option value="sudah">Sudah Menikah</option>
                                <option value="belum">Belum Menikah</option>
                            </select></th>
                            <th></th>
                            <th collspan="2">
                                <input type="text" name="rt" id="rt" placeholder="RT" style="width: 60px" autocomplete="off" required>
                                <p class="pembatas-no-rm">-</p>
                                <input type="text" name="rw" id="rw" placeholder="RW" style="width: 60px" autocomplete="off" required>
                            </th>
                        </tr>
                        <tr>
                            <th>Nama Orang Tua</th>
                            <th><input type="text" name="nama_ortu" id="namaortu" autocomplete="off" required></th>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <th><input type="text" name="no_telp" id="notlp" autocomplete="off" required></th>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <th><input type="date" name="tanggal_lahir" id="lahirdate" required></th>
                            <th align="center">Agama</th>
                            <th><select name="agama" id="religi" required>
                                <option value="1">--Pilih--</option>
                                <?php 
                                $agama = mysqli_query($koneksi,"SELECT * FROM master_agama ORDER BY id_agama");
                                while($data_agama = mysqli_fetch_array($agama)){
                                    ?>
                                    <option value="<?php echo $data_agama['id_agama']; ?>"><?php echo $data_agama['nama_agama']; ?></option>
                                    <?php 
                                }
                                ?>
                                <!-- <option value="1">Islam</option>
                                <option value="2">Kristen</option>
                                <option value="3">Katholik</option>
                                <option value="4">Hindu</option>
                                <option value="5">Budha</option>
                                <option value="6">Kong Hu Cu</option> -->
                            </select></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th><textarea name="alamat" id="" cols="35" rows="5" required></textarea></th>
                            <th align="center">Alamat Domisili</th>
                            <th><input type="text" name="domisili" id="alamatdom" autocomplete="off" required></th>
                        </tr>
                    </tbody>
                </table>
                <div class="btnpemeriksaan">
                        <a href="">Kembali</a>
                        <button class="primary" >Simpan Pasien</button>
                        <button class="warning" href="">Bersihkan</button>
                </div>
            </form>                                                             
        </div>
        <footer>
            <p>&copy 2022 Klinik Daqu Sehat Malang</p>
        </footer>
    </div>
                
    <script src="../js/script.js"></script>
    <!-- <script src="js/jquery.js"></script> -->
    <script src="../js/load.js"></script>
              
    <script>
    // Dropdown Searchable
    $(document).ready(function() {
        $("#form_prov").select2();
    });
    $(document).ready(function() {
        $("#form_kab").select2();
    });
    $(document).ready(function() {
        $("#form_kec").select2();
    });
    $(document).ready(function() {
        $("#form_des").select2();
    });

    $(document).ready(function() {
        $("#form_prov").select2({
            placeholder: 'Pilih Provinsi',
            allowClear: true
        });
    });
    $(document).ready(function() {
        $("#form_kab").select2({
            placeholder: 'Pilih Kabupaten',
            allowClear: true
        });
    });
    $(document).ready(function() {
        $("#form_kec").select2({
            placeholder: 'Pilih Kecamatan',
            allowClear: true
        });
    });
    $(document).ready(function() {
        $("#form_des").select2({
            placeholder: 'Pilih Desa',
            allowClear: true
        });
    });
        
    // Pembatas No RM
        function moveField(field, autoMove){
                if(field.value.length >= field.maxLength){
                    document.getElementById(autoMove).focus();
                }
            }

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