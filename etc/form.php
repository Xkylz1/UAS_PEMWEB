<?php
include 'db_connection.php';

$nip = "";
$id_unitkerja = "";
$id_jabatan = "";
$nama_pegawai = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$foto = "";

if (isset($_GET['edit'])) {
    $nip = $_GET['edit'];
    $sql = "SELECT * FROM pegawai WHERE nip=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nip);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id_unitkerja = $row['id_unitkerja'];
    $id_jabatan = $row['id_jabatan'];
    $nama_pegawai = $row['nama_pegawai'];
    $tempat_lahir = $row['tempat_lahir'];
    $tanggal_lahir = $row['tanggal_lahir'];
    $foto = $row['foto'];
}

if (isset($_POST['save'])) {
    $id_unitkerja = $_POST['id_unitkerja'];
    $id_jabatan = $_POST['id_jabatan'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $foto = $_POST['foto'];

    if ($nip) {
        $sql = "UPDATE pegawai SET id_unitkerja=?, id_jabatan=?, nama_pegawai=?, tempat_lahir=?, tanggal_lahir=?, foto=? WHERE nip=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissssi", $id_unitkerja, $id_jabatan, $nama_pegawai, $tempat_lahir, $tanggal_lahir, $foto, $nip);
    } else {
        $sql = "INSERT INTO pegawai (id_unitkerja, id_jabatan, nama_pegawai, tempat_lahir, tanggal_lahir, foto) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissss", $id_unitkerja, $id_jabatan, $nama_pegawai, $tempat_lahir, $tanggal_lahir, $foto);
    }

    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Pegawai</title>
</head>
<body>
<div class="container mt-5">
    <h2><?php echo $nip ? 'Edit' : 'Tambah'; ?> Pegawai</h2>
    <form method="post" action="form.php<?php echo $nip ? '?edit=' . $nip : ''; ?>">
        <div class="form-group">
            <label for="id_unitkerja">Unit Kerja</label>
            <input type="number" class="form-control" id="id_unitkerja" name="id_unitkerja" value="<?php echo $id_unitkerja; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_jabatan">Jabatan</label>
            <input type="number" class="form-control" id="id_jabatan" name="id_jabatan" value="<?php echo $id_jabatan; ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php echo $nama_pegawai; ?>" required>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto" value="<?php echo $foto; ?>">
        </div>
        <button type="submit" name="save" class="btn btn-primary"><?php echo $nip ? 'Update' : 'Simpan'; ?></button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
