<?php include 'crud_operations.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD dan Pencarian Pegawai</title>
</head>
<body>
<div class="container mt-5">
<div class="text-center text-uppercase mt-4">
        <h1>Sistem manajemen Pegawai</h1>
    </div>
<div class="container mt-5">
    <div class="col-12 row">
<div class="col-8 ">

<form method="get" action="index.php" class="form-inline mb-3">
        <input type="text" name="search" class="form-control mr-2" placeholder="Cari..." value="<?php echo $search; ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
</div>
<div class="col-4 text-right">

    <a href="form.php" class="btn btn-primary mb-3">Tambah Pegawai</a>
</div>
    </div>

    <h2 class="text-uppercase">Daftar Pegawai</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-uppercase">NIP</th>
                <th class="text-uppercase">Unit Kerja</th>
                <th class="text-uppercase">Jabatan</th>
                <th class="text-uppercase">Nama Pegawai</th>
                <th class="text-uppercase">Tempat Lahir</th>
                <th class="text-uppercase">Tanggal Lahir</th>
                <th class="text-uppercase">Foto</th>
                <th class="text-uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nip']; ?></td>
                <td><?php echo $row['id_unitkerja']; ?></td>
                <td><?php echo $row['id_jabatan']; ?></td>
                <td><?php echo $row['nama_pegawai']; ?></td>
                <td><?php echo $row['tempat_lahir']; ?></td>
                <td><?php echo $row['tanggal_lahir']; ?></td>
                <td><?php echo $row['foto']; ?></td>
                <td>
                    <a href="form.php?edit=<?php echo $row['nip']; ?>" class="btn btn-warning text-uppercase">Edit</a>
                    <a href="index.php?delete=<?php echo $row['nip']; ?>" class="btn btn-danger text-uppercase" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">Previous</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($page < $total_pages): ?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>

<?php
$conn->close();
?>
