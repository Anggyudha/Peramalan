<?php
session_start();
error_reporting(0);
if ($_SESSION['username']) {
    header('location:module.php?module=beranda');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Peramalan Pakan Sapi</title>

        <!-- Favicons -->
        <link href="img/p-icon-20.jpg" rel="icon">
        <link href="img/p-icon-20.jpg" rel="icon">

        <!-- Bootstrap core CSS -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">


    </head>

    <body>
        <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
        <div id="login-page">
            <div class="container">
                <form class="form-login" action="cek_login.php" method="POST">
                    <h2 class="form-login-heading">silahkan masuk</h2>
                    <div class="login-wrap">
                        <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
                        <br>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <label>
                            <span class="pull-right">
                                <a></a>
                            </span>
                        </label>
                        <button class="btn btn-theme btn-block"  type="submit"><i class="fa fa-lock"></i> MASUK</button>
                        <hr>
                        <div class="login-social-link centered">
                            <p></p>
                        </div>
                        <div>
                            <br/>
                            <a>
                            </a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <!--BACKSTRETCH-->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("img/background_login.jpg", {
                speed: 500
            });
        </script>
    </body>

</html>
