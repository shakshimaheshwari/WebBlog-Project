<?php
include("configlogin.php");
$userid =$_POST['studentid'];
$username = $_POST['studentname'];
$password = $_POST['pwd'];


$sql = "Insert into user(user_id,username,userpass) values('".$userid."','".$username."','".$password."')";
$result = mysqli_query($con,$sql) or die(mysqli_error($con));

if($result)
{
    echo"Record added successfully";
    header("Location:userblog.php");
}

?>