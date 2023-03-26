<?php

session_start();

include "../../config/koneksi.php";


$module = $_GET['module'];
$act = $_GET['act'];

//echo $module;
//die();
// Input
if ($module == 'historipakan' AND $act == 'input') {

    mysqli_query($koneksi, "INSERT INTO histori_pakan(id_jenis,id_minggu,jumlah,tahun) VALUES('$_POST[id_jenis]','$_POST[id_minggu]','$_POST[jumlah]','$_POST[tahun]')");
    header('location:../../module.php?module=' . $module);
}
// Hapus
elseif ($module == 'historipakan' AND $act == 'delete') {

    mysqli_query($koneksi, "DELETE FROM histori_pakan WHERE id_histori='$_GET[id]'");
    header('location:../../module.php?module=' . $module);
}
// Update
elseif ($module == 'historipakan' AND $act == 'update') {

    mysqli_query($koneksi, "UPDATE histori_pakan SET id_jenis = '$_POST[id_jenis]',jumlah = '$_POST[jumlah]',tahun = '$_POST[tahun]',id_minggu = '$_POST[id_minggu]' WHERE id_histori = '$_POST[id_histori]'");
    header('location:../../module.php?module=' . $module);
}

elseif ($module == 'historipakan' AND $act == 'in') {

    mysqli_query($koneksi, "INSERT INTO data_minggu(tanggal,minggu) VALUES('$_POST[tanggal]','$_POST[minggu]')");
    header('location:../../module.php?module=' . $module);
}
elseif ($module == 'historipakan' AND $act == 'del') {

    mysqli_query($koneksi, "DELETE FROM data_minggu WHERE id_minggu='$_GET[id]'");
    header('location:../../module.php?module=' . $module);
}
elseif ($module == 'historipakan' AND $act == 'up') {

    mysqli_query($koneksi, "UPDATE data_minggu SET tanggal = '$_POST[tanggal]',minggu = '$_POST[minggu]' WHERE id_minggu = '$_POST[id_minggu]'");
    header('location:../../module.php?module=' . $module);
}
?>
