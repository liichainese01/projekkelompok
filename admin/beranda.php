<?php
session_start();
include '../config/database.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['active_users'])) {
    $activeUsersQuery = $conn->query("SELECT COUNT(DISTINCT user_name) AS active_users FROM sessions WHERE exam_active = 1");
    $activeUsers = $activeUsersQuery->fetch_assoc()['active_users'];
    echo $activeUsers;
    exit();
}

$kejuruanQuery = $conn->query("
    SELECT ujian.kejuruan, COUNT(DISTINCT user_answers.user_name) AS user_count
    FROM ujian
    LEFT JOIN soal ON ujian.ujian_id = soal.ujian_id
    LEFT JOIN user_answers ON soal.soal_id = user_answers.soal_id
    GROUP BY ujian.kejuruan
");

// Hitung jumlah pengguna yang sedang ujian
$activeExamsQuery = $conn->query("SELECT COUNT(DISTINCT user_name) AS active_users FROM sessions WHERE exam_active = 1");
$activeExams = $activeExamsQuery->fetch_assoc()['active_users'];

// Hitung jumlah pengguna yang telah menyelesaikan ujian
$completedExamsQuery = $conn->query("SELECT COUNT(DISTINCT user_name) AS completed_users FROM user_answers");
$completedExams = $completedExamsQuery->fetch_assoc()['completed_users'];

// Hitung total kejuruan
$totalKejuruanQuery = $conn->query("SELECT COUNT(DISTINCT kejuruan) AS total_kejuruan FROM ujian");
$totalKejuruan = $totalKejuruanQuery->fetch_assoc()['total_kejuruan'];

$kejuruanData = [];
while ($row = $kejuruanQuery->fetch_assoc()) {
    $kejuruanData[] = ['kejuruan' => $row['kejuruan'], 'count' => $row['user_count']];
}

if (empty($kejuruanData)) {
    echo "Data kejuruan tidak ditemukan!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleadmin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js
    "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css
    " rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
                <?php
                if(isset($_GET['page']))
                {
                    $page=$_GET['page'];
                    if ($page=='dashboard'){
                        include "dashboard.php";
                    } elseif($page=='soal'){
                        include "add_question.php";
                    } elseif($page=='hasil'){
                        include "view_results.php";
                    } elseif($page=='setting'){
                        include "admin_setting.php";
                    } elseif($page=='hapususer'){
                        include "delete_user.php";
                    } elseif($page=='hapusnilai'){
                        include "hapus_results.php";
                    } elseif($page=='session'){
                        include "session.php";
                    } elseif ($page=='detail'){
                        include "user_detail.php";
                    } elseif ($page=='hapusujian'){
                        include "delete_ujian.php";
                    }
                } else {
                    include "dashboard.php";
                }
                ?>
        </div>
    </div>
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                    <span class="icon"><img src="../img/logo-karawang.png" alt=""></span>
                    <span class="title" style="font-size:20px; margin-top:10px;">DISNAKERTRANS</span>
                    </a>
                </li>
                <li>
                    <a href="?page=dashboard">
                        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="?page=soal">
                        <span class="icon"><ion-icon name="browsers-outline"></ion-icon></span>
                        <span class="title">Bank Soal</span>
                    </a>
                </li>
                <li>
                    <a href="?page=hasil">
                        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
                        <span class="title">Hasil Jawaban</span>
                    </a>
                </li>
                <li>        
                    <a href="?page=setting">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Setting Ujian</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="icon"><ion-icon name="exit-outline"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    <script>
        // menu toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");
        toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
        };
    </script>
    <script>
        setInterval(() => {
            fetch('?page=dashboard&active_users=true')
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.card:nth-child(1) h3').innerText = data;
                });
        }, 1000);
    </script>
    <script>
        const kejuruanData = <?php echo json_encode($kejuruanData); ?>;
        console.log(kejuruanData);
        const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];
        const labels = kejuruanData.map(item => item.kejuruan);
        const data = kejuruanData.map(item => item.count);
        const ctx4 = document.getElementById('donutChart').getContext('2d');
        new Chart(ctx4, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Users per Kejuruan',
                    data: data,
                    backgroundColor: colors,
                    hoverOffset: 4,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                const kejuruan = labels[tooltipItem.dataIndex];
                                const count = data[tooltipItem.dataIndex];
                                return `${kejuruan}: ${count} Peserta`;
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
</body>
</html>
