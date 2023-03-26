<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Peramalan Pakan Sapi Perah</title>

        <!-- Favicons -->
        <link href="img/p-icon-20.jpg" rel="icon">
        <link href="img/p-icon-20.jpg" rel="icon">

        <!-- Bootstrap core CSS -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
        <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
        <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="lib/advanced-datatable/css/DT_bootstrap.css" />



        <script src="lib/jquery/jquery.min.js"></script>

        <script src="lib/bootstrap/js/bootstrap.min.js"></script>

        <script src="lib/jquery.scrollTo.min.js"></script>
        <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="lib/jquery.sparkline.js"></script>
        <!--common script for all pages-->
        <script src="lib/common-scripts.js"></script>
        <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="lib/gritter-conf.js"></script>
        <!--script for this page-->
        <script src="lib/sparkline-chart.js"></script>
        <script src="lib/zabuto_calendar.js"></script>

        <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
        <script src="lib/raphael/raphael.min.js"></script>



        <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    </head>

    <body>
        <section id="container">
            <!-- **********************************************************************************************************************************************************
                TOP BAR CONTENT & NOTIFICATIONS
                *********************************************************************************************************************************************************** -->
            <!--header start-->
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="index.html" class="logo"><b>PERAMALAN<span>PAKAN </span></b></a>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                        <!-- settings start -->

                        <!-- settings end -->
                        <!-- inbox dropdown start-->

                        <!-- inbox dropdown end -->
                        <!-- notification dropdown start-->

                        <!-- notification dropdown end -->
                    </ul>
                    <!--  notification end -->
                </div>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li><a class="logout" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </header>
            <!--header end-->
            <!-- **********************************************************************************************************************************************************
                MAIN SIDEBAR MENU
                *********************************************************************************************************************************************************** -->
            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <p class="centered"><a href="profile.html"><img src="img/sapi.png" class="img-circle" width="80"></a></p>
                        <h5 class="centered">Peramalan Pakan Ternak</h5>
                        <li class="mt">
                            <a class="active" href="?module=beranda">
                                <i class="fa fa-dashboard"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="?module=jenispakan">
                                <i class="fa fa-pagelines"></i>
                                <span>Jenis Pakan</span>
                            </a>

                        </li>
                        <li class="sub-menu">
                            <a href="?module=historipakan">
                                <i class="fa fa-table"></i>
                                <span>Rekap Pakan</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="?module=peramalan">
                                <i class="fa fa-tasks"></i>
                                <span>Peramalan</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="?module=grafik">
                                <i class=" fa fa-bar-chart-o"></i>
                                <span>Grafik</span>
                            </a>

                        </li>
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            ?>
                            <li class="sub-menu">
                                <a href="?module=user">
                                    <i class="fa fa-user-md"></i>
                                    <span>Pengguna</span>
                                </a>

                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!-- **********************************************************************************************************************************************************
                MAIN CONTENT
                *********************************************************************************************************************************************************** -->
            <!--main content start-->

            <?php include "content.php" ?>


            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-9 main-chart">
                            <!--CUSTOM CHART START -->
                            <div class="border-head">
                                <h3></h3>
                            </div>

                            <!--custom chart end-->
                            <div class="row mt">
                                <!-- SERVER STATUS PANELS -->

                                <!--  /darkblue panel -->
                            </div>
                            <!-- /col-md-4 -->
                            <div class="col-md-4 col-sm-4 mb">
                                <!-- REVENUE PANEL -->

                                <!-- /col-md-4 -->
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <!-- WEATHER PANEL -->

                                <!-- /col-md-4-->
                                <!-- DIRECT MESSAGE PANEL -->

                                <!-- /Message Panel-->
                            </div>
                            <!-- /col-md-8  -->
                        </div>
                        <div class="row">
                            <!-- TWITTER PANEL -->

                            <!-- /col-md-4 -->
                            <div class="col-md-4 mb">
                                <!-- WHITE PANEL - TOP USER -->

                                <!-- /col-md-4 -->
                                <div class="col-md-4 mb">
                                    <!-- INSTAGRAM PANEL -->

                                    <!-- /col-md-4 -->
                                </div>
                                <!-- /row -->

                                <!-- /col-md-4 -->
                                <!--  PROFILE 02 PANEL -->

                                <!-- /panel -->
                            </div>
                            <!--/ col-md-4 -->

                            <!-- /col-md-4 -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /col-lg-9 END SECTION MIDDLE -->
                    <!-- **********************************************************************************************************************************************************
                        RIGHT SIDEBAR CONTENT
                        *********************************************************************************************************************************************************** -->
                    <div class="col-lg-3 ds">
                        <!--COMPLETED ACTIONS DONUTS CHART-->

                        <!--NEW EARNING STATS -->

                        <!--new earning end-->
                        <!-- RECENT ACTIVITIES SECTION -->

                        <!-- First Activity -->

                        <!-- Second Activity -->

                        <!-- Third Activity -->

                        <!-- Fourth Activity -->

                        <!-- USERS ONLINE SECTION -->

                        <!-- First Member -->

                        <!-- Second Member -->

                        <!-- Third Member -->

                        <!-- Fourth Member -->

                        <!-- CALENDAR-->

                        <!-- / calendar -->
                    </div>
                    <!-- /col-lg-3 -->
                    </div>
                    <!-- /row -->
                </section>
            </section>
            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    <div class="credits">
                    </div>
                    <a href="index.html#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!--footer end-->
        </section>
        <!-- js placed at the end of the document so the pages load faster -->


        <!--common script for all pages-->

        <!--  
          script for this page
          <script src="lib/flot/jquery.flot.js"></script>
          <script src="lib/flot/jquery.flot.resize.js"></script>
          <script src="lib/flot/jquery.flot.stack.js"></script>
          <script src="lib/flot/jquery.flot.crosshair.js"></script>
          <script src="lib/flotchart-conf.js"></script>-->


        <script type="text/javascript">
            /* Formating function for row details */
            function fnFormatDetails(oTable, nTr) {
                var aData = oTable.fnGetData(nTr);
                var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
                sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
                sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
                sOut += '</table>';

                return sOut;
            }

            $(document).ready(function () {
                /*
                 * Insert a 'details' column to the table
                 */
                var nCloneTh = document.createElement('th');
                var nCloneTd = document.createElement('td');
                nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
                nCloneTd.className = "center";

//                $('#hidden-table-info thead tr').each(function () {
//                    this.insertBefore(nCloneTh, this.childNodes[0]);
//                });
//
//                $('#hidden-table-info tbody tr').each(function () {
//                    this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
//                });

                /*
                 * Initialse DataTables, with no sorting on the 'details' column
                 */
                var oTable = $('#hidden-table-info').dataTable({
                    "aoColumnDefs": [{
                            "bSortable": false,
                            "aTargets": [0]
                        }],
                    "aaSorting": [
                        [0, 'asc']
                    ]
                });

                /* Add event listener for opening and closing details
                 * Note that the indicator for showing which row is open is not controlled by DataTables,
                 * rather it is done here
                 */
                $('#hidden-table-info tbody td img').live('click', function () {
                    var nTr = $(this).parents('tr')[0];
                    if (oTable.fnIsOpen(nTr)) {
                        /* This row is already open - close it */
                        this.src = "lib/advanced-datatable/media/images/details_open.png";
                        oTable.fnClose(nTr);
                    } else {
                        /* Open this row */
                        this.src = "lib/advanced-datatable/images/details_close.png";
                        oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
                    }
                });
            });
        </script>
    </body>

</html>
