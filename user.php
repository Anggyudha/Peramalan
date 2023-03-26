<?php
$aksi = "modules/user/action_user.php";
$act = $_GET['act'];
switch ($act) {
    default:
        ?>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Pengguna</h3>
                <div class="row mb">

                    <div class="col-md-12">
                        <!-- page start--><div class="showback">

                            <a type="button" class="btn btn-theme" href="?module=user&act=add"><i class="fa fa-plus"></i> Tambah</a>

                        </div>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No.</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th style="width: 200px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM user");
                                        $no = 1;
                                        while ($r = mysqli_fetch_array($tampil)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $r['username']; ?></td>
                                                <td><?php echo $r['level']; ?></td>

                                                <td>

                                                    <a class = "btn btn-warning btn-xs" href="?module=user&act=edit&id=<?php echo $r['id_pengguna'];?>"><i class = "fa fa-pencil"></i></a>
                                                    </td>
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
                <h3><i class="fa fa-angle-right"></i>Input Pengguna</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">
                                
                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=user&act=input" method="POST">
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Username</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="username" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Password</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="password" name="password" type="password" />
                                                </div>

                                            </div>
                                            <div class="form-group ">
                                            <label for="level" class="control-label col-lg-2">Level</label>
                                            <div class="radio-inline">
                                                <label>
                                                    <input type="radio" name="level" id="level" value="admin" checked> Admin
                                                </label>
                                            </div>
                                            <div class="radio-inline">
                                                <label>
                                                    <input type="radio" name="level" id="level" value="pengurus" checked> Pengurus
                                                </label>
                                            </div>
                                            
                                            </div>


                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Save</button>
                                                    <a class="btn btn-theme04" href="?module=user" type="button">Cancel</a>
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
         $edit = mysqli_query($koneksi,"SELECT * FROM user WHERE id_pengguna='$_GET[id]'");
        $r = mysqli_fetch_array($edit);
        ?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Edit Pengguna</h3>
                <div class="row mb">
                    <!-- page start-->
                    <div class="content-panel">
                        <div class="row mt">
                            <div class="col-lg-12">

                                <div class="form-panel">
                                    <div class="form">
                                        <form class="mxform form-horizontal style-form" action="<?= $aksi ?>?module=user&act=update" method="POST">
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Username</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="username" type="text" value="<?php echo $r['username'];?>" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Password</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="password" name="password" type="password"  value="<?php echo $r['password'];?>" />
                                                </div>

                                            </div>
                                            <input class="form-control " id="id_pengguna" name="id_pengguna" type="hidden"  value="<?php echo $r['id_pengguna'];?>" />


                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Save</button>
                                                    <a class="btn btn-theme04" href="?module=user" type="button">Cancel</a>
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
