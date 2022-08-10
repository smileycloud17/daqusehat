<?php 
    session_start();
    session_unset();
    echo "
        <script>
            alert('Anda Telah Logout, Tetap Semangat Sehat Selalu');
            window.location = 'index.html';
        </script>
    ";
?>