<?php
session_start();
include 'config/database.php';

$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $kodeujian = strtolower(mysqli_real_escape_string($conn, $_POST['kodeujian']));

    $result = $conn->query("SELECT * FROM ujian WHERE LOWER(kodeujian) = '$kodeujian'");

    if ($result->num_rows > 0) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['kodeujian'] = $kodeujian;

        header('Location: user/user_exams.php');
        exit();
    } else {
        $err = "Kode ujian tidak valid!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <style>
    
    .container label {
        color :grey;
        font-size:14px;
    }

    input[type="submit"] {
        padding:10px;
        background-color:#4946A0;
        color:white;
        border:none;
        width: 100%;
        border-radius:5px;
        cursor:pointer;
        font-size: 18px;    
    }

    input[type="submit"]:hover {       
        background-color:rgb(10, 0, 148);
    }
    </style>
</head>
<body>
    <div class="header">
      <img src="img/disnakertrans302.png" alt="" />
    </div>

    <div class="displayflex">
        <div class="container">
            <form method="POST">
                <h2>Selamat Datang</h2>
                <div style="padding-bottom:10px;">
                <label>Silahkan masuk ujian dengan nama anda.</label> 
                </div>
                <input type="text" name="user_name" placeholder="Nama" required>
                <br> <br>
                <input type="text" name="kodeujian" placeholder="Kode Ujian" required> <br>
                <div style="text-align:center; padding-top:10px; padding-bottom:10px; color:red; font-size:14px;"> <?php echo $err; ?></div>
                <input type="submit" value="Login">
            </form>
            <br>
            <a href="login.php">User</a>
            <a href="login_admin.php" style="float:right;">Admin</a>
        </div>
    </div>

    <div class="footer">
      <h2 style="color: white; font-style: italic">DISNAKERTRANS</h2>
      <p style="text-decoration: underline; font-style: italic">
        disnakertrans@karawangkab.go.id
      </p>
      <p style="margin-left: 20%; margin-right: 20%">
        Jl. Surotokunto KM. 6, Warungbambu, Kec. Karawang Timur, Kabupaten
        Karawang, Jawa Barat 41371
      </p>
    </div>
</body>
</html>
