<?php require_once("auth.php");
include "../koneksi.php";

$tabel = mysqli_query($koneksi,"SELECT * FROM tb_dokter_admin ORDER BY id DESC");
$keterangan = $_SESSION["keterangan"];
require_once("authuser.php");

// pagination
$perPage = 10; //isi data perhalaman
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$datadokteradmin = "SELECT * FROM tb_dokter_admin ORDER BY id DESC LIMIT $start, $perPage";
$datadokteradmin_limit = mysqli_query($koneksi, $datadokteradmin);

$data = mysqli_query($koneksi,"select * from tb_dokter_admin");
$totaldata = mysqli_num_rows($data);

$halaman = ceil($totaldata/$perPage);

?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap/scss/bootstrap.css">
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
                    <a href="admin">
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
                    <a href="datapasien">
                        <span class="icon"><i class="fas fa-file-medical"></i></span>
                        <span class="judul">Data Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="adddokter">
                        <span class="icon"><i class='fas fa-stethoscope'></i></span>
                        <span class="judul">Tambah Dokter</span>
                    </a>
                </li>
                <li>
                    <a href="adduser">
                        <span class="icon"><i class="fa fa-user-plus"></i></span>
                        <span class="judul">Tambah User</span>
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
                <span class="title-main">Data Staff Dokter<span>
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
            <div class="pasiendt">
                <div>
                    <h2>Data Dokter</h2><br>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Search">
                            <i class='fas fa-search'></i>
                         </label>
                    </div>
                    <div class="tombol-tambah">
                        <a href="tambahdokter"><i class='fas fa-user-plus'></i>Tambah Dokter</a>
                    </div>
                    <form action="" method="post">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>KTA</th>
                                    <th>Nama Dokter</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Spesialis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(mysqli_num_rows($datadokteradmin_limit)>0){ ?>
                                <?php
                                    $no = 1;
                                    while($d = mysqli_fetch_array($datadokteradmin_limit)){
                                        // $status='Offline';
                                        // $warna='#ff2222';
                                        // if($data['last_login']>$time){
                                        //     $status='Online';
                                        //     $warna='#3de824';
                                        // }
                                ?>
                                <tr>
                                    <div hidden><?php echo $d['id'] ?></div>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $d['kta'] ?></td>
                                    <td><?php echo $d['nama_pengguna'] ?></td>
                                    <td><?php echo $d['username']?></td>
                                    <td><?php echo $d['email'] ?></td>
                                    <td><?php echo $d['keterangan'] ?></td>
                                    <td>
                                        <a href="editdokter.php?id=<?php echo $d['id'] ?>"><i class='far fa-edit' style="color:#4FBDBA"></i></a>
                                        <a href="" onClick="confirm_modal('proses_hapus_dokter.php?id=<?php echo $d['id'] ?>')" data-bs-toggle="modal" data-bs-target="#ModalDelete"><i class='fas fa-trash-alt' style="color:red"></i></a>
                                    </td>
                                </tr>
                                <?php $no++; } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                    <div aria-label="Page navigation example">
                        <ul class="pagination ">
                        <?php if($page == 1){ ?>
                            <li class="page-item disabled">
                            <?php $halaman_sekarang = isset($_GET["halaman"]) ?>
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fa fa-angle-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                        <?php } else{?>
                        <li class="page-item">
                            <?php $halaman_sekarang = isset($_GET["halaman"]) ?>
                            <a class="page-link" href="?halaman=<?php echo $page - 1 ?>" tabindex="-1">
                            <i class="fa fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php for($i=1; $i<=$halaman; $i++){ ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php } ?>
                        <?php if($page == $halaman){ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#">
                            <i class="fa fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <?php } else{ ?>
                            <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $page + 1 ?>">
                                <i class="fa fa-angle-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Popup untuk delete-->
        <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perhatian!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin Untuk Menghapus data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="#" type="button" class="btn btn-danger" id="delete_link">Hapus</a>
                </div>
                </div>
            </div>
        </div>
        <footer>
                <p>&copy 2022 Klinik Daqu Sehat Malang</p>
        </footer>

    </div>

    <script src="../js/script.js"></script>
    <script src="../js/load.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Javascript untuk popup modal Delete-->
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
        document.getElementById('delete_link').setAttribute('href' , delete_url);
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