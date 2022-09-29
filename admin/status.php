<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
$status=$_POST['status'];
$query=mysqli_query($con,"update complaint set 
status='$status' where complaint_id='".$_GET['cuid']."'");
if($query)
{
$successmsg=" Successfully updated!!";
}
else
{
$errormsg="not updated !!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>status</title>

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

    <script src="assetss/js/chart-master/Chart.js"></script>
    
  </head>

  <body>
  <section id="container" >
  <?php include('includes/header.php');?>
  <?php include('includes/sidebar.php');?>	
  <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> complaint information</h3>
        	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	<?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b></b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b></b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
                      <!-- select complaint -->
 <?php $query=mysqli_query($con,"select * from complaint where complaint_id='".$_GET['cuid']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
    <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >
                            
    <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Id:</label>
<div class="col-sm-4">
<input type="text" name="complaint_id" required="required" value="<?php echo htmlentities($row['complaint_id']);?>" class="form-control" readonly>
 </div>
<label class="col-sm-2 col-sm-2 control-label">Complaint Type:</label>
<div class="col-sm-4">
<input type="text" name="vehicle" required="required" value="<?php echo htmlentities($row['complaint_type']);?>"required="" class="form-control" readonly>
</div>
 </div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Details: </label>
<div class="col-sm-6">
<textarea  name="complaindetails" value="" required="" cols="5" rows="5" class="form-control" maxlength="100" readonly>
<?php echo htmlentities($row['description']);?>
</textarea>
</div>
<label class="col-sm-2 col-sm-2 control-label">Vehicle No:</label>
<div class="col-sm-4">
<input type="text" name="vehicle" required="required" value="<?php echo htmlentities($row['vehicle_no']);?>"required="" class="form-control" readonly>
</div>
</div>
<div class="form-group">
<!-- <label class="col-sm-2 col-sm-2 control-label">status:</label>
 <div class="col-sm-4">
<input type="text" name="status" required="required" value="<?php echo htmlentities($row['status']);?>" class="form-control">
</div> -->
<label class="col-sm-2 col-sm-2 control-label">status:</label>
<div class="col-sm-4">
<select name="status" class="form-control" required="" value="" >
                  <option><?php echo htmlentities($row['status']);?></option>
                  <option value="in process">in process</option>
                  <option value="closed">closed</option>
                  <option value="not process yet"> not process yet</option>
                                   </select> 
</div>
 </div>

<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
   
		</section>
      </section>

  <?php include('includes/footer.php');?>
</section>

	
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assetss/js/jquery.js"></script>
    <script src="assetss/js/jquery-1.8.3.min.js"></script>
    <script src="assetss/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assetss/js/jquery.dcjqaccordion.2.7.js"></script>
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


