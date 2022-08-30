<?php require_once("../auth.php"); 

$no_reg = $_GET['no_reg'];

include '../koneksi.php';

$keterangan = $_SESSION["keterangan"];
    if($keterangan != "dokter") {
        header("Location: ../configuser.php");
    }

//Kode Otomatis
$query = mysqli_query($koneksi, "SELECT max(no_rm) as kodeTerbesar FROM tb_pasien_resepsionis");
$data = mysqli_fetch_array($query);
$norm = $data['kodeTerbesar'];

$urutan = (int) substr($norm, 4, 4);

$urutan++;
 
$huruf = "RM";
$norm = $huruf . sprintf("%04s", $urutan);

// Umur
function hitung_umur($tanggal_lahir){
	$birthDate = new DateTime($tanggal_lahir);
	$today = new DateTime("today");
    $tglerror = new DateTime("0000-00-00");
	if ($birthDate > $today) { 
	    $y = "0";
        $m = "0";
        $d = "0";
        return $y." tahun ".$m." bulan ";
	} else if($birthDate == $tglerror){
        return "Tanggal lahir kosong";
    }else {  
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y." tahun ".$m." bulan ";
    }
}
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="shortcut icon" href="../assets/Proyek Baru.png">
    <style type="text/css">
        .autocomplete-suggestions { border-color: #5fb4fa; border: 1px solid #999; background: #fff; overflow: auto; border-radius:10px;}
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
        .autocomplete-group { padding: 2px 5px; }
        .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
    </style>
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
                <?php 
                    $data_pemeriksaan = mysqli_query($koneksi,"select * from tb_cek_pasien INNER JOIN tb_pasien_resepsionis ON tb_cek_pasien.no_rm = tb_pasien_resepsionis.no_rm where no_reg='$no_reg'");
                    $nomor = 1;
                    $dp = mysqli_fetch_array($data_pemeriksaan);
                ?>
                <form>
                <h2>Riwayat Pemeriksaan</h2>
                    <div class="input-details">
                        <details class="details-riwayat-pemeriksaan">
                            <summary class="summary-riwayat">Buka Riwayat Pemeriksaan</summary>
                            asdasdas
                        </details>
                    </div>
                </form>
            </div>
            <div class="registrasi">
                <?php 
                    $data_pemeriksaan = mysqli_query($koneksi,"select * from tb_cek_pasien INNER JOIN tb_pasien_resepsionis ON tb_cek_pasien.no_rm = tb_pasien_resepsionis.no_rm where no_reg='$no_reg'");
                    $nomor = 1;
                    $dp = mysqli_fetch_array($data_pemeriksaan);
                ?>
                <form>
                <h2>Hasil Cek</h2>
                    <div class="input-details">
                        <div class="inputbox">
                            <span class="detil">No.Register</span>
                             <h3><?= $dp['no_reg']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">No.RM</span>
                             <h3><?= $dp['no_rm']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Nama Pasien</span>
                             <h3><?= $dp['nama_lengkap']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Usia</span>
                             <h3><?= hitung_umur($dp['tanggal_lahir']); ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Berat Badan</span>
                             <h3><?= $dp['berat_badan']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Suhu Badan</span>
                             <h3><?= $dp['suhu_badan']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Tinggi Badan</span>
                             <h3><?= $dp['tinggi_badan']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Golongan Darah</span>
                             <h3><?= $dp['gol_darah']; ?></h3>
                        </div>
                    </div>
                    <h2 style="margin-top: 50px;">Tekanan Darah</h2>
                    <div class="input-details">
                        <div class="inputbox">
                            <span class="detil">Sistole</span>
                             <h3><?= $dp['sistole']; ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Diastole</span>
                             <h3><?= $dp['diastole']; ?></h3>
                        </div>
                    </div>
                </form>
            </div>
            <div class="registrasi">
                <h2>Data Pemeriksaan</h2>
                <?php 
                    $data = mysqli_query($koneksi,"select * from tb_pemeriksaan_poliumum where no_reg='$no_reg'");
                    $nomor = 1;
                    while($d = mysqli_fetch_array($data)){
                ?>
                <form action="proses_periksa_data_umum.php" method="POST">
                    <div class="floating-btn">
                        <button class="primary">Submit and Print</button>
                        <button class="warning" href="">Bersihkan</button>
                    </div>
                    <div class="input-details">
                        <div class="checkrm">
                            <span class="detil">No.RM</span>
                            <th><input class="forminput" type="text" name="no_rm" id="noRm" placeholder="No RM" value="<?= $d['no_rm']; ?>" autocomplete="off">
                        </div>
                        <div class="inputbox">
                            <span class="detil">No.Register</span>
                            <input class="forminput" type="text" id="no_reg" name="no_reg" value="<?= $d['no_reg']; ?>" readonly>
                        </div>
                            <input type="text" name="indate" id="indate" value="<?php echo date("Y-m-d") ?>" hidden>
                        <div class="inputbox">
                            <span class="detil">Nama Pasien</span>
                            <input class="forminput" type="text" id="namalngkp" value="<?php echo $d['nama_pasien'] ?>" name="namalngkp" required autocomplete="off">
                        </div>
                        <div class="inputbox">
                            <span class="detil">Jenis Layanan</span>
                            <input class="forminput" type="text" id="jenis_pelayanan" name="jenis_pelayanan" value="<?php echo $d['jenis_layanan']; ?>" hidden>
                            <h3 style="margin-top: 15px"><?php echo $d['jenis_layanan'] ?></h3>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Ananmnesa</span>
                            <textarea name="ananmnesa" id="ananmnesa" cols="30" rows="5" autocomplete="off"></textarea>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Pemeriksaan Fisik</span>
                            <textarea name="pemeriksaan_fisik" id="pemeriksaan_fisik" cols="30" rows="5" autocomplete="off"></textarea>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Pemeriksaan Penunjang</span>
                            <input class="forminput" type="text" id="pemeriksaan_penunjang" name="pemeriksaan_penunjang" autocomplete="off">
                        </div>
                        <div class="inputbox">
                            <span class="detil">Diagnosa</span>
                            <input class="forminput" type="text" id="diagnosa" name="diagnosa" autocomplete="off">
                        </div>
                    </div>
                    <h2 style="margin-top: 50px;">Terapi Dan Obat</h2>
                    <div class="input-details" id="form-obat">
                        <div class="inputbox">
                            <span class="detil">Terapi/Obat</span>
                            <input class="forminput obat" type="text" id="obat" name="obat[]" style="width: 50%" placeholder="Nama Obat">
                            <input class="forminput" type="number" style="width: 15%" placeholder="Jumlah" name="jumlah[]">
                            <input class="forminput" type="text" style="width: 15%" placeholder="Signa" name="dosis[]">
                            <input type="button" value="+" class="btn-medicin" id="add">
                        </div>
                        <!-- <div class="inputbox">
                            <span class="detil">Terapi/Obat</span>
                            <input class="forminput obat" type="text" id="obat" name="obat" style="width: 65%" required>
                            <input class="forminput" type="text" style="width: 20%">
                            <input type="button" value="x" class="btn-checkit" style="margin-left: 5px">
                            <button class="btn-checkit" style="margin-left: 5px"><i class="fa-solid fa-trash-can"></i></button>
                            <button class="btn-medicin">+</button>
                        </div> -->
                    </div>
                <?php 
                    }
                ?>
            </div>
        </form>
        <footer style="margin-top: 60px">
            <p>Copyright © 2022, Powered by Smiley Cloud ッ All rights reserved.</p>
        </footer>
        </div>
        
    </div>

    <script src="../js/script.js"></script>
    <script src="../js/load.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var html = '<div class="inputbox"><span class="detil">Terapi/Obat</span><input class="forminput obat" type="text" id="obat" name="obat[]" style="width: 50%" placeholder="Nama Obat"><input class="forminput" type="number" style="width: 15%; margin-left: 4px" placeholder="Jumlah" name="jumlah[]"><input class="forminput" type="text" style="width: 15%; margin-left: 4px" placeholder="Signa" name="dosis[]"><input type="button" value="x" class="btn-checkit" style="margin-left: 4px" id="remove"></div>';

            var x = 1;
            $(document).ready(function() {
                $( ".obat" ).autocomplete({
                serviceUrl: "autocomplete_obat.php",   
                dataType: "JSON",          
                onSelect: function (suggestion) {
                    $( this ).val(suggestion.nama);
                }
            });
            });

            $("#add").click(function(){
                $("#form-obat").append(html);
                $( ".obat" ).autocomplete({
                    serviceUrl: "autocomplete_obat.php",   
                    dataType: "JSON",          
                    onSelect: function (suggestion) {
                        $( this ).val(suggestion.nama);
                    }
                });
            });
            
            $("#form-obat").on('click','#remove',function(){
                $(this).closest('div').remove();
            });

        });
    </script>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $( ".obat" ).autocomplete({
            serviceUrl: "autocomplete_obat.php",   
            dataType: "JSON",          
            onSelect: function (suggestion) {
                $( this ).val(suggestion.nama);
            }
        });
        })
    </script> -->
        <script type="text/javascript">
            
            function isi_otomatis(){
                var noRm = $("#noRm").val();
                $.ajax({
                    url: 'cekrm.php',
                    data:"no_rm="+noRm ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#namalngkp').val(obj.namalngkp);
                    $('#no_bpjs').val(obj.nobpjs);
                    $('#sex').val(obj.sex);
                    $('#lahirdate').val(obj.lahirdate);
                })
            }
        </script>

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