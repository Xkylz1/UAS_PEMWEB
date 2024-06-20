<!-- content portfolio -->

<?php
    if (!isset($_SESSION['U']) and (!isset($_SESSION['P'])))
    {
        $hidestatus = "hidden"; 
        $hr = "";
    }else{
        $hidestatus = "";
        $hr = "<hr>"; 
    }
    include("../configs/connection.php");
    $sql = mysqli_query($connect, "select * from portfolio");
?>

<button class="btn btn-info" <?php echo $hidestatus; ?> onclick="location.href='porto-form.php?id=0'">Add Data</button>
<?php echo $hr; ?>

<table class="table table-striped"> 
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Project Name</th>
            <th scope="col">Year</th>
            <th scope="col">Description</th>
            <th scope="col" <?php echo $hidestatus; ?>>Action</th>
        </tr>
  </thead>

<?php
    $nomor = 1;
    while($data = mysqli_fetch_array($sql)) { ?>
    <tbody> 
        <tr>
            <td scope="row"><?php echo $nomor; ?></td>
            <td><?php echo $data['project_name']; ?></td>
            <td><?php echo $data['year']; ?></td>
            <td><?php echo $data['description']; ?></td>
            <td <?php echo $hidestatus; ?>>
                <a href="porto-form.php?id=<?php echo $data['id_port']; ?>">Edit</a> 
                | 
                <a href="../layouts/content-porto-delete.php?id=<?php echo
                $data['id_port']; ?>"onclick="return KonfirmasiHapus()" >Delete</a>
            </td>
        </tr>
    </tbody>
<?php $nomor++; } ?> 
</table>

<!-- end of content portfolio -->