<?php
include 'config.php';
$id=$_GET["am"];
echo "$id";
$result=mysqli_query($con,"DELETE FROM `team` WHERE `team_id`='$id'");
$row=mysqli_fetch_array($result);
header("location:team.php");
?>