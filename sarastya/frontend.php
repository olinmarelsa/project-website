<?php
include "koneksi.php";
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login_form.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('img/logo.jpg');
        background-size: contain;
        /* Menyesuaikan ukuran gambar agar seluruhnya terlihat */
        background-repeat: no-repeat;
        /* Mencegah gambar diulang */
        background-position: center center;
        /* Menempatkan gambar di tengah secara horizontal dan vertikal */
        background-attachment: fixed;
        color: #333;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        overflow: hidden;
    }

    header {
        background-color: #3ABEF9;
        /* Menambahkan transparansi */
        padding: 20px 0;
    }

    header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h1 a {
        color: #fff;
        text-decoration: none;
    }

    header ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    header ul li {
        display: inline-block;
        margin-right: 20px;
    }

    header ul li a {
        color: #fff;
        /* Warna teks tombol */
        text-decoration: none;
        padding: 10px 20px;
        /* Padding tombol */
        background-color: #615EFC;
        /* Warna latar belakang tombol */
        border-radius: 5px;
        /* Sudut bulat tombol */
        transition: #7E8EF1;
        /* Transisi saat hover */
    }

    header ul li a:hover {
        background-color: #2A629A;
        /* Warna latar belakang tombol saat hover */
    }

    .section {
        padding: 50px 0;
        text-align: center;
        color: #fff;
    }

    .box {
        background-color: #80B9AD;
        /* Menambahkan transparansi */
        padding: 20px;
        border-radius: 5px;
    }

    .box h4 {
        margin: 0;
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #538392;
        /* Warna latar belakang footer */
        color: #fff;
        /* Warna teks di footer */
        padding: 20px 0;
        text-align: center;
    }

    footer p {
        line-height: 1.5;
        margin: 0;
    }
</style>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="frontend.php">Sarastya Technology</a></h1>
            <ul>
                <li><a href="frontend.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="pendaftaran.php">Daftar</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['user_name'] ?> Silahkan Mendaftar PKL di Sarastya Technology</h4>

            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p> Alamat: Jl. Trs.Candi Mendut No.9B, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142 <br>
                Telepon: (0341) 4351490 <br>
                Jam Buka: pukul 08.00-17.00 <br>
                Provinsi: Jawa Timur</p>
            <p>&copy; 2024 Sarastya Technology</p>
        </div>
    </footer>
</body>

</html>