  <?php
include('config.php');
session_start();
$email = $_SESSION['email'];


$sql = "SELECT * FROM `register` WHERE `reg_email` = '$email'";
$row = mysqli_query($con,$sql);
if($res = mysqli_fetch_assoc($row)){
  $reg_id = $res['reg_id'];
  $_SESSION['reg_id']=$reg_id;
  $regstatus = $res['reg_status'];
  //echo $reg_id;

  if($regstatus == 1){
    header('location:view_team_reg2.php');
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="script.js"></script>
  <script src="scripte.js"></script>

  <style>
.container1{
  padding-left:7%;
  display:flex;
  flex-wrap:wrap;
  justify-content:space between;
}
.container1 .box{
  position:relative;
  width:350px;
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


  <nav class="navbar-login">
    <div class="max-width">
      <ul class="menu" style="padding: 20px;">
        <li><a href="team_registration.php?am=<?php echo $reg_id;?>">
Register for a Team</a></li>
<?php 
$sql1 = "SELECT * FROM `register` WHERE `reg_email` = '$email'";
$row1 = mysqli_query($con,$sql1);
if($res1 = mysqli_fetch_assoc($row1)){
  $reg_id = $res1['reg_id'];
 
 $sql2 = "SELECT * FROM `player_details` WHERE `reg_id` = '$reg_id' and `status`=1";
$row1 = mysqli_query($con,$sql2);
if(mysqli_num_rows($row1)>0){?>

        <li><a href="view_p_det.php" class="menu-btn">Player Info</a></li>
        <li><a href="leaveapplicationform.php" class="menu-btn">Apply Leave</a></li>
        <li><a href="view_course.php" class="menu-btn">View Programmes</a></li>
      <?php } 
      else{?>
        <li><a href="player_details.php" class="menu-btn">Register as Player</a></li>
      <?php }}?>
        <li><a href="book_details.php" class="menu-btn">Booking Details</a></li>
        <li><a href="#about" class="menu-btn">About</a></li>
        <li><a href="feedback.php" class="menu-btn">Feedback</a></li>
        <li><a href="login.php" class="menu-btn">Logout</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
       <section class="service" id="service">
      <div class="max-width">
        <h2 class="title">Top Competitions</h2>
        <div class="serv-content">

        <?php
          
          $sql = "SELECT `trm_id`, `trm_name`, `trm_tot_teams` FROM `trm`";
          $row = mysqli_query($con,$sql);
          while($res = mysqli_fetch_assoc($row))
          {
            $tid = $res['trm_id'];
            $tname = $res['trm_name'];
            $tot_teams = $res['trm_tot_teams'];



          ?>
          <div class="card" style="cursor: auto;">
            <div class="box">

              <div class="text" style="font-family:sans-serif;"><?php echo $tname;?></div>
              <a href="schedule_cust_view.php?tid=<?php echo $tid;?>"><p>Schedule |</p></a>
              <a href="#"><p>Teams</p></a>
            </div>
          </div>
        <?php
      }
      ?>
          
        </div>
      </div>
    </section>


 
    <!--about section start-->
    
    <section class="about" id="about">
      <div class="max-width">
        <h2 class="title">About Us</h2>
        <div class="about-content">
          <div class="column left">
            <img src="image/647_example.jpg" alt="person4">
          </div>  
          <div class="column right">
            <div class="text">Adore it, Offer it, <span>Live it</span></div>
            <p>With over a century of football played at a prime west London location so fundamental to the birth of Chelsea Football Club in 1905, there is a great story to tell, full of ambition, star players, dramatic quests for trophy success and fashionable style, and at times even a swagger too, and we tell that tale here.Today, our desire to bring positive change to communities in Elite and across the world through football is as strong as ever.

            With support from our passionate fans, we’re using the ‘football effect’ to promote health, education and inclusion, to improve the lives of young people in Elite and all over the world. </p>
          </div>
        </div>
        <div style="background-color: #F3E8EA;">
        <u><center><h2 style="padding-top: 50px; padding-bottom: 20px; font-size: 50px; font-family: Papyrus;">Setting Up a Club</h2></center></u>
        <h3 style="padding-top: 30px;">DO YOU WANT TO SET-UP AND ESTABLISH A NEW FOOTBALL OR FUTSAL CLUB?</h3>
        <p>The Elite FA welcomes hearing from individuals who are looking to start up a new football or futsal club. To have the best opportunity of setting yourselves up correctly, we advise you to follow the pathway below:</p>
        <h2 style="padding-top: 20px;">INSTRUCTIONS:</h2><br>
          <ul>
            <li>Sign in or Sign up for an Organizer account on Elite FA.</li>
            <li>On the Dashboard Click Register for a Team.</li>
            <li>Enter Team General Info and Eligibility.</li>
            <li>Click Create.</li>
            <li>Click Edit Team to maintain the functionalities.</li>
          </ul> 

      </div>
      </div>
    </section>

        <footer>
      <span>Created by <a href="#">SonaVinoy</a> | <span class="far-fa-copyright"></span> 2021 All Rights Reserved</span>
    </footer>
    

</body>
</html>

