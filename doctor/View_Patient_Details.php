<!--doctor patient view page-->
<?php session_start();
include 'connect.php';
?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
 
  <br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View Patients' Details</h1></b>
  <br><br>
  <?php
 $sql="SELECT patient.*, users.* FROM `patient` LEFT JOIN users ON patient.user_id = users.id;";
 $result=$con->query($sql);
if($result->num_rows>0)
{



?>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address Line-1</th>
      <th scope="col">Blood Group</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Phone</th>
      <th scope="col">symtoms</th>
    </tr>
  </thead>
  <tbody>
  <?php
    //$count=1;
    while($row=mysqli_fetch_assoc($result))
      {
    ?>
    <tr>
     
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['p_name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['address'];?></td>
      <td><?php echo $row['blood'];?></td>
      <td><?php echo $row['dob'];?></td>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php echo $row['symtom'];?></td>
      <?php
}
 ?>
  <?php
}
else{
    echo "No result found";
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