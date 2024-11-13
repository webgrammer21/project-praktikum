<?php
session_start();
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
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

    // Store order data in session for the next step
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
</head>
<body>
<div class="container mt-5">
    <h2>Konfirmasi Pesanan</h2>
    <div class="order-summary">
        <?php foreach ($order_items as $item): ?>
            <p><?php echo $item['name']; ?> (<?php echo $item['quantity']; ?> pcs) = Rp <?php echo number_format($item['subtotal']); ?></p>
        <?php endforeach; ?>
        <p><strong>Total: Rp <?php echo number_format($total); ?></strong></p>
    </div>

    <!-- Customer Details and Payment Type Form -->
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
        <button type="submit" class="btn btn-primary">Konfirmasi dan Pesan</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
