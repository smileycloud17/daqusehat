<?php
include "../koneksi.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$keterangan = $_POST['keterangan'];
$update = mysqli_query($koneksi,"UPDATE tb_user_admin SET nama_pengguna='$nama', email='$email', keterangan='$keterangan' WHERE id='$id'");
    
if ($update) {
    echo "
        <script>
            window.location = 'adduser.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Mengubah data Dokter!!');
            window.location = 'tambahuser.php';
        </script>
    ";
}

?>