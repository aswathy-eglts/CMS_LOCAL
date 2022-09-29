<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index1.php');
}
else{

  if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$lname=$_POST['name'];
$age=$_POST['age'];
$phno=$_POST['phno'];
$query=mysqli_query($con,"update customer set firstName='$fname',lastName='$lname', age='$age',phno='$phno' where email='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
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

    <title>CMS | User Change Password</title>

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
          	<h4><i class="fa fa-angle-right"></i> Profile info</h4>
          	
          	<!--form -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <!-- message -->
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
 <?php $query=mysqli_query($con,"select * from customer where email='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb">&nbsp;&nbsp;<?php echo htmlentities($row['firstName']);?>  <?php echo htmlentities($row['lastName']);?>'s Profile</h4>
    <form class="form-horizontal style-form" method="post" name="profile" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">First Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['firstName']);?>" class="form-control" >
 </div>
 <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
<div class="col-sm-4">
<input type="text" name="name" required="required" value="<?php echo htmlentities($row['lastName']);?>" class="form-control" >
 </div>

 </div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Email </label>
 <div class="col-sm-4">
<input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['email']);?>" class="form-control" readonly>
</div>
<label class="col-sm-2 col-sm-2 control-label">gender</label>
 <div class="col-sm-4">
<input type="text" name="gender" required="required" value="<?php echo htmlentities($row['gender']);?>" class="form-control" readonly>
</div>

</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">age </label>
<div class="col-sm-4">
<input type="text" name="age" required="required" value="<?php echo htmlentities($row['age']);?>" class="form-control" >

</div>
<label class="col-sm-2 col-sm-2 control-label">phno</label>
<div class="col-sm-4">
 <input type="text" name="phno" required="required" value="<?php echo htmlentities($row['phno']);?>" class="form-control" >

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
    <!-- <?php include("includes/footer.php");?> -->
  </section>

    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
