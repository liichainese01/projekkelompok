<?php 
session_start();
include '../config/database.php';

// Pastikan session sudah ada
if (!isset($_SESSION['user_name'])) {
    header('Location: ../index.php');
    exit();
}

$userName = $_SESSION['user_name'];

// Ambil id dari session yang sesuai dengan user_name
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_SESSION['user_name'];
    $is_all_answered = true;

    // Ambil waktu pengerjaan yang dikirim dari perangkat pengguna
    if (isset($_POST['tanggal_pengerjaan'])) {
        $tanggal_pengerjaan = $_POST['tanggal_pengerjaan']; // Waktu yang dikirim dari JS
    } else {
        $tanggal_pengerjaan = date('Y-m-d H:i:s'); // Waktu server jika tidak ada
    }

    // Memasukkan jawaban pengguna dan waktu pengerjaan ke dalam database
    if (isset($_POST['answers']) && is_array($_POST['answers'])) {
        foreach ($_POST['answers'] as $question_id => $answer) {
            if (empty($answer)) {
                $is_all_answered = false; 
                continue; 
            }

            // Menyimpan data ke database
            $conn->query("INSERT INTO user_answers (user_name, soal_id, pilihan_id, tanggal_pengerjaan) 
                          VALUES ('$user_name', $question_id, $answer, '$tanggal_pengerjaan')");
        }
    } else {
        $is_all_answered = false; 
    }

    if ($is_all_answered) {
        session_destroy();
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Location: ../logout.php");
        exit();
    } else {    
        session_destroy();
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Location: ../logout.php");
        exit();
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleselesai.css">
</head>
<body>
    <div class="header">
        <img src="../img/disnakertrans302.png" alt="">
    </div>
    <div class="displayflex">
        <div class="container">
            <h2>Konfirmasi Test</h2>
            <p>Jawaban anda sudah terekam. Terima kasih sudah mengikuti ujian. Selanjutnya silahkan masuk ke tes wawancara.</p> <br>
            <a class="btn" href="../logout.php">Kembali ke Halaman Login</a> 
        </div>
    </div>
    <form id="answersForm" method="POST">
        <input type="hidden" name="tanggal_pengerjaan" id="tanggal_pengerjaan">
        <input type="hidden" name="answers" value="..."> 
    </form>

    <script>
        localStorage.removeItem('answers');
        localStorage.removeItem('timeLeft');
        localStorage.removeItem('currentQuestion');

        let waktuPerangkat = new Date();
        let waktuIndo = new Date(waktuPerangkat.toLocaleString("en-US", { timeZone: "Asia/Jakarta" }));
        let tanggalPengerjaan = waktuIndo.toISOString().slice(0, 19).replace("T", " ");
        document.getElementById('tanggal_pengerjaan').value = tanggalPengerjaan;

        history.pushState(null, null, location.href);
        window.addEventListener('popstate', function () {
            location.href = '../logout.php';
        });
    </script>
</body>
</html>