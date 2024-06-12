<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    // var_dump($_FILES);
    if (empty($_FILES['foto_siswa'])) {
        session_start();
        $_SESSION['error'] = $_FILES == null;
        header("Location: pendaftaran.php");
    }

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    //menampung data file yang diupload 
    $filename = $_FILES['foto_siswa']['name'];
    $tmp_name = $_FILES['foto_siswa']['tmp_name'];

    $type1 = explode('.',  $filename);
    $type2 = $type1[1];

    $newname = 'gambar' . time() . '.' . $type2;

    //menampung data format file yang diizinkan 
    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    //validasi format file
    if (!in_array($type2, $tipe_diizinkan)) {
        //jika format file tidak ada di dalam tipe diizinkan 
        echo '<script>alert("Format file tidak diizinkan")</script>';
    } else {
        //jika format file sesuai dengan yang ada di dalam array for tipe diizinkan
        //proses upload file sekaligus insert ke database
        move_uploaded_file($tmp_name, './gambar/' . $newname);

        $sql = "INSERT INTO siswa VALUES(0, '$nama', '$alamat', '$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$asal_sekolah','$newname','$kelas','$jurusan','$email','$no_hp')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            session_start();
            $_SESSION['siswa'] = $_POST;
            $_SESSION['berhasil'] = "Form berhasil terkirim!";
            echo "<script>
            var siswa = " . json_encode($_SESSION['siswa']) . ";
            var message = 'Form berhasil terkirim:\\n';
            for (var key in siswa) {
                if (siswa.hasOwnProperty(key)) {
                    message += key + ': ' + siswa[key] + '\\n';
                }
            }
            alert(message);
            window.location.href = 'frontend.php';
        </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
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

        h2 {
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

        .form-group input[type="file"] {
            padding: 0;
        }

        .form-group .buttons {
            display: flex;
            justify-content: space-between;
        }

        .form-group button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .form-group .gender {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form action="pendaftaran.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <div class="gender">
                    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label> <br>
                    <p></p>
                    <label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah:</label>
                <input type="text" id="asal_sekolah" name="asal_sekolah" required>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" id="kelas" name="kelas" required>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" id="no_hp" name="no_hp" required>
            </div>
            <div class="form-group">
                <label for="foto_siswa">Foto Siswa:</label>
                <input type="file" id="foto_siswa" name="foto_siswa" required>
            </div>
            <div class="form-group buttons">
                <button type="submit" name="submit">Daftar</button>
                <button type="reset">Isi Ulang</button>
            </div>
        </form>
    </div>
</body>

</html>