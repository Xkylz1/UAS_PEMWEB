<?php
    $servername = "localhost"; // boleh menggunaakn IP 127.0.0.1
    $dbuser = "root";
    $dbpassword = "root";
    $dbname = "personalweb_setyo"; // sesuaikan dengan nama DB yg telah dibuat

    $connect = mysqli_connect($servername, $dbuser, $dbpassword);

    $connect_error = "Koneksi gagal atau Database tidak ada";
    mysqli_select_db($connect, $dbname) or die($connect_error);
?>