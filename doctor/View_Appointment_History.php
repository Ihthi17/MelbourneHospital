<!--docotr appointment view page-->

<?php session_start();
include 'connect.php';
 ?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View Appointment History</h1></b>
  <br><br>
  <?php 

$sql="SELECT * FROM `appointment`  
left JOIN users ON users.id = appointment.doctor_id WHERE users.id = '".$_SESSION['id']."'";


$result=$con->query($sql);



if($result->num_rows>0)
{
  ?>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
      
      <th scope="col">Patient Name</th>
      <th scope="col">Date</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Symptoms</th>
    </tr>
  </thead>
  <tbody>
    <?php 
  while($row=mysqli_fetch_assoc($result))
      {
       
       $user_id = $row['user_id'];

      $sql2 = "SELECT `p_name` FROM `users` WHERE id='$user_id'";

       $result2=$con->query($sql2);
       //print_r($result);die;
       if($result2->num_rows>0){
         $row2=mysqli_fetch_array($result2);
        
       }
        $schedule_id = $row['time_schedule_id'];

       $sql3 = "SELECT `date`,`start_time`,`end_time` FROM `time_schedule` WHERE id='$schedule_id'";
 
        $result3=$con->query($sql3);
        //print_r($result);die;
        if($result3->num_rows>0){
          $row3=mysqli_fetch_array($result3);
         
        }
        
      //  $_SESSION['p_name']= $row['p_name'];
    ?>
    <tr>
      <td><?php echo $row2['p_name'];?></td>
      <td><?php echo $row3['date'];?></td>
      <td><?php echo $row3['start_time'];?></td>
      <td><?php echo $row3['end_time'];?></td>
      <td><?php echo $row['symtoms'];?></td>
    </tr>
    <?php
    }
    ?>
     <?php
   }
   else{
       echo "No result found";
   }
   
   ?>   
      
  </tbody>
</table>
</div>
<?php include('includes/footer.php');?>
<script>
 $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>