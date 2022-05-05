<?php
include '../config.php';
$tid=$_GET["tickid"];
echo "$tid";
$result=mysqli_query($con,"UPDATE `tickets` SET `tick_status`= 0 WHERE `ticket_id` = '$tid'");
$row=mysqli_fetch_array($result);
header("location:booking_details.php");
?>