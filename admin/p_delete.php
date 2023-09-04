<?php 
include 'connect.php';
$id=$_GET['pid'];
 $sql="DELETE FROM `patient` WHERE `id`='$id'";

if(mysqli_query($con,$sql)){
    
    header('location:View_Patient_Details.php');
}
else{
    echo mysqli_error($con);
}
?>