<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index1.php');
}
else{ 

if(isset($_POST['submit']))
{
$cid=$_GET['cid'];
$uid=$_SESSION['customer_id'];
echo "$uid";
$comment_text=$_POST['comment_text'];
$query=mysqli_query($con,"INSERT INTO `comments`(`customer_id`, `comment_text`, `complaint_id`) 
VALUES ('$uid','$comment_text','$cid')");
 $result=mysqli_query($con,$query) or die(mysqli_error($con));
 if ($result)
  {
      echo "<script>alert('Successfully Registered')</script>";
      
  }   
  else
   {
      echo "<script>alert('Something went wrong. Please try again.')</script>";
      
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

    <title>Complaint Details</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
  <section id="container" >
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?> 
      <section id="main-content" style="padding-left:5%; color:#000">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
            <hr />
 <?php $query=mysqli_query($con,"SELECT * FROM `complaint`where complaint_id='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Number : </b></label>
          		<div class="col-sm-4">
          		<p><?php echo htmlentities($row['complaint_id']);?></p>
          		</div>
          		 <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['complaint_type']);?></p>
              </div>

          	</div>
            <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details: </b></label>
          		<div class="col-sm-4">
          		<p><?php echo htmlentities($row['description']);?></p>
          		</div>
          		 <label class="col-sm-2 col-sm-2 control-label"><b>Vehicle Number :</b></label>
              <div class="col-sm-4">
              <p><?php echo htmlentities($row['vehicle_no']);?></p>
              </div>
          	</div>
    <div class="row mt">     
<label class="col-sm-2 col-sm-2 control-label"><b>Status :</b></label>
              <div class="col-sm-4">
              <p style="color:red"><?php 

if($row['status']=="NULL" || $row['status']==1 )
{
echo "Not Process yet";
} else{
              echo htmlentities($row['status']);
}
              ?></p>
              </div>
            </div> 
  
<?php } ?>

<!-- comment section start -->
<h4><i class="fa fa-angle-right"></i> Comments</h4>
            <hr />
 <?php $query=mysqli_query($con,"SELECT * FROM `comments` where complaint_id='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>You : </b></label>
          		<div class="col-sm-4">
          		<p><?php echo htmlentities($row['comment_text']);}?></p>
          		</div>
</div>

<div class="row mt">
<div class="row mt">
  <form action="" method="post">
<label class="col-sm-2 col-sm-2 control-label"><b>Comment :</b></label>
  <input type="text" name="comment_text" placeholder="message" style="height:150px; width:220px">
</div>
</div>
<div class="form-group mt">
<div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
		</section>
      </section>
<!-- register complaint -->

<!-- comment section end -->


<!-- <?php include('includes/footer.php');?> -->
  </section>

    <!-- js -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
 
      

  </body>
</html>
<?php }?>
