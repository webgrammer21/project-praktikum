<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome Admin</a>
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
            <a class="nav-link active" aria-current="page" href="#">List Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">List Transaksi</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<form action="proces.php" method="POST" enctype = "multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Harga</label>
    <input type="number" class="form-control" name="harga">
  </div>
  <div class="mb-3">
  <label class="form-label">Kategori</label>
    <select class="form-select" aria-label="Default select example" name="kategori">
      <option selected>Pilih Kategori</option>
      <option value="1">One</option>
    </select>
  </div>
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Makanan</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Masukan Deskripsi Makanan" name="deskripsi"></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label" for="inputGroupFile02">Upload</label>
    <input type="file" class="form-control" id="inputGroupFile02" name="image">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>