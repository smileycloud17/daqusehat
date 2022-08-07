<?php
include "../koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama_dokter'];
$email = $_POST['email'];
$keterangan = $_POST['keterangan'];
$update = mysqli_query($koneksi,"UPDATE tb_dokter_admin SET nama_pengguna='$nama', email='$email', keterangan='$keterangan' WHERE id='$id'");
    
if ($update) {
    echo "
        <script>
            alert('Berhasil Mengubah data Dokter');
            window.location = 'adddokter.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Mengubah data Dokter!!');
            window.location = 'tambahdokter.php';
        </script>
    ";
}

?>