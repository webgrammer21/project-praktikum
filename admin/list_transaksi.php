<?php 
include '../koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../formLogin/index.php?pesan=belum_login");
    exit();
}

$query = "SELECT * FROM orders ORDER BY order_date DESC";
$data = mysqli_query($conn, $query);
// $order= mysqli_fetch_array($data);


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

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
                            <a class="nav-link" aria-current="page" href="tambah_menu.php">Tambah Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="list_transaksi.php">List Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
    <?php while ($order = mysqli_fetch_array($data)) { 
        $id = $order['id_order'];
        $query = "SELECT * FROM order_detail WHERE id_order = $id";
        $p = mysqli_query($conn, $query);
    ?>
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <!-- Informasi Pemesan -->
            <h5 class="card-title">Informasi Pemesanan</h5>
            <ul class="list-unstyled mb-3">
                <li><strong>Nama Pemesan:</strong> <?= ($order['nama_pemesan']) ?></li>
                <li><strong>No. HP:</strong> <?= ($order['no_hp']) ?></li>
                <li><strong>Jenis Pembayaran:</strong> <?= ($order['jenis_pembayaran']) ?></li>
                <li><strong>Notes:</strong> <?= ($order['notes']) ?></li>
                <li><strong>Total:</strong> <?= number_format($order['total_amount'], 2) ?></li>
            </ul>

            <!-- Daftar Pesanan -->
            <h6>Pesanan:</h6>
            <ul class="list-group">
                <?php while ($detail = mysqli_fetch_array($p)) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= ($detail['nama_menu']) ?>
                    <span class="badge bg-primary rounded-pill"><?= ($detail['quantity']) ?>x</span>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>