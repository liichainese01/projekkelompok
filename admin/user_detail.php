<?php
include '../config/database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

if (!isset($_GET['user_name'])) {
    die("Nama user tidak ditentukan.");
}

$no = 1;

$user_name = mysqli_real_escape_string($conn, $_GET['user_name']);

$results = $conn->query("
    SELECT q.soal_text, c.pilihan_text, c.is_correct 
    FROM user_answers ua
    JOIN soal q ON ua.soal_id = q.soal_id
    JOIN pilihan c ON ua.pilihan_id = c.pilihan_id
    WHERE ua.user_name = '$user_name'
");

?>
    <style>
        .table-grid{
            max-height: 480px;
            grid-template-columns: 35px 1fr 1fr 1fr;
        }
    </style>

    <!-- div Conateinr-->
     <div class="contain">
            <h2 style="padding-top:10px; padding-left: 10px;">Nama : <?php echo htmlspecialchars($user_name); ?></h2> <br>
            <?php if ($results->num_rows > 0): ?>
                <div style="overflow-x:auto; margin-top:10px; height:auto; font-size: 12px;">
                <div class="table-grid">
                    <div class="table-header">No</div>
                    <div class="table-header">Soal</div>
                    <div class="table-header">Jawaban yang Dipilih</div>
                    <div class="table-header">Status Jawaban</div>
                    <?php while ($row = $results->fetch_assoc()): ?>
                        <div class="table-cell"><?php echo $no++ ?></div>
                        <div class="table-cell"><?php echo htmlspecialchars($row['soal_text']); ?></div>
                        <div class="table-cell"><?php echo htmlspecialchars($row['pilihan_text']); ?></div>
                        <div class="table-cell"><?php echo $row['is_correct'] ? "Benar" : "<b>Salah</b>"; ?></div>
                    <?php endwhile; ?>
                </div>
                </div>
            <?php else: ?>
                <p>Tidak ada jawaban yang ditemukan untuk user ini.</p>
            <?php endif; ?>
            </div>
    