<?php
include "../koneksi.php";
$id = $_GET['id'];
$update = mysqli_query($koneksi,"DELETE FROM tb_dokter_admin WHERE id='$id'");
    
if ($update) {
    echo "
        <script>
            window.location = 'adddokter.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Menghapus data Dokter!!');
            window.location = 'tambahdokter.php';
        </script>
    ";
}

?>

<!-- <?php
include "../koneksi.php";

$id = $_GET['id'];
$modal = mysqli_query($koneksi,"DELETE FROM tb_dokter_admin WHERE id='$id'");
echo '<script language="javascript" type="text/javascript">
alert("data berhasil di hapus!");</script>';
echo "<meta http-equiv='refresh' content='2; url=index.php'>";
?> -->

