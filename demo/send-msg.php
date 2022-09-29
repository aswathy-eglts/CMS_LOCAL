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
      
      $comment_id=$_GET['comment_id'];
       $uid=$_GET['uid'];
       $cid=$_SESSION['customer_id'];
       $replay=$_POST['replay'];
       $aid=$_SESSION['admin_id'];
       $query=mysqli_query($con,"update comments set 
       response='$replay'  where  comment_id='".$_GET['comment_id']."'");
       $result=mysqli_query($con,$query);
     if ($result)
     {
        echo "<script>alert('Success')</script>";
        echo "<script>window.location.href='replay.php';</script>";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
       <label class="col-sm-2 col-sm-2 control-label"><b>Replay : </b></label>
        <div class="col-sm-4">
        <input type="text" name="replay">
        <input type="submit" value="send" name="submit">
              </div>
    </form>  
</body>
</html>
<?php } ?>