<?php 
    session_start();
    session_unset();
    echo "
        <script>
            alert('Anda Telah Logout, Tetap Semangat Sehat Selalu');
            window.location = 'login.html';
        </script>
    ";
?>