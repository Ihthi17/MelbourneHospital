<!--patient page-->
<?php include 'connect.php';
session_start();
?>
<?php  
if(isset($_POST['submit']))
{
    $location=$_POST['Locality'];
    $blood=$_POST['blood'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $symtom=$_POST['symtom'];
    $id=$_SESSION['id'];

    $sql="INSERT INTO patient(`user_id`,`address`,`blood`,`dob`,`gender`,`symtom`) values('$id','$location','$blood','$dob','$gender',' $symtom')";
    //print_r($sql);die;
     if($con->query($sql)==TRUE)
     {
        $_SESSION["success"]='Your details stored successfully';

       //echo '<script language="javascript">alert(" Your Information Successfully Stored");</script> ';
      
     }

}
?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
    <br><br>
<b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">  Fill Form</h1></b>
<br><br>
<div class="container">
        
        <form action="patient.php" method="post">
          
        <div class="row jumbotron">
            <div class=" form-group">
                
            </div>
            <div class="form-group">
               
            </div>
            <div class=" form-group">
              
            </div>
            <div class="col-sm-6 form-group">
                <label for="address-1">Address Line-1</label>
                <input type="address" class="form-control" name="Locality" id="address-1" placeholder="Locality/House/Street no." required>
            </div>
            
           
           
            <div class="col-sm-6 form-group">
                <label for="Blood Group">Blood Group</label>
                <select class="form-control custom-select browser-default" name="blood">
                    <option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>

                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="Date">Date Of Birth</label>
                <input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="sex">Gender</label>
                <select id="sex" class="form-control browser-default custom-select" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="unspesified">Unspecified</option>
            </select>
            </div>
            
            <div class="form-group">
                
            </div>
            <div class="col-sm-6 form-group">
                <label for="pass">symtoms</label>
                <textarea name="symtom" id="" cols="145" rows="3" required></textarea>
            </div>
           
            <div class="col-sm-12">
            </div>
            <div class="col-sm-12">
          <center> <button  style="width: 90px ; height:35px ; border-radius:10px; background-color:blue;color:white;" type="submit"  name="submit"><i class="fa-solid fa-user"></i> Submit</button></center> 
            
        </div>
        </form>
</div>
<?php include('includes/footer.php');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>
<!--sweet alert start-->

<?php
    if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "Details stored successfully!",
  icon: "success",
  button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
?>