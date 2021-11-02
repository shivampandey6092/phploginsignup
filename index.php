<?php


 $showAlert=false;
$showError=false;
  
  

  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'C:\xampp\htdocs\loginsys\partials\dbconnect.php';
 $username=$_POST['username'];
 $email=$_POST['email'];
 $passward=$_POST['passward'];
 $cpassward=$_POST['cpassward'];
 //$exists=false;
 // check wheter same username exist or not in the database 
 
 $exitsql="SELECT * FROM `users2` WHERE username='$username'";
 $result=mysqli_query($conn , $exitsql);
 $numexist=mysqli_num_rows($result);
 if($numexist >0){
  $showError="Username alredy exist";

 }
 else{
 if(($passward==$cpassward)){
   $hash=password_hash($passward,PASSWORD_DEFAULT);// it will save passward in hash format so no ine can read it

  $sql="INSERT INTO `users2` ( `Username`, `email`, `password`, `date`)
   VALUES ('$username', '$email', '$hash', current_timestamp())";
   $result=mysqli_query($conn , $sql);
   if($result){
     $showAlert=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      header("location:\loginsys\welcome.php");
   }
  }
   else{
     $showError="Password not matchs or username exist";
   
  }
}
}
   



?>

 <!doctype html>

  <head>
    <style>
      *{
        color:black;
      
        
      }
      .container , form{
        margin-left:30%;
       
      }
      .container.h1{
        color:red;
      }
      </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php require 'C:\xampp\htdocs\loginsys\partials\_nav.php' ?>
     
<?php
if($showAlert){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showError){
  echo'
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error !</strong> '.$showError.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
    
    
 
       
    
     

    <div class="container">
        <h1 class="text-center">Sign up with us </h1>
        <form action="/loginsys/signup.php" method="post">
  <div class="form-group col-md-6">
    <label for="username" class="form-label">User Name</label>
    <input type="text" maxlength="11" name="username" class="form-control" id="username">
    <div id="emailHelp" class="form-text">Make Sure The length of username must be 11</div> 
    
  </div>
  <div class="form-group col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" maxlength="123"name="email" class="form-control" id="email" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group col-md-6">
    <label for="passward" class="form-label">Password</label>
    <input type="password" name="passward"class="form-control" id="passward">
  </div>
  <div class="form-group col-md-6">
    <label for="cpassward" class="form-label"> Confirm Password</label>
    <input type="password" name="cpassward" class="form-control" id="cpassward">
    <div id="emailHelp" class="form-text">Make Sure Passward matchs</div> 
  </div>
  
  <button type="submit" class="btn btn-primary col-md-6">Sign Up</button>
</form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
 
