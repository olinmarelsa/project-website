<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pendaftaran</title>
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
            background-color: rgba(58, 190, 249, 0.9);
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

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin-right: 20px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #615EFC;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        header nav ul li a:hover {
            background-color: #2A629A;
        }

        .section {
            padding: 50px 0;
            text-align: center;
        }

        .box {
            background-color: rgba(128, 185, 173, 0.9);
            padding: 20px;
            border-radius: 5px;
        }

        .box h4 {
            margin: 0 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .button {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #615EFC;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
            margin: 5px 0;
        }

        .button:hover {
            background-color: #2A629A;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="frontend.php">Sarastya Technology</a></h1>
            <nav>
                <ul>
                    <li><a href="frontend.php" class="button">Dashboard</a></li>
                    <li><a href="profil.php" class="button">Profil</a></li>
                    <li><a href="pendaftaran.php" class="button">Daftar</a></li>
                    <li><a href="keluar.php" class="button">Keluar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
                <p><a href="profil-tambah.php" class="button">Buat Profil</a></p>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Foto Profil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $profil = mysqli_query($conn, "SELECT * FROM tb_profil ORDER BY id DESC");
                        if (mysqli_num_rows($profil) > 0) {
                            while ($row = mysqli_fetch_array($profil)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                    <td><?php echo $row['jenis_kelamin'] == 0 ? 'Perempuan' : 'Laki - laki'; ?></td>
                                    <td><?php echo $row['tanggal_lahir']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['no_hp']; ?></td>
                                    <td><a href="gambar/<?php echo $row['foto_profil']; ?>" target="_blank"><img src="gambar/<?php echo $row['foto_profil']; ?>" width="50px"></a></td>
                                    <td>
                                        <a href="profil-edit.php?id=<?php echo $row['id']; ?>" class="button">Edit</a> ||
                                        <a href="proses-hapus.php?idp=<?php echo $row['id']; ?>" class="button" onclick="return confirm('Yakin ingin menghapus profil anda?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>