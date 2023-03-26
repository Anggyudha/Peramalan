<?php
$aksi = "modules/historipakan/action_historipakan.php";
$act = $_GET['act'];
switch ($act) {
    default:
        ?>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Rekap Pakan</h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">
                            <?php
                            if ($_SESSION['level'] == 'admin') {
                                ?>
                                <a type="button" class="btn btn-theme" href="?module=historipakan&act=add"><i class="fa fa-plus"></i> Tambah</a>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No.</th>
                                            <th>Jenis Pakan</th>
                                            <th>Jumlah (Kg)</th>
                                            <th>Tahun</th>
                                            <th>Minggu Ke-</th>
                                            
                                            <?php
                                            if ($_SESSION['level'] == 'admin') {
                                                ?>
                                                <th style="width: 200px">Aksi</th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$tampil = mysqli_query($koneksi, "SELECT * FROM histori_pakan JOIN jenis_pakan ON histori_pakan.id_jenis = jenis_pakan.id_jenis ORDER BY tahun DESC ,minggu_ke ASC");
                                        $tampil = mysqli_query($koneksi, "SELECT jenis_pakan.jenis_pakan, data_minggu.minggu, histori_pakan.jumlah, histori_pakan.tahun FROM histori_pakan JOIN jenis_pakan ON histori_pakan.id_jenis=jenis_pakan.id_jenis JOIN data_minggu ON histori_pakan.id_minggu=data_minggu.id_minggu ORDER BY tahun DESC ,minggu ASC");
                                        
                                        $no = 1;
                                        while ($r = mysqli_fetch_array($tampil)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $r['jenis_pakan']; ?></td>
                                                <td><?php echo $r['jumlah']; ?></td>
                                                <td><?php echo $r['tahun']; ?></td>
                                                <td><?php echo $r['minggu']; ?></td>
                                                
                                                <?php
                                                if ($_SESSION['level'] == 'admin') {
                                                    ?>
                                                    <td>

                                                        <a class = "btn btn-warning btn-xs" href="?module=historipakan&act=edit&id=<?php echo $r['id_histori']; ?>"><i class = "fa fa-pencil"></i></a>
                                                        <a class = "btn btn-danger btn-xs" href="<?= $aksi ?>?module=historipakan&act=delete&id=<?php echo $r['id_histori']; ?>"><i class = "fa fa-trash-o "></i></a>
                                                    </td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>

        <?php
        break;

    case "add":
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Input Rekap Pakan</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=historipakan&act=input" method="POST">
                                            <div class="form-group ">
                                                <label for="jenis_pakan" class="control-label col-lg-2">Jenis</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="id_jenis">
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
                                            <div class="form-group ">
                                                <label for="jumlah" class="control-label col-lg-2">Jumlah (Kg)</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="jumlah" name="jumlah" type="number" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="tahun" class="control-label col-lg-2">Tahun</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="tahun" name="tahun" type="number" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="minggu" class="control-label col-lg-2">Minggu Ke-</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="id_minggu">
                                                        <option value="">---Pilih Minggu---</option>
                                                        <?php
                                                        $tampil = mysqli_query($koneksi, "SELECT * FROM data_minggu ORDER BY minggu ASC");

                                                        while ($r = mysqli_fetch_array($tampil)) {
                                                            ?>
                                                            <option value="<?php echo $r['id_minggu']; ?>"><?php echo $r['minggu']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Simpan</button>
                                                    <a class="btn btn-theme04" href="?module=historipakan" type="button">Batal</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <h4><i class="fa fa-angle-right"></i>Bagan Minggu Ke-</h4>

                                        <div class="col-md-12">
                                            <!-- page start--><div class="showback">

                                                <a type="button" class="btn btn-theme" href="?module=historipakan&act=tambah"><i class="fa fa-plus"></i> Tambah</a>

                                            </div>
                                            <div class="content-panel">
                                                <div class="adv-table">
                                                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">No.</th>
                                                                <th>Tanggal, Bulan, Tahun</th>
                                                                <th>Minggu Ke-</th>
                                                                <th>Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $tampil = mysqli_query($koneksi, "SELECT * FROM data_minggu");
                                                            $no = 1;
                                                            while ($r = mysqli_fetch_array($tampil)) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no++; ?></td>
                                                                    <td><?php echo $r['tanggal']; ?></td>
                                                                    <td><?php echo $r['minggu']; ?></td>
                                                                    <td><a class = "btn btn-warning btn-xs" href="?module=historipakan&act=ubah&id=<?php echo $r['id_minggu']; ?>"><i class = "fa fa-pencil"></i></a>
                                                                        <a class = "btn btn-danger btn-xs" href="<?= $aksi ?>?module=historipakan&act=del&id=<?php echo $r['id_minggu']; ?>"><i class = "fa fa-trash-o "></i></a></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /form-panel -->
                                        </div>
                                        <!-- /col-lg-12 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


            </section>
        </section>

        <?php
        break;

    case "edit":
        $edit = mysqli_query($koneksi, "SELECT * FROM histori_pakan WHERE id_histori='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Edit Rekap Pakan</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=historipakan&act=update" method="POST">
                                            <div class="form-group ">
                                                <label for="jenis_pakan" class="control-label col-lg-2">Jenis</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="id_jenis">
                                                        <option value="">---Pilih Jenis---</option>
                                                        <?php
                                                        $tampil = mysqli_query($koneksi, "SELECT * FROM jenis_pakan ORDER BY jenis_pakan DESC");

                                                        while ($rk = mysqli_fetch_array($tampil)) {
                                                            ?>
                                                            <option value="<?php echo $rk['id_jenis']; ?>" <?= $rk['id_jenis'] == $r['id_jenis'] ? 'selected' : NULL ?> <?php echo $rk['jenis_pakan']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="jumlah" class="control-label col-lg-2">Jumlah (Kg)</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="id_histori" name="jumlah" type="number" value="<?php echo $r['jumlah']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="tahun" class="control-label col-lg-2">Tahun</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="tahun" name="tahun" type="number"  value="<?php echo $r['tahun']; ?>" />
                                                </div>

                                            </div>
                               
                                            <div class="form-group">
                                            <label for="minggu" class="control-label col-lg-2">Minggu Ke-</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control" name="id_minggu">
                                                        <option value="">---Pilih Minggu---</option>
                                                        <?php
                                                        $tampil = mysqli_query($koneksi, "SELECT * FROM data_minggu ORDER BY minggu ASC");

                                                        while ($rs = mysqli_fetch_array($tampil)) {
                                                            ?>
                                                            <option value="<?php echo $rs['id_minggu']; ?>" <?= $rs['id_minggu'] == $r['id_minggu'] ? 'selected' : NULL ?> <?php echo $rs['minggu']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select> 
                                                </div>
                                            </div>
                                            <input class="form-control " id="id_histori" name="id_histori" type="hidden"  value="<?php echo $r['id_histori']; ?>" />
                                            <input class="form-control " id="id_jenis" name="id_jenis" type="hidden"  value="<?php echo $r['id_jenis']; ?>" />
                                            <input class="form-control " id="id_minggu" name="id_minggu" type="hidden"  value="<?php echo $r['id_minggu']; ?>" />
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10 control-label">
                                                        <button class="btn btn-theme" type="submit">Simpan</button>
                                                        <a class="btn btn-theme04" href="?module=historipakan" type="button">Batal</a>
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

    case "tambah":
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Tambah Data Minggu</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=historipakan&act=in" method="POST">
                                            <div class="form-group ">
                                                <label for="tanggal" class="control-label col-lg-2">Tanggal</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="tanggal" name="tanggal" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="minggu" class="control-label col-lg-2">Minggu</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="minggu" name="minggu" type="number" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" href="?module=historipakan&act=add" type="submit">Simpan</button>
                                                    <a class="btn btn-theme04" href="?module=historipakan&act=add" type="button">Batal</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php
        break;

    case "ubah":
        $ubah = mysqli_query($koneksi, "SELECT * FROM data_minggu WHERE id_minggu='$_GET[id]'");
        $rs = mysqli_fetch_array($ubah);
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Edit Data Minggu</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=historipakan&act=up" method="POST">
                                            <div class="form-group ">
                                                <label for="tanggal" class="control-label col-lg-2">Tanggal</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="id_minggu" name="tanggal" type="text" value="<?php echo $rs['tanggal']; ?>" />

                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="minggu" class="control-label col-lg-2">Minggu</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="id_minggu" name="minggu" type="number" value="<?php echo $rs['minggu']; ?>" />

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" href="?module=historipakan&act=add" type="submit">Simpan</button>
                                                    <a class="btn btn-theme04" href="?module=historipakan&act=add" type="button">Batal</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
