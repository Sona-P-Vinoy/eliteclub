<?php
include 'config.php';
$id=$_GET["am"];
echo "<script>alert('aaa')</script>";
echo "$id";
$result=mysqli_query($con,"UPDATE `leaves` SET `status`= 'cancelled' WHERE `pid`='$id'");
$row=mysqli_fetch_array($result);
header("location:myhistory.php");
?>