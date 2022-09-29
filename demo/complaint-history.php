<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Complaint History</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">
    <style>
    #a{
        padding:8px 16px;
        border:1px solid #ccc;
        
    }
  </style>
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h4><i class="fa fa-angle-right"></i>Your Complaint History</h4>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
                                  <th style="text-align: center">Sl No</th>
                                  <th style="text-align: center">Complaint Number</th>
                                  <th style="text-align: center">Complaint Type</th>
                                  <th style="text-align: center">Vehicle No</th>
                                  <th style="text-align: center">Status</th>
                                  <th style="text-align: center">Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
  <?php 
  $num_page=3;
  $cnt=1;
  // $query=mysqli_query($con,"select * from complaint where customer_id='".$_SESSION['customer_id']."'");
  if(isset($_GET["page"])){
    $page=$_GET["page"];
  }
  else{
    $page=1;
  }
  $start_from=($page-1)*3;
  $query=mysqli_query($con,"select * from complaint where customer_id='".$_SESSION['customer_id']."' limit $start_from,$num_page");
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td><?php echo htmlentities($cnt);?></td>
                                  <td align="center"><?php echo htmlentities($row['complaint_id']);?></td>
                                  <td align="center"><?php echo htmlentities($row['complaint_type']);?></td>
                                  <td align="center"><?php echo htmlentities($row['vehicle_no']);?></td>
                                
                                  <td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="not process yet" or $status==1)
                                    { ?>
                                      <button type="button" class="btn btn-danger">Not Process Yet</button>
                                   <?php }
 if($status=="in process"){ ?>
<button type="button" class="btn btn-warning">In Process</button>
<?php }
if($status=="closed") {
?>
<button type="button" class="btn btn-success">Closed</button>
<?php } ?>
                                   <td align="center">
                                   <a href="details.php?cid=<?php echo htmlentities($row['complaint_id']);?>">
<button type="button" class="btn btn-primary">view </button></a>
                                   
                                   <a href="complaint-update.php?cuid=<?php echo htmlentities($row['complaint_id']);?>">
<button type="button" class="btn btn-primary">update</button></a>
                                   </td>
                                </tr>
                             
                              <?php $cnt=$cnt+1; } ?>
                              </tbody>
                          </table>
                          </div>
  </div>
</div>
</section>

                          <!-- pagination start -->
                          <div align="center">
								<?php
								$sql=mysqli_query($con,"select * from complaint where customer_id='".$_SESSION['customer_id']."'");
								$records=mysqli_num_rows($sql);
							    $total_pages=ceil($records/$num_page);
								 if($page>1)
                 {
                  echo "<a href='complaint-history.php?page=".($page-1)."' class='btn btn-primary' id='a'><<</a>" ;
                 }
								for($i=1;$i<$total_pages;$i++)
								{
									echo "<a href='complaint-history.php?page=".$i."' class='btn btn-primary' id='a'>".$i."</a>";
								}
                if($i>$page)
                {
                  echo "<a href='complaint-history.php?page=".($page+1)."' class='btn btn-primary' id='a'> >> </a>";
                }
								
								?>
</div>
								<!-- pagination end -->

      </section>
<!-- <?php include("includes/footer.php");?> -->
  </section>




    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/bootstrap-switch.js"></script>

  </body>
</html>
<?php } ?>
