<?php
include 'connect.php';
$id=$_GET['id'];
echo $sql="delete from users where id=$id";
if(mysqli_query($con,$sql)){
    
    header('location:doctor.php');
}
else{
    echo mysqli_error($con);
}

?>

