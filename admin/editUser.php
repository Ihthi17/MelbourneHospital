<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
  <form action="routes/route.php" method="post">
    <input type="text" name="email">
    <input type="text" name="password">
    <input type="hidden" name="editUser">
    <input type="hidden" name="id" value="1">
    <input type="submit" value="Submit">
  </form>
</div>
<?php include('includes/footer.php');?>