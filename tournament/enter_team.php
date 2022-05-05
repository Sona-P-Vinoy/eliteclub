<?php
include('../config.php');
session_start();
$trm_id = $_SESSION['trm_id'];
//echo $trm_id;

if(isset($_POST['submit'])){
  $teamid = $_POST['teamList'];

  foreach ($teamid as $list) 
  {
    $sql = "INSERT INTO `teamlist`(`tl_trmt_id`, `tl_team_id`) VALUES ('$trm_id','$list')";
    $query = mysqli_query($con,$sql);

  }

  //$sql1 = "select `tl_trmt_id` from `teamlist`";
  //$query1 = mysqli_query($con,$sql1);
  //while($res1 = mysqli_fetch_assoc($query1)){

  //}

  if($query){
    echo '<script>alert("Team list inserted successfully!")</script>';
    header("location:trmt_team_display.php");
  }
  else{
    echo mysqli_errno($con);
  }

}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard </title>
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
          <span class="links_name"onclick="location.href='../team.php';" style="cursor: pointer;">Teams</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='../view_player_a.php';" style="cursor: pointer;">View Players</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='../view_coach_a.php';" style="cursor: pointer;">All Coaches</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='../add_organizer.php';" style="cursor: pointer;">Add Organizer</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name"onclick="location.href='booking_details.php';" style="cursor: pointer;">Tickets</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name"onclick="location.href='view_trmt_a.php';" style="cursor: pointer;">Tournament</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='../team_coach_map_a.php';" style="cursor: pointer;">View Coach</span>
        </a>
      </li>
       <li>
        <a href="#">
          <i class='bx bx-book-alt'></i>
          <span class="links_name"onclick="location.href='../view_team_a.php';" style="cursor: pointer;">View Team</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name" onclick="location.href='../login.php';" style="cursor: pointer;">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">CREATE A NEW TOURNAMENT</span>
      </div>

      <div class="profile-details">
        <img src="image/david.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="home-content">

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
          	<?php
          	$num = $_SESSION['Num'];


for($count=1; $count<=$num; $count++){
?>

	  Team #<?php echo $count; ?>: 
    <select id = "xx" name="teamList[]">
      <option value="">Choose team</option>
      <?php 
          $sql = "select * from `team_reg` where `team_status` = 1";
          $row = mysqli_query($con,$sql);
          while($res = mysqli_fetch_assoc($row))
          {
            $t_id = $res['teamr_id'];
            echo "<option value=".$t_id.">".$res['teamr_name']."</option>";

          }
          ?>
          
    </select>
	  <br><br>

<?php
}
?>
            <br>
            <div class="row">
              <input type="submit" name="submit" id="sub" value="Submit">
            </div>

          </form>
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

 ?>