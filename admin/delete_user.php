<?php
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['user_name'])) {
    $userName = $conn->real_escape_string($_GET['user_name']);

    $sql = "DELETE FROM user_answers WHERE user_name = '$userName'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Hasil jawaban dari $userName berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Gagal menghapus hasil: " . $conn->error;
    }
}

header("Location: ?page=hasil");
exit();
?>
