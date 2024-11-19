<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../formLogin/index.php?pesan=belum_login");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Panel</title>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary shadow-sm mb-4">
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
                            <a class="nav-link active" aria-current="page" href="tambah_menu.php">Tambah Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_transaksi.php">List Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Form -->
    <div class="container">
        <div class="card shadow-sm p-4">
            <h2 class="text-center mb-4">Tambah Menu</h2>
            <form action="proces.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="namaMenu" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="namaMenu" name="nama" placeholder="Masukkan nama menu" required>
                </div>
                <div class="mb-3">
                    <label for="hargaMenu" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="hargaMenu" name="harga" placeholder="Masukkan harga menu" required>
                </div>
                <div class="mb-3">
                    <label for="kategoriMenu" class="form-label">Kategori</label>
                    <select class="form-select" id="kategoriMenu" name="kategori" required>
                        <option selected>Pilih Kategori</option>
                        <option value="1">Makanan</option>
                        <option value="2">Minuman</option>
                        <option value="3">Snack</option>
                        <option value="4">Dessert</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsiMenu" class="form-label">Deskripsi Makanan</label>
                    <textarea class="form-control" id="deskripsiMenu" rows="4" placeholder="Masukkan deskripsi makanan" name="deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="uploadImage" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="uploadImage" name="image" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="submitinsert" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
