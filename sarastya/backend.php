<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
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
            <h1><a href="backend.php">Sarastya Technology</a></h1>
            <nav>
                <ul>
                    <li><a href="backend.php">Riwayat Pendaftaran</a></li>
                    <li><a href="keluar.php">Keluar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Riwayat Pendaftaran</h3>
            <div class="box">
                <table>
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Asal Sekolah</th>
                            <th>Foto Siswa</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT * FROM siswa ");
                        if (mysqli_num_rows($produk) > 0) {
                            while ($row = mysqli_fetch_array($produk)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['alamat'] ?></td>
                                    <td><?php echo $row['jenis_kelamin'] ?></td>
                                    <td><?php echo $row['tempat_lahir'] ?></td>
                                    <td><?php echo $row['tanggal_lahir'] ?></td>
                                    <td><?php echo $row['asal_sekolah'] ?></td>
                                    <td><a href="gambar/<?php echo $row['foto_siswa'] ?>" target="_blank"><img src="gambar/<?php echo $row['foto_siswa'] ?>" width="50px"></td>
                                    <td><?php echo $row['kelas'] ?></td>
                                    <td><?php echo $row['jurusan'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['no_hp'] ?></td>
                                    <td>
                                        <a href="proses-hapus.php?ida=<?php echo $row['id']; ?>" class="button" onclick="return confirm('Yakin ingin menghapus riwayat ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="13">Tidak ada data</td>

                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['admin_name'] ?> Silahkan Melihat Riwayat SIswa yang mendaftar PKL di Sarastya Technology</h4>
            </div>
        </div>
    </div>
</body>

</html>