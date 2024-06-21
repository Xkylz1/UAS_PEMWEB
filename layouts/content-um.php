<!-- content portfolio -->

<?php
if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))) {
    $hidestatus = "hidden";
    $hr = "";
} else {
    $hidestatus = "";
    $hr = "<hr>";
}
include ("../configs/connection.php");
$sql = mysqli_query($connect, "select * from user");
?>

<button class="btn btn-info" <?php echo $hidestatus; ?> onclick="location.href='um-form.php?id=0'">Add New
    User</button>
<?php echo $hr; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <!-- <th scope="col">Description</th> -->
            <th scope="col" <?php echo $hidestatus; ?>>Action</th>
        </tr>
    </thead>

    <?php
    $nomor = 1;
    while ($data = mysqli_fetch_array($sql)) { ?>
        <tbody>
            <tr>
                <td scope="row"><?php echo $nomor; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td <?php echo $hidestatus; ?>>
                    <a href="porto-form.php?id=<?php echo $data['id_user']; ?>">Edit</a>
                    |
                    <a href="../layouts/content-um-delete.php?id=<?php echo $data['id_user']; ?>"
                        onclick="return KonfirmasiHapus()">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php $nomor++;
    } ?>
</table>

<script>
    function KonfirmasiHapus() {
        return confirm("Are you sure you want to delete this item?");
    }
</script>
<!-- end of content portfolio -->