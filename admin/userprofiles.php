<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Userprofile | Complaints</title>

   <!-- Bootstrap core CSS -->
	 <link href="assetss/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assetss/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assetss/css/style.css" rel="stylesheet">
    <link href="assetss/css/style-responsive.css" rel="stylesheet">
	<link href="assetss/css/example.css" rel="stylesheet">
    <link href="assetss/css/table-responsive.css" rel="stylesheet">
    
  </head>

  <body>
  <section id="container" >
  <?php include('includes/header.php');?>
  <?php include('includes/sidebar.php');?>	
  <section id="main-content">
	<div class="wrapper">
		<div class="container">
			<div class="row">
               
			<div class="span9">
					<div class="content">

	                  <div class="module">
							<div class="module-head">
								<h4>user complaints</h4>
							</div>
							<div class="module-body table">
								<div class="table-responsive">

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 t
								able table-bordered table-striped	 display" width="100%">
									<thead>
										<tr style="text-align: center">
											<th style="text-align: center">sl.no</th>
											<th style="text-align: center">Complaint Id</th>
											<th style="text-align: center">Complaint Type</th>
											<th style="text-align: center">Complaint Details</th>
											<th style="text-align: center">vehicle No</th>
											<th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from complaint where customer_id='".$_GET['uid']."'");
$cnt=1;
if(mysqli_num_rows($query)>0){
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td align="center"><?php echo htmlentities($cnt);?></td>
											<td align="center"><?php echo htmlentities($row['complaint_id']);?></td>
											<td align="center"><?php echo htmlentities($row['complaint_type']);?></td>
											<td align="center"> <?php echo htmlentities($row['description']);?></td>
											<td align="center"><?php echo htmlentities($row['vehicle_no']);?></td>
											<td align="center" style="color:red"><?php 
                                    $status=$row['status'];
                                    if($status=="not process yet" or $status==1)
                                    { 
                                      echo "Not Process Yet";
                                    }
									else{
										echo htmlentities($row['status']);
							}
 ?>
 </td>
										
<td align="center"><a href="status.php?cuid=<?php echo htmlentities($row['complaint_id']);?>"title="status set">
<button type="button" class="btn btn-primary">status set</button>
											</a>
<a href="replay-comments.php?uid=<?php echo htmlentities($row['complaint_id']);?>" title="view")>
<button type="button" class="btn btn-primary">view</button></a>

										</td>
                        </tr>
										<?php $cnt=$cnt+1; } }  
                                        
                                        else{?>
                                            <table align="center" style="color:red;font-size:15px;"><tr><td>no record found<td><tr> </table>                                     
                                           
                                      <?php } ?>
									  </div>	
								</table>
							</div>
						</div>						
							
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
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



