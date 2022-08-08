<?php
include "../koneksi.php";
$query = mysqli_query($koneksi,"SELECT * FROM tb_pasien_resepsionis WHERE no_rm='$_GET[no_rm]'");
$user = mysqli_fetch_array($query);
$data = array('nobpjs' => $user['no_bpjs'],'namalngkp' => $user['nama_pasien'],'sex' => $user['jenis_kelamin']);
      echo json_encode($data);
 ?>