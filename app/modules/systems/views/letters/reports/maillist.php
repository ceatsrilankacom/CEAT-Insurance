<?php include_once('../classes/check.class.php');
protect("1,2");
include_once('../header.php');


include_once('../classes/maillist.class.php');
$maillist = new Maillist;
?>

<style>
    .paginate {
        font-family:Arial, Helvetica, sans-serif;
        padding: 3px;
        margin: 3px;
    }

    .paginate a {
        padding:2px 5px 2px 5px;
        margin:2px;
        border:1px solid #999;
        text-decoration:none;
        color: #fff;
    }
    .paginate a:hover, .paginate a:active {
        border: 1px solid #999;
        color: #fff;
    }
    .paginate span.current {
        margin: 2px;
        padding: 2px 5px 2px 5px;
        border: 1px solid #999;

        font-weight: bold;
        background-color: #999;
        color: #FFF;
    }
    .paginate span.disabled {
        padding:2px 5px 2px 5px;
        margin:2px;
        border:1px solid #eee;
        color:#DDD;
    }

    .paginate li{
        padding:4px;
        margin-bottom:3px;
        background-color:#FCC;
        list-style:none;}

    .paginate ul{margin:6px;
        padding:0px;}

</style>

          <!-- page header -->
          <div class="pageheader">
            <h2><i class="fa fa-paper-plane"></i> Bill Dispatch Preview
            <span><?php echo date('Y-m-d h-i-s',strtotime('+330 minute')); ?></span></h2>

            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>You are here</li>
                <li><a href="../home.php">Home</a></li>
                <li class="active">Preview</li>
              </ol>
            </div>
          </div>
          <!-- /page header -->
          
          <!-- content main container -->
          <div class="main">
            <!-- row -->
            <div class="row">
              <!-- col 12 -->
              <div class="col-md-12">
                <!-- tile -->
                <section class="tile transparent">


                    <?php $maillist->MailMerge(); ?>

                    
                </section>
                <!-- /tile -->

              </div>
              <!-- /col 12 -->

              
            </div>
            <!-- /row -->  

          </div>
          <!-- /content container -->


        </div>
        <!-- Page content end -->

<?php include_once('../footer.php'); ?>