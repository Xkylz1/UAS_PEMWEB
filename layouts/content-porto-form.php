<?php
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))){
            header("location:login.php");
    }
    include("../configs/connection.php");

    echo $_SESSION['U'];

    $id = $_GET['id']; // untuk mengambil variabel id di URL

    $sql = mysqli_query($connect, "select * from portfolio where id_port = '$id'");
    $data = mysqli_fetch_array($sql);
    if ($id == 0){
        $idport = "hidden"; $actbtn = "addport"; $actval = "Save Data";
    }
    else{
        $idport = "readonly"; $actbtn = "updateport"; $actval = "Update Data";
    }
?>
<!-- portfolio form -->
<form name="portform" method="post" action="">
    <div class="form-group" <?php echo $idport; ?>>
        <label for="portID">Portfolio ID</label>
        <input type="text" class="form-control" name="port" id="portID" 
        value="<?php echo $data['id_port']; ?>" <?php echo $idport; ?>>
    </div>
    <div class="form-group">
        <label for="projID">Project Name</label>
        <input type="text" class="form-control" name="proj" id="projID" 
        value="<?php echo $data['project_name']; ?>" placeholder="type project name here">
    </div>
    <div class="form-group">
        <label for="yearID">Year</label>
        <input type="number" class="form-control" name="year" id="yearID" 
        value="<?php echo $data['year']; ?>" placeholder="type year here">
    </div>
    <div class="form-group">
        <label for="descID">Description</label>
        <textarea class="form-control" name="desc" id="descID" rows="3">
            <?php echo $data['description']; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="<?php echo $actbtn; ?>" class="btn btn-info" 
        value="<?php echo $actval; ?>">
        <input type="submit" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" 
        onclick="location.href='portfolio.php'" value="Back">
    </div>
</form>
<!-- end of portfolio form -->

<!-- jika submit button diklik  -->
<?php 
if(isset($_POST['addport'])){
    $proj = $_POST['proj'];
    $year = $_POST['year'];
    $desc = $_POST['desc'];

    $sql = "insert into portfolio (project_name, year, description) values ('$proj',
     '$year', '$desc')";
    $simpan = mysqli_query($connect, $sql); 
    
    //bila berhasil simpan kembali ke halaman portfolio
    if ($simpan) {
        // header("location:../pages/porto.php");
        exit(header("Location:../pages/porto.php"));
    }
    else{
        echo "<script type='text/javascript'> onload =function()
        { alert('Data gagal disimpan!');}</script>"; 
    }
}
elseif(isset($_POST['updateport'])){
    $proj = $_POST['proj']; 
    $year = $_POST['year']; 
    $desc = $_POST['desc'];

    $sql = "update portfolio set project_name = '$proj', year = '$year', 
    description = '$desc' where id_port = '$id'";
    $update = mysqli_query($connect, $sql); 
    
    //bila berhasil simpan kembali portfolio 
    if ($update) {
        exit(header("location:../pages/porto.php")); 
    } 
    else {
        echo "<script type='text/javascript'> onload =function(){ alert('Data ↪ gagal diperbaharui!');}</script>";
    }
}
?>
     