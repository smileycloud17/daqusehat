<?php
include "../koneksi.php";
$no_reg = $_GET['no_reg'];
$hapus = mysqli_query($koneksi,"DELETE FROM tb_cek_pasien WHERE no_reg='$no_reg'");
$hapus_poliumum = mysqli_query($koneksi,"DELETE FROM tb_pemeriksaan_poliumum WHERE no_reg='$no_reg'");

    
if ($hapus and $hapus_poliumum) {
    echo "
        <script>
            window.location = 'datapemeriksaan.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Menghapus data pemeriksaan!!');
            window.location = 'cekpasien.php';
        </script>
    ";
}

?>