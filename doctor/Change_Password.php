<!--doctor change his old password-->

<?php
session_start();
include 'connect.php';
if(isset($_POST['submit']))
{
   // print_r($_SESSION);die;
    $psw_o=$_POST["o_pass"];
    $psw_n=$_POST["n_pass"];
    $session_id=$_SESSION["id"];
    $sql=mysqli_query($con,"SELECT `password` FROM users where `password`='$psw_o' && id='$session_id'");
    $num=mysqli_fetch_array($sql);
    if($num>0)
    {
     $con=mysqli_query($con,"update users set password='$psw_n' where id='$session_id'");
     
    $_SESSION['success']="Password Changed Successfully !!";
    }
    else
    {
    $_SESSION['error']="Old Password not match !!";
    }
    }

?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
 
<div class="content-wrapper">
<b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">Change Password</h1></b>

<table class="table">
        <form action="" method="post">
        <tr>
        <div class="col-sm-4 form-group">
              <td> <label for="">Old Password</label></td> 
                <td><input type="password" name="o_pass" class="form-control" id="o_pass"  required>
                <i id="check" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>
              </td>
                
            </div>
</tr>
<div class="col-sm-4 form-group">
              <td> <label for="">New Password</label></td> 
                <td><input type="password" name="n_pass" class="form-control" id="n_pass"  required>
                <i id="check1" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>
              </td>
            </div>
</tr>
<tr><td><button class="btn btn-primary" type="submit" name="submit">Change</button>
            </form>
            <table>
</div>

<?php include('includes/footer.php');?>

<script>
   $(document).ready(function(){
    $('#check').click(function(){
       
       if($(this).hasClass('fa-eye-slash')){
          
         $(this).removeClass('fa-eye-slash');
         
         $(this).addClass('fa-eye');
        
         $('#o_pass').attr('type','text');
           
       }else{
        
         $(this).removeClass('fa-eye');
         console.log('hello');
         $(this).addClass('fa-eye-slash');  
         
         $('#o_pass').attr('type','password');
       }
   });

  });

  $(document).ready(function(){
    $('#check1').click(function(){
       
       if($(this).hasClass('fa-eye-slash')){
          
         $(this).removeClass('fa-eye-slash');
         
         $(this).addClass('fa-eye');
        
         $('#n_pass').attr('type','text');
           
       }else{
        
         $(this).removeClass('fa-eye');
         console.log('hello');
         $(this).addClass('fa-eye-slash');  
         
         $('#n_pass').attr('type','password');
       }
   });

  });
</script>
<!--sweet alert-->
<?php 
if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "your password changed successfully!",
  icon: "success",
  button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
?>
<?php
if(isset($_SESSION['error'])&& $_SESSION['error']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['error']; ?>",
  text: "your password  not changed !",
  icon: "error",
  button: "done!",
});
</script>
<?php
unset($_SESSION['error']);
}
 ?>