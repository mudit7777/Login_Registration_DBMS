<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php include 'dbcon.php';?>

    <form action="" method="POST">
  <div class="container">
    <h2 style="text-align: center;">Registration form</h2>
    <br>

<?php
     $myid = $_GET['id'];

     $disquery = "Select * from registration where id={$myid}";
     $disdata = mysqli_query($con,$disquery);
     $arrdata = mysqli_fetch_array($disdata);

if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($con, $_POST['username']);
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $password=mysqli_real_escape_string($con, $_POST['password']);
    $job=mysqli_real_escape_string($con, $_POST['job']);

    $updquery = "Update registration set username='$username', email='$email', password='$password', mobile='$mobile', job='$job' where id={$myid}";
    $finalquery= mysqli_query($con,$updquery);


    if($finalquery)
    {
        ?>
        <script>
        alert("Updated Successfully");
        </script>
        <?php
    }
    else{
        ?>
            <script>
                alert("failed");
            </script>
            <?php
}
    }
?>

    <label for="t1"><b>Username:</b></label><br>
    <input type="text" placeholder="Enter Username" name="username" id="t1" value="<?php echo $arrdata['username']; ?>" required><br><br>

    <label for="t2"><b>Email:</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" id="t2" value="<?php echo $arrdata['email']; ?>"required><br><br>

    <label for="t3"><b>Password:</b></label><br>
    <input type="text" placeholder="Enter Password" name="password" minlength="8" id="t3" value="<?php echo $arrdata['password']; ?>" required><br><br>

    <label for="t5"><b>Mobile Number:</b></label><br>
    <input type="number" placeholder="Enter Number" name="mobile" minlength="10" maxlength="10" id="t5" value="<?php echo $arrdata['mobile']; ?>" required><br><br>

    <label for="t6"><b>Job:</b></label><br>
     <input type="text" placeholder="Enter Job" name="job" id="t6" value="<?php echo $arrdata['job']; ?>" required> <br><br>

      <button type="submit" name="submit">Update</button>
    </div>
</form>
</body>
</html>