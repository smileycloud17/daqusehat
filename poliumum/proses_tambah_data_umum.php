<?php
include "../koneksi.php";
$no_rm = $_POST['no_rm'];
$no_reg = $_POST['no_reg'];
$no_bpjs = $_POST['no_bpjs'];
$tgl_masuk = $_POST['indate'];
$nama = $_POST['namalngkp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['lahirdate'];
$diagnosa = $_POST['diagnosa'];
$keluhan = $_POST['keluhan'];
$obat = $_POST['obat'];
$simpan = mysqli_query($koneksi,"INSERT INTO tb_reg_umum (no_reg,no_rm,no_bpjs,tgl_masuk,nama_lengkap,tgl_lahir,jenis_kelamin,diagnosa,keluhan,obat) 
VALUES ('$no_reg','$no_rm','$no_bpjs','$tgl_masuk','$nama','$tanggal_lahir','$jenis_kelamin','$diagnosa','$keluhan','$obat')");
 
if ($simpan) {
    echo "
        <script>
            alert('Berhasil Menambahkan Data Pasien');
            window.location = 'registration.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('Gagal Menambahkan Pasien! Cek Kembali');
            window.location = 'registration.php';
        </script>
    ";
}
?>