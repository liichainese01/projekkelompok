<?php
session_start();
include '../config/database.php';

header('Content-Type: application/json');

// Pastikan pengguna adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'message' => 'Akses ditolak.']);
    exit();
}

// Periksa parameter yang dikirimkan
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID ujian tidak valid.']);
    exit();
}

$ujian_id = intval($_GET['id']);

// Periksa apakah ujian ada di database
$checkQuery = $conn->prepare("SELECT COUNT(*) as count FROM ujian WHERE ujian_id = ?");
$checkQuery->bind_param('i', $ujian_id);
$checkQuery->execute();
$result = $checkQuery->get_result()->fetch_assoc();

if ($result['count'] == 0) {
    echo json_encode(['success' => false, 'message' => 'Ujian tidak ditemukan.']);
    exit();
}

// Hapus data ujian
$deleteQuery = $conn->prepare("DELETE FROM ujian WHERE ujian_id = ?");
$deleteQuery->bind_param('i', $ujian_id);

if ($deleteQuery->execute()) {
    echo json_encode(['success' => true, 'message' => 'Ujian berhasil dihapus.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menghapus ujian.']);
}
?>
