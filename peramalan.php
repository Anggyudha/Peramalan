<?php
$aksi = "modules/jenispakan/action_jenispakan.php";
$act = $_GET['act'];
switch ($act) {
    default:
        ?>


        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Lihat Hasil Peramalan</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" >
                                            <div class="form-group ">
                                                <label for="jumlah" class="control-label col-lg-2">Pilih Jenis Pakan</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="id" required>
                                                        <option value="">---Pilih Jenis---</option>
                                                        <?php
                                                        $tampil = mysqli_query($koneksi, "SELECT * FROM jenis_pakan ORDER BY jenis_pakan DESC");

                                                        while ($r = mysqli_fetch_array($tampil)) {
                                                            ?>
                                                            <option value="<?php echo $r['id_jenis']; ?>"><?php echo $r['jenis_pakan']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <input type="hidden" name="module" value="peramalan">
                                            <input type="hidden" name="act" value="perbandingan">

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Ramalkan</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /form-panel -->
                            </div>

                            <!-- /col-lg-12 -->
                        </div>
                    </div>

                </div>
            </section>
        </section>
        <?php
        break;
    case "detail_ses":
        $edit = mysqli_query($koneksi, "SELECT * FROM jenis_pakan WHERE id_jenis='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
//        echo '<pre>';

        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis='$_GET[id]' ORDER BY tahun,minggu ASC");
        $no = 1;
        $d = array();
        $t = array();

        while ($rx = mysqli_fetch_array($query)) {
            $x[$no] = $rx['jumlah'];
//            echo '<br>' . $rx['tahun'] . '=' . $rx['jumlah'];
            array_push($d, $rx['jumlah']);
            //array_push($t, $no);
            $no++;
        }




        $n = count($x);
        $alpha = 2 / ($n + 1);
        $s = array();
        $pangkat = 2;
        foreach ($x as $key => $value) {
            if ($key == 1) {
                $sa[$key] = $x[$key];
            } else {
                $sa[$key] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key - 1)]);
            }

            array_push($s, $sa[$key]);
        }

        $sa[$key + 1] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key)]);
        //$sa[$key + 2] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key + 1)]);

        array_push($s, $sa[$key] + 1);
        //array_push($s, $sa[$key] + 2);

        //array_push($t, $key + 1);
        //array_push($t, $key + 2);

        $smse = 0;
        foreach ($x as $key => $value) {
            if ($key <= 1) {
                $mad[$key] = 0;
                $mse[$key] = 0;
            } else {
                $mad[$key] = abs($value - $sa[$key]);
                $mse[$key] = pow($value - $sa[$key], $pangkat);
            }

            $mape[$key] = ($mad[$key] / $value) * 100;
        }

//
//        echo 'Data X';
//        echo '<br>';
//        print_r($x);
//
//        echo 'Data n';
//        echo '<br>';
//        print_r($n);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data sa';
//        echo '<br>';
//        print_r($sa);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data saa';
//        echo '<br>';
//        print_r($saa);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data a';
//        echo '<br>';
//        print_r($a);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data b';
//        echo '<br>';
//        print_r($b);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data f';
//        echo '<br>';
//        print_r($f);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAE';
//        echo '<br>';
//        print_r($mae);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAD';
//        echo '<br>';
//        print_r($mad);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAPE';
//        echo '<br>';
//        print_r($mape);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MSE';
//        echo '<br>';
//        print_r($mse);
//        echo '</pre>';
        ?>
        <?php
//echo '<pre>';
        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis = '$_GET[id]' ORDER BY tahun,minggu ASC");

        $t = array();
        while ($tx = mysqli_fetch_array($query)) {

            array_push($t, $tx['minggu']);

//    echo ',' . $no++;
        }
        array_push($t, $tx['minggu'] + 1);
        //array_push($t, $tx['minggu'] + 2);
        //array_push($t, $key + 1);
        //array_push($t, $key + 2);
//echo '<pre>';
////print_r(json_encode($x));
//echo '<br>';
//print_r(json_encode($t));
//echo '</pre>';
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Peramalan Single Exponential <?= $r['jenis_pakan'] ?></h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">
                            <a type="button" class="btn btn-theme" href="?module=peramalan&act=perbandingan&id=<?= $_GET[id] ?>"> Kembali</a>

                        </div>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">t.</th>
                                            <th>X</th>
                                            <th>S'</th>
                                            <th>MAD</th>
                                            <th>MSE</th>
                                            <th>MAPE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($x as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?= $key ?></td>
                                                <td><?= $value ?></td>
                                                <td><?= $sa[$key] ?></td>
                                                <td><?= $mad[$key] ?></td>
                                                <td><?= $mse[$key] ?></td>
                                                <td><?= $mape[$key] ?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Peramalan Periode 1</th>

                                            <th><?= $sa[$key + 1] ?></th>
                                        </tr>
                                        
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="content-panel">

                            <!--/flot-chart -->

                            <div class="tab-pane" id="chartjs">
                                <div class="row mt">
                                    <div class="col-lg-12">
                                        <div>
                                            <span style="width: 200px" class="badge bg-theme">Data Aktual</span>
                                        </div>
                                        <div>
                                            <span style="width: 200px" class="badge bg-warning">Data Hasil Peramalan</span>
                                        </div>
                                        <div class="content-panel">
                                            <h4><i class="fa fa-angle-right"></i> Grafik</h4>
                                            <div class="panel-body text-center">
                                                <canvas id="line2" height="300" width="1000"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <script src="lib/chart-master/Chart.js"></script>

        <script>
            var Script = function () {
                var lineChartData2 = {
                    labels: <?= json_encode($t) ?>,
                    datasets: [
                        {
                            fillColor: "rgba(78, 205, 196, 0.5)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($d)) ?>
                        },
                        {
                            fillColor: "rgba(252, 179, 34, 0.5)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($s)) ?>
                        }
                    ]

                };
                new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData2);
            }();
        </script>
        <?php
        break;

    case "detail_des":
        $edit = mysqli_query($koneksi, "SELECT * FROM jenis_pakan WHERE id_jenis='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
//        echo '<pre>';

        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis='$_GET[id]' ORDER BY tahun,minggu ASC");
        $no = 1;
        $d = array();
        $t = array();

        while ($rx = mysqli_fetch_array($query)) {
            $x[$no] = $rx['jumlah'];
//            echo '<br>' . $rx['tahun'] . '=' . $rx['jumlah'];
            array_push($d, $rx['jumlah']);
            //array_push($t, $no);
            $no++;
        }




        $n = count($x);
        $alpha = 2 / ($n + 1);
        $p = array();
        $pangkat = 2;
        foreach ($x as $key => $value) {
            if ($key == 1) {
                $sa[$key] = $x[$key];
                $saa[$key] = $x[$key];
                $a[$key] = 0;
                $b[$key] = 0;
                $f[$key] = 0;
                array_push($p, $x[$key]);
            } else {
                $sa[$key] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key - 1)]);
                $saa[$key] = ($alpha * $sa[$key]) + ((1 - $alpha) * $saa[($key - 1)]);
                $a[$key] = (2 * $sa[$key]) - $saa[$key];
                $b[$key] = (($alpha) / (1 - $alpha)) * ($sa[$key] - $saa[$key]);
                if ($key == 2) {
                    $f[$key] = 0;
                    array_push($p, $x[$key]);
                } else {
                    $f[$key] = $a[$key-1] + $b[$key-1];
                    array_push($p, $f[$key]);
                }
            }
        }

        $f[$key + 1] = $a[$key-1] + ($b[$key-1]);
        //$f[$key + 2] = $a[$key] + ($b[$key] * 2);
        array_push($p, $f[$key] + 1);
        //array_push($p, $f[$key] + 2);

        //array_push($t, $key + 1);
        //array_push($t, $key + 2);

        $smse = 0;
        foreach ($x as $key => $value) {
            if ($key <= 2) {
                $mad[$key] = 0;
                $mse[$key] = 0;
            } else {
                $mad[$key] = abs($value - $f[$key]);
                $mse[$key] = pow(($value - $f[$key]), $pangkat);
            }

            $mape[$key] = ($mad[$key] / $value) * 100;
        }
//
//        echo 'Data X';
//        echo '<br>';
//        print_r($x);
//
//        echo 'Data n';
//        echo '<br>';
//        print_r($n);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data sa';
//        echo '<br>';
//        print_r($sa);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data saa';
//        echo '<br>';
//        print_r($saa);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data a';
//        echo '<br>';
//        print_r($a);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data b';
//        echo '<br>';
//        print_r($b);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data f';
//        echo '<br>';
//        print_r($f);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAE';
//        echo '<br>';
//        print_r($mae);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAD';
//        echo '<br>';
//        print_r($mad);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAPE';
//        echo '<br>';
//        print_r($mape);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MSE';
//        echo '<br>';
//        print_r($mse);
//        echo '</pre>';
        ?>
        <?php
//echo '<pre>';
        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis = '$_GET[id]' ORDER BY tahun,minggu ASC");

        $t = array();
        while ($tx = mysqli_fetch_array($query)) {

            array_push($t, $tx['minggu']);

//    echo ',' . $no++;
        }
        array_push($t, $tx['minggu'] + 1);
        //array_push($t, $tx['minggu'] + 2);
        //array_push($t, $key + 1);
        //array_push($t, $key + 2);
//echo '<pre>';
////print_r(json_encode($x));
//echo '<br>';
//print_r(json_encode($t));
//echo '</pre>';
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Peramalan Double Exponential <?= $r['jenis_pakan'] ?></h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">
                            <a type="button" class="btn btn-theme" href="?module=peramalan&act=perbandingan&id=<?= $_GET[id] ?>"> Kembali</a>

                        </div>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">t.</th>
                                            <th>X</th>
                                            <th>S'</th>
                                            <th>S"</th>
                                            <th>a</th>
                                            <th>b</th>
                                            <th>f</th>
                                            <th>MAD</th>
                                            <th>MSE</th>
                                            <th>MAPE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($x as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?= $key ?></td>
                                                <td><?= $value ?></td>
                                                <td><?= $sa[$key] ?></td>
                                                <td><?= $saa[$key] ?></td>
                                                <td><?= $a[$key] ?></td>
                                                <td><?= $b[$key] ?></td>
                                                <td><?= $f[$key] ?></td>
                                                <td><?= $mad[$key] ?></td>
                                                <td><?= $mse[$key] ?></td>
                                                <td><?= $mape[$key] ?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th colspan="6">Peramalan Periode 1</th>

                                            <th><?= $f[$key + 1] ?></th>
                                        </tr>
                                        
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="content-panel">

                            <!--/flot-chart -->

                            <div class="tab-pane" id="chartjs">
                                <div class="row mt">
                                    <div class="col-lg-12">
                                        <div>
                                            <span style="width: 200px" class="badge bg-theme">Data Aktual</span>
                                        </div>
                                        <div>
                                            <span style="width: 200px" class="badge bg-warning">Data Hasil Peramalan</span>
                                        </div>
                                        <div class="content-panel">
                                            <h4><i class="fa fa-angle-right"></i> Grafik</h4>
                                            <div class="panel-body text-center">
                                                <canvas id="line2" height="300" width="1000"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <script src="lib/chart-master/Chart.js"></script>

        <script>
            var Script = function () {
                var lineChartData2 = {
                    labels: <?= json_encode($t) ?>,
                    datasets: [
                        {
                            fillColor: "rgba(78, 205, 196, 0.5)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($d)) ?>
                        },
                        {
                            fillColor: "rgba(252, 179, 34, 0.5)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($p)) ?>
                        }
                    ]

                };
                new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData2);
            }();
        </script>
        <?php
        break;

    case "perbandingan":
        $edit = mysqli_query($koneksi, "SELECT * FROM jenis_pakan WHERE id_jenis='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
//        echo '<pre>';

        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis='$_GET[id]' ORDER BY tahun,minggu ASC");
        $no = 1;
        $d = array();
        //$t = array();

        while ($rx = mysqli_fetch_array($query)) {
            $x[$no] = $rx['jumlah'];
//            echo '<br>' . $rx['tahun'] . '=' . $rx['jumlah'];
            array_push($d, $rx['jumlah']);
            //array_push($t, $no);
            $no++;
        }




        $n = count($x);
        $alpha = 2 / ($n + 1);
        $p = array();
        $s = array();
        $pangkat = 2;
        foreach ($x as $key => $value) {
            if ($key == 1) {
                $sa[$key] = $x[$key];
                $saa[$key] = $x[$key];
                $a[$key] = 0;
                $b[$key] = 0;
                $f[$key] = 0;
                array_push($p, $x[$key]);
            } else {
                $sa[$key] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key - 1)]);
                $saa[$key] = ($alpha * $sa[$key]) + ((1 - $alpha) * $saa[($key - 1)]);
                $a[$key] = (2 * $sa[$key]) - $saa[$key];
                $b[$key] = (($alpha) / (1 - $alpha)) * ($sa[$key] - $saa[$key]);
                if ($key == 2) {
                    $f[$key] = 0;
                    array_push($p, $x[$key]);
                } else {
                    $f[$key] = $a[$key-1] + $b[$key-1];
                    array_push($p, $f[$key]);
                }
            }
//            array_push($p, $f[$key]);

            array_push($s, $sa[$key]);
        }

        $sa[$key + 1] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key)]);
        //$sa[$key + 2] = ($alpha * $x[$key]) + ((1 - $alpha) * $sa[($key + 1)]);


        $f[$key + 1] = $a[$key-1] + ($b[$key-1]);
        //$f[$key + 2] = $a[$key] + ($b[$key] * 2);

        //array_push($t, $key + 1);
        //array_push($t, $key + 2);

        array_push($s, $sa[$key] + 1);
        //array_push($s, $sa[$key] + 2);

        array_push($p, $f[$key] + 1);
        //array_push($p, $f[$key] + 2);


        $smse = 0;
        foreach ($x as $key => $value) {
            if ($key <= 2) {
                $mad[$key] = 0;
                $mse[$key] = 0;
            } else {
                $mad[$key] = abs($value - $f[$key]) / $n;
                $mse[$key] = pow($value - $f[$key], $pangkat) / $n;
            }

            $mape[$key] = ($mad[$key] / $value) * 100;
        }
//
//        echo 'Data X';
//        echo '<br>';
//        print_r($x);
//
//        echo 'Data n';
//        echo '<br>';
//        print_r($n);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data sa';
//        echo '<br>';
//        print_r($sa);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data saa';
//        echo '<br>';
//        print_r($saa);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data a';
//        echo '<br>';
//        print_r($a);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data b';
//        echo '<br>';
//        print_r($b);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data f';
//        echo '<br>';
//        print_r($f);
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAE';
//        echo '<br>';
//        print_r($mae);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAD';
//        echo '<br>';
//        print_r($mad);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MAPE';
//        echo '<br>';
//        print_r($mape);
//
//
//        echo '<br>';
//        echo '<br>';
//        echo 'Data MSE';
//        echo '<br>';
//        print_r($mse);
//        echo '</pre>';
        ?>
        <?php
//echo '<pre>';
        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis = '$_GET[id]' ORDER BY tahun,minggu ASC");

        $t = array();
        while ($tx = mysqli_fetch_array($query)) {

            array_push($t, $tx['minggu']);

//    echo ',' . $no++;
        }
        array_push($t, $tx['minggu'] + 1);
        //array_push($t, $tx['minggu'] + 2);
        //array_push($t, $key + 1);
        //array_push($t, $key + 2);
//echo '<pre>';
////print_r(json_encode($x));
//echo '<br>';
//print_r(json_encode($t));
//echo '</pre>';
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Peramalan <?= $r['jenis_pakan'] ?></h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">
                            <a type="button" class="btn btn-theme" href="?module=peramalan"> Kembali</a>

                        </div>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">Periode</th>
                                            <th>Data Aktual (Kg)</th>
                                            <th>Peramalan Single Exponential (Kg)</th>
                                            <th>Peramalan Double Exponential (Kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($x as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?= $key ?></td>
                                                <td><?= $value ?></td>
                                                <td><?= $sa[$key] ?></td>
                                                <td><?= $f[$key] ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Peramalan Periode 1</th>

                                            <th><?= $sa[$key + 1] ?></th>
                                            <th><?= $f[$key + 1] ?></th>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2" style="width: 100px"></td>
                                            <td> 
                                                <a type="button" class="btn btn-theme02" href="?module=peramalan&act=detail_ses&id=<?= $_GET[id] ?>"><i class="fa fa-check"></i> Detail</a>
                                            </td>
                                            <td> 
                                                <a type="button" class="btn btn-theme02" href="?module=peramalan&act=detail_des&id=<?= $_GET[id] ?>"><i class="fa fa-check"></i> Detail</a>
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                        <div class="content-panel">

                            <!--/flot-chart -->

                            <div class="tab-pane" id="chartjs">
                                <div class="row mt">
                                    <div class="col-lg-12">
                                        <div>
                                            <span style="width: 200px" class="badge bg-theme">Data Aktual</span>
                                        </div>
                                        <div>
                                            <span style="width: 200px" class="badge bg-warning">Peramalan Double Exponential</span>
                                        </div>
                                        <div>
                                            <span style="width: 200px" class="badge bg-important">Peramalan Single Exponential</span>
                                        </div>
                                        <div class="content-panel">
                                            <h4><i class="fa fa-angle-right"></i> Grafik</h4>
                                            <div class="panel-body text-center">
                                                <canvas id="line2" height="300" width="1000"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <script src="lib/chart-master/Chart.js"></script>

        <script>
            var Script = function () {
                var lineChartData2 = {
                    labels: <?= json_encode($t) ?>,
                    datasets: [
                        {
                            fillColor: "rgba(78, 205, 196, 0.5)",
                            strokeColor: "rgba(78, 205, 196,1)",
                            pointColor: "rgba(78, 205, 196,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($d)) ?>
                        },
                        {
                            fillColor: "rgba(252, 179, 34, 0.5)",
                            strokeColor: "rgba(252, 179, 34,1)",
                            pointColor: "rgba(252, 179, 34,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($p)) ?>
                        },
                        {
                            fillColor: "rgba(255, 108, 96, 0.5)",
                            strokeColor: "rgba(255, 108, 96,1)",
                            pointColor: "rgba(255, 108, 96,1)",
                            pointStrokeColor: "#fff",
                            data: <?= (json_encode($s)) ?>
                        }
                    ]

                };
                new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData2);
            }();
        </script>
        <?php
        break;

    case "all":
        //        echo '<pre>';

        $query = mysqli_query($koneksi, "SELECT * FROM histori_pakan  ORDER BY tahun,minggu ASC");
        $no[1] = 1;
        $no[2] = 1;
        while ($rx = mysqli_fetch_array($query)) {
            $x[$rx['id_jenis']][$no[$rx['id_jenis']]] = $rx['jumlah'];
            //            echo '<br>' . $rx['tahun'] . '=' . $rx['jumlah'].'  =>'.$rx['id_jenis'];
            $no[$rx['id_jenis']] ++;
        }



        foreach ($x as $id_jenis => $xjenis) {
            $n[$id_jenis] = count($xjenis);
            $alpha[$id_jenis] = 2 / ($n[$id_jenis] + 1);

            foreach ($xjenis as $key => $value) {
                if ($key == 1) {
                    $sa[$id_jenis][$key] = $x[$id_jenis][$key];
                    $saa[$id_jenis][$key] = $x[$id_jenis][$key];
                    $a[$id_jenis][$key] = 0;
                    $b[$id_jenis][$key] = 0;
                    $f[$id_jenis][$key] = 0;
                } else {
                    $sa[$id_jenis][$key] = ($alpha[$id_jenis] * $x[$id_jenis][$key]) + ((1 - $alpha[$id_jenis]) * $sa[$id_jenis][($key - 1)]);

                    $saa[$id_jenis][$key] = ($alpha[$id_jenis] * $sa[$id_jenis][$key]) + ((1 - $alpha[$id_jenis]) * $saa[$id_jenis][($key - 1)]);
                    $a[$id_jenis][$key] = (2 * $sa[$id_jenis][$key]) - $saa[$id_jenis][$key];
                    $b[$id_jenis][$key] = (($alpha[$id_jenis]) / (1 - $alpha[$id_jenis])) * ($sa[$id_jenis][$key] - $saa[$id_jenis][$key]);
                    if ($key == 2) {
                        $f[$id_jenis][$key] = 0;
                    } else {
                        $f[$id_jenis][$key] = $a[$id_jenis][$key] + $b[$id_jenis][$key];
                    }
                }
            }

            $f[$id_jenis][$key + 1] = $a[$id_jenis][$key] + ($b[$id_jenis][$key] * 1);
            $f[$id_jenis][$key + 2] = $a[$id_jenis][$key] + ($b[$id_jenis][$key] * 2);
        }



        //        echo 'Data X';
        //        echo '<br>';
        //        print_r($x);
        //
                //        echo 'Data n';
        //        echo '<br>';
        //        print_r($n);
        //
                //        echo '<br>';
        //        echo '<br>';
        //        echo 'Data sa';
        //        echo '<br>';
        //        print_r($sa);
        //
                //        echo '<br>';
        //        echo '<br>';
        //        echo 'Data saa';
        //        echo '<br>';
        //        print_r($saa);
        //
                //        echo '<br>';
        //        echo '<br>';
        //        echo 'Data a';
        //        echo '<br>';
        //        print_r($a);
        //
                //        echo '<br>';
        //        echo '<br>';
        //        echo 'Data b';
        //        echo '<br>';
        //        print_r($b);
        //
                //        echo '<br>';
        //        echo '<br>';
        //        echo 'Data f';
        //        echo '<br>';
        //        print_r($f);
        //        echo '</pre>';
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Peramalan</h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">

                        </div>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0"  class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px">Periode Peramalan</th>
                                            <th>Hijauan</th>
                                            <th>Konsentrat</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td >1</td>
                                            <td><?= round($f[1][$key + 1]) ?></td>
                                            <td><?= round($f[2][$key + 1]) ?></td>
                                        </tr>
                                        <tr>
                                            <td >2</td>
                                            <td><?= round($f[1][$key + 2]) ?></td>
                                            <td><?= round($f[2][$key + 2]) ?></td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="width: 100px"></td>
                                            <td> 
                                                <a type="button" class="btn btn-theme02" href="?module=peramalan&act=detail&id=1"><i class="fa fa-check"></i> Detail</a>
                                            </td>
                                            <td> 
                                                <a type="button" class="btn btn-theme02" href="?module=peramalan&act=detail&id=2"><i class="fa fa-check"></i> Detail</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php
        break;
}
?>