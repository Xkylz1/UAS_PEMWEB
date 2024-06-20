<?php
    // error_reporting(0);

    // session_start();

    // if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){ // proses pengecekkan
    //     header("location:../pages/login.php");
    // }else{
        
        $pageinfo = "Biography";
        $description = "ini halaman Biografi saya";

        include("../layouts/head.php");
        include("../layouts/header.php");
        include("../layouts/content.php");// mengarah ke content.php
        include("../layouts/footer.php");
    // }
?>