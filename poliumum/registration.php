<?php require_once("../auth.php"); 

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

//Kode Otomatis register
$query = mysqli_query($koneksi, "SELECT max(no_reg) as RegTerbesar FROM tb_reg_umum");
$data = mysqli_fetch_array($query);
$noreg = $data['RegTerbesar'];

$urutan = (int) substr($noreg, 4, 4);

$urutan++;
 
$huruf = "PLMM";
$noreg = $huruf . sprintf("%04s", $urutan);
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
                <h2>Data Pemeriksaan</h2>
                <form action="proses_tambah_data_umum.php" method="POST">
                    <div class="floating-btn">
                        <button class="primary">Submit and Print</button>
                        <button class="warning" href="">Bersihkan</button>
                    </div>
                    <div class="input-details">
                        <div class="checkrm">
                            <span class="detil">No.RM</span>
                            <th><input class="forminput" type="text" onkeyup="isi_otomatis()" name="no_rm" id="noRm" placeholder="No RM" autocomplete="off">
                        </div>
                        <div class="inputbox">
                            <span class="detil">No.Register</span>
                            <input class="forminput" type="text" id="no_reg" name="no_reg" value="<?php echo $noreg?>" readonly>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Tanggal Masuk</span>
                            <input class="forminput" type="date" id="indate" name="indate" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Nama Pasien</span>
                            <input class="forminput" type="text" id="namalngkp" name="namalngkp" required>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Jenis Layanan</span>
                            <input class="forminput" type="text" id="no_bpjs" name="no_bpjs" readonly>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Jenis Kelamin</span>
                            <select name="jenis_kelamin" id="sex">
                                <option value="">--Jenis Kelamin--</option>
                                <option value="Laki-laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="-">Tidak Disebutkan</option>
                            </select>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Diagnosa</span>
                            <input class="forminput" type="text" id="diagnosa" name="diagnosa" required>
                        </div>
                        <div class="inputbox"></div>
                        <div class="inputbox">
                            <span class="detil">Keterangan Keluhan</span>
                            <textarea name="keluhan" id="keluhan" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="inputbox">
                            <span class="detil">Kesimpulan</span>
                            <textarea name="keluhan" id="keluhan" cols="30" rows="5" required></textarea>
                        </div>
                    </div>
                    <h2>Data Pemeriksaan</h2>
                    <div class="input-details" id="form-obat">
                        <div class="inputbox">
                            <span class="detil">Terapi/Obat</span>
                            <input class="forminput obat" type="text" id="obat" name="obat" style="width: 65%" required>
                            <input class="forminput" type="text" style="width: 20%">
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
            </div>
        </form>
        <footer style="margin-top: 60px">
            <p>&copy 2022 Klinik Daqu Sehat Malang</p>
        </footer>
        </div>
        
    </div>

    <script src="../js/script.js"></script>
    <script src="../js/load.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.11/jquery.autocomplete.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var html = '<div class="inputbox"><span class="detil">Terapi/Obat</span><input class="forminput obat" type="text" id="obat" name="obat" style="width: 65%" required><input class="forminput" type="text" style="width: 20%; margin-left: 4px"><input type="button" value="x" class="btn-checkit" style="margin-left: 4px" id="remove"></div>';

            var x = 1;

            $("#add").click(function(){
                $("#form-obat").append(html);
            });
            
            $("#form-obat").on('click','#remove',function(){
                $(this).closest('div').remove();
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $( ".obat" ).autocomplete({
            serviceUrl: "autocomplete_obat.php",   
            dataType: "JSON",          
            onSelect: function (suggestion) {
                $( this ).val(suggestion.nama);
            }
        });
        })
    </script>
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