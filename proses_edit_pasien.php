<?php
include "koneksi.php";
$no_rm = $_POST['no_rm'];
$no_bpjs = $_POST['no_bpjs'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$domisili = $_POST['domisili'];
$update = mysqli_query($koneksi,"UPDATE tb_pasien_resepsionis SET nama_pasien='$nama', no_bpjs='$no_bpjs', nik='$nik', jenis_kelamin='$jenis_kelamin', 
tanggal_lahir='$tanggal_lahir', no_telp='$no_telp', alamat='$alamat', domisili='$domisili' WHERE no_rm='$no_rm'");
    
if ($update) {
    echo "
        <script>
            window.location = 'datapasien.php';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Gagal Mengubah data pasien');
            window.location = 'datapasien.php';
        </script>
    ";
}

?>