<?php
include "../koneksi.php";
$no_reg = $_POST['no-reg'];
$simpan = mysqli_query($koneksi,"UPDATE tb_obat_hasil_pemeriksaan SET status='Sudah Dilayani' WHERE no_reg='$no_reg'");
 
if ($simpan) {
    echo "
        <script>
            window.location = 'dashboard.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('Proses Gagal! Cek Kembali');
            window.location = 'dashboard.php';
        </script>
    ";
}
?>