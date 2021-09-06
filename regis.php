<?php include 'dbcon.php';?>
<?php include 'regis.html';?>

<?php
if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($con, $_POST['username']);
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $password=mysqli_real_escape_string($con, $_POST['password']);
    $cpassword=mysqli_real_escape_string($con, $_POST['cpassword']);
    $job=mysqli_real_escape_string($con, $_POST['job']);

    $emailquery ="select * from registration where email='$email' ";
    $query= mysqli_query($con,$emailquery);

    $emailcount=mysqli_num_rows($query);

    if($emailcount>0)
    {
        ?>
        <script>
        alert("Email already exists");
        </script>
        <?php
    }else{
        if($password===$cpassword){
           $insertquery="INSERT INTO `registration` (`username`, `email`, `mobile`, `password`, `job`) VALUES ('$username', '$email','$mobile','$password','$job')";

        $iquery=mysqli_query($con,$insertquery);
        if($iquery)
        {
            ?>
            <script>
                alert("Data Inserted Successfully");
            </script>
            <?php

        }else
        {
            ?>
            <script>
                alert("Insertion failed");
            </script>

            <?php

        }


    }else{
        ?>
        <script>
        alert("Passwords are different");
        </script>
        <?php
}
    }    
}

?>