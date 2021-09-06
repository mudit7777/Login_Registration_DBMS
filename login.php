<?php include 'dbcon.php';?>

<?php include 'login.html';?>

<?php
if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $password=mysqli_real_escape_string($con, $_POST['password']);

    $emailcheck ="select * from registration where email='$email' ";
    $query= mysqli_query($con,$emailcheck);
    $emailcount=mysqli_num_rows($query);

    if($emailcount){
    $passcheck=mysqli_fetch_assoc($query);
    $dbpass=$passcheck['password'];
    if($password===$dbpass){
        ?>
        <script>
            alert("Login successful");
        </script>
        <?php
    }
    else{
        ?>
    <script>
        alert("Wrong Password");
    </script>
    <?php
}

}
else
{
    ?>
    <script>
        alert("User is not registered");
    </script>
    <?php
}
}

?>