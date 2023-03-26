<?php
$aksi = "modules/jenispakan/action_jenispakan.php";
$act = $_GET['act'];
switch ($act) {
    default:
        ?>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Jenis Pakan</h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">
                            <?php
                            if ($_SESSION['level'] == 'admin') {
                                ?>
                                <a type="button" class="btn btn-theme" href="?module=jenispakan&act=add"><i class="fa fa-plus"></i> Tambah</a>
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
                                            <th>Harga</th>
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
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM jenis_pakan ORDER BY jenis_pakan DESC");
                                        $no = 1;
                                        while ($r = mysqli_fetch_array($tampil)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $r['jenis_pakan']; ?></td>
                                                <td>Rp. <?php echo number_format($r['harga']); ?></td>
                                                <?php
                                                if ($_SESSION['level'] == 'admin') {
                                                    ?>
                                                    <td>

                                                        <a class = "btn btn-warning btn-xs" href="?module=jenispakan&act=edit&id=<?php echo $r['id_jenis']; ?>"><i class = "fa fa-pencil"></i></a>
                                                        <a class = "btn btn-danger btn-xs" href="<?= $aksi ?>?module=jenispakan&act=delete&id=<?php echo $r['id_jenis']; ?>"><i class = "fa fa-trash-o "></i></a>
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
                <h3><i class="fa fa-angle-right"></i>Input Jenis Pakan</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=jenispakan&act=input" method="POST">
                                            <div class="form-group ">
                                                <label for="jenis_pakan" class="control-label col-lg-2">Jenis Pakan</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="jenis_pakan" name="jenis_pakan" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="harga" class="control-label col-lg-2">Harga</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="harga" name="harga" type="number" />
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Simpan</button>
                                                    <a class="btn btn-theme04" href="?module=jenispakan" type="button">Batal</a>
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

    case "edit":
        $edit = mysqli_query($koneksi, "SELECT * FROM jenis_pakan WHERE id_jenis='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Edit Jenis Pakan</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=jenispakan&act=update" method="POST">
                                            <div class="form-group ">
                                                <label for="jenis_pakan" class="control-label col-lg-2">Jenis Pakan</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="jenis_pakan" name="jenis_pakan" type="text" value="<?php echo $r['jenis_pakan']; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="harga" class="control-label col-lg-2">Harga</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="harga" name="harga" type="number"  value="<?php echo $r['harga']; ?>" />
                                                </div>

                                            </div>
                                            <input class="form-control " id="id_jenis" name="id_jenis" type="hidden"  value="<?php echo $r['id_jenis']; ?>" />


                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Simpan</button>
                                                    <a class="btn btn-theme04" href="?module=jenispakan" type="button">Batal</a>
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
}
?>		   
