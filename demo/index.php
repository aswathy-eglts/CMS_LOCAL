<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM customer WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['customer_id']=$num['customer_id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$errormsg="Invalid username or password";
$extra="login.php";

}
}

if (isset($_POST['reset']))  
{
      $email=$_POST['email'];
      $password=$_POST['password'];
      $c_password=$_POST['c_password'];
      if($password == $c_password){
        $md_pass=md5($password);
      }
      else{
        $errormsg1="password and confirm password did not match";

      }
      // server side validation
      if(empty($email))
    {
      echo "<script>alert('enter you email')</script>";

    }
    else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
    {
      echo "<script>alert('enter valid email ')</script>";
    }
    else if(empty($password))
    {
       echo "Enter your password";
    }
    else if(strlen($password) < 5 )
    {
      echo "Password must be 5 characters long !";
    }
    else if(empty($c_password))
  {
    echo "Enter your confirm password";
  }
  else if(strlen($c_password) < 5 )
  {
    echo "Confirm Password must be 5 characters long !";
  }
  else if($c_password!=$password)
  {
   echo "Password and Confirm Password doesnot match";
  }
 else
 {

     $sql="UPDATE `customer` SET `password`='$md_pass' where `email`='$email'";

   $result=mysqli_query($con,$sql);

    if ($result == TRUE) {

      echo "<script>alert('Successfully reset password')</script>";
      echo "<script>window.location.href='index.php';</script>";

    }
    else
    {
      header("location:reset.php");
        echo '<script>alert("The email is not registered")</script>';

    }

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

    <title>CMS | User Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
<!-- <script type="text/javascript">
function valid()
{
 if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
return true;
}
</script> -->
  </head>

  <body>

   

	  <div id="login-page">
	  	<div class="container">
	  		<h3 align="center" style="color:#fff"><a href="../index.html" style="color:#fff">Complaint Managent System</a></h3>
<!-- 	<hr /> -->
		      <form class="form-login" name="login" method="post">
		        <h2 class="form-login-heading">LOGIN</h2>
		        <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></p>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="User ID"  required autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" required placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		           </form>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="register.php">
		                    Create an account
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		           <form class="form-login" name="forgot" method="post">
				   
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your details below to reset your password.</p>
								  <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg1){
echo htmlentities($errormsg1);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg1){
echo htmlentities($msg1);
		        		}?></p>
<input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br >
<input type="password" class="form-control" placeholder="New Password" id="password" name="password"  required ><br />
<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="c_password" required >

		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit" name="reset" >Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>
		
		      	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
