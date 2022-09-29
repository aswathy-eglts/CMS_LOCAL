<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index1.php');
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
    <link href="assets/css/example.css" rel="stylesheet">
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
                        <div class="table-responsive">
                          <!-- <section id="unseen"> -->
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
    if(isset($_GET["page"])){
    $page=$_GET["page"];
  }
  else
  {
    $page=1;
  }
  $start_from=($page-1)*3;
  $query=mysqli_query($con,"select * from complaint where customer_id='".$_SESSION['customer_id']."' limit $start_from,$num_page");
  if(mysqli_num_rows($query)>0){
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
                                   <a href="detailss.php?cid=<?php echo htmlentities($row['complaint_id']);?>">
<button type="button" class="btn btn-primary">view</button></a>
                                   
                                   <a href="complaint-update.php?cuid=<?php echo htmlentities($row['complaint_id']);?>">
<button type="button" class="btn btn-primary">update</button></a>

<a href="delete-complaint.php?cuid=<?php echo htmlentities($row['complaint_id']);?>" onClick="return confirm('Do you really want to delete ?')">
<button type="button" class="btn btn-danger">Delete</button></a>
                                   </td>
                                </tr>
                             
                              <?php $cnt=$cnt+1; }} 
                              else{?>
                                    <table align="center"><tr><td style="color:red; font-size:15px">no record found</td></tr></table>
                               
                              <?php }?>
                              </tbody>
                              </div>
                          </table>
                          <br>
                          <br>
              
    </div>
  </div>
</div>

</section>
    <div align="center">
                          <!-- pagination start -->
								<?php
								$sql=mysqli_query($con,"select * from complaint where customer_id='".$_SESSION['customer_id']."'");
								$records=mysqli_num_rows($sql);
							  $total_pages=ceil($records/$num_page);
                     
                if($page>1)
                {
                  echo "<a href='complaints-history.php?page=".($page-1)."' id='a' class='btn btn-primary'><<</a>";
                }
                  
                  for($i=1;$i<$total_pages;$i++)
								{
                                  
									echo "<a href='complaints-history.php?page=".$i."' id='a' class='btn btn-primary'>".$i."</a>";
								}
								
                if($i>$page)
                {
                  echo "<a href='complaints-history.php?page=".($page+1)."' id='a' class='btn btn-primary'>>></a>";
                }
                  
								?>

								<!-- pagination end -->
                                </div>
                                </section>

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
<?php } ?>
