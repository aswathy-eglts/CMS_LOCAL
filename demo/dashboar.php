<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index1.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>CMS | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assetss/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assetss/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assetss/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assetss/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assetss/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assetss/css/style.css" rel="stylesheet">
    <link href="assetss/css/style-responsive.css" rel="stylesheet">
    <link href="assetss/css/example.css" rel="stylesheet">
    <script src="assetss/js/chart-master/Chart.js"></script>
    
    </head>

  <body>
  <?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                     <div class="col-md-2 col-sm-2 box0">
                        <div>
                         
                 
                  </div></div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
                                <?php 
                   
$rt = mysqli_query($con,"SELECT * FROM complaint where status='not process yet' ");
$num1 = mysqli_num_rows($rt);
{?>
					  			<h3><?php echo htmlentities($num1);?></h3>
                  			</div>
					  			<p><?php echo htmlentities($num1);?> Complaints not Process yet</p>
                  		</div>
                      <?php }?>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                    <?php 
  $status="in process";                   
$rt = mysqli_query($con,"SELECT * FROM complaint where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
                  <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                  <p><?php echo htmlentities($num1);?> Complaints Status in process</p>
                      </div>
  <?php }?>

                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                  <span class="li_news"></span>
                       <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM complaint where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
                  <h3><?php echo htmlentities($num1);?></h3>
                        </div>
                  <p><?php echo htmlentities($num1);?> Complaint has been closed</p>
                      </div>

<?php }?>
                	
                  	</div><!-- /row mt -->	
               </section>
      </section>
<!-- <?php include("includes/footer.php");?> -->
  </section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="assetss/js/jquery.js"></script>
    <script src="assetss/js/jquery-1.8.3.min.js"></script>
    <script src="assetss/js/bootstrap.min.js"></script>
    <script class="includes" type="text/javascript" src="assetss/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assetss/js/jquery.scrollTo.min.js"></script>
    <script src="assetss/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assetss/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assetss/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assetss/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assetss/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assetss/js/sparkline-chart.js"></script>    
	<script src="assetss/js/zabuto_calendar.js"></script>	
  </body>
</html>
<?php } ?>
