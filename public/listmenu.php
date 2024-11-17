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
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Pilih Menu</h2>
    <form action="konfirmasi_pesanan.php" method="post">
        <div class="row">
            <h1>Makanan</h1>
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

        <div class="row">
            <h1>Minuman</h1>
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
        </div>

        <div class="row">
            <h1>Snack</h1>
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


        <button type="submit" name="confirm_order" class="btn btn-primary mt-4">Pesan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
