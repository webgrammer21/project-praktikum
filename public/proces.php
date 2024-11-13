<?php
session_start();
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve order data from session
    $order_items = isset($_SESSION['order_items']) ? $_SESSION['order_items'] : [];
    $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;

    // Retrieve customer data from form submission
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $notes = mysqli_real_escape_string($conn, $_POST['notes']);
    $payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);

    // Insert order data into `orders` table
    $order_query = "INSERT INTO orders (nama_pemesan, no_hp, notes, jenis_pembayaran, total_amount) 
                    VALUES ('$customer_name', '$phone', '$notes', '$payment_type', '$total')";

    if (mysqli_query($conn, $order_query)) {
        // Get the generated order ID
        $order_id = mysqli_insert_id($conn);

        // Insert each order item into `order_detail` table
        $success = true;
        foreach ($order_items as $item) {
            $menu_id = $item['id_menu'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $subtotal = $item['subtotal'];

            $item_query = "INSERT INTO order_detail (id_order, id_menu, quantity, price, subtotal) 
                           VALUES ('$order_id', '$menu_id', '$quantity', '$price', '$subtotal')";

            if (!mysqli_query($conn, $item_query)) {
                $success = false;
                echo "<p class='text-danger'>Error inserting order item: " . mysqli_error($conn) . "</p>";
                break;
            }
        }
        
        // Check if all inserts succeeded
        if ($success) {
            echo "<p class='text-success'>Pesanan berhasil disimpan! Terima kasih, $customer_name.</p>";
            // Clear session data
            unset($_SESSION['order_items'], $_SESSION['total']);
        } else {
            echo "<p class='text-danger'>Terjadi kesalahan saat menyimpan detail pesanan. Silakan coba lagi.</p>";
        }
    } else {
        echo "<p class='text-danger'>Error inserting order: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p class='text-danger'>Invalid request.</p>";
}

mysqli_close($conn);
?>
