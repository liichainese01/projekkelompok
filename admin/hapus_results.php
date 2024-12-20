<?php
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

// Menghapus semua data dari tabel `user_answers`
$sql = "DELETE FROM user_answers";
if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Semua hasil jawaban berhasil dihapus.";
} else {
    $_SESSION['message'] = "Gagal menghapus hasil jawaban: " . $conn->error;
}

header("Location: ?page=hasil");
exit();
?>
