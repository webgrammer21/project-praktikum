<?php 
include '../koneksi.php';


if (isset($_POST["submit"])) {

    $name = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];

// Penanganan upload file
$file_name = $_FILES['image']['name'];  // Nama file
$temp_name = $_FILES['image']['tmp_name'];  // Lokasi file sementara
$folder = 'assets/img/' . $file_name;  // Lokasi tujuan file

// Cek apakah file berhasil diupload sebelum menyimpan ke database
if (move_uploaded_file($temp_name, $folder)) {
    // Jika file berhasil diupload, masukkan data ke database
    $query = "INSERT INTO menu (name, description, price, category_id, image) VALUES
    ('$name', $harga, '$deskripsi', $kategori, '$file_name') ";

    if (mysqli_query($conn, $query)) {
        // Redirect jika sukses
        header("Location: menu_admin.php");
        exit;
    } else {
        echo "Error memasukkan data ke database: " . mysqli_error($conn);
    }
} else {
    echo "Gagal mengupload file gambar.";
}
} ?>