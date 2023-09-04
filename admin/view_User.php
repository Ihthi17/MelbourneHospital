<?php  include 'connect.php';
?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View Registration Details</h1></b>
  <br><br>
  <?php
$sql="SELECT * FROM users where type='patient'";
$result=$con->query($sql);
if($result->num_rows>0)
{



?>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Mail Address</th>
      <th scope="col">Password</th>
       
    </tr>
  </thead>
  <tbody>
  <?php
   // $count=1;
    while($row=mysqli_fetch_assoc($result))
      {
        $type = $row['type'];
    ?>
    <tr>
      
      <td><?php echo $row["id"]?></td>
      <td><?php echo $row["p_name"];?></td>
      <td><?php echo $row["phone"];?></td>
      <td><?php echo $row["email"];?></td>
      <td><?php echo $row["password"];?></td>
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