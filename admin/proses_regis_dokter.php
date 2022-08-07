<?php
include "../koneksi.php";
$kta = $_POST['kta'];
$nama = $_POST['nama_dokter'];
$username = $_POST['username'];
$email = $_POST['email'];
$keterangan = $_POST['keterangan'];
$pass = md5($_POST['password']);
$cek_user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_dokter_admin WHERE username = '$username'"));

if ( $cek_user > 0 ){
    echo "
            <script>
                alert('Silahkan menggunakan Username lain!');
                window.location = 'tambahdokter.php';
            </script>
        ";
} else{
    $simpan = mysqli_query($koneksi,"INSERT INTO tb_dokter_admin (id,kta,nama_pengguna,username,email,keterangan,password) VALUES ('','$kta','$nama','$username','$email','$keterangan','$pass')");
    if ($simpan) {
        echo "
            <script>
                alert('Berhasil Menambahkan Dokter');
                window.location = 'adddokter.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Gagal Menambahkan Dokter!!');
                window.location = 'tambahdokter.php';
            </script>
        ";
    }
}

?>