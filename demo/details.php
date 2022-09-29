<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index1.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    
    if(isset($_POST['submit']))
    {
    $cid=$_GET['cid'];
    $uid=$_SESSION['customer_id'];
    $comment_text=$_POST['comment_text'];
    $query=mysqli_query($con,"INSERT INTO `comments`(`customer_id`, `comment_text`, `complaint_id`) 
    VALUES ('$uid','$comment_text','$cid')");
     if ($query)
     {
      $_SESSION['comment_id']=$num['comment_id'];
        $successmsg="Success!!";
        }
        else
        {
        $errormsg="comment not send !!";
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

    <!-- Bootstrap  CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!--  jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
        <script>
$(document).ready(function(){
  
    $("#pass").hide();
  
  // $("#show").click(function(){
  //   $("#pass").show();
  // });
 }); 
</script>
  </head>

  <body>
    <section id="container" >
        <?php include('includes/header.php');?>
        <?php include('includes/sidebar.php');?> 
      <section id="main-content" style="padding-left:5%; color:#000">
          <section class="wrapper site-min-height">
          	<h4><i class="fa fa-angle-right"></i> Complaint Details</h4>
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

                    if($row['status']==1 || $row['status']=="not process yet" )
                    {
                    echo "Not Process yet";
                    } else{
                                echo htmlentities($row['status']);
                    }
                  ?></p>
                </div>
                </div> 
  <?php } ?>

<!-- comment section -->

<!-- comments view section -->
<h3>Comments</h3>
            <hr />
 <?php $query=mysqli_query($con,"SELECT * FROM `comments` where complaint_id='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
    <div class="row mt">
        <label class="col-sm-2 col-sm-2 control-label"><b>You : </b></label>
        <div class="col-sm-4">
        <p><?php echo htmlentities($row['comment_text']);?></p>
        <p style="color:grey"><?php echo htmlentities($row['comment_date']);?></p>
        <?php
         $response=$row['response'];
         if($response!=NULL)
         {?>
          <label class="col-sm-2 col-sm-2 control-label" ><b>admin : </b></label>
         <p><?php echo htmlentities($row['response']);?></p>
        <p style="color:grey"><?php echo htmlentities($row['update_date']);?></p>
        <?php
         }
        else
        {?>
           <label class="col-sm-2 col-sm-2 control-label" style="display:none"><b>admin : </b></label>  
           <?php
        }
        ?>
        
        </div>
    </div>
<?php } ?>
<!-- comments view section end -->
<div class="row mt">
<div class="row mt">
  <form action="" method="post">
  <!-- <?php if($successmsg)
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
                      <?php }?> -->
<label class="col-sm-2 col-sm-2 control-label"><b>Comment :</b></label>
  <input type="text" name="comment_text" placeholder="message" style="height:150px; width:220px" required>
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
<!-- comment section end -->


  </section>
  </html>
<?php }?>
