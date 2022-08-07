<?php
include "koneksi.php";

$rm1 = $_POST['rm1'];
$rm2 = $_POST['rm2'];
$rm3 = $_POST['rm3'];
$simpan = mysqli_query($koneksi,"INSERT INTO cobanorm (`norm`) 
VALUES ('$rm1.$rm2.$rm3')");
 
if ($simpan) {
    echo "
        <script>
            window.location = 'cobanorm.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('Gagal Menambahkan Pasien! Cek Kembali');
            // window.location = 'addpasien.php';
        </script>
    ";
}
?>