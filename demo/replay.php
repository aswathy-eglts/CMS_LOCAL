<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index1.php');
}
else{
    
    if(isset($_POST['submit']))
    {
      // $ret="SELECT * FROM comments WHERE  complaint_id='".$_GET['uid']."'";
      // $num=mysqli_query($con,$ret) or die(mysqli_error($con));;
      // if($num)
      // {
      //   while($row=mysqli_fetch_assoc($num))
      //   {
      //     $comment_id=$row[comment_id];
      //     echo "$comment_id";
      //   }
            
      // }
      $comment_id=$_GET['comment_id'];
       $uid=$_GET['uid'];
       $cid=$_SESSION['customer_id'];
       $replay=$_POST['replay'];
       $aid=$_SESSION['admin_id'];
      //  $mid=$_SESSION['comment_id'];
       $query=mysqli_query($con,"update comments set 
       response='$replay'  where  complaint_id='".$_GET['uid']."' , comment_id='.$comment_id.' , customer_id='.$cid.'");
      $result=mysqli_query($con,$query) or die(mysqli_error($con));
     if ($result)
     {
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

    <title>Replay comments</title>

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
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<section id="main-content" style="padding-left:5%; color:#000">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
            <hr />
           
            <?php $query=mysqli_query($con,"SELECT * FROM `complaint`where complaint_id='".$_GET['uid']."'");
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

                    if($row['status']=="not process yet" || $row['status']==1 )
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
 <?php
 
  $query=mysqli_query($con,"SELECT * FROM `comments` where complaint_id='".$_GET['uid']."'");
  
while($row=mysqli_fetch_array($query)) 
{
  ?>
  <div class="main">
    <div>
      
    </div>
  </div>
    <div class="row mt">
        <label class="col-sm-2 col-sm-2 control-label"><b>user : </b></label>
        <div class="col-sm-4">
        <p><?php echo htmlentities($row['comment_text']);?></p>
        <p style="color:grey"><?php echo htmlentities($row['comment_date']);?></p>
        </div>
        <label class="col-sm-2 col-sm-2 control-label"><b>replay : </b></label>
        <div class="col-sm-4">
        <p><?php echo htmlentities($row['response']);?></p>
        <!-- <p style="color:grey"><?php echo htmlentities($row['comment_date']);?></p> -->
        </div>
       </div>

        <a href="send-msg.php?comment_id=<?php echo htmlentities($row['comment_id']);?>"title="View Details">
<button type="button" class="btn btn-primary">replay</button>
											</a>
    
<?php } ?>
<!-- comments view section end -->
  </section>
  
  </body>
</html>
<?php } ?>


