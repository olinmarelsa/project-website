<?php
include "koneksi.php";
// Pastikan Anda memiliki koneksi ke database di sini

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    // Proses penyimpanan foto profil
    $foto_profil = $_FILES['foto_profil']['name'];
    $lokasi_file = $_FILES['foto_profil']['tmp_name'];
    $folder = "gambar/";

    if (move_uploaded_file($lokasi_file, $folder . $foto_profil)) {
        // Syntax INSERT INTO
        $query = "INSERT INTO tb_profil (nama_lengkap, jenis_kelamin, tanggal_lahir, email, no_hp, foto_profil) 
                  VALUES ('$nama', '$jenis_kelamin', '$tanggal_lahir', '$email', '$no_hp', '$foto_profil')";
        
        // Eksekusi query
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect ke halaman profil.php
            header("Location: profil.php");
            exit(); // Penting untuk memastikan tidak ada output lain sebelum redirect
        } else {
            echo "Gagal menambahkan profil: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengupload foto.";
    }
}
?>
