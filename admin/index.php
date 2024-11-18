<?php 

include '../koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../formLogin/index.php?pesan=belum_login");
    exit();
}
$query= "SELECT * FROM menu";

$result=mysqli_query($conn,$query);




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
            gap: 20px;
        }
        .card {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Welcome Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Welcome Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="tambah_menu.php">Tambah Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_transaksi.php">List Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Konten Utama -->
<div class="container">
    <h2 class="text-center mb-4">Daftar Menu</h2>
    <div class="menu-grid">
        <?php while($row = mysqli_fetch_array($result)) { ?>
        <div class="card">
            <img src="../assets/img/<?= $row['image'] ?>" class="card-img-top" alt="gambar makanan">
            <div class="card-body">
                <h5 class="card-title"><?= $row['name'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Rp. <?= number_format($row['price'], 2) ?></h6>
                <p class="card-text"><?= $row['description'] ?></p>
                <a href="editmenu.php?edit=<?= $row['id_menu'] ?>" class="btn btn-primary">Edit</a>
                <a href="proces.php?hapus=<?= $row['id_menu'] ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
