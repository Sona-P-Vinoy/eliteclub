<?php
include('../config.php');
session_start();
$tvid=$_GET["tm"];
//echo $tvid;

if(isset($_POST["update"]))
{
  $date=$_POST["date"];
  $timea=$_POST["timea"];
  $venue=$_POST["venue"];


  //echo $name;
  $sql = "UPDATE `t1_vs_t2` SET `tv_date`='$date',`tv_start_time`='$timea',`tv_end_time`=0,`tv_venue`='$venue' WHERE `tv_id` = '$tvid'";
  if(mysqli_query($con,$sql)){


    echo '<script type="text/javascript"> alert("Edited Successfully!")</script>';
    header("Location:view_trmt.php");
    
  }
  else
  {
    echo mysqli_errno($con);
  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard</title>
  
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="../datepicker.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  padding-top: 30px;
  margin-top: 40px;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 30px;
  padding-bottom: 12px;
  text-align: left;
  background-color: crimson;
  color: white;
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
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="image/david.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Player Details</h3></center>
          <form method="post" action="#">
          <table id ="customers">
            <tr>
              
              <th>Team A</th>
              <th>Team B</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>Venue</th>
              <th></th>
            </tr>

             <?php

             $edit=mysqli_query($con,"SELECT * FROM `t1_vs_t2` WHERE `tv_id` ='$tvid'");
			       if($row=mysqli_fetch_array($edit)){

                $tvid = $row['tv_id'];
                $tvhomeid = $row['tv_home_id'];
                $tvawayid = $row['tv_away_id'];
                $tvdate = $row['tv_date'];
                $tvstarttime = $row['tv_start_time'];
                $tvendtime = $row['tv_end_time'];
                $tvvenue = $row['tv_venue'];
            }

              $query1 = "SELECT `teamr_name`, `team_img` FROM `team_reg` WHERE `teamr_id` = '$tvhomeid'"; 
              $data1 = mysqli_query($con,$query1);
              if($res1 = mysqli_fetch_assoc($data1)){

                $t1name = $res1['teamr_name'];
              }

                $query2 = "SELECT `teamr_name`, `team_img` FROM `team_reg` WHERE `teamr_id` = '$tvawayid'";
                $data2 = mysqli_query($con,$query2);
              if($res2 = mysqli_fetch_assoc($data2)){

                $t2name = $res2['teamr_name'];
            }

            ?>
                  <tr>
                  <td><?php echo $t1name;?></td>
                  <td><?php echo $t2name;?></td>
                  <td><input type="date" name="date" value="<?php echo $tvdate;?>"></td>
                  <td><input type="time" name="timea" id="timefrom" value="<?php echo $tvstarttime;?>">
                  </td>
                  <td><input type="text" name="venue" value="<?php echo $tvvenue;?>"></td>
                  <td><input type="submit" name="update" value ="update" style="color:white; background-color: #28282B;"></td>
            </table>
            </form>
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
<script type="text/javascript">
    var today = new Date();
    today = new Date(today.setDate(today.getDate() + 2)).toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
<script type="text/javascript">

var timefrom = new Date();
temp = $('#timefrom').val().split(":");
timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timefrom.setMinutes(parseInt(temp[1]));

var timeto = new Date();
temp = $('#timeto').val().split(":");
timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timeto.setMinutes(parseInt(temp[1]));

if (timeto < timefrom){
    alert('start time should be smaller than end time!');
}
</script>

</html>

