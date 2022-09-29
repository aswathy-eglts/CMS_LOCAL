<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- css file -->
   <!-- <link rel="stylesheet" type="text/css" href="../css/register1.css"> -->
   <!-- sweet alert -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--  jquery cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="assets/js/register.js"></script>
  </head>
  <style type="text/css">
    .red{
      color: red;
    }
    .error{
      color:red;
    }
    a{
      text-decoration: none; 
    }
   </style>
<body style="background-image: url(assets/img/login-bg.jpg);">
    <!-- registration form -->
 <a href="../index.html"><center><h4>Complaint Management Sysytem</h4></center></a>

    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-10 col-lg-9 col-xl-5">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 ">Registration Form</h3>
            <!-- form -->
            <form role="form" method="post" action="" id="registrationform">
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                   <input type="text" id="firstName" class="form-control required form-control-lg" name="firstName" placeholder="firstName" 
                   />
                   <span class="red">*<small></small></span> 
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                   <input type="text" id="lastName" class="form-control required  form-control-lg" name="lastName" placeholder="LastName" />
                   <span class="red">*<small></small></span>
                    
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                  <input type="email" id="emailAddress" class="form-control required form-control-lg" name="email" placeholder="Email" />
                  <span class="red">*<small></small></span>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                   
                  <select class="select form-control form-control-lg" name="gender">
                    <option value="1" disabled>Choose option</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="other">Other</option>
                  </select>
                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <input type="number" id="age" class="form-control required form-control-lg" name="age" placeholder="age" />
                  <span class="red">*<small></small></span>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" class="form-control required form-control-lg" name="phno" placeholder="phone number" />
                    <span class="red">*<small></small></span>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <input type="password" id="pass1" class="form-control required form-control-lg" name="password" placeholder="password" />
                  <span class="red">*<small></small></span>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" id="pass2" class="form-control required form-control-lg" name="c_password" placeholder="Confirm password" />
                     <span class="red">*<small></small></span>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <input class="btn btn-primary btn-lg" type="submit" id="submit" value="Submit" name="submit"/>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                  <a class="" href="index1.php">
                       sign in
                   </a>
                  </div>

                </div>
              </div>
              <!-- <div class="mt-4 pt-2"> -->
                <!-- <input class="btn btn-primary btn-lg" type="submit" id="submit" value="Submit" name="submit"/> -->
                <!-- <div class="log"> -->
		               <!-- <div class="">
                  <a class="" href="index1.php">
                       sign in
                   </a>
               </div> -->

              </div>
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</script>

<!-- database connection -->
<?php
include ("includes/config.php");
if(isset($_POST['submit']))
{

  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];
  $phno=$_POST['phno'];
  $password=$_POST['password'];
  $c_password=$_POST['c_password'];
        if($password == $c_password){
          $md_pass=md5($password);
        }
        else{
          echo "<script>alert('password is incorrept');</script>";

        }
// server side validation
  if(empty($firstName)){
    echo "<script>alert('enter name')</script>";
    }
    else if(!preg_match("/^[a-zA-Z]*$/",$firstName))
         {
            echo "must enter albhabates";
          }
          
    else if(empty($lastName))
       {
        echo "<script>alert('enter your lastname')</script>";
       }
    else if(!preg_match("/^[a-zA-Z]*$/",$lastName))
       {
        echo "must enter albhabates";
       }
    else if(empty($email))
    {
      echo "<script>alert('enter you email')</script>";

    }
    else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
    {
      echo "enter valid email id";
    }
    else if(empty($age))
       {
        echo "<script>alert('enter your age')</script>";
       }
    else if(!preg_match("/^[0-9]*$/",$age))
       {
        echo "must enter numeric value";
       }
    else if(empty($phno))
    {
    echo "<script>alert('enter your phone number')</script>";
    }
    else if(!is_numeric($phno))
    {
      echo "Mobile number must be numeric only!";
    }    
    else if(strlen($phno)!=10)
    {
      echo "Mobile number should be 10 digit only!";

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
 //Checking emailid  if already registered
$ret=mysqli_query($con, "select customer_id from customer where email='$email' ");
$result=mysqli_fetch_array($ret);
if($result>0){
 echo "<script>alert('This email already associated with another account');</script>";
}
else{
  $sql="INSERT INTO `customer`(`customer_id`, `firstName`, `lastName`, `email`, `gender`, `age`, `phno`, `password`) 
  VALUES (0,'$firstName','$lastName','$email','$gender','$age','$phno','$md_pass')";
  $result=mysqli_query($con,$sql);
  if ($result) {
echo "<script>alert('Successfully Registered')</script>";
echo "<script>window.location.href='register.php';</script>";
} else {
echo "<script>alert('Something went wrong. Please try again.')</script>";
echo "<script>window.location.href='register.php';</script>";
}
}
}
}
    
?>
    

</body>
</html>
