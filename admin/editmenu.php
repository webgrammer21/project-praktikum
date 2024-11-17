<?php 
include '../koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../formLogin/index.php?pesan=belum_login");
    exit();
}

$id= $_GET['edit'];
$query= "SELECT * FROM menu where id_menu = $id ";
$data=  mysqli_query($conn, $query);
$row = mysqli_fetch_array($data)
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

    <div class="card" style="width: 18rem;">
      <img src="../assets/img/<?= $row['image']?>" class="card-img-top" alt="gambar makanan">
      <div class="card-body">
        <h5 class="card-title"><?= $row['name']?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">Rp. <?= number_format($row['price'], 2) ?></h6>
        <p class="card-text"><?= $row['description']?></p>
      </div>
    </div>

    <form action="proces.php" method="POST" enctype="multipart/form-data">
    <!-- Kirim id_menu sebagai hidden input -->
    <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
        <input type="text" class="form-control" name="nama" value="<?= $row['name'] ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" value="<?= $row['price'] ?>">
    </div>    
    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select class="form-select" name="kategori">
            <option selected>Pilih Kategori</option>
            <option value="1" <?= $row['category_id'] == 1 ? 'selected' : '' ?>>Makanan</option>
            <option value="2" <?= $row['category_id'] == 2 ? 'selected' : '' ?>>Minuman</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Makanan</label>
        <textarea class="form-control" name="deskripsi"><?= $row['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label" for="inputGroupFile02">Upload</label>
        <input type="file" class="form-control" id="inputGroupFile02" name="image">
    </div>
    <button type="submit" name="submitedit" class="btn btn-primary">Submit</button>
</form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>