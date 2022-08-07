<?php
include "../koneksi.php";
$no_reg = $_GET['no_reg'];
$update = mysqli_query($koneksi,"DELETE FROM tb_reg_umum WHERE no_reg='$no_reg'");
    
if ($update) {
    echo "
        <script>
            window.location = 'datapasien.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Menghapus data Dokter!!');
            window.location = 'ddatapasien.php';
        </script>
    ";
}

?>

