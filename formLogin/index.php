<?php
session_start();
include '../koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id_user'];
        header("Location: ../admin/");
    } else {
    header("Location: index.php?pesan=gagal");
    }


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login!</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="index.php" method="post">
            <h1>LOGIN</h1>
            <center>
                
                <?php if($_GET['pesan']=='gagal'){
                    echo "<h6>Username Atau Password Salah</h6>";
                } if($_GET['pesan']=='logout'){
                
                echo "<h6>Berhasil Logout</h6>";
            } if($_GET['pesan']=='belum_login'){
                echo "<h6>Silahkan Login Terlebih Dahulu</h6>";
            }?>
            </center>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember Me?</label>
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" name="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
    </div>
</body>
</html>