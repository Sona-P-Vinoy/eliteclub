<?php
include 'config.php';
$id=$_GET["am"];
echo "$id";
$result=mysqli_query($con,"UPDATE `register` SET `reg_status`= 1 WHERE `reg_id`='$id'");
$row=mysqli_fetch_array($result);
header("location:view_organizer.php");
?>