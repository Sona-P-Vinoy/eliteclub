<?php
include '../config.php';
$tid=$_GET["tickid"];
echo "$tid";
$result=mysqli_query($con,"UPDATE `stadium` SET `s_status`= 0 WHERE `s_id` = '$tid'");
$row=mysqli_fetch_array($result);
header("location:stadium.php");
?>