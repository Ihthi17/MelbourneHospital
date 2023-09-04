<?php include 'connect.php';?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
   
  <br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View Appointment History</h1></b>
  <br><br>
  <?php
   $sql="SELECT * FROM `appointment` LEFT JOIN time_schedule ON appointment.time_schedule_id = time_schedule.id
   left JOIN users ON users.id = appointment.user_id";
   $result=$con->query($sql);
   if($result->num_rows>0)
   {



?>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Specelist</th>
      <th scope="col">Doctor</th>
      <th scope="col">Date</th>
      <th scope="col"> Start Time</th>
      <th scope="col"> End Time</th>
      <th scope="col">Symptoms</th>
    </tr>
  </thead>
  <tbody>
  <?php
    //$count=1;
    while($row=mysqli_fetch_assoc($result))
      {
        $doctorid = $row['doctor_id'];

        $sql2 = "SELECT `Last_Name`, `Specelist` FROM `users` WHERE id='$doctorid'";
 
         $result2=$con->query($sql2);
         //print_r($result);die;
         if($result2->num_rows>0){
           $row2=mysqli_fetch_array($result2);
         }
    ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['p_name'];?></td>
      <td><?php echo $row2['Specelist'];?></td>
      <td><?php echo $row2['Last_Name'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['start_time'];?></td>
      <td><?php echo $row['end_time'];?></td>
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