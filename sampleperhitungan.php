
<?php

echo '<pre>';
$x[1] = 3885;
$x[2] = 3900;
$x[3] = 3905;
$x[4] = 3885;
$x[5] = 3891;
$x[6] = 3899;
$x[7] = 3887;
$x[8] = 3885;
$x[9] = 3904;
$x[10] = 3930;
$x[11] = 3897;
$x[12] = 3893;

$n = 12;
$alpha = 2 / ($n + 1);
//t=1
$sa[1] = $x[1];
$saa[1] = $x[1];
$a[1] = 0;
$b[1] = 0;
$f[1] = 0;
//t=2
$sa[2] = ($alpha * $x[2]) + ((1 - $alpha) * $sa[1]);
$saa[2] = ($alpha * $sa[2]) + ((1 - $alpha) * $saa[1]);
$a[2] = (2 * $sa[2]) - $saa[2];
$b[2] = (($alpha) / (1 - $alpha)) * ($sa[2] - $saa[2]);
$f[2] = 0;
//t=3
$sa[3] = ($alpha * $x[3]) + ((1 - $alpha) * $sa[2]);
$saa[3] = ($alpha * $sa[3]) + ((1 - $alpha) * $saa[2]);
$a[3] = (2 * $sa[3]) - $saa[3];
$b[3] = (($alpha) / (1 - $alpha)) * ($sa[3] - $saa[3]);
$f[3] = $a[3] + $b[3];
//t=4
$sa[4] = ($alpha * $x[4]) + ((1 - $alpha) * $sa[3]);
$saa[4] = ($alpha * $sa[4]) + ((1 - $alpha) * $saa[3]);
$a[4] = (2 * $sa[4]) - $saa[4];
$b[4] = (($alpha) / (1 - $alpha)) * ($sa[4] - $saa[4]);
$f[4] = $a[4] + $b[4];
//t=5
$sa[5] = ($alpha * $x[5]) + ((1 - $alpha) * $sa[4]);
$saa[5] = ($alpha * $sa[5]) + ((1 - $alpha) * $saa[4]);
$a[5] = (2 * $sa[5]) - $saa[5];
$b[5] = (($alpha) / (1 - $alpha)) * ($sa[5] - $saa[5]);
$f[5] = $a[5] + $b[5];
//t=6
$sa[6] = ($alpha * $x[6]) + ((1 - $alpha) * $sa[5]);
$saa[6] = ($alpha * $sa[6]) + ((1 - $alpha) * $saa[5]);
$a[6] = (2 * $sa[6]) - $saa[6];
$b[6] = (($alpha) / (1 - $alpha)) * ($sa[6] - $saa[6]);
$f[6] = $a[6] + $b[6];
//t=7
$sa[7] = ($alpha * $x[7]) + ((1 - $alpha) * $sa[6]);
$saa[7] = ($alpha * $sa[7]) + ((1 - $alpha) * $saa[6]);
$a[7] = (2 * $sa[7]) - $saa[7];
$b[7] = (($alpha) / (1 - $alpha)) * ($sa[7] - $saa[7]);
$f[7] = $a[7] + $b[7];
//t=8
$sa[8] = ($alpha * $x[8]) + ((1 - $alpha) * $sa[7]);
$saa[8] = ($alpha * $sa[8]) + ((1 - $alpha) * $saa[7]);
$a[8] = (2 * $sa[8]) - $saa[8];
$b[8] = (($alpha) / (1 - $alpha)) * ($sa[8] - $saa[8]);
$f[8] = $a[8] + $b[8];
//t=9
$sa[9] = ($alpha * $x[9]) + ((1 - $alpha) * $sa[8]);
$saa[9] = ($alpha * $sa[9]) + ((1 - $alpha) * $saa[8]);
$a[9] = (2 * $sa[9]) - $saa[9];
$b[9] = (($alpha) / (1 - $alpha)) * ($sa[9] - $saa[9]);
$f[9] = $a[9] + $b[9];
//t=10
$sa[10] = ($alpha * $x[10]) + ((1 - $alpha) * $sa[9]);
$saa[10] = ($alpha * $sa[10]) + ((1 - $alpha) * $saa[9]);
$a[10] = (2 * $sa[10]) - $saa[10];
$b[10] = (($alpha) / (1 - $alpha)) * ($sa[10] - $saa[10]);
$f[10] = $a[10] + $b[10];
//t=11
$sa[11] = ($alpha * $x[11]) + ((1 - $alpha) * $sa[10]);
$saa[11] = ($alpha * $sa[11]) + ((1 - $alpha) * $saa[10]);
$a[11] = (2 * $sa[11]) - $saa[11];
$b[11] = (($alpha) / (1 - $alpha)) * ($sa[11] - $saa[11]);
$f[11] = $a[11] + $b[11];
//t=12
$sa[12] = ($alpha * $x[12]) + ((1 - $alpha) * $sa[11]);
$saa[12] = ($alpha * $sa[12]) + ((1 - $alpha) * $saa[11]);
$a[12] = (2 * $sa[12]) - $saa[12];
$b[12] = (($alpha) / (1 - $alpha)) * ($sa[12] - $saa[12]);
$f[12] = $a[12] + $b[12];



$f[13] = $a[12] + ($b[12] * 1);
$f[14] = $a[12] + ($b[12] * 2);



echo 'Data X';
echo '<br>';
print_r($x);

echo 'Data n';
echo '<br>';
print_r($n);

echo '<br>';
echo '<br>';
echo 'Data sa';
echo '<br>';
print_r($sa);

echo '<br>';
echo '<br>';
echo 'Data saa';
echo '<br>';
print_r($saa);

echo '<br>';
echo '<br>';
echo 'Data a';
echo '<br>';
print_r($a);

echo '<br>';
echo '<br>';
echo 'Data b';
echo '<br>';
print_r($b);

echo '<br>';
echo '<br>';
echo 'Data f';
echo '<br>';
print_r($f);
