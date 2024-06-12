<?php
include "koneksi.php";
session_start();
if (isset($_POST['submit'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $upassword = mysqli_real_escape_string($conn, $_POST['password']);
    $role = $_POST['role'];

    $select = " SELECT * FROM tb_login WHERE username ='$username' && password ='$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);
        $_SESSION['status_login'] = true;
        if ($row['role'] == 'admin') {

            $_SESSION['admin_name'] = $row['nama'];
            header('location:backend.php');
        } elseif ($row['role'] == 'user') {

            $_SESSION['user_name'] = $row['nama'];
            header('location:frontend.php');
        }
    } else {
        $error[] = 'username atau password salah';
    }
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Login ke Akun Anda Sekarang</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };

            ?>
            <input type="email" name="username" required placeholder="Masukkan Email Anda">
            <input type="password" name="password" required placeholder="Masukkan password Anda">
            <input type="submit" name="submit" value="login sekarang" class="form-btn">
            <p>Belum punya akun ? <a href="registrasi.php">Registrasi Sekarang</a></p>
        </form>
    </div>
</body>

</html>