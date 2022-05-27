<?php

include 'config.php';
session_start();

if(!isset($_SESSION["eliteSession"])){
	header("Location: index.php");
  }
else{

	$pid = $_GET['pid'];
	$descr = $_GET['descr'];

	$add_to_db = mysqli_query($con,"UPDATE leaves SET status='Accepted' WHERE pid='".$pid."' AND descr='".$descr."'");

				if($add_to_db){	
					echo 'Saved!!';
					header("Location: leave_application.php");
				}
				else{
					echo "Query Error : " . "UPDATE leaves SET status='Accepted' WHERE pid='".$pid."' AND descr='".$descr."'" . "<br>" . mysqli_error($con);
				}
	}

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>