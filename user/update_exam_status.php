<?php
include '../config/database.php';
$data = json_decode(file_get_contents('php://input'), true);

// Ambil data dari request
if (isset($data['user_name'])) {
    $userName = $data['user_name'];

    // Ambil id berdasarkan user_name
    $query = "SELECT id FROM sessions WHERE user_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->bind_result($sessionId);
    $stmt->fetch();
    $stmt->close();

    if ($sessionId) {
        // Update exam_active menjadi 0 dengan menggunakan session_id
        $updateQuery = "UPDATE sessions SET exam_active = 0 WHERE id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("i", $sessionId);
        $updateStmt->execute();
        $updateStmt->close();
    }
}
?>
