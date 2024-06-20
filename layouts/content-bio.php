<!-- content bio -->
<?php
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
        $btn_status = "hidden";
        $hr = "";
    }
    else{
        $btn_status = "";
        $hr = "<hr>";
    }
    include("../configs/connection.php");

    $user = $_SESSION['U'];

    $sql = mysqli_query($connect, "select * from user where username = '$user'");
    $data = mysqli_fetch_array($sql); // menjadikan field menjadi ruang array

    $iduser = $data['id_user'];

    $bio = mysqli_query($connect, "SELECT * from biography JOIN user ON user.id_user = biography.id_user WHERE user.id_user = '$iduser'");
    $biodat = mysqli_fetch_array($bio);

?>
<button class="btn btn-info" <?php echo $btn_status; ?> onclick="location.href='bio-form.php?id=<?php echo $biodat['id_bio'];?>'">Edit Data</button>
<?php echo $hr; ?>

<h3 style="text-align:center">
    <?php echo $data['name'];?>
</h3>
<center>
    <img src="../uploads/<?php echo $biodat['photo'] ?>" width="200px">
</center>
<p style="text-align:center; margin-top:30px">
    <?php echo $biodat["biography"]; ?>
</p>

<!-- end of content bio -->