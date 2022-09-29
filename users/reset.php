<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset password</title>
   <!-- bootstrap CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css file -->
   <link rel="stylesheet" type="text/css" href="../css/register.css">
    <!--  jquery cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="reset.js"></script>
  <style type="text/css">
   
    .error{
      color:red;
    }
    .card
     {
    
    background-color:#a699b4;
     }
   </style>
 <script>
// $(document).ready(function(){
  
//     $("#pass").hide();
  
//   $("#show").click(function(){
//     $("#pass").show();
//   });
//  }); 
</script>
</head>
<body>
<!-- <?php
include "../navbar.php";

?> -->
<center><h4>Complaint Management System</h4></center>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-4">
          <div class="card text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h4 class="fw-bold mb-4 text-uppercase">RESET PASSWORD</h4>
              <!-- form -->
              <form role="form" method="post" action="" id="resetforms">
            
              <div class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control" name="email"/>
                <label class="form-label" for="typeEmailX">Email</label>
              </div>
              <div id="pass">

              <div class="form-outline form-white mb-4">
                <input type="password" id="pass1" class="form-control form-control" name="password"/>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" id="pass2" class="form-control form-control " name="c_password"/>
                <label class="form-label" for="typePasswordX">Confirm Password</label>
              </div>
              </div>

              
              <input class="btn btn-outline-light btn-lg px-5 my-3" type="submit" value="Reset" name="submit" id="show">
              <!-- <input class="btn btn-outline-light btn-lg px-5" type="reset" value="clear" name="submit"> -->

  </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
include('includes/config.php');
if (isset($_POST['submit']))  
{
      $email=$_POST['email'];
      $password=$_POST['password'];
      $c_password=$_POST['c_password'];
      if($password == $c_password){
        $md_pass=md5($password);
      }
      else{
        echo "<script>alert('password is incorrept');</script>";

      }
      // server side validation
      if(empty($email))
    {
      echo "<script>alert('enter you email')</script>";

    }
    else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
    {
      echo "<script>alert('enter valid email id')</script>";
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

  // Checking emailid and mobile number if already registered
// $ret=mysqli_query($con, "select customer_id from customer where email='$email' ");
// $result=mysqli_fetch_array($ret);
// if($result>0)
// {
// echo '<script>
//           alert("The email is not registered")
//     </script>';
// }

   $sql="UPDATE `customer` SET `password`='$md_pass' where `email`='$email'";

   $result=mysqli_query($con,$sql);

    if ($result == TRUE) 
    {

      echo "<script>alert('Successfully reset password')</script>";
      echo "<script>window.location.href='index1.php';</script>";
      

    }
    else
    {
      header("location:reset.php");
        echo '<script>alert("The email is not registered")</script>';

    }

}

}    
    
          ?>

</body>
</html>
