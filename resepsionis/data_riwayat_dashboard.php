<?php
    include("../koneksi.php");
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pasien_resepsionis ORDER BY no_rm DESC LIMIT 10");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>