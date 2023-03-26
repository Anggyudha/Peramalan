
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
    } else {
        $sa[$key] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key - 1)]);
       
    }
}
foreach ($x as $key => $value) {
            if ($key <= 1) {
                $mad[$key] = 0;
            } else {
                $mad[$key] = ($value - $sa[$key])/$n;
            }
            $mape[$key] = ($mad[$key] / $value) * 100;
            $smse +=$mape[$key];
        }

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
echo 'Data mad';
echo '<br>';
print_r($mad);

echo '<br>';
echo '<br>';
echo 'Data mape';
echo '<br>';
print_r($mape);