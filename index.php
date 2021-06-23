

<?php
include 'dbconnection.php';
if(isset($_POST['submit'])){
$fullName= mysqli_real_escape_string($conn ,$_POST['fullName']);
$email= mysqli_real_escape_string($conn ,$_POST['email']);
$userName= mysqli_real_escape_string($conn ,$_POST['userName']);
$password= mysqli_real_escape_string($conn ,$_POST['password']);
$password2= mysqli_real_escape_string($conn ,$_POST['password2']);

$pass=password_hash($password,PASSWORD_BCRYPT);
$pass2=password_hash($password2,PASSWORD_BCRYPT);

$emailQuery="select * from registration where email='$email'";
$runQuery=mysqli_query($conn ,$emailQuery);

$emailCount=mysqli_num_rows($runQuery);
if($emailCount>0)
{
    ?>
    <script>
                alert ("email already exist");
              </script>
              <?php


}else{
    if($password === $password2)
    {
        $insertQuery="INSERT INTO registration (fullName, email, userName, password, password2)
         VALUES('$fullName','$email','$userName','$pass','$pass2')";
         $runQuery2=mysqli_query($conn, $insertQuery);

         if($runQuery2){
             ?>
             <script>
               alert ("inserted successful");
             </script>
             <?php
             }else{
                 ?>
                <script>
                alert ("not inserted");
              </script>
              <?php
             }
         
    }
    else{
        ?>
        <script>
                alert ("password are not matching");
              </script>
              <?php
    }
    

}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>sign up Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {     
    font-size: 15px;
    font-weight: bold;
}
@media only screen and (max-width: 600px) {
  body {
    background-color:purple;
  }
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">sign up</h2>  
        <div class="form-group">
            <label>Full name :</label>
            <input type="text" name="fullName" class="form-control" placeholder="full name" required="required">
        </div>     
        <div class="form-group">
            <label>Email :</label>
            <input type="text" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <label>User name :</label>
            <input type="text" name="userName" class="form-control" placeholder="userName" required="required">
        </div>
        <div class="form-group">
        <label>password  :</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
        <label>reapeat password  :</label>
            <input name="password2" type="password" class="form-control" placeholder="reapeat Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">sign up</button>
            <button type="reset" name="reset" class="btn btn-primary btn-block">reset</button>
        </div>
               
    </form>
</div>
</body>
</html>




