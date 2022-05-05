<?php
	session_start();
	session_destroy();
	header('location:index.php');
?>



left join `team_coach_map` on register.reg_id=team_coach_map.coach_id and register.reg_id='$c' where team_coach_map.coach_id is null";


<a href="team_player_map.php?am=<?php echo $row['reg_id'];?>"><?php echo $row['reg_name'];?></a>