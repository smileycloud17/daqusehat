<?php require_once("../auth.php"); 

include '../koneksi.php';

$keterangan = $_SESSION["keterangan"];
    if($keterangan != "dokter") {
        header("Location: ../configuser.php");
    }

    $tabel = mysqli_query($koneksi,"SELECT * FROM tb_reg_umum ORDER BY no_reg DESC");


    // pagination
    $perPage = 10; //isi data perhalaman
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

    $datapasienumum = "SELECT * FROM tb_reg_umum ORDER BY no_reg DESC LIMIT $start, $perPage";
    $datapasienumum_limit = mysqli_query($koneksi, $datapasienumum);

    $data = mysqli_query($koneksi,"select * from tb_reg_umum");
    $totaldata = mysqli_num_rows($data);

    $halaman = ceil($totaldata/$perPage);
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="fontawesome/css/all.css"> -->
    <link rel="stylesheet" href="../bootstrap/scss/bootstrap.css">
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
                <span class="title-main">Data Pasien<span>
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
                    <h2>Data Pasien</h2><br>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Search">
                            <a href=""><i class='fas fa-search'></i></a>
                        </label>
                    </div>
                    <a href=""><button type="button"><i class="fa fa-print"></i>Cetak</button></a>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No RM</th>
                                <th>No Register</th>
                                <th>No BPJS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Diagnosa</th>
                                <th>Keluhan</th>
                                <th>Terapi/Obat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($datapasienumum_limit)>0){ ?>
                                <?php
                                    $no = 1;
                                    while($d = mysqli_fetch_array($datapasienumum_limit)){
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $d['no_rm'] ?></td>
                                    <td><?php echo $d['no_reg'] ?></td>
                                    <td><?php echo $d['no_bpjs'] ?></td>
                                    <td><?php echo $d['nama_lengkap']?></td>
                                    <td><?php echo $d['jenis_kelamin'] ?></td>
                                    <td><?php echo $d['diagnosa'] ?></td>
                                    <td><?php echo $d['keluhan'] ?></td>
                                    <td><?php echo $d['obat'] ?></td>
                                    <td>
                                        <a href="editpasien.php?no_rm=<?php echo $d['no_rm'] ?>"><i class='far fa-edit' style="color:#4FBDBA"></i></a>
                                        <a href="" onClick="confirm_modal('proses_hapus_data_reg.php?no_reg=<?php echo $d['no_reg'] ?>')" data-bs-toggle="modal" data-bs-target="#ModalDelete"><i class='fas fa-trash-alt' style="color:red"></i></a>
                                        <a href="" onClick="confirm_modal('proses_hapus_pasien.php?no_rm=<?php echo $d['no_rm'] ?>')" data-bs-toggle="modal" data-bs-target="#ModalDelete"><p style="color: var(--tulisan); font-size: 13px; font-style: italic;">More Info</p></a>
                                    </td>
                                </tr>
                                
                                <?php $no++; } ?>
                                <?php } ?>
                        </tbody>
                    </table>
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
        </div>
        <footer>
            <p>Copyright ?? 2022, Powered by Smiley Cloud ??? All rights reserved.</p>
        </footer>

    </div>

    <script src="../js/script.js"></script>
    <script src="../js/load.js"></script>
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