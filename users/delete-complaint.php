<?php
include('includes/config.php');


if(isset($_GET['cuid']))
{
$userid=$_GET['cuid'];
echo "$userid";
$query="delete from complaint where complaint_id='$userid'";
$res=mysqli_query($con,$query) or die(mysqli_error($con));
if($res)
{
    header('location:complaints-history.php');
}
else{
    echo "error";
}
}
?>

