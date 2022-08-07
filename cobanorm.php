<?php
    // $x = 0;
    // $y = 0;
    // $z = 0;
    // $nilaix = 0;
    // $nilaiy = 0;
    // $nilaiz = 0;
    // for($i = 0 ; $i <= 99 ; $i++){

    //     if($y <= 99){

    //         for($y = 0 ; $y <= 99 ; $y++){
    //             $rmx = sprintf("%02d", $x);
    //             $rmz = sprintf("%02d", $z);
    //             $rmy = sprintf("%02d", $y);
            
    //             echo $rmx.(".");
    //             echo $rmy.(".");
    //             echo $rmz;
    //             echo ("........");
    //         }
    //         if($y = 99){
    //             $y = 0;
    //             $z++;
    //         }
    //     }
        
    // }

    include 'koneksi.php';

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Document</title>
    </head>
    <body>

    <?php
    error_reporting(0);

    $query = mysqli_query($koneksi,"SELECT LEFT(norm,2) as x, MID(norm,4,2) as y, RIGHT(norm,2) as z FROM cobanorm ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_array($query);

    $x = $d['x'];
    $y = $d['y'];
    $z = $d['z'];

    
    
    // $rmx = sprintf("%02d", $x);
    // $rmz = sprintf("%02d", $z);
    // $rmy = sprintf("%02d", $tambahy);
    
    
    
    ?>

    <form action="tambahrm.php" method="post">
        <?php
        $tambahy=$y+1;
    
    
        if($tambahy == 100){
            $tambahy = 0;
            $z++;
    
            if($z == 100){
                $z = 0;
                $x++;
                if($x == 100){
                    $y = 99;
                    $z = 99;
                    $x = 99;
                }
            }
        }
        ?>
        <input type="text" name="rm1" value="<?php echo sprintf("%02d", $x) ?>" style="width: 20px; text-align: center;">
        <input type="text" name="rm2" value="<?php echo sprintf("%02d", $tambahy) ?>" style="width: 20px; text-align: center;">
        <input type="text" name="rm3" value="<?php echo sprintf("%02d", $z) ?>" style="width: 20px; text-align: center;">

        <button id="tambah" onclick="tambah()">tambah</button>
        <br>
        <br>
        <input type="text" name="rm1pp" id="rm1" maxlength="2" onkeyup="moveField(this,'rm2')" style="width: 20px; text-align: center;">
        -
        <input type="text" name="rm2pp" id="rm2" maxlength="2" onkeyup="moveField(this,'rm3')" style="width: 20px; text-align: center;">
        -
        <input type="text" name="rm3pp" id="rm3" style="width: 20px; text-align: center;">
    </form>
    <script>
        function moveField(field, autoMove){
            if(field.value.length >= field.maxLength){
                document.getElementById(autoMove).focus();
            }
        }
    </script>

    </body>
    </html>
    