<?php 
include '../koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../formLogin/index.php?pesan=belum_login");
    exit();
}

$id = $_GET['edit'];
$query = "SELECT * FROM menu WHERE id_menu = $id";
$data = mysqli_query($conn, $query);
$row = mysqli_fetch_array($data);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Menu</h2>
    <div class="row justify-content-center">
        <!-- Card Preview Menu -->
        <div class="col-md-4">
            <div class="card shadow">
                <img src="../assets/img/<?= $row['image'] ?>" class="card-img-top" alt="Gambar Makanan">
                <div class="card-body">
                    <h5 class="card-title"><?= ($row['name']) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rp <?= number_format($row['price'], 2) ?></h6>
                    <p class="card-text"><?= ($row['description']) ?></p>
                </div>
            </div>
        </div>
        <!-- Form Edit Menu -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="proces.php" method="POST" enctype="multipart/form-data">
                        <!-- Kirim id_menu sebagai hidden input -->
                        <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= ($row['name']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="<?= $row['price'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori" id="kategori" required>
                                <option disabled>Pilih Kategori</option>
                                <option value="1" <?= $row['category_id'] == 1 ? 'selected' : '' ?>>Makanan</option>
                                <option value="2" <?= $row['category_id'] == 2 ? 'selected' : '' ?>>Minuman</option>
                                <option value="3" <?= $row['category_id'] == 3 ? 'selected' : '' ?>>Snack</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required><?= ($row['description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <button type="submit" name="submitedit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
