<?php
include 'db_connection.php';

// Hapus Data
if (isset($_GET['delete'])) {
    $nip = $_GET['delete'];
    $sql = "DELETE FROM pegawai WHERE nip=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nip);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

// Pencarian
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Pagination
$limit = 10;  // Jumlah data per halaman
$page = isset($_GET['page']) ? $_GET['page'] : 1;  // Halaman saat ini
$offset = ($page - 1) * $limit;  // Menghitung offset

// Mengambil total jumlah data
$sql_count = "SELECT COUNT(*) as total FROM pegawai WHERE nama_pegawai LIKE '%$search%'";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_records = $row_count['total'];
$total_pages = ceil($total_records / $limit);  // Menghitung total halaman

// Mengambil data dengan batasan limit dan offset
$sql = "SELECT * FROM pegawai WHERE nama_pegawai LIKE '%$search%' LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
?>
