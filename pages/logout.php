<?php
    session_start();

    unset($_SESSION); // mengosongkan variabel
    session_destroy(); // menghilangkan variabel

    header("location:login.php");
?>