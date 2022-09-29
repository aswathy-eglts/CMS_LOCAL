<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// date_default_timezone_set('Asia/Kolkata');
// $currentTime = date( 'd-m-Y h:i:s A', time () );
}

if(isset($_GET['uid']))
{
$userid=$_GET['uid'];
$query=mysqli_query($con,"delete from customer where customer_id='$userid'");
header('location:manage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Dashboard</title>

     <!-- Bootstrap core CSS -->
	 <link href="assetss/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assetss/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assetss/css/style.css" rel="stylesheet">
    <link href="assetss/css/style-responsive.css" rel="stylesheet">

    <link href="assetss/css/table-responsive.css" rel="stylesheet">
	<link href="assetss/css/example.css" rel="stylesheet">
  </head>

  <body>
  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>manage user</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                          <section id="">
							<div class="table-responsive">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr style="text-align: center">
							  <th style="text-align: center">Sl.No</th>
											<th style="text-align: center">FullName</th>
											<th style="text-align: center">Email</th>
											<th style="text-align: center">Gender</th>
											<th style="text-align: center">Age</th>
											<th style="text-align: center">Contact No</th>
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
  $query=mysqli_query($con,"select * from customer limit $start_from,$num_page");
  if(mysqli_num_rows($query)>0){
while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td><?php echo htmlentities($cnt);?></td>
                                  <td align="center"><?php echo htmlentities($row['firstName']);?> <?php echo htmlentities($row['lastName']);?></td>
                                  <td align="center"><?php echo htmlentities($row['email']);?></td>
                                  <td align="center"><?php echo htmlentities($row['gender']);?></td>
								  <td align="center"><?php echo htmlentities($row['age']);?></td>
								  <td align="center"><?php echo htmlentities($row['phno']);?></td>
                                
                                   <td align="center"><a href="userprofiles.php?uid=<?php echo htmlentities($row['customer_id']);?>"title="View Details">
<button type="button" class="btn btn-primary">View</button>
											</a>
<a href="manage.php?uid=<?php echo htmlentities($row['customer_id']);?>" title="Delete" onClick="return confirm('Do you really want to delete ?')">
<button type="button" class="btn btn-danger">Delete</button></a></td>
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
								$sql=mysqli_query($con,"select * from customer ");
								$records=mysqli_num_rows($sql);
							  $total_pages=ceil($records/$num_page);
                     
                if($page>1)
                {
                  echo "<a href='manage.php?page=".($page-1)."' id='a' class='btn btn-primary'><<</a>";
                }
                  
                  for($i=1;$i<$total_pages;$i++)
								{
                                  
									echo "<a href='manage.php?page=".$i."' id='a' class='btn btn-primary'>".$i."</a>";
								}
								
                if($i>$page)
                {
                  echo "<a href='manage.php?page=".($page+1)."' id='a' class='btn btn-primary'>>></a>";
                }
                  
								?>

								<!-- pagination end -->
                                </div>
                                </section>

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



