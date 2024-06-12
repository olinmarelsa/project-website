<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
$produk = mysqli_query($conn, "SELECT * FROM tb_profil WHERE id = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>window.location="profil.php"</script>';
}
$p = mysqli_fetch_object($produk);
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
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h3 {
            text-align: center;
            background-color: #cce5ff;
            padding: 10px;
            border-radius: 5px;
            color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            color: #0056b3;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 6px;
            border: 1px solid #0056b3;
            border-radius: 5px;
            box-sizing: border-box;
            /* Mengatur padding agar tidak mempengaruhi lebar input */
        }

        .input-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #0056b3;
            border-radius: 5px;
        }

        .input-control[type="file"] {
            padding: 0;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Update Profil</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="input-control" placeholder="Nama Lengkap" value="<?php echo $p->nama_lengkap; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="input-control" required>
                    <option value="">--Pilih--</option>
                    <option value="1" <?php echo ($p->jenis_kelamin == 1) ? 'selected' : ''; ?>>Laki - laki</option>
                    <option value="0" <?php echo ($p->jenis_kelamin == 0) ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="input-control" placeholder="Tanggal Lahir" value="<?php echo $p->tanggal_lahir; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="input-control" placeholder="email" value="<?php echo $p->email; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor HP:</label>
                <input type="text" id="no_hp" name="no_hp" class="input-control" placeholder="no_hp" value="<?php echo $p->no_hp; ?>" required>
            </div>
            <div class="form-group">
                <label for="foto_profil">Foto Profil:</label>
                <img src="gambar/<?php echo $p->foto_profil; ?>" width="100px">
                <input type="hidden" name="foto" value="<?php echo $p->foto_profil; ?>">
                <input type="file" id="foto_profil" name="gambar" class="input-control">
            </div>
            <div class="form-group buttons">
                <input type="submit" name="submit" value="Submit" class="btn">
            </div>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama_lengkap'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
            $foto = $_POST['foto'];
            $filename = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $type1 = explode('.',  $filename);
            $type2 = $type1[1];
            $newname = 'gambar' . time() . '.' . $type2;
            $tipe_diizinkan = array('JPEG', 'JPG', 'png', 'gif');
            if ($filename != '') {
                if (!in_array($type2, $tipe_diizinkan)) {
                    echo '<script>alert("Format file tidak diizinkan")</script>';
                } else {
                    unlink('./gambar/' . $foto);
                    move_uploaded_file($tmp_name, './gambar/' . $newname);
                    $namagambar = $newname;
                }
            } else {
                $namagambar = $foto;
            }
            $update = mysqli_query($conn, "UPDATE tb_profil SET
                                        nama_lengkap= '" . $nama . "', 
                                        jenis_kelamin= '" . $jenis_kelamin . "',
                                        tanggal_lahir= '" . $tanggal_lahir . "',
                                        email= '" . $email . "',
                                        no_hp= '" . $no_hp . "',
                                        foto_profil= '" . $namagambar . "'
                                        WHERE id ='" . $p->id . "' ");
            if ($update) {
                echo '<script>alert("Update data Profil berhasil")</script>';
                echo '<script>window.location="profil.php"</script>';
            } else {
                echo 'gagal' . mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>

</html>