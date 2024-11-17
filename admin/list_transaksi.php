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

      <div class="container">
  <?php while($order= mysqli_fetch_array($data)){
    $id = $order['id_order'];
    $query = "SELECT m.name, d.quantity  FROM order_detail d JOIN menu m ON d.id_menu = m.id_menu WHERE d.id_order =$id ";
    $p= mysqli_query($conn,$query);
    ?>
    <div style="background-color: aquamarine;">
        <div>

            <h6>Nama: <?= $order['nama_pemesan']?> </h6>
            <h6>No.HP: <?= $order['no_hp']?> </h6>
            <h6>Jenis Pembayaran: <?= $order['jenis_pembayaran']?> </h6>
            <h6>Notes: <?= $order['notes']?> </h6>
        </div>
        <h6>Pesanan: </h6>
        <?php while($detail= mysqli_fetch_array($p)){ ?>
        <div>
           <h6><?= $detail['quantity']?>x <?= $detail['name']?></h6>
        </div>
        <?php }?>
    </div>
    
    <?php }?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>