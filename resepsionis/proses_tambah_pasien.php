<?php
include "../koneksi.php";
$no_id = $_POST['id'];
$no_rm1 = $_POST['no_rm1'];
$no_rm2 = $_POST['no_rm2'];
$no_rm3 = $_POST['no_rm3'];
$no_rm = $no_rm1.'.'.$no_rm2.'.'.$no_rm3;
$no_bpjs = $_POST['no_bpjs'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status_menikah = $_POST['status_menikah'];
$nama_ortu = $_POST['nama_ortu'];
$no_telp = $_POST['no_telp'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$a_makanan = $_POST['a_makanan'];
$a_udara = $_POST['a_udara'];
$a_obat = $_POST['a_obat'];
$simpan = mysqli_query($koneksi,"INSERT INTO tb_pasien_resepsionis (id,no_rm,no_bpjs,nik,nama_pasien,jenis_kelamin,status_menikah,nama_ortu,no_telp,tanggal_lahir,alamat,agama,provinsi,kabupaten,kecamatan,kelurahan,rt,rw,alergi_makanan,alergi_udara,alergi_obat) 
VALUES ('$no_id','$no_rm','$no_bpjs','$nik','$nama','$jenis_kelamin','$status_menikah','$nama_ortu','$no_telp','$tanggal_lahir','$alamat','$agama','$provinsi','$kabupaten','$kecamatan','$kelurahan','$rt','$rw','$a_makanan','$a_udara','$a_obat')");
 
if ($simpan) {
    echo "
        <script>
            alert('Berhasil Menambahkan Data Pasien');
            window.location = 'cekpasien.php';
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