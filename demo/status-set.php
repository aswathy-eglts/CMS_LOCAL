<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
$complaintype=$_POST['complaintype'];
$complaindetails=$_POST['complaindetails'];
$vehicle=$_POST['vehicle'];
$query=mysqli_query($con,"update complaint set 
complaint_type='$complaintype',description='$complaindetails',vehicle_no='$vehicle' where complaint_id='".$_GET['uid']."'");
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

    <title>User update complaints</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
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
 <?php $query=mysqli_query($con,"select * from complaint where customer_id='".$_GET['uid']."'");
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
<select name="complaintype" class="form-control" required="" value="" >
                  <option><?php echo htmlentities($row['complaint_type']);?></option>
                  <option value=" Complaint"> Complaint</option>
                  <option value="Complaint1">Complaint1</option>
                  <option value=" Complaint2"> Complaint2</option>
                  <option value="Complaint3">Complaint3</option>
                  </select> 
</div>
 </div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Complaint Details: </label>
<div class="col-sm-6">
<textarea  name="complaindetails" value="" cols="10" rows="10" class="form-control" maxlength="2000" readonly>
<?php echo htmlentities($row['description']);?>
</textarea>
</div>
<label class="col-sm-2 col-sm-2 control-label">Vehicle No:</label>
<div class="col-sm-4">
<input type="text" name="vehicle" required="required" value="<?php echo htmlentities($row['vehicle_no']);?>" class="form-control" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">status:</label>
 <div class="col-sm-4">
<input type="email" name="status" required="required" value="<?php echo htmlentities($row['status']);?>" class="form-control" readonly>
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
    <?php include("includes/footer.php");?>
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
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	
  </body>
</html>
<?php } ?>
