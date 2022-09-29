<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
    
    if(isset($_POST['submit']))
    {
      $ret="SELECT * FROM comments WHERE  complaint_id='".$_GET['uid']."' ";
      $num=mysqli_query($con,$ret);
      while($row=mysqli_fetch_array($num))
        {
          $comment_id=$row['comment_id'];
        
        }
        
        $msg=$comment_id;
      
       $uid=$_GET['uid'];
       $cid=$_SESSION['customer_id'];
       $replay=$_POST['replay'];
       $date = date('Y-m-d H:i:s');
       $query=mysqli_query($con,"update comments set response='$replay',update_date='$date' where comment_id=$msg");
       $result=mysqli_query($con,$query);
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

<h3><i class="fa fa-angle-right"></i> Comments</h3>
            <hr />
 <?php
 
  $query=mysqli_query($con,"SELECT * FROM `comments` where complaint_id='".$_GET['uid']."'");
  
while($row=mysqli_fetch_array($query)) 
{
  ?>
    <div class="row mt" style="">
        <label class="col-sm-2 col-sm-2 control-label"><b>user : </b></label>
        <div class="col-sm-4">
        <p><?php echo htmlentities($row['comment_text']);?></p>
        <p style="color:grey"><?php echo htmlentities($row['comment_date']);?></p>
        </div>
        <?php
         $response=$row['response'];
         if($response!=NULL)
         {?>
           <label class="col-sm-2 col-sm-2 control-label" ><b>replay  </b></label>
            <p><?php echo htmlentities($row['response']);?></p>
             <p style="color:grey"><?php echo htmlentities($row['update_date']);?></p>
            <?php

         }
        else
         {?>
          <label class="col-sm-2 col-sm-2 control-label" style="display:none"><b>replay: </b></label>
         <?php

         }
        
        ?>
       </div>
<?php } ?>
<div class="row mt">
<div class="row mt">
  <form action="" method="post">
  
<label class="col-sm-2 col-sm-2 control-label"><b>Comment :</b></label>
  <input type="text" name="replay" placeholder="message" style="height:150px; width:220px" required>
</div>
</div>
<div class="form-group mt">
<div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-success">send</button>
</form>
</div>
</div>
<!-- comments view section end -->
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


