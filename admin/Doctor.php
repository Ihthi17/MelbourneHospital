<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/dist/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
  form.error{
    color:red;
  }
</style>
<style>
   form .error {
  color: #ff0000;
}
</style>
</head>
<body>
  
</body>
</html>


<?php
include 'connect.php';
//doctor add insert query

if(isset($_POST['add']))
{
 
  $target_dir="Upload/";
  $target_file=$target_dir.basename($_FILES["file"]["name"]);
  
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $type=$_POST['type'];
  $password=$_POST['password'];
  $phone=$_POST['phone'];
  $specelist=$_POST['specelist'];

  
 
 // $file=$_POST['file'];
 if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file))
  {
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
{
  $sql="SELECT * FROM users where email='$email'";
  $run=mysqli_query($con,$sql);
  $num=mysqli_num_rows($run);
  if($num>=1) 
  {
    $_SESSION["warning"]='Email Already Taken';
  }
  else{

  
      $sql="INSERT INTO users(`First_Name`,`Last_Name`,`email`,`Password`,`phone`,`Specelist`,`photo`,`type`)VALUES('$fname','$lname','$email','$password','$phone','$specelist','$target_file','$type')";
    
      if($con->query($sql)==TRUE)
    {
      $_SESSION["success"]='Data Insert successfully';
      //echo '<script language="javascript">alert(" Doctor Information Successfully Stored");</script> ';

    }
  }
  }
}
}


?>

<?php
//$id=$_GET['id'];
//print_r($id);
if(isset($_POST['dele']))
{
  $id=$_GET['id'];
  $sql="DELETE FROM users where id=$id";
 
  if(mysqli_query($con,$sql)){
      
  //header('Doctor.php') ;
  }
  else{
      echo mysqli_error($con);
  }
 
}
?>





<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper"> 
   <div class="content-header">
    <div class="container-fluid">
   <div id="display">
  <!-- <table class="table">-->
   <!--<div class="doctor_add">-->
<!--model popup form-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-sharp fa-solid fa-plus">Add Doctor </i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Doctor Add</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
      <div class="modal-body">
      <form class="form1" action="doctor.php" method="post" id="form" enctype="multipart/form-data">
   <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
            </div>
            <input type="hidden" class="form-control" name="type" value="doctor">

            <div class="col-sm-6 form-group">
                <label for="name-l">Last name</label>
                <input type="text" class="form-control" name="lname" id="name-l" placeholder="Enter your last name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email."required >
            </div>
            <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="password" class="form-control" id="password" placeholder="Enter your password." required>
            </div>
            
            
           
            
            <div class="col-sm-6 form-group">
                <label for="tel">Phone</label>
                <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter Your Contact Number." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="Blood Group">Specelist</label>
                <select class="form-control custom-select browser-default" name="specelist">
                    <option value="Dermatology">Dermatology</option>
<option value="Anesthesiology">Anesthesiology</option>
<option value="Ophthalmology">Ophthalmology</option>
<option value="Pediatrics">Pediatrics</option>
<option value="Psychiatry">Psychiatry</option>
<option value=" Immunology"> Immunology</option>
<option value="General/Clinical Pathology">General/Clinical Pathology</option>
<option value="Nephrology">Nephrology</option>
<option value="Dental">Dental</option>
<option value="MBBS">MBBS</option>

                </select>
            </div>
           
            <div class="col-sm-12 form-group">
                <label for="pass">Photo</label>
                <input type="file"  name="file" class="form-control" id="file"  required>
            </div>
           
           
            
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-dark" id="add">ADD</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--model popup form-->




  
   </div>
        <?php
  /* $sql="SELECT users.id as did, time_schedule.*,appointment. *, users.* FROM `time_schedule`
    LEFT JOIN users ON time_schedule.user_id = users.id
    LEFT JOIN users ON appointment.doctor_id=users.id where type='doctor' ";*/      
 $sql="SELECT * FROM users where type='doctor'";

$result=$con->query($sql);
if($result->num_rows>0)
{


        ?>
   <!--</table>-->
   </div>
  <b> <h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">Doctors Details</h1></b>
  <br><br>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Phone</th>
      <th scope="col">Specelist</th>
      <th scope="col">Photo</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

     
      
    </tr>
  </thead>
  <tbody>
    
      <?php
$count=1;
while($row=mysqli_fetch_assoc($result))
{
  $type = $row['type'];

  $id=$row['id'];


?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['First_Name']; ?></td>
      <td><?php echo $row['Last_Name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['Specelist']; ?></td>
      <td><img class="img-responsive rounded-circle"width="100" height="80" src="<?php echo $row['photo'];?>"></td>
      <td><button id="edit" class="btn btn-primary rounded-circle"><a href="update.php?id=<?php echo $row['id'];?>"class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></button></td>
      <td><button  class="btn btn-danger rounded-circle"><a href="delete.php?id=<?php echo $id;?>"onclick="return confirm('Are you sure?')"class="text-light"><i class="fa-solid fa-trash"></i></a></button></td>
    
    <?php
    }
?>
<?php
}
else{
echo "Result not found";
}


?>
    
    
    </tr>
  </tbody>
</table>
  </div>
 


<?php include('includes/footer.php');?>

<script>
 $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>
<?php 
if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "inserted successfully!",
  icon: "success",
  button: "done!",
});
</script>
  
<?php
unset($_SESSION['success']);
}
 ?>

<?php 
if(isset($_SESSION['warning'])&& $_SESSION['warning']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['warning']; ?>",
  text: "Please add another user!",
  icon: "warning",
  button: "done!",
});
</script>
  
<?php
unset($_SESSION['warning']);
}
 ?>
 <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 <script src="validate/jquery.validate.js"></script>
 <script src="validate/jquery.js"></script>
