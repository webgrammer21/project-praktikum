<?php
require_once '../koneksi.php';

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Pilih Menu</h2>
    <form method="post">
        <div class="row">
            <?php while($row = $result->fetch_assoc()): ?>
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
        <button type="submit" name="submit_order" class="btn btn-primary mt-4">Pesan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_order'])) {
        $total = 0;
        $pesanan_terpilih = false;
        $order_items = [];

        echo "<h2 class='mt-4'>Pesanan Anda</h2>";

        foreach ($_POST['jumlah'] as $id => $jumlah) {
            $jumlah = (int)$jumlah;
            if ($jumlah > 0) {
                $nama = $_POST['nama'][$id];
                $harga = (float)$_POST['harga'][$id];
                $subtotal = $jumlah * $harga;

                $order_items[] = [
                    'menu_id' => $id,
                    'quantity' => $jumlah,
                    'price' => $harga,
                    'subtotal' => $subtotal
                ];

                echo "<p>$nama ($jumlah porsi) = Rp " . number_format($subtotal) . "</p>";
                $total += $subtotal;
                $pesanan_terpilih = true;
            }
        }

        if ($pesanan_terpilih) {
            echo "<strong>Total: Rp " . number_format($total) . "</strong>";

            $query = "INSERT INTO orders (total_amount) VALUES ('$total')";
            if (mysqli_query($conn, $query)) {
                $order_id = mysqli_insert_id($conn);

                foreach ($order_items as $item) {
                    $menu_id = $item['menu_id'];
                    $quantity = $item['quantity'];
                    $price = $item['price'];
                    $subtotal = $item['subtotal'];
                    
                    $item_query = "INSERT INTO order_detail (id_order, id_menu, quantity, price, subtotal) 
                                   VALUES ('$order_id', '$menu_id', '$quantity', '$price', '$subtotal')";
                    if (!mysqli_query($conn, $item_query)) {
                        echo "<p class='text-danger mt-3'>Error pada query order_items: " . mysqli_error($conn) . "</p>";
                    }
                }

                echo "<p class='text-success mt-3'>Pesanan berhasil disimpan!</p>";
            } else {
                echo "<p class='text-danger mt-3'>Error pada query orders: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p>Anda belum memilih menu apa pun.</p>";
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
