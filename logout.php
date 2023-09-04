<?php
$con=mysqli_connect("localhost","root","","hospital");
if(!$con)
{
    die("error".mysqli_connect_error());
}
  session_start();
  session_destroy();

header("Location:index.php");


  


 

?>