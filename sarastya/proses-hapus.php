<?php

include 'koneksi.php';
if(isset($_GET['idp'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_profil WHERE id = '".$_GET['idp']."' ");
    echo '<script>window.location="profil.php"</script>';
}
if(isset($_GET['ida'])) {
    $delete = mysqli_query($conn, "DELETE FROM siswa WHERE id = '".$_GET['ida']."' ");
    echo '<script>window.location="backend.php"</script>';
}
?>