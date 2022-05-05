<?php
include('config.php');
if(isset($_SESSION["eliteSession"]) != session_id()){
    header("Location:index.php");
    die();
}
else{ 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsive Admin Dashboard </title>
  <link rel="stylesheet" href="style.css">
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
  .col-sm-3{
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    width: 30%;
    float: left;
}
.tile-stats.tile-red {
    background: #f56954;
}
.tile-stats {
  font-size: 60px;
    position: relative;
    display: block;
    background: #303641;
    padding: 20px;
    margin-bottom: 10px;
    overflow: hidden;
    background-clip: padding-box;
    border-radius: 5px;
    transition: all 300ms ease-in-out;
}

.tile-stats.tile-red .icon {
    color: rgba(0, 0, 0, 0.1);
}
.tile-stats .icon {
    color: rgba(0, 0, 0, 0.1);
    position: absolute;
    right: 5px;
    bottom: 5px;
    z-index: 1;
}

.tile-stats .icon i {
    font-size: 70px;
    line-height: 0;
    margin: 0;
    padding: 0;
    vertical-align: bottom;
}

i, cite, em, var, address, dfn {
    font-style: italic;
}

.tile-stats .num, .tile-stats h3, .tile-stats p {
    position: relative;
    color: #ffffff;
    z-index: 5;
    margin: 0;
    padding: 0;
}

.tile-stats .icon i:before {
    margin: 0;
    padding: 0;
    line-height: 0;
}

.tile-stats.tile-red .num, .tile-stats.tile-red h3, .tile-stats.tile-red p {
    color: #ffffff;
}

.tile-stats .num {
    font-size: 38px;
    font-weight: bold;
}

.tile-stats.tile-green {
    background: #00a65a;
}

.tile-stats.tile-aqua {
    background: #00c0ef;
}

.tile-stats.tile-blue {
    background: #0073b7;
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
          <span class="links_name"onclick="location.href='team.php';" style="cursor: pointer;">Teams</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='view_player_a.php';" style="cursor: pointer;">View Players</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='view_coach_a.php';" style="cursor: pointer;">All Coaches</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='add_organizer.php';" style="cursor: pointer;">Add Organizer</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name"onclick="location.href='tournament/booking_details.php';" style="cursor: pointer;">Tickets</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
             <span class="links_name"onclick="location.href='tournament/stadium.php';" style="cursor: pointer;">Stadium</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name"onclick="location.href='../bpmssample/tournament/trmt.php';" style="cursor: pointer;">Tournament</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='team_coach_map_a.php';" style="cursor: pointer;">View Coach</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name" onclick="location.href='logout.php';" style="cursor: pointer;">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="image/david.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="home-content">

      <div class="col-sm-3"><a href="view_player.php">     
        <div class="tile-stats tile-green">
          <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
            <h2>Total <br>Players</h2><br>  
              <?php
              $query = "select COUNT(*) from player_details";

              $result = mysqli_query($con, $query);
              $i      = 1;
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo $row['COUNT(*)'];
                  }
              }
              $i = 1;
              ?>
            </div>
        </div></a>
      </div>
          <div class="col-sm-3"><a href="team.php">      
        <div class="tile-stats tile-blue">
          <div class="icon"><i class="entypo-rss"></i></div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
            <h2>Total Teams</h2><br> 
              <?php
              $query = "select COUNT(*) from team_reg where team_status = 1";

              //echo $query;
              $result  = mysqli_query($con, $query);
              $i = 1;
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo $row['COUNT(*)'];
                  }
              }
              $i = 1;
              ?>
            </div>
        </div></a>
      </div>

        <div class="col-sm-3"><a href="new_teams.php">     
        <div class="tile-stats tile-green">
          <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
            <h2>New<br>Teams</h2><br>  
              <?php
              $query = "select COUNT(*) from team_reg where team_status=0";

              $result = mysqli_query($con, $query);
              $i      = 1;
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      echo $row['COUNT(*)'];
                  }
              }
              $i = 1;
              ?>
            </div>
        </div></a>
      </div>
         

      <marquee direction="right"><img src="img/fball.gif" width="88" height="70" alt="Tutorials " border="0"></marquee>

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
<?php
}
?>