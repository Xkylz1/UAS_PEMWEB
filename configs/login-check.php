<?php
    include("connection.php"); //

    $usr = $_POST['user']; // inputan dari from ber-name user
    $pss = md5($_POST['pass']); // inputan dari from ber-name pass

    $sql = mysqli_query($connect, "select * from user where username = '$usr' and password = '$pss'");
    
    $rowcount = mysqli_num_rows($sql); // menghitung jumlah record table
    
    if ($rowcount !=0){

        session_start(); // fungsi mengaktifkan session

        $_SESSION['U'] = $usr; // membuat variabel dalam session untuk data user
        $_SESSION['P'] = $pss; // membuat variabel dalam session untuk data password

        header("location:../pages/home.php");
    } else{
        header("location:../pages/login.php");
    }
?>   