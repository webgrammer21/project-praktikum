<?php 
include '../koneksi.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../formLogin/index.php?pesan=belum_login");
    exit();
}

//Insert Proces
if (isset($_POST["submitinsert"])) {

    $name = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];

// Penanganan upload file
$eror= $_FILES['image']['error'] = 0;
$file_name = $_FILES['image']['name'];  // Nama file
$temp_name = $_FILES['image']['tmp_name'];  // Lokasi file sementara
$folder = '../assets/img/' . $file_name;  // Lokasi tujuan file   
if (move_uploaded_file($temp_name, $folder)) {
    // Jika file berhasil diupload, masukkan data ke database
    $query = "INSERT INTO menu (name, description, price, category_id, image) VALUES
    ('$name', '$deskripsi','$harga', '$kategori', '$file_name') ";

    if (mysqli_query($conn, $query)) {
        // Redirect jika sukses
        header("Location: index.php");
        exit;
    } else {
        echo "Error memasukkan data ke database: " . mysqli_error($conn);
    }
} else {
    echo "Gagal mengupload file gambar. $eror";
}
} 

//Edit Process

// if(isset($_POST['submitedit'])){
//     $id= $_GET['edit'];
//     $name = $_POST['nama'];
//     $harga = $_POST['harga'];
//     $deskripsi = $_POST['deskripsi'];
//     $kategori = $_POST['kategori'];

// // Penanganan upload file
// $eror= $_FILES['image']['error'] = 0;
// $file_name = $_FILES['image']['name'];  // Nama file
// $temp_name = $_FILES['image']['tmp_name'];  // Lokasi file sementara
// $folder = '../assets/img/' . $file_name;  // Lokasi tujuan file   
// // Cek apakah file berhasil diupload sebelum menyimpan ke database
// if (move_uploaded_file($temp_name, $folder)) {
//     // Jika file berhasil diupload, masukkan data ke database
//     $query = "UPDATE menu SET name = '$name', price = '$harga', description = '$deskripsi', category_id = '$kategori', image= '$file_name' WHERE id_menu ='$id' ";
 
//     if (mysqli_query($conn, $query)) {   
//         // Redirect jika sukses
//         header("Location: index.php?edit=editsukses");
//         exit;
//     } else {
//         echo "Error memasukkan data ke database: " . mysqli_error($conn);
//     }
// } else {
//     echo "Gagal mengupload file gambar. $eror";
// }
// } 
    


if (isset($_POST['submitedit'])) {
    $id = $_POST['id_menu'];
    $name = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];

    // Penanganan upload file
    $error = $_FILES['image']['error'];
    $file_name = $_FILES['image']['name']; //Nama file
    $temp_name = $_FILES['image']['tmp_name']; //Lokasi File Sementara
    $folder = '../assets/img/' . $file_name;

    // Cek apakah file berhasil diupload sebelum menyimpan ke database
    if ($error === 0 && move_uploaded_file($temp_name, $folder)) {
        // Jika file berhasil diupload, update data termasuk gambar
        $query = "UPDATE menu SET name = '$name', price = '$harga', description = '$deskripsi', category_id = '$kategori', image = '$file_name' WHERE id_menu = '$id'";
    } else {
        // Jika tidak ada file diupload 
        $query = "UPDATE menu SET name = '$name', price = '$harga', description = '$deskripsi', category_id = '$kategori' WHERE id_menu = '$id'";
    }

    if (mysqli_query($conn, $query)) {   
        // Redirect jika sukses
        header("Location: index.php?edit=editsukses");
        exit;
    } else {
        echo "Error memasukkan data ke database: " . mysqli_error($conn);
    }
}


// Delete Proces
if (isset($_GET['hapus'])){
    
    $id = $_GET['hapus'];  
    $query = "DELETE FROM menu WHERE id_menu = '$id'";

    if(mysqli_query($conn,$query)){
        header("Location: index.php?hapusberhasil");
    }else{
        header("Location: index.php?hapusgagal");
    }
}
?>


