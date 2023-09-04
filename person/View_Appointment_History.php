<?php session_start();
include 'connect.php' ;
?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View Appointment History</h1></b>
  <br><br>
  <?php 

  $sql="SELECT appointment.id as aid,appointment.* ,time_schedule.* FROM `appointment` LEFT JOIN time_schedule ON appointment.time_schedule_id = time_schedule.id
 left JOIN users ON users.id = appointment.user_id WHERE users.id = '".$_SESSION['id']."'";
 
$result=$con->query($sql);


//print_r($result);die;
if($result->num_rows>0)
{
  ?>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Doctor</th>
      <th scope="col">Specelist</th>
      <th scope="col">Date</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Symtoms</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    
    while($row=mysqli_fetch_assoc($result))
      {
      
      $doctorid = $row['doctor_id'];

      $sql4 = "SELECT `Last_Name`, `Specelist` FROM `users` WHERE id='$doctorid'";

        $result4=$con->query($sql4);
        //print_r($result);die;
        if($result4->num_rows>0){
          $row4=mysqli_fetch_array($result4);
        }
        $id=$row['aid'];
    ?>
    <tr>
    <td><?php echo $row['aid'];?></td>
      <td><?php echo $row4['Last_Name'];?></td>
      <td><?php echo $row4['Specelist'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['start_time'];?></td>
      <td><?php echo $row['end_time'];?></td>
      <td><?php echo $row['symtoms'];?></td>
      <td><button  class="btn btn-danger rounded-circle"><a href="a_delete.php?aid=<?php echo $id;?>"onclick="return confirm('Are you sure?')"class="text-light"><i class="fa-solid fa-trash"></i></a></button></td>

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