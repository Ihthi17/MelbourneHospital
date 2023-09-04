<!--docotr time schedule page-->

<?php

session_start(); 
$con=mysqli_connect("localhost","root","","hospital");
if(!$con)
{
    die("error".mysqli_connect_error());
}
if(isset ($_POST['time']))
{
   
    $date=$_POST['date'];
    $s_time=$_POST['s_time'];
    $e_time=$_POST['e_time'];
   $id=$_SESSION['id'];
   $name=$_SESSION['Last_Name'];
    
    $sql="INSERT INTO time_schedule(`user_id`,`date`,`start_time`,`end_time`)VALUES('$id','$date','$s_time','$e_time')";
   // print_r($sql);
    if($con->query($sql)==TRUE)
   {
    $_SESSION["success"]='Your time is Changed Successfully';
      //echo '<script language="javascript">alert("Your Time is Change Successfully");</script>';
    

       
   }
}

?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
<b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;"> Change Time</h1></b>
<br><br>

<div class="container mt-4 p-4">
      <div class="row">
          <div class="col-md-6">
              
              <form action="time_schedule.php" method="post">
                  <!---->
                  <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">
                      Date
                    </label>
                    <div class="col-sm-8 col-lg-8">
                        <input type="date"id="date"class="form-control" name="date" required>
                    </div>
                </div>
                <!---->
                <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">
                        Start Time
                    </label>
                    <div class="col-sm-8 col-lg-8">
                        <input type="time"id="time"class="form-control" name="s_time" required>
                       </div>
                </div>
                <!---->
                <div class="form-group row">
                    <label class="col-sm-4 col-lg-4">
                        End Time
                    </label>
                    <div class="col-sm-8 col-lg-8">
                        <input type="time"id="time"class="form-control" name="e_time" required>
                       </div>
                </div>
                
                <!---->
                <div class="form-group row justify-content-end">
                    <div class="col-sm-5">
                        <button type="submit"class="btn btn-primary" name="time" >
                           Change
                        </button>
                    </div>
                </div>

              </form>
          </div>
          <div class="col-md-6">
              <h2 id="services" class="text-center my-4"></h2>
              <ul id="consultations"class="list-group"></ul>
          </div>
      </div>
  </div>
  





</div>
<?php include('includes/footer.php');?>
<!--sweet alert-->
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