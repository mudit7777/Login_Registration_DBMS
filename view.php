<?php include 'dbcon.php';?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

<div class="container">
<h2 style="text-align: center;">User Details</h2>  
   <table style="width:100%" border="2" cellspacing="0">
    <tr style="text-align: center">
      <th>Id</th>
      <th>Username</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Password</th>
      <th>Job</th>
      <th>Operation</th>
    </tr>

    <?php
    $selquery =" select * from registration ";
    $query= mysqli_query($con,$selquery);
  
  while($res=mysqli_fetch_array($query)){
  ?>
  <tr style="text-align: center">
    <td> <?php  echo$res['id']; ?> </td>
    <td> <?php echo $res['username']; ?> </td>
    <td> <?php echo $res['email']; ?> </td>
    <td> <?php echo $res['mobile']; ?> </td>
    <td> <?php echo $res['password']; ?> </td>
    <td> <?php echo $res['job']; ?> </td>
    <td><a href="http://localhost/regisform/update.php?id=<?php echo $res['id']; ?>">
      <i class='far fa-edit'>Edit</a></i></td>
  
  </tr>
  <?php
}
?>
</table>
  </div>
</body>
</html>