<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $question_id = (int) $_GET['id'];

    $conn->query("DELETE FROM user_answers WHERE soal_id = $question_id");
    $conn->query("DELETE FROM pilihan WHERE soal_id = $question_id");
    $conn->query("DELETE FROM soal WHERE soal_id = $question_id");

    echo json_encode(['status' => 'success']);
}
?>
