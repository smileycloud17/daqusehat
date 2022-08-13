<?php
include "../koneksi.php";
$no_rm = $_POST['no_rm'];
$no_reg = $_POST['no_reg'];
$nama = $_POST['namalngkp'];
$tanggal_masuk = $_POST['indate'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jenis_pelayanan = $_POST['jenis_pelayanan'];
$diagnosa = $_POST['diagnosa'];
$keluhan = $_POST['keluhan'];
$kesimpulan = $_POST['kesimpulan'];
$simpan = mysqli_query($koneksi,"UPDATE tb_pemeriksaan_poliumum SET jenis_kelamin='$jenis_kelamin', diagnosa='$diagnosa', keterangan_keluhan='$keluhan', kesimpulan='$kesimpulan', status_pelayanan='Sudah Dilayani' WHERE no_reg='$no_reg'");

$obat = $_POST['obat'];
$dosis = $_POST['dosis'];
foreach($obat as $key=>$value){
    $save="INSERT INTO tb_obat_hasil_pemeriksaan(no_reg,nama_obat,dosis,tanggal_periksa,status)VALUES('".$no_reg."','".$value."','".$dosis[$key]."','".$tanggal_masuk."','Belum Dilayani')";
    $query = mysqli_query($koneksi,$save);
}
 
if ($simpan and $query) {
    echo "
        <script>
            window.location = 'dashboard.php';
        </script>
    ";
}
else {
    echo "
        <script>
            alert('Gagal Menambahkan Pasien! Cek Kembali');
            window.location = 'registration.php?no_reg=$no_reg';
        </script>
    ";
}
?>