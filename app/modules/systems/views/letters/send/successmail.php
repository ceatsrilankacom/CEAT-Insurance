<?php include_once('../classes/check.class.php');
protect("1,2");
include_once('../header.php');


include('../classes/connection.php');
?>


    <!-- page header -->
    <div class="pageheader">

        <div class="breadcrumbs pull-right">
            <ol class="breadcrumb">
                <li>You are here</li>
                <li><a href="<?php echo $server_link; ?>home.php">Home</a></li>
                <li class="active">Send Ebills</li>
            </ol>
        </div>

    </div>
    <!-- /page header -->

    <!-- content main container -->
    <div class="main">




        <!-- row -->
        <div class="row">

            <h1><i class="fa fa-paper-plane"></i>  <strong>Send</strong> Bills</h1>



            <!-- tile -->
            <section class="tile">


                <!-- tile header -->
                <div class="tile-header color slategray rounded-top-corners">
                    <h3><i class="icon-note"></i> <strong>Current</strong> Count</h3>
                    <div class="controls">
                        <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                        <!--<a href="#" class="remove"><i class="fa fa-times"></i></a>-->
                    </div>
                </div>
                <!-- /tile header -->


                <!-- tile body -->
                <div class="tile-body color dutch">

                    <h3> Current Email Process Count - <?php
                        //$query  = "SELECT Email, ContractNo, FileName FROM DBN WHERE ID=$id";
                        $f_email = $_SESSION['eReminder']['email'];
                        $query  = "SELECT msgcount Counts, lastptime FROM  login_users WHERE email = '$f_email' AND run_status = 1";
                        $result = @MYSQL_QUERY($query);
                        while ($row = mysql_fetch_array ($result)) {
                            echo $row["Counts"]." Last Email Proceed Time".$row["lastptime"];
                        }
                        ?>
                    </h3>
                    <script>
                        setTimeout(function() { window.location=window.location;},8000);
                    </script>

                </div>
                <!-- /tile body -->



            </section>
            <!-- /tile -->





        </div>





    </div>
    <!-- /row -->

    </div>
    <!-- /content container -->


    </div>
    <!-- Page content end -->



<?php include_once('../footer.php'); ?>