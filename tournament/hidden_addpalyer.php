<?php
include('../config.php');
session_start();
$trm_id = $_SESSION['trm_id'];
echo $trm_id;
$td=$_GET["tm"];
$pid=$_GET["pm"];
echo "$pid";
$result=mysqli_query($con,"INSERT INTO `trmt_player`(`tp_trmt_id`,`tp_team_id`, `tp_player_id`) VALUES ('$trm_id','$td','$pl_id')");
$row=mysqli_fetch_array($result);

$sql = "SELECT * FROM `teamlist` where `tl_trmt_id` = '$trm_id'";
          $query = mysqli_query($con,$sql);

          while($res = mysqli_fetch_assoc($query)){
            $team_id = $res['tl_team_id'];

            $sql2 = "SELECT * FROM `team` WHERE `team_id` = '$team_id'";
            $query2 = mysqli_query($con,$sql2);
            while($res2 = mysqli_fetch_assoc($query2)){

header("location:enter_player.php?tm=".$res2['team_id']);
}
}

?>