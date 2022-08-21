<?php
    include("../koneksi.php");

    $tanggal_sekarang = date("Y-m-d");

    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pemeriksaan_poliumum ORDER BY id ASC LIMIT 10");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>
