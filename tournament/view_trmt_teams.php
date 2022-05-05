  <?php

      include('../config.php');
      session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsive Admin Dashboard</title>
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

  .container1{
  padding-left:7%;
  display:flex;
  flex-wrap:wrap;
  justify-content:space between;
}
.container1 .box{
  position:relative;
  padding:40px;
  background:#fff;
  box-shadow:0 5px 15px rgba(0,0,0,.1);
  border-radius:5%;
  margin:20px;
  box-sizing:border-box;
  overflow:hidden;
  text-align:center;
}
.container1 .box:before{
  content:'';
  width:50%;
  height:100%;
  position:absolute;
  top:0;
  left:0;
  background:rgbga(255,255,255,.2);
  z-index:2;
}
.container1 .box .icon{
  position:relative;
  width:80px;
  height:80px;
  color:#fff;
  background:#000;
  display:flex;
  justify-content:center;
  align-items:center;
  margin:0 auto;
  border-radius:50%;
  font-size:40px;
  font-weight:700;
  transition:1s;
}
.icon img
.container1 .box:nth-child(odd) .icon{
  box-shadow:0 0 0 0 #e91e63;
  background:#71797E;
} 
.container1 .box:nth-child(odd):hover .icon{
  box-shadow:0 0 0 400px #71797E;
}
.container1 .box:nth-child(even) .icon{
  box-shadow:0 0 0 0 #848884;
  background:#848884;
} 
.container1 .box:nth-child(even):hover .icon{
  box-shadow:0 0 0 400px #848884;
}

.container1 .box .content{
  position:relative;
  z-index: 1;
  transition: 0.5s;
}
.container1 .box:hover .content{
  color:#fff;
}
.container1 .box .content h3{
  font-size:20px;
  margin:10px 0;
  padding:0;
}
.container1 .box .content p{
  margin:0;
  padding:0;
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
        <span class="dashboard">TEAM LIST</span>
      </div>

      <div class="profile-details">
        <img src="image/david.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>
<center><p style="font-family:'Poppins',sans-serif; font-weight: bold;font-size: 25px;padding-top: 10%;">TEAMS</p></center>
  <div class="container1">

            <?php

            $r_id = $_GET["rm"];
            //echo $r_id;

            // Fetching Data

            $sql = "SELECT * FROM `teamlist` WHERE `tl_trmt_id` ='$r_id'";
            $query = mysqli_query($con,$sql);
            while($res = mysqli_fetch_assoc($query)){
              $tm_id = $res['tl_team_id'];
              $tr_id = $res['tl_trmt_id'];

              $sql2 = "SELECT * FROM `trm` WHERE `trm_id` ='$r_id'";
              $query2 = mysqli_query($con,$sql2);
              while($res2 = mysqli_fetch_assoc($query2)){
                $tr_name = $res2['trm_name'];
                $tr_tot = $res2['trm_tot_teams'];

                $sql3 = "SELECT * FROM `team` WHERE `team_id` ='$tm_id'";
                $query3 = mysqli_query($con,$sql3);
                while($res3 = mysqli_fetch_assoc($query3)){
                  $tm_name = $res3['team_name'];

                  ?>

                  <a href="schedule.php?tm=<?php echo $tr_id;?>">
                  <?php
                  echo "<div class='box'>";
                  echo "<div class='icon'><img src='../".$res3['team_logo']."' width= 100px height=100px style='border-radius:30px;'></div>";
                  echo "<div class='content'>";
                  echo "<h3>".$tm_name."</h3></div></div></a>";
                  

                  }
            
          }
        }
      ?>

  
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
