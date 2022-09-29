<?php
session_start();
include('include/config.php');
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
								<h3>user complaints</h3>
							</div>
							<div class="module-body table">

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 t
								able table-bordered table-striped	 display" width="100%">
									<thead>
										<tr style="text-align: center">
											<th style="text-align: center">sl.no</th>
											<th style="text-align: center">Complaint Id</th>
											<th style="text-align: center">Complaint Type</th>
											<th style="text-align: center">Complaint Details</th>
											<th style="text-align: center" style="text-align: center">vehicle No</th>
											<th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from complaint where customer_id='".$_GET['uid']."'");
$cnt=1;
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
											
										<?php $cnt=$cnt+1; } ?>
										
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



  </body>
</html>



