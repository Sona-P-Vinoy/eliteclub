  <?php
include('config.php');
session_start();
$email = $_SESSION['email'];
//echo $email;
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
#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width:90%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    width:25%;
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
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
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='leave_application.php';" style="cursor: pointer;">Leave Application</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='training_programme.php';" style="cursor: pointer;">Training Programme</span>
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
      <div class="overview-boxes">
        <div class="box" onclick="location.href='view_programmes.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">View Programmes</div>
          </div>
        </div>
      </div>

      <div class="sales-boxes">
       <div class="recent-sales box">

<div class="container" style="padding-top: 10%; font-weight: bold;">
          <center><h3>Enrolled Player-Course Details</h3></center>
          <form action="#" method="POST">
             <?php
              $query1 = "SELECT `ce_id`, `course_id`, `reg_id` FROM `course_enroll`";
              $data1 = mysqli_query($con,$query1);
              while($res1=mysqli_fetch_assoc($data1)){
                $ce_id = $res1['ce_id'];
                $course_id = $res1['course_id'];
                $reg_id = $res1['reg_id'];
                
              $query2 = "SELECT `tp_name` FROM `training_programme` WHERE `tp_id`='$course_id'";
              $data2 = mysqli_query($con,$query2);
              while($res2=mysqli_fetch_assoc($data2)){
                $tp_name = $res2['tp_name'];

              $query3 = "SELECT `reg_name`,`reg_email` FROM `register` WHERE `reg_id`='$reg_id'";
              $data3 = mysqli_query($con,$query3);
              while($res3=mysqli_fetch_assoc($data3)){
                $reg_name = $res3['reg_name'];
                $reg_email = $res3['reg_email'];
                ?>
                <center><h3></h3></center>
          <table id ="customers">
            <tr>
              <th>Programme Name</th>
              <th>Enrolled Players</th>
              <th>Player Email ID</th>
            </tr>
                <tr>
                  <td><?php echo $tp_name;?></td>
                  <td><?php echo $reg_name;?></td>
                  <td><?php echo $reg_email;?></td>
                  </tr>
                    <?php
                    } 
                    }
                    }

                ?>
              </table>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
  </html>

