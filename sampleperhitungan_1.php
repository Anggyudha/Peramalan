
<?php

echo '<pre>';
$x[1] = 11305;
$x[2] = 11355;
$x[3] = 11340;
$x[4] = 11365;
$x[5] = 11320;
$x[6] = 11325;
$x[7] = 11310;
$x[8] = 11345;
$x[9] = 11330;
$x[10] = 11335;
$x[11] = 11355;
$x[12] = 11320;



$n = count($x);
$alpha = 2 / ($n + 1);

foreach ($x as $key => $value) {
    if ($key == 1) {
        $sa[$key] = $x[$key];
        $saa[$key] = $x[$key];
        $a[$key] = 0;
        $b[$key] = 0;
        $f[$key] = 0;
    } else {
        $sa[$key] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key - 1)]);
        $saa[$key] = ($alpha * $sa[$key]) + ((1 - $alpha) * $saa[($key - 1)]);
        $a[$key] = (2 * $sa[$key]) - $saa[$key];
        $b[$key] = (($alpha) / (1 - $alpha)) * ($sa[$key] - $saa[$key]);
        if ($key == 2) {
            $f[$key] = 0;
        } else {
            $f[$key] = $a[$key] + $b[$key];
        }
    }
}

$f[$key+1] = $a[$key] + ($b[$key] * 1);
$f[$key+2] = $a[$key] + ($b[$key] * 2);



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
