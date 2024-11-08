<?php if (isset($_POST["submitInsertKandidat"])) {
    $nomorKandidat = $_POST["nomorKandidat"];
    $namaKandidat = $_POST["namaKandidat"];
    $tanggalLahir = $_POST["tanggalLahir"];
    $asalKandidat = $_POST["asalKandidat"];
    $deskripsiKandidat = $_POST["deskripsiKandidat"];

    // Penanganan upload file
    $file_name = $_FILES['fotoKandidat']['name'];  // Nama file
    $temp_name = $_FILES['fotoKandidat']['tmp_name'];  // Lokasi file sementara
    $folder = 'img/' . $file_name;  // Lokasi tujuan file

    // Cek apakah file berhasil diupload sebelum menyimpan ke database
    if (move_uploaded_file($temp_name, $folder)) {
        // Jika file berhasil diupload, masukkan data ke database
        $query = "INSERT INTO kandidat (nomorKandidat, namaKandidat, tanggalLahir, asalKandidat, deskripsiKandidat, fotoKandidat) 
                  VALUES ('$nomorKandidat', '$namaKandidat', '$tanggalLahir', '$asalKandidat', '$deskripsiKandidat', '$file_name')";

        if (mysqli_query($koneksi, $query)) {
            // Redirect jika sukses
            header("Location: admin/dataKandidat.php?insertSukses=true");
            exit;
        } else {
            echo "Error memasukkan data ke database: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengupload file gambar.";
    }
}?>