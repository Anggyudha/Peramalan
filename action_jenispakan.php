<?php
session_start();

include "../../config/koneksi.php";


$module=$_GET['module'];
$act=$_GET['act'];

//echo $module;
//die();
// Hapus jenispakan
if ($module=='jenispakan' AND $act=='delete'){
  
  mysqli_query($koneksi,"DELETE FROM jenis_pakan WHERE id_jenis='$_GET[id]'");
  header('location:../../module.php?module='.$module);
 
}

// Input jenispakan
elseif ($module=='jenispakan' AND $act=='input'){
  
  mysqli_query($koneksi,"INSERT INTO jenis_pakan(jenis_pakan,harga) VALUES('$_POST[jenis_pakan]','$_POST[harga]')");
  header('location:../../module.php?module='.$module);
}

// Update Kategori
elseif ($module=='jenispakan' AND $act=='update'){
  
  mysqli_query($koneksi,"UPDATE jenis_pakan SET jenis_pakan = '$_POST[jenis_pakan]',harga = '$_POST[harga]' WHERE id_jenis = '$_POST[id_jenis]'");
  header('location:../../module.php?module='.$module);
}
?>
