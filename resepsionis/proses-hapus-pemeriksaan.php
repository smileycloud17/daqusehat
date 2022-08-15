<?php
include "../koneksi.php";
$id = $_GET['id'];
$hapus = mysqli_query($koneksi,"DELETE FROM tb_cek_pasien WHERE id='$id'");
$hapus_poliumum = mysqli_query($koneksi,"DELETE FROM tb_pemeriksaan_poliumum WHERE id='$id'");

    
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