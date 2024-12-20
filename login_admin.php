<?php
session_start();
include 'config/database.php';

$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];

    $result = $conn->query("SELECT * FROM useradmin WHERE kode = '$kode' AND role = 'admin'");

    if ($result->num_rows > 0) {
        $_SESSION['role'] = 'admin';

        header('Location: admin/beranda.php');
        exit();
    } else {
        $err = "Kode admin tidak valid!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
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
            <h2>Login Admin</h2>
            <form method="POST">
                <div style="padding-bottom:10px;">
                <label>Kode Admin</label>
                </div>
                <input type="text" name="kode" placeholder="Kode Admin" required>
                <div style="text-align:center; padding-top:10px; padding-bottom:10px; color:red; font-size:14px;"> <?php echo $err; ?></div>
                <input type="submit" value="Login">
            </form><br>
            <a href="index.php">User</a>
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

