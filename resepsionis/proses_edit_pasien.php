<?php
include "../koneksi.php";
$id = $_POST['id'];
$no_rm = $_POST['no_rm'];
$no_bpjs = $_POST['no_bpjs'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$a_makanan = $_POST['a_makanan'];
$a_udara = $_POST['a_udara'];
$a_obat = $_POST['a_obat'];
$update = mysqli_query($koneksi,"UPDATE tb_pasien_resepsionis SET no_rm='$no_rm', nama_pasien='$nama', no_bpjs='$no_bpjs', nik='$nik', jenis_kelamin='$jenis_kelamin', 
tanggal_lahir='$tanggal_lahir', no_telp='$no_telp', alamat='$alamat', alergi_makanan='$a_makanan', alergi_udara='$a_udara', alergi_obat='$a_obat' WHERE id='$id'");
    
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