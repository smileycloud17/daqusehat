<?php
include "../koneksi.php";
$kta = $_POST['kta'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = md5($_POST['password']);
$keterangan = $_POST['keterangan'];
$simpan = mysqli_query($koneksi,"INSERT INTO tb_user_admin (id,kta,nama_pengguna,email,username,password,keterangan) VALUES ('','$kta','$nama','$email','$username','$pass','$keterangan')");
 
if ($simpan) {
    echo "
        <script>
            alert('Berhasil Menambahkan User');
            window.location = 'adduser.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Menambahkan User!!');
            window.location = 'tambahuser.php';
        </script>
    ";
}
?>