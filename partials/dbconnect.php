<?php


 

  
  $server="localhost";
  $username="root";
  $passward="";
  $database="users";
  $conn=mysqli_connect($server,$username,$passward,$database);
  if(!$conn){
      
  
      die ("Error".mysqli_connect_error());
  }
  
  
  
   
  
    
  
  
  
?>