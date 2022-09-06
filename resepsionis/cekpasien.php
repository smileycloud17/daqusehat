<?php 
require_once("../auth.php"); 
include '../koneksi.php';

$keterangan = $_SESSION["keterangan"];
require_once("../authuser.php");
error_reporting(0);

//Kode Otomatis register Poli Umum
$nourut = mysqli_query($koneksi, "SELECT MID(no_reg,3,3) as RegTerbesar FROM tb_pemeriksaan_poliumum ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($nourut);
$tanggal = mysqli_query($koneksi, "SELECT RIGHT(no_reg,4) as tanggal_noreg FROM tb_cek_pasien ORDER BY id DESC LIMIT 1");
$dtanggal = mysqli_fetch_array($tanggal);
$noreg = $data['RegTerbesar'];
$tanggal_terakhir = $dtanggal['tanggal_noreg'];

if($tanggal_terakhir != date('my')){
    $noreg = 0;
}

$urutan = (int) $noreg;

$urutan++;
 
$huruf = "PU";
$bulantahun = date("my");
$noreg = $huruf . sprintf("%03s", $urutan) . $bulantahun;
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="shortcut icon" href="../assets/Proyek Baru.png">
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
                <span class="title-main">Pemeriksaan Baru<span>
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
            <div class="form-cekcek">
                <div class="cek-add">
                    <h2>Pemeriksaan Pasien</h2>
                    <small> <b>Pasien Baru</b> </small>
                </div>
                <form action="proses_tambah_pemeriksaan.php" method="POST">
                <table class="tabel-cek">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="perawatan" value="Rawat Jalan" checked>&nbsp; <b>Rawat Jalan</b>
                                <input type="radio" name="perawatan" style="margin-left: 10px;" value="Rawat Inap">&nbsp; <b>Rawat Inap<b>
                                <input type="radio" name="perawatan" style="margin-left: 10px;" value="Kunjungan Sehat">&nbsp; <b>Kunjungan Sehat<b>
                            </td>
                        <tr>
                        <tr>
                            <th>No RM</th>
                            <th>
                                <!-- <input type="text" onkeyup="isi_otomatis()" name="no_rm" id="noRm" placeholder="No RM" autocomplete="off"> -->
                                <input type="number" name="no_rm1" required="required" id="rm1" style="width: 40px;" maxlength="2" onkeyup="moveField(this,'rm2'),isi_otomatis()" autocomplete='off'>
                                -
                                <input type="number" name="no_rm2" required="required" id="rm2" style="width: 40px;" maxlength="2" onkeyup="moveField(this,'rm3'),isi_otomatis()" autocomplete='off'>
                                -
                                <input type="number" name="no_rm3" required="required" id="rm3" style="width: 40px;" onkeyup="isi_otomatis()" autocomplete='off'>
                            </th>
                            <th align="center">Tanggal Masuk</th>
                            <input type="text" name="tanggal_masuk" id="tglmasuk" value="<?php echo date("Y-m-d") ?>" hidden>
                            <th><input type="text" name="tanggal_masuk_tampil" id="tglmasuk-tampil" value="<?php echo date("d-m-Y") ?>" readonly></th>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th><input type="text" name="nama" id="namalngkp" readonly></th>
                            <th align="center">Nomor BPJS</th>
                            <th><input type="text" name="no_bpjs" id="nobpjs" readonly></th>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th><input type="text" name="jenis_kelamin" id="sex" readonly></th>
                            <th align="center">No Registrasi</th>
                            <th><input type="text" name="no_reg" id="no_reg" value="<?php echo $noreg; ?>" readonly></th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="layanan" value="BPJS">&nbsp; <b>BPJS</b>
                                <input type="radio" name="layanan" style="margin-left: 10px;" value="umum" checked>&nbsp; <b>UMUM<b>
                            </td>
                        </tr>
                        <tr>
                            <th>Pilih Poli</th>
                            <th><select name="poli" id="jnsprksa">
                                <option value="">--Pilih Pemeriksaan--</option>
                                <option value="Poli Umum">Poli Umum</option>
                                <option value="KIA">KIA</option>
                                <option value="Laboratorium">Labortarium</option>
                                <option value="Rawat Jalan">Rawat Jalan</option>
                                <option value="Poli Gigi">Poli Gigi</option>
                            </select></th> 
                        </tr>
                        <tr>
                            <th>Berat Badan</th>  
                            <th><input type="number" name="berat_badan" placeholder="Kg" id="bb" autocomplete='off'></th>
                            <th align="center">Suhu Badan</th>
                            <th><input type="tel" name="suhu_badan" id="sb" placeholder="°C" pattern="[0-9]{2}.[0-9]{1}" autocomplete='off'></th>
                            
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>  
                            <th><input type="number" name="tinggi_badan" placeholder="Cm" id="tb" autocomplete='off'></th>
                            <th align="center">Golongan Darah</th>
                            <th><input type="text" name="golongan_darah" id="goldar" autocomplete='off'></th>
                        </tr>
                        <tr>
                            <th>Sistole</th>
                            <th><input type="number" name="sistole" id="sistole" placeholder="mmHg" autocomplete='off'></th> 
                            <th align="center">Diastole</th>
                            <th><input type="number" name="diastole" id="diastole" placeholder="mmHg" autocomplete='off'></th>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="btnpemeriksaan">
                        <a href="">Kembali</a>
                        <button class="primary" >Proses Pasien</button>
                        <button class="warning" href="">Bersihkan</button>
                </div>
            </form>                                                             
        </div>
        <footer>
            <p>Copyright © 2022, Powered by Smiley Cloud ッ All rights reserved.</p>
        </footer>
    </div>            

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var noRm = $("#rm1").val()+'.'+$("#rm2").val()+'.'+$("#rm3").val();
                $.ajax({
                    url: 'cekrm.php',
                    data:"no_rm="+noRm ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#namalngkp').val(obj.namalngkp);
                    $('#nobpjs').val(obj.nobpjs);
                    $('#sex').val(obj.sex);
                })
            }

            
        // Pembatas No RM
            function moveField(field, autoMove){
                if(field.value.length >= field.maxLength){
                    document.getElementById(autoMove).focus();
                }
            }
        </script>

    <script src="../js/script.js"></script>
    <script src="../js/jquery.js"></script>
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