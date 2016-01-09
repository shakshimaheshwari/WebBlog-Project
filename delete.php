<?php
include("configlogin.php");
$userid = $_GET['userid'];
$postid = $_GET['postid'];

$sql = "Delete from posts where post_id =".$postid;
$result = mysqli_query($con,$sql) or die(mysqli_error($con));

if($result)
{
    header("Location:view_post.php?userid=".$userid);
}

?>