<?php
    include("../koneksi.php");

    $sql = mysqli_query($koneksi, "SELECT count(id) as semua_pasien FROM tb_pemeriksaan_poliumum");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>
