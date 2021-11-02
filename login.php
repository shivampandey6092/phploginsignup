<?php

$login=false;
$showError=false;

  
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'C:\xampp\htdocs\loginsys\partials\dbconnect.php';
  
  

 $username=$_POST['username'];
 
 $passward=$_POST['passward'];


  //$sql="SELECT * FROM `users2` WHERE username='$username' AND password='$passward'";
  $sql="SELECT * FROM `users2` WHERE username='$username'";
   $result=mysqli_query($conn , $sql);
  $num=  mysqli_num_rows($result);
   if($num==1){
     while($row=mysqli_fetch_assoc($result)){
       if(password_verify($passward,$row['password'])){

       
     
     $login=true;
     session_start();
     $_SESSION['loggedin']=true;
     $_SESSION['username']=$username;
     header("location:\loginsys\welcome.php");
       }
       else{
        $showError="Invalid Credintials";
       }
      }

   }
  
   else{
     $showError="Invalid Credintials";
   
  }
}
   



?>

 <!doctype html>

  <head>
    <style>
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
if($login){
    echo'
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You Are logged In !
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
        <h1 class="text-center">Login Your Self </h1>
        <form action="/loginsys/login.php" method="post">
  <div class="form-group col-md-6">
    <label for="username" class="form-label">User Name</label>
    <input type="text" name="username" class="form-control" id="username">
    
  </div>
  
  <div class="form-group col-md-6">
    <label for="passward" class="form-label">Password</label>
    <input type="password" name="passward"class="form-control" id="passward">
  </div>
  
  
  <button type="submit" class="btn btn-primary col-md-6">Login</button>
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
 
