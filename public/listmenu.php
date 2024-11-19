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
    <!-- <link rel="stylesheet" href="../assets/css/styles.css"> -->

    <style>
        .form-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            align-items: center;
        }
        img{
            height: 100%;
            max-height: 400px;
            max-width: 100%;
            
        }
    </style>

</head>
<body>
<!-- Navbar -->
 <!-- <nav>
<header>
			<div class="gradient">
				<div class="container">
					<h2 id="logo"><a href=" "> SIGMA LATTE </a></h2>
					<img id="open_menu" class="menu_icon show" src="../assets/img/menu.png" >
					<img id="close_menu" class="menu_icon" src="../assets/img/x.png" >
					<nav>
						<a href="#go_to_top" class="menu_link active"> Welcome </a>
						<a href="#about" class="menu_link"> About </a>
						<a href="#menu" class="menu_link"> Menu </a>
						<a href="#info" class="menu_link"> Contact </a>
						<a href="formLogin/index.php">
							<button class="btn btn-warning" type="button">LOGIN</button></a>
					</nav>
				</div>
			</div>

    </nav> 
    </header>-->

<!-- List Menu -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Pilih Menu</h2>
    <form action="konfirmasi_pesanan.php" method="post" class="form-container">
        <div class="row mb-5">
            <h3 class="">Makanan</h3>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row mb-5">
            <h3 class="">Minuman</h3>
            <?php while($row = $result2->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="row mb-5">
            <h3 class="">Snack</h3>
            <?php while($row = $result3->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['name']; ?></h5>
                            <h6 class=" text-secondary">Harga: Rp <?php echo number_format($row['price']); ?></h6>
                            <p class="card-text"> <?php echo $row['description']; ?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decreaseQuantity(<?php echo $row['id_menu']; ?>)">-</button>
                                <input class="text-center ps-3" type="number" id="jumlah_<?php echo $row['id_menu']; ?>" name="jumlah[<?php echo $row['id_menu']; ?>]" min="0" value="0" class="form-control mx-2 " style="width: 70px;">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increaseQuantity(<?php echo $row['id_menu']; ?>)">+</button>
                            </div>
                            <input type="hidden" name="harga[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="nama[<?php echo $row['id_menu']; ?>]" value="<?php echo $row['name']; ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="">
            <button type="submit" name="confirm_order" class="btn btn-primary mt-4">Pesan</button>
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

