<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>
<body>
    
</body>
</html>

<?php
include 'connect.php';
if (isset($_POST['update'])) {
     $target_dir="Upload/";
  $target_file=$target_dir.basename($_FILES["file"]["name"]);
$firstname = $_POST['fname'];
$id=$_POST['id'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$phone=$_POST['phone'];
$specelist = $_POST['specelist']; 
//$file=$_POST['file'];
if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
{
$sql = "UPDATE `users` SET `First_Name`='$firstname',`Last_Name`='$lastname',`email`='$email',`Specelist`='$specelist',`phone`='$phone',`photo`='$target_file' WHERE `id`='$id'"; 

if(mysqli_query($con,$sql)){
$_SESSION['success']="Data Updated Successfully";
    header("Location: doctor.php");

}
    else
    {
        echo mysqli_error($con);
    }
} 
}
if (isset($_GET['id'])) {

$id = $_GET['id']; 

$sql = "SELECT * FROM `users` WHERE `id`='$id'";

$result = $con->query($sql); 

if ($result->num_rows > 0) 
{        

while ($row = $result->fetch_assoc())
{
    $firstname = $row['First_Name'];
    $lastname = $row['Last_Name'];
    $email = $row['email'];
    $specelist  = $row['Specelist'];
    $phone = $row['phone'];
    $file = $row['photo'];

    $id = $row['id'];

}



?>
 <form class="form1" action="update.php" method="post" id="frm" enctype="multipart/form-data">
   <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." value="<?php echo  $firstname; ?>" required>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <input type="hidden" class="form-control" name="type" value="doctor">

            <div class="col-sm-6 form-group">
                <label for="name-l">Last name</label>
                <input type="text" class="form-control" name="lname" id="name-l" placeholder="Enter your last name."  value="<?php echo  $lastname; ?>" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." value="<?php echo  $email; ?>" required>
            </div>
            <div class="form-group">
                
            </div>
            
            
           
            
            <div class="col-sm-6 form-group">
                <label for="tel">Phone</label>
                <input type="tel" name="phone" class="form-control" id="tel" placeholder="Enter Your Contact Number."  value="<?php echo  $phone; ?>" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="Blood Group">Specelist</label>
                <select class="form-control custom-select browser-default" name="specelist"  value="<?php echo  $specelsit; ?>">
                    <option value="Dermatology">Dermatology</option>
<option value="Anesthesiology">Anesthesiology</option>
<option value="Ophthalmology">Ophthalmology</option>
<option value="Pediatrics">Pediatrics</option>
<option value="Psychiatry">Psychiatry</option>
<option value="Immunology"> Immunology</option>
<option value="General/Clinical Pathology">General/Clinical Pathology</option>
<option value="Nephrology">Nephrology</option>
<option value="Dental">Dental</option>
<option value="MBBS">MBBS</option>

                </select>
            </div>
           
            <div class="col-sm-12 form-group">
                <label for="pass">Photo</label>
                <input type="file" name="file" class="form-control" id="file"  value="../admin<?php echo $target_file; ?>">
                <input type="hidden" value="<?php echo $file;?>">
            </div>
            <tr>
                                    
                                    <td><img src="<?php echo $file ?>" alt="Profile Picture" width="200" height="200"/></td>
                                </tr>
           
            <div class="col-sm-12">
          <center> <button class="btn btn-success" id="add" type="submit" name="update" ><i class="fa-solid fa-user"></i>Update</button></center> 
            
        </div>
   </form>
   <?php

} else{ 

  //  header('Location:doctor.php');

} 

}

?> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>
<?php 
if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "Updated successfully!",
  icon: "success",
  button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
 ?>

