<?php
require_once '../koneksi.php';

$sql = "SELECT * FROM menu where category_id = 1";
$sql2 = "SELECT * FROM menu where category_id = 2";
$sql3 = "SELECT * FROM menu where category_id = 3";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2); 
$result3 = mysqli_query($conn, $sql3); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SIGMA LATTE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="#" href="index.php">Home</a>
                </li>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu List
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Makanan</a></li>
                            <li><a class="dropdown-item" href="#">Minuman</a></li>
                            <li><a class="dropdown-item" href="#">Dessert</a></li>
                            <li><a class="dropdown-item" href="#">Pizza</a></li>
                        </ul>
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pemesanan</a>
                </li>
                
            </ul>
        <span class="navbar-text">
        <a href="logout.php">Logout</a>
        </span>
        </div>
    </div>
    </nav>

<!-- List Menu -->
<div class="container mt-5">
    <h2 class="text-center mb-4">SILAHKAN UNTUK MEMILIH PESANAN ANDA</h2>
    <div class="card">
        <div class="card-body">
            <form action="konfirmasi_pesanan.php" method="post">
                <div class="row">
                    <h3>Makanan</h3>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="../assets/img/nasgor.jpg "<?php echo $row['image']; ?> class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 300px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                                    <p class="card-text"><?php echo $row['description']; ?></p>
                                    <input type="number" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mt-2" style="width: 100px;" placeholder="Jumlah">
                                    <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                                    <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <h3>Minuman</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                        <img src="https://i.pinimg.com/736x/87/de/50/87de50a953534a20d3d05117e43ee93d.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Coffee Sigma</h5>
                            <p class="card-text">Kopi Torabika buat sigmain orang</p>
                            <p class="card-text">Harga Rp. 20.000</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="https://i.pinimg.com/736x/9b/1a/58/9b1a58d5842814b6a8443b23e698ed7d.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tea Sigma</h5>
                            <p class="card-text">Ice Tea buat hari-hari makin sigma</p>
                            <p class="card-text">Harga Rp. 9.000</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="https://i.pinimg.com/736x/92/f6/e7/92f6e71f39b5b8eaaa3290989adbace2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Matcha Sigma</h5>
                            <p class="card-text">Harga Rp. 24.000</p>
                        </div>
                        </div>
                    </div>
                </div>

                <h3>Dessert</h3>
                <?php while($row = $result2->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                                <p class="card-text"><?php echo $row['description']; ?></p>
                                <input type="number" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mt-2" style="width: 100px;" placeholder="Jumlah">
                                <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                        <img src="https://i.pinimg.com/236x/d9/77/f9/d977f92bd91ef6e38fd486408e934fd7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Coffee Sigma</h5>
                            <p class="card-text">Kopi Torabika buat sigmain orang</p>
                            <p class="card-text">Harga Rp. 20.000</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="https://i.pinimg.com/736x/04/e4/e5/04e4e56c3c98f2c29f415be04df036a7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tea Sigma</h5>
                            <p class="card-text">Ice Tea buat hari-hari makin sigma</p>
                            <p class="card-text">Harga Rp. 9.000</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                        <img src="https://i.pinimg.com/236x/5d/c0/1e/5dc01e35a035624bf2b7764b68172b19.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Matcha Sigma</h5>
                            <p class="card-text">Harga Rp. 24.000</p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3>Snack</h3>
                    <?php while($row = $result3->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height: 300px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                                    <p class="card-text"><?php echo $row['description']; ?></p>
                                    <input type="number" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mt-2" style="width: 100px;" placeholder="Jumlah">
                                    <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                                    <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="confirm_order" class="btn btn-primary mt-4">Pesan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
