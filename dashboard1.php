  <?php
include('config.php');
session_start();
$email=$_SESSION['email'];
//echo $email;

  $query = "select * from `register` where `reg_email`='$email'";
  $data = mysqli_query($con,$query);
  if($res=mysqli_fetch_assoc($data)){
    $reg_id = $res['reg_id'];

    $query1 = "select * from `team_organizer_map` where `organizer_id`='$reg_id'";
    $data1 = mysqli_query($con,$query1);
    if($res1=mysqli_fetch_assoc($data1)){
      $team_id = $res1['team_id'];

      $query2 = "select * from `team_reg` where `teamr_id`='$team_id'";
      $data2 = mysqli_query($con,$query2);
      if($res2=mysqli_fetch_assoc($data2)){
        $teamr_id = $res2['teamr_id'];
        $teamr_name = $res2['teamr_name'];
        $team_sec_name = $res2['team_sec_name'];
        $team_img = $res2['team_img'];
        $team_ground_addr = $res2['team_ground_addr'];
        $team_gen = $res2['team_gen'];
        $team_desc = $res2['team_desc'];

        $_SESSION['teamr_id']=$teamr_id;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title></title>
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
          <span class="links_name"onclick="location.href='dashboard1.php';" style="cursor: pointer;">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='team_coach_map.php?am=<?php echo $teamr_id;?>';" style="cursor: pointer;">Assign Coach</span>
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
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="profile-details">
        <img src="image/david.jpg" alt="">
        <span class="admin_name"><?php echo $email;?></span>
      </div>
    </nav>

      <section class="about" id="about">
      <div class="max-width">
        <h2 class="title"><?php echo $teamr_name;?></h2>
        <div class="about-content">
          <div class="column left">
            <?php echo '<img src="'.$team_img.'" />';?>
          </div>  
          <div class="column right">
            <div class="text">Ground Address: <span><?php echo $team_ground_addr;?></span></div>
            <div class="text" style="font-size: 20px;">Secretary Name: <span><?php echo $team_sec_name;?></span></div>
            <p><?php echo $team_desc;?></p>
          </div>
        </div>
      </div>
    </section>
  <?php }}}?>

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
