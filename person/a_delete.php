<?php 
include 'connect.php';
$id=$_GET['aid'];
 $sql="DELETE FROM `appointment` WHERE `id`='$id'";

if(mysqli_query($con,$sql)){
    
    header('location:View_Appointment_History.php');
}
else{
    echo mysqli_error($con);
}
?>