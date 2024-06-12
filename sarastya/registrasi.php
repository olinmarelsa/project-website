<?php
include "koneksi.php";
if (isset($_POST['submit'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $upassword = mysqli_real_escape_string($conn, $_POST['password']);
    $role = $_POST['role'];

    $select = " SELECT * FROM tb_login WHERE username ='$username' && password ='$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'pengguna sudah ada';
    } else {
        if ($password != $upassword) {
            $error[] = 'password tidak cocok!';
        } else {
            $insert = "INSERT INTO tb_login(nama,username,password,role) VALUES ('$nama','$username','$password','$role')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pendaftaran</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Buat Akun Anda Sekarang</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };

            ?>
            <input type="text" name="nama" required placeholder="Masukkan Nama Anda">
            <input type="email" name="username" required placeholder="Masukkan Email Anda">
            <input type="password" name="password" required placeholder="Masukkan password Anda">
            <input type="password" name="upassword" required placeholder="Ulangi password Anda">
            <select name="role">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="registrasi sekarang" class="form-btn">
            <p>Sudah punya akun ? <a href="login_form.php">Login Sekarang</a></p>
        </form>
    </div>
</body>

</html>