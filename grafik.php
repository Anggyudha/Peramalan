<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Grafik Rekap Pakan</h3>
        <div class="row mb">
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
                                            <option value="<?php echo $r['id_jenis']; ?>" <?= $r['id_jenis'] == $_GET['id'] ? 'selected' : NULL ?>><?php echo $r['jenis_pakan']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <input type="hidden" name="module" value="grafik">


                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit">Proses</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form-panel -->
            </div>

            <?php
            if ($_GET['id']) {
                ?>
                <div class="col-md-12">
                    <div class="content-panel">

                        <!--/flot-chart -->

                        <div class="tab-pane" id="chartjs">
                            <div class="row mt">

                                <div class="col-lg-12">
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
                <?php
            }
            ?>
        </div>
    </section>
</section>
<!-- page end--

</div>

</div>
</div>
</section>
</section>
<!-- js placed at the end of the document so the pages load faster -->
<?php
//echo '<pre>';
$query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis = '$_GET[id]' ORDER BY tahun,minggu_ke ASC");


$x = array();
while ($rx = mysqli_fetch_array($query)) {

    array_push($x, $rx['jumlah']);
    
//    echo ',' . $no++;
}
//echo '<pre>';
////print_r(json_encode($x));
//echo '<br>';
//print_r(json_encode($t));
//echo '</pre>';
?>
<?php
//echo '<pre>';
$query = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_jenis = '$_GET[id]' ORDER BY tahun,minggu_ke ASC");

$t = array();
while ($tx = mysqli_fetch_array($query)) {

    array_push($t, $tx['minggu_ke']);
    
//    echo ',' . $no++;
}
//echo '<pre>';
////print_r(json_encode($x));
//echo '<br>';
//print_r(json_encode($t));
//echo '</pre>';
?>
<!--common script for all pages-->




<!--script for this page-->
<script src="lib/chart-master/Chart.js"></script>

<script>
    var Script = function () {
        var lineChartData2 = {
            labels: <?= json_encode($t) ?>,
            datasets: [
                {
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    data: <?= (json_encode($x)) ?>
                }
            ]

        };
        new Chart(document.getElementById("line2").getContext("2d")).Line(lineChartData2);
    }();
</script>