<?php
include '../koneksi.php';

$sql = "SELECT * FROM menu where category_id = 1";
$sql2 = "SELECT * FROM menu where category_id = 2";
$sql3 = "SELECT * FROM menu where category_id = 3";
$sql4 = "SELECT * FROM menu where category_id = 4";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2); 
$result3 = mysqli_query($conn, $sql3); 
$result4 = mysqli_query($conn, $sql4); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .form-container {
            border: px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            align-items: center;
        }
        img{
            height: 100%;
            max-height: 400px;
            max-width: 100%;
            
        }
        body {
            /* display: flex; */
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('https://i.pinimg.com/736x/3c/6c/85/3c6c8518e0691edbfdf98aa4bb0f5297.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }
        .container{
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(18px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color : #ffff;
            border-radius: 10px;
            padding : 30px 40px;
        }

    </style>

</head>
<body>
<!-- Navbar -->
    <nav style="background-color: #0e131c; color: white; padding: 2px; text-align: center; border-bottom: 1px solid #d3a261; ">
        <h1 style="color: rgb(255, 255, 255);">WELCOME TO SIGMA MENU</h1>
        <nav>
            <ul style="list-style-type: none; padding: 0;">
                <li style="display: inline-block; margin-right: 10px;"><a href="#Makanan" style="color: #fff; text-decoration: none;">Makanan</a></li>
                <li style="display: inline-block; margin-right: 10px;"><a href="#Minuman" style="color: #fff; text-decoration: none;">Minuman</a></li>
                <li style="display: inline-block; margin-right: 10px;"><a href="#Dessert" style="color: #fff; text-decoration: none;">Dessert</a></li>
                <li style="display: inline-block; margin-right: 10px;"><a href="#Snack" style="color: #fff; text-decoration: none;">Snack</a></li>
                <li style="display: inline-block; margin-right: 10px;"><a href="../" style="color: #fff; text-decoration: none;">Home</a></li>
            </ul>
        </nav>
    </nav>

<!-- List Menu -->

<div class="container mt-5  mb-3">
    <h2 class="text-center mb-4">Pilih Menu</h2>
    <form action="konfirmasi_pesanan.php" method="post" class="form-container">
        <div class="row mb-5" id="Makanan">
            <h3 class="">Makanan</h3>
            <?php while($row = mysqli_fetch_array($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-warning btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row mb-5" id="Minuman">
            <h3 class="">Minuman</h3>
            <?php while($row = mysqli_fetch_array($result2)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-warning btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row mb-5" id="Dessert">
            <h3 class="">Dessert</h3>
            <?php while($row = mysqli_fetch_array($result4)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-warning btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </di>


        <div class="row mb-5" id="Snack">
            <h3 class="">Snack</h3>
            <?php while($row = mysqli_fetch_array($result3)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-warning btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit" name="confirm_order" class="btn btn-primary mt-4">Pesan</type=>
        </div>
    </form>
</div>

<script>
    function increaseQuantity(id) {
        let input = document.getElementById(`jumlah_${id}`);
        input.value = parseInt(input.value) + 1;
    }

    function decreaseQuantity(id) {
        let input = document.getElementById(`jumlah_${id}`);
        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
<script src="../assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

