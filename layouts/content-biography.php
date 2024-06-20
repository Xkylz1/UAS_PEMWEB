<?php
    // session_start(); // Ensure session is started

    // Session validation
    if (!isset($_SESSION["U"]) && !isset($_SESSION["P"])) {
        header("Location: login.php");
        exit(); // Make sure to exit after redirection
    }

    include("../configs/connection.php"); // Ensure the correct path

    // Fetch biography data
    $sql = mysqli_query($connect, "SELECT * FROM biography WHERE id_bio = 1");

    if (!$sql) {
        die("Query failed: " . mysqli_error($connect)); // Error handling
    }

    $data = mysqli_fetch_array($sql);

    // Update biography
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatebio'])) {
        $bio = mysqli_real_escape_string($connect, $_POST['bio']); // Sanitize input
        $update_sql = "UPDATE biography SET biography='$bio' WHERE id_bio=1";
        if (mysqli_query($connect, $update_sql)) {
            echo "Biography updated successfully.";
            // Redirect to avoid form resubmission
            header("Location: biography.php");
            exit();
        } else {
            echo "Error updating biography: " . mysqli_error($connect);
        }
    }
?>

<!-- biography form -->
<form name="bioform" method="post" action="">
    <div class="form-group">
        <label for="bioID">Biography Edit Form</label>
        <textarea class="form-control" name="bio" id="bioID" rows="3"><?php echo htmlspecialchars($data['biography']); ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="updatebio" class="btn btn-info" value="Update Data">
        <input type="reset" class="btn btn-secondary" value="Reset Data">
        <input type="button" class="btn btn-secondary" onclick="location.href='biography.php'" value="Back">
    </div>
</form>
<!-- end of biography form  -->
<?php 
    if (isset($_POST['updatebio'])) {
        $bioaja = $_POST['bio'];
        $update = mysqli_query($connect,"update biography set biography = '$bioaja' where id_bio = 1");
        // Bila berhasil simpan kembali biografi
        if ($update) {
            (header("location:../pages/bio.php"));
        } else {
            echo "<script type='text/javascript'> onload=function() { alert('Data gagal disimpan!');} </script>";
        }
    }
?>