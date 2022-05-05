    <?php

        include('../config.php');
        session_start();
         $tr_id = $_GET['rm'];

         $s = "SELECT * FROM trm WHERE trm_id=$tr_id";
         $q = mysqli_query($con,$s);
         while($r=mysqli_fetch_assoc($q)){
          $n = $r['trm_name'];
          $t = $r['trm_tot_teams'];
          $tr = $r['trm_id'];
          $_SESSION['trm_id'] = $tr;
         }
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
    padding-left:14%;
    padding-top: 3%;
    display:flex;
    flex-wrap:wrap;
    justify-content:space between;
  }
  .container1 .box{
    position:relative;
    padding:10px;
    background:#fff;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    border-radius:5%;
    margin:20px;
    box-sizing:border-box;
    overflow:hidden;
    font-size:18px;
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
    font-size:60px;
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
    box-shadow:white;
  }

  .container1 .box .content{
    position:relative;
    z-index: 1;
    transition: 0.5s;
  }
  .container1 .box:hover .content{
    color:crimson;
    font-size: 20px;
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
          <span class="links_name"onclick="location.href='../dashboard.php';" style="cursor: pointer;">Dashboard</span>
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
          <i class='bx bx-coin-stack' ></i>
             <span class="links_name"onclick="location.href='stadium.php';" style="cursor: pointer;">Stadium</span>
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
          <span class="links_name"onclick="location.href='../team_coach_map_a.php';" style="cursor: pointer;">View Coach</span>
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
          <span class="dashboard">TOURNAMENT LIST</span>
        </div>

        <div class="profile-details">
          <img src="image/david.jpg" alt="">
          <span class="admin_name">Admin</span>
        </div>
      </nav>
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box" onclick="location.href='view_trmt.php';" style="cursor: pointer;">
            <div class="right-side">
              <div class="box-topic">Back</div>
            </div>
          </div>
        </div>
  <center><p style="font-family:'Poppins',sans-serif; font-weight: bold;font-size: 25px;padding-top: 5px;">TOURNAMENT SCHEDULE- <?php echo $n;?></p></center>

  <center>
    <div class="container1">


      <?php

      function scheduler($teams){
        if (count($teams)%2 != 0){
          array_push($teams,"bye");
        }
      $away = array_splice($teams,(count($teams)/2));
      $home = $teams;
      for ($i=0; $i < count($home)+count($away)-1; $i++){
          for ($j=0; $j<count($home); $j++){
              $round[$i][$j]["Home"]=$home[$j];
              $round[$i][$j]["Away"]=$away[$j];
          }
          if(count($home)+count($away)-1 > 2){
              $tem = array_splice($home,1,1);
              $tem1 = array_shift($tem);
              array_unshift($away,$tem1);
              array_push($home,array_pop($away));
          }
      }
      return $round;
  }
  ?>

      <?php 

       
        $members = array();

        $sql = "SELECT * FROM `teamlist` WHERE `tl_trmt_id`='$tr_id'";
        $query = mysqli_query($con,$sql);
        while($res = mysqli_fetch_assoc($query)){
          $te_id = $res['tl_team_id'];
          //echo $te_id;

          $sql2 = "SELECT `teamr_name` FROM `team_reg` WHERE `teamr_id`='$te_id'";
          $result = mysqli_query($con,$sql2);
          
          
            if(mysqli_num_rows($result)>0)
              {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                array_push($members, $row["teamr_name"]);
                
                }
      }
       else {
       echo "0 results";
      }

    }
        ?>


  <?php $schedule = scheduler($members); ?>
  <?php
  $member = array();

  foreach($schedule AS $round => $games){
    $ro = ($round+1);
      echo "<a href='trmt_time.php?ttm=$ro'><div class='box'>Round: ".($round+1)."<BR>";
      
      
      //echo $ro;
      echo "<div class='content'><br>";
      foreach($games AS $play){

          echo $play["Home"]." - ".$play["Away"]."<BR>";
          $h = $play["Home"];
          $a = $play["Away"];
          if($t % 2 == 0){
            $count = $t/2;
          }else{
            $count = ($t+1)/2;
          }

          $sqlh = "SELECT `teamr_id` FROM `team_reg` WHERE `teamr_name`='$h'";
          $resulth = mysqli_query($con,$sqlh);
          while($resh = mysqli_fetch_assoc($resulth)){

              $th = $resh['teamr_id'];
              //echo $th;
          }
              $sqla = "SELECT `teamr_id` FROM `team_reg` WHERE `teamr_name`='$a'";
              $resulta = mysqli_query($con,$sqla);
              while($resa = mysqli_fetch_assoc($resulta)){

              $ta = $resa['teamr_id'];
              //echo $ta;
            }

        $sqltr = "SELECT * FROM `t1_vs_t2` WHERE `tl_trmt_id` = '$tr_id' AND `tv_round` = '$ro'";
        $querytr = mysqli_query($con,$sqltr);
        if(mysqli_num_rows($querytr)>=$count)
          {

          }
          else{
            if($h == "bye"){
              $th = 0;
           }
           else{
            $h = $play["Home"];
           }
            if($a == "bye"){
              $ta = 0;
           }
           else{
            $a = $play["Away"];
           }
             $sqlah = "INSERT INTO `t1_vs_t2`(`tl_trmt_id`,`tv_round`, `tv_home_id`, `tv_away_id`,  `tv_date`, `tv_start_time`, `tv_end_time`, `tv_venue`) VALUES ('$tr_id', '$ro','$th','$ta',0,0,0,0)";
              if(mysqli_query($con,$sqlah)){
                //echo "Registered successfully";
                
              }
              else
             {
               echo mysqli_errno($con);
             }
            
          }
  }

      echo "<BR></div></div></a>";
  }

  ?>
             
          </div>
        </div>
  </section>
  </center>



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
