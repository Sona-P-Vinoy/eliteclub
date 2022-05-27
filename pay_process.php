<?php
session_start();
include('config.php');
if(isset($_POST['submit']))
{
  $name = mysqli_real_escape_string($con,$_POST['venue']);
  $mail = mysqli_real_escape_string($con,$_POST['name']);
  $mob = mysqli_real_escape_string($con,$_POST['amt']);
  $pass = mysqli_real_escape_string($con,$_POST['num']);
  $cpass = mysqli_real_escape_string($con,$_POST['amont']);

  $sql = "INSERT INTO `pay`(`venue`, `name`, `amt`, `num`, `price`) VALUES ('$name','$mail','$mob','$pass','$cpass')";
  if(mysqli_query($con,$sql)){
          echo "Registered successfully";
          header("location:index.php");
        }
             else
        {
          echo mysqli_errno($con);
        }
    }

