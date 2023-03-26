<?php

session_start();

include "../../config/koneksi.php";


$module = $_GET['module'];
$act = $_GET['act'];

//echo $module;
//die();
// Hapus jenispakan
if ($module == 'user' AND $act == 'delete') {

    mysqli_query($koneksi, "DELETE FROM user WHERE id_pengguna='$_GET[id]'");
    header('location:../../module.php?module=' . $module);
}

// Input jenispakan
elseif ($module == 'user' AND $act == 'input') {
    $pass = md5($_POST[password]);
    mysqli_query($koneksi, "INSERT INTO user(username,password,level) VALUES('$_POST[username]','$pass','$_POST[level]')");
    header('location:../../module.php?module=' . $module);
}

// Update Kategori
elseif ($module == 'user' AND $act == 'update') {

    if (empty($_POST[password])) {
        mysqli_query($koneksi, "UPDATE user SET username = '$_POST[username]',level = '$_POST[level]' WHERE id_pengguna = '$_POST[id_pengguna]'");
    } else {
        $pass = md5($_POST[password]);

        mysqli_query($koneksi, "UPDATE user SET username = '$_POST[username]',password = '$pass',level = '$_POST[level]' WHERE id_pengguna = '$_POST[id_pengguna]'");
    }
    header('location:../../module.php?module=' . $module);
}
?>
