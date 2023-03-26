<?php

include "config/koneksi.php";

// Bagian Beranda
if ($_GET['module'] == 'beranda') {
    include"modules/beranda/beranda.php";
} else

// Bagian Grafik
if ($_GET['module'] == 'grafik') {
    include"modules/grafik/grafik.php";
} else

// Bagian HistoriPakan
if ($_GET['module'] == 'historipakan') {
    include"modules/historipakan/historipakan.php";
} else

// Bagian JenisPakan
if ($_GET['module'] == 'jenispakan') {
    include"modules/jenispakan/jenispakan.php";
} else


// Bagian Peramalan
if ($_GET['module'] == 'peramalan') {
    include"modules/peramalan/peramalan.php";
} else

// Bagian User
if ($_GET['module'] == 'user') {
    include"modules/user/user.php";
} else

// Apabila modul tidak ditemukan
 {
    echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
