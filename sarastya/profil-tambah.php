<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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

<body>
    <div class="container">
        <h2>Buat Profil</h2>
        <form action="pt.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label><br>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required><br><br>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label><br>
                    <select id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">--Pilih--</option>
                        <option value="1">Laki-laki</option>
                        <option value="0">Perempuan</option>
                    </select><br><br>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>
                        <div class="form-group">
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" required><br><br>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP:</label><br>
                                <input type="text" id="no_hp" name="no_hp" required><br><br>
                                <div class="form-group">
                                    <label for="foto_profil">Foto Profil:</label><br>
                                    <input type="file" id="foto_profil" name="foto_profil" accept="image/*" required><br><br>
                                    <div class="form-group buttons">
                                        <button type="submit" name="submit">Simpan</button>


        </form>
    </div>
</body>

</html>