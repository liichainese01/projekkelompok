<?php
include '../config/database.php';

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}
$no=1;

// Ambil data sesi aktif
$activeSessionsQuery = $conn->query("SELECT * FROM sessions WHERE exam_active = 1");
$activeSessions = [];
while ($row = $activeSessionsQuery->fetch_assoc()) {
    $activeSessions[] = $row;
}

// Jika form untuk menghapus sesi pengguna dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_session'])) {
        $sessionId = $conn->real_escape_string($_POST['session_id']);
        $conn->query("DELETE FROM sessions WHERE id = '$sessionId'");
        header("Location: ?page=session");
        exit();
    }

    // Jika tombol hapus semua sesi aktif ditekan
    if (isset($_POST['delete_all_sessions'])) {
        $conn->query("DELETE FROM sessions WHERE exam_active = 1");
        header("Location: ?page=session");
        exit();
    }
}
?>
<style>
    .table-grid {
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }
</style>
<div class="contain">
    <h2 style="padding-top:10px; padding-left: 10px;">Session</h2>
    <div class="action-container">
        <form method="POST">
            <button type="submit" name="delete_all_sessions" class="action-btn">Hapus Semua Sesi Aktif</button>
        </form>
    </div>
    <div style="overflow-x:auto; height:auto; margin-top: 10px; font-size: 12px;">
        <div class="table-grid">
            <div class="table-header">No</div>
            <div class="table-header">Username</div>
            <div class="table-header">Last Active</div>
            <div class="table-header">Aksi</div>
            <?php if (count($activeSessions) > 0): ?>
                <?php foreach ($activeSessions as $session): ?>
                    <div class="table-cell"><?php echo $no++; ?></div>
                    <div class="table-cell"><?php echo htmlspecialchars($session['user_name']); ?></div>
                    <div class="table-cell"><?php echo htmlspecialchars($session['last_updated']); ?></div>
                    <div class="table-cell">
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="session_id" value="<?php echo htmlspecialchars($session['id']); ?>">
                            <button type="submit" name="delete_session" class="trashbtn"><span class="icon"><ion-icon name="trash-outline"></ion-icon></ion-icon></span></button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                    <div class="table-cell">Tidak ada sesi aktif.</div>
            <?php endif; ?>  
        </div>
    
    </div>
</div>