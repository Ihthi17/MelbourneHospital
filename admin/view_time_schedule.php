


<?php 
include 'connect.php';
session_start();
?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
   <th scope="col"></th>
  <br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">  Viwe Doctor ChangeTime</h1></b>
  <br><br>
  
  <?php
 $sql="SELECT time_schedule.*, users.* FROM `time_schedule` LEFT JOIN users ON time_schedule.user_id = users.id;";
 $result=$con->query($sql);
if($result->num_rows>0)
{



?>
<table id="datatable" class="table table-dark">
  <thead>
    <tr>
      
      <th scope="col">Doctor Name</th>
      <th scope="col">Specelist</th>
      <th scope="col">date</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $count=1;
    while($row=mysqli_fetch_assoc($result))
      {
        
    ?>
    <tr>
      
     
      <td><?php echo $row["Last_Name"];?></td>
      <td><?php echo $row["Specelist"];?></td>
      <td><?php echo $row["date"];?></td>
      <td><?php echo $row["start_time"];?></td>
      <td><?php echo $row["end_time"];?></td>
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