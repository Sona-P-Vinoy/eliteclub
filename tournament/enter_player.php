<?php
include('../config.php');
session_start();
$trm_id = $_SESSION['trm_id'];
$td=$_GET["tm"];

if(isset($_POST['submit']))
{
  $plyr_id = $_POST['pl_id'];

  /*$sqla = "SELECT count(tp_trmt_id) FROM trmt_player WHERE tp_trmt_id = $trm_id";
  $querya = mysqli_query($con,$sqla);
  if(mysqli_num_rows($querya)>11)
  {
    echo '<script type="text/javascript"> alert("11 members")</script>';
  }
  else{*/
  $queryx="SELECT * FROM `trmt_player` WHERE `tp_trmt_id`='$trm_id'";
  $datax=mysqli_query($con,$queryx);
  while($resx = mysqli_fetch_assoc($datax)){
  


    $queryz="SELECT * FROM `trmt_player` WHERE `tp_team_id`='$td'";
  $dataz=mysqli_query($con,$queryz);
  while($resz = mysqli_fetch_assoc($dataz)){
    $pla = $resz['tp_player_id'];

  if(mysqli_num_rows($dataz)>0)
  {
    echo '<script type="text/javascript"> alert("Already Inserted!")</script>';
  }


  else{
	$sql = "INSERT INTO `trmt_player`(`tp_trmt_id`,`tp_team_id`, `tp_player_id`) VALUES ('$trm_id','$td','$plyr_id')";
  $query = mysqli_query($con,$sql);
   }
 }
 }
}


   
	

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard | CodingLab </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  
  <script type="text/javascript" src="../script/option.js"></script>
  <link rel="stylesheet" type="../css/option.css" href="">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  input[type=text]:disabled{
  	background: white;
  }
.row{
	margin-left: -5px;
	margin-right: -5px;
}
.column{
	float: left;
	width: 50%;
	padding: 5px;
}
  .content-table{
  	border-collapse: collapse;
  	margin: 25px 0;
  	margin-left: 10%;
  	font-size: 0.9em;
  	min-width: 400px;
  	border-radius: 5px 5px 0 0;
  	overflow: hidden;
  	box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  .content-table thead tr{
  	background-color: crimson;
  	color: #ffffff;
  	text-align: left;
  	font-weight: bold;
  }
  .content-table th,
  .content-table td{
  	padding: 12px 15px;
  }
  .content-table tbody tr{
  	border-bottom: 1px solid #dddddd;
  }
  .content-table tbody tr:nth-of-type(even){
  	background-color: #f3f3f3;
  }
  .content-table tbody tr:last-of-type{
  	border-bottom: 2px solid crimson;
  }
  .content-table tbody tr.active-row{
  	font-weight: bold;
  	color: #009879;}


</style>

</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Elite Football</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='team.php';" style="cursor: pointer;">Teams</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='view_player.php';" style="cursor: pointer;">Players</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='view_coach.php';" style="cursor: pointer;">Coach</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Tickets</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
         <span class="links_name"onclick="location.href='trmt.php';" style="cursor: pointer;">Tournament</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='team_coach_map.php';" style="cursor: pointer;">Assign Coach</span>
        </a>
      </li>
       <li>
        <a href="#">
          <i class='bx bx-book-alt'></i>
          <span class="links_name"onclick="location.href='view_team.php';" style="cursor: pointer;">Assign Players</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name" onclick="location.href='login.php';" style="cursor: pointer;">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">ENTER THE PLAYERS</span>
      </div>

      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="home-content">

    	

   
    	
    	<div class="row">
    		<div class="column">
    	<table class="content-table">
    		<thead>
    			<tr>
            		<th>Player_ID</th>
    				<th>Player_Name</th>
    				<th>Position</th>
    				<th></th>
    			</tr>
    		</thead>
    		<tbody>
           <tr>
            <?php
          $td=$_GET["tm"];
          $trm_id = $_SESSION['trm_id'];

          $sqlt = "SELECT * FROM `teamlist` WHERE `tl_trmt_id` = '$trm_id'";
          $queryt = mysqli_query($con,$sqlt);
          if($rest = mysqli_fetch_assoc($queryt)){
            $tm_id = $rest['tl_team_id'];

          $sqla = "SELECT * FROM `player_pos` WHERE `team_id` = '$td'";
          $querya = mysqli_query($con,$sqla);
          while($resa = mysqli_fetch_assoc($querya)){
          $pl_id = $resa['player_id'];
          //echo $pl_id;
          $pos_id = $resa['pos_id'];

          $sql2 = "SELECT * FROM `register` WHERE `reg_id` = '$pl_id'";
          $query2 = mysqli_query($con,$sql2);
          while($res2 = mysqli_fetch_assoc($query2)){
          $pl_name = $res2['reg_name'];
          

          $sql3 = "SELECT * FROM `position` WHERE `pos_id` = '$pos_id'";
          $query3 = mysqli_query($con,$sql3);
          while($res3 = mysqli_fetch_assoc($query3)){
          $po_name = $res3['pos_name'];
  ?>
            
         
        
    				<td>
              <form method="post" action="#">
              <?php echo $resa['player_id'];?></td>
    				<td><?php echo $pl_name;?></td>
    				<td><?php echo $po_name;?></td>
            <input type="hidden" name="pl_id" value="<?php echo $pl_id;?>">
    				<td>
            <input type="submit" name="submit"style="background-color:black;color:white;width:90px;height: 30px;" value="add">
             </form>
            </td>
    			</tr>
         
    		</tbody>
    		 	
    		<?php 
    		}
			}
		}
  }
 	?>

    	</table>
    </div>
<div class="column">
<table class="content-table" style="min-width: 20px;">

    		<thead>
    			<tr>
    				<th>Team Players</th>
    			</tr>
    		</thead>
    		<tbody>
    	<?php   
            //$query4="SELECT * from trmt_player left join register ON register.reg_id = trmt_player.tp_player_id WHERE tp_trmt_id = $trm_id;";
      $q = "SELECT * FROM trmt_player WHERE tp_trmt_id = $trm_id";
      $r = mysqli_query($con,$q);
          while($ro = mysqli_fetch_assoc($r)){
            $t = $ro['tp_team_id'];

            $q1 = "SELECT * FROM player_pos WHERE team_id = $td";
            $r1 = mysqli_query($con,$q1);
          while($ro1 = mysqli_fetch_assoc($r1)){
            $p = $ro1['player_id'];

            $q2 = "SELECT * FROM register WHERE reg_id = $p";
            $r2 = mysqli_query($con,$q2);
          while($ro2 = mysqli_fetch_assoc($r2)){
              echo"<tr>
              <td>".$ro2['reg_name']."</td>
              
              </tr>";
            }
          }
        }
        
            ?>
    		</tbody>

    	</table>
      <div class="row" style="margin-right: 20px;">
              <a href="trmt_team_display.php"><input type="submit" id="submit" name="submit" value="Continue->" ></a>
            </div>
    </div>
</div>



 
  </div>
</section>



<script>
 let sidebar = document.querySelector(".sidebar");
 let sidebarBtn = document.querySelector(".sidebarBtn");
 sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
    sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  }else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}


</script>

</body>
</html>
