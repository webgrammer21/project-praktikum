<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil Data Dari session
    $order_items = isset($_SESSION['order_items']) ? $_SESSION['order_items'] : [];
    $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;

    // Mengambil data customer
    $customer_name =  $_POST['customer_name'];
    $phone = $_POST['phone'];
    $notes =$_POST['notes'];
    $payment_type = $_POST['payment_type'];

    $order_query = "INSERT INTO orders (nama_pemesan, no_hp, notes, jenis_pembayaran, total_amount) 
                    VALUES ('$customer_name', '$phone', '$notes', '$payment_type', '$total')";

    if (mysqli_query($conn, $order_query)) {
        $order_id = mysqli_insert_id($conn);//buat mengambil order_id dari data yang terakhir di masukin dari table orders

        $success = true;
        foreach ($order_items as $item) {
            $nama_menu = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $subtotal = $item['subtotal'];

            $item_query = "INSERT INTO order_detail (id_order, nama_menu, quantity, price, subtotal) 
                           VALUES ('$order_id', '$nama_menu', '$quantity', '$price', '$subtotal')";

            if (!mysqli_query($conn, $item_query)) {
                $success = false;
                echo "<p class='text-danger'>Error inserting order item: " . mysqli_error($conn) . "</p>";
                break;
            }
        }
        
        if ($success) {
            // echo "<p class='text-success'>Pesanan berhasil disimpan! Terima kasih, $customer_name.</p>";
            // Clear session data
            unset($_SESSION['order_items'], $_SESSION['total']);
            header("Location: last.php");
        } else {
            echo "<p class='text-danger'>Terjadi kesalahan saat menyimpan detail pesanan. Silakan coba lagi.</p>";
        }
    } else {
        echo "<p class='text-danger'>Error Memasukan order: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p class='text-danger'>Invalid lek.</p>";
}

?>
