<?php
session_start();
include '../koneksi.php';

if (isset($_POST['confirm_order'])) {
    $total = 0;
    $order_items = [];

    foreach ($_POST['jumlah'] as $id => $jumlah) {
        if ((int)$jumlah > 0) {
            $nama = $_POST['nama'][$id];
            $harga = (float)$_POST['harga'][$id];
            $subtotal = $jumlah * $harga;

            $order_items[] = [
                'id_menu' => $id,
                'name' => $nama,
                'quantity' => $jumlah,
                'price' => $harga,
                'subtotal' => $subtotal
            ];
            $total += $subtotal;
        }
    }

    $_SESSION['order_items'] = $order_items;
    $_SESSION['total'] = $total;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img {
            height: 100%;
            max-height: 400px;
            max-width: 100%;
        }
        body {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('https://i.pinimg.com/736x/3c/6c/85/3c6c8518e0691edbfdf98aa4bb0f5297.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }
        .container {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(18px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px); 
            border: none; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        }
        .card-title {
            color: #333;
        }
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.7);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Konfirmasi Pesanan</h2>
    <div class="row">
        <!-- Daftar Pesanan -->
        <div class="col-md-6" id="order-list">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-3">Daftar Pesanan</h4>
                    <?php foreach ($order_items as $item): ?>
                        <p><?= $item['quantity']; ?>x <?= $item['name']; ?> = <strong>Rp <?= number_format($item['subtotal']); ?></strong></p>
                    <?php endforeach; ?>
                    <hr>
                    <p><strong>Total: Rp <?= number_format($total); ?></strong></p>
                </div>
            </div>
        </div>

        <!-- Formulir Pemesanan -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-3">Detail Pemesanan</h4>
                    <form action="proces.php" method="post">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama Pemesan</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No HP</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan</label>
                            <textarea name="notes" id="notes" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="payment_type" class="form-label">Jenis Pembayaran</label>
                            <select name="payment_type" id="payment_type" class="form-select" required>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Kartu Kredit</option>
                                <option value="Bank Transfer">Transfer Bank</option>
                            </select>
                        </div>
                        <button type="submit" name="confirm"class="btn btn-primary w-100">Konfirmasi dan Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
