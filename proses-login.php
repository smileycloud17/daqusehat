<?php 
    include 'koneksi.php';
    session_start();
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($koneksi,$_POST['username']);
        $password = mysqli_real_escape_string($koneksi,md5($_POST['password']));

        $result = mysqli_query($koneksi, "SELECT * FROM tb_user_admin WHERE username = '$username' AND password = '$password'");
        if(mysqli_num_rows($result) == 0){
            $result = mysqli_query($koneksi,"SELECT * FROM tb_dokter_admin WHERE username = '$username' AND password = '$password'");
        }

        $ketemu = mysqli_num_rows($result);

        if ($ketemu>0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['keterangan']=="Admin") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:admin/admin.php');
            } else if ($row['keterangan']=="Resepsionis") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:resepsionis/index.php');
            } else if ($row['keterangan']=="Laboratorium") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:laboratorium/lab.php');
            } else if ($row['keterangan']=="Farmasi") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:farmasi/farmasi.php');
            } 
            else if ($row['keterangan']=="KIA") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:kia/kia.php');
            } else if ($row['keterangan']=="dokter") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:poliumum/poliumum.php');
            } else if ($row['keterangan']=="poligigi") {
                session_start();
                $_SESSION['kta'] = $row['kta'];
                $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
                $_SESSION['keterangan'] = $row['keterangan'];
                $_SESSION['login'] = true;
                header('location:poligigi/poligigi.php');
            } 
        }
        else {
                echo "
                <script>
                    alert('Username atau Password anda Salah, Mohon Coba Lagi');
                    window.location = 'login.html';
                </script>
                ";
            }

        

            // if(mysqli_num_rows($result) > 0){
 
            //     $data = mysqli_fetch_assoc($result);
             
            //     // cek jika user login sebagai admin
            //     if($data['keterangan']=="admin"){
             
            //         // buat session login dan username
            //         $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
            //         $_SESSION['keterangan'] = "admin";
            //         // alihkan ke halaman dashboard admin
            //         header("location:admin/admin.php");
             
            //     // cek jika user login sebagai pegawai
            //     }else if($data['keterangan']=="resepsionis"){
            //         // buat session login dan username
            //         $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
            //         $_SESSION['keterangan'] = "resepsionis";
            //         // alihkan ke halaman dashboard pegawai
            //         header("location:index.php");
             
            //     // cek jika user login sebagai pengurus
            //     }else if($data['keterangan']=="dokter"){
            //         // buat session login dan username
            //         $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
            //         $_SESSION['keterangan'] = "dokter";
            //         // alihkan ke halaman dashboard pengurus
            //         header("location:poliumum/poliumum.php");
             
            //     }else{
            //         echo "
            //         <script>
            //             alert('Username atau Password anda Salah, Mohon Coba Lagi');
            //             window.location = 'login.html';
            //         </script>
            //         ";
            //     }	
            // }else{
            //     echo "
            //     <script>
            //         alert('Username atau Password anda Salah, Mohon Coba Lagi');
            //         window.location = 'login.html';
            //     </script>
            //     ";
            // }
    }
?>