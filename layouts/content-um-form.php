<?php
    // session_start();
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
        header("location:login.php");
    }
    include("../configs/connection.php");

    echo $_SESSION['U'];

    $id = $_GET['id']; // Get the id from URL

    $sql = mysqli_query($connect, "SELECT * FROM user WHERE id_user = '$id'");
    $data = mysqli_fetch_array($sql);

    if ($id == 0){
        $iduser = "hidden"; 
        $actbtn = "adduser"; 
        $actval = "Save Data";
    } else {
        $iduser = "readonly"; 
        $actbtn = "updateuser"; 
        $actval = "Update Data";
    }
?>
<!-- User Management Form -->
<form name="umform" method="post" action="">
    <div class="form-group" <?php echo $iduser; ?>>
        <label for="umID">User ID</label>
        <input type="text" class="form-control" name="user" id="umID" 
        value="<?php echo $data['id_user']; ?>" <?php echo $iduser; ?>>
    </div>
    <div class="form-group">
        <label for="nameID">Name</label>
        <input type="text" class="form-control" name="name" id="nameID" 
        value="<?php echo $data['name']; ?>" placeholder="Enter name here">
    </div>
    <div class="form-group">
        <label for="usernameID">Username</label>
        <input type="text" class="form-control" name="username" id="usernameID" 
        value="<?php echo $data['username']; ?>" placeholder="Enter username here">
    </div>
    <div class="form-group">
        <label for="passwordID">Password</label>
        <input type="password" class="form-control" name="password" id="passwordID" 
        value="" placeholder="Enter password here">
    </div>
    <div class="form-group">
        <input type="submit" name="<?php echo $actbtn; ?>" class="btn btn-info" 
        value="<?php echo $actval; ?>">
        <input type="reset" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" 
        onclick="location.href='portfolio.php'" value="Back">
    </div>
</form>
<!-- end of user management form -->

<!-- Handle form submission -->
<?php 
if(isset($_POST['adduser'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Use MD5 for password hashing

    $sql = "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')";
    $simpan = mysqli_query($connect, $sql); 
    
    // Redirect on successful save
    if ($simpan) {
        exit(header("Location:../pages/portfolio.php"));
    } else {
        echo "<script type='text/javascript'> onload =function()
        { alert('Data gagal disimpan!');}</script>"; 
    }
}
elseif(isset($_POST['updateuser'])){
    $name = $_POST['name']; 
    $username = $_POST['username']; 
    $password = $_POST['password'] ? md5($_POST['password']) : $data['password']; // Use MD5 for password hashing

    $sql = "UPDATE user SET name = '$name', username = '$username', password = '$password' WHERE id_user = '$id'";
    $update = mysqli_query($connect, $sql); 
    
    // Redirect on successful update
    if ($update) {
        exit(header("Location:../pages/portfolio.php"));
    } else {
        echo "<script type='text/javascript'> onload =function(){ alert('Data gagal diperbaharui!');}</script>";
    }
}
?>
