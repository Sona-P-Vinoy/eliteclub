
<?php
include 'config.php';

if (isset($_POST['approved'])){

$status="Approved";
$tid = $_POST['td_1'];
//echo $tid;
        $query = "UPDATE `player_details` SET `status`= 1 WHERE `p_id` = '$tid'";
        echo '<script>alert("Status Updated!")</script>';
        if (mysqli_query($con,$query))
              {
              //echo "Success";
              }
              else
              {
                echo mysqli_errno($con);
              }

}

if (isset($_POST['rejected'])){
$status="Rejected";    
$tid = $_POST['td_1'];
$query = "UPDATE `player_details` SET `status`= 2 WHERE `p_id` = '$tid'";
        echo '<script>alert("Status Updated!")</script>';
             if (mysqli_query($con,$query))
              {
              echo "Rejected";
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
    <title> Responsive Admin Dashboard</title>
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
    label {
      padding: 5px 12px 5px 0;
      display: inline-block;
    }
    .col-75 span{
      left: 20em;
    }
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width:100%;
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
 <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>

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
           <span class="links_name"onclick="location.href='dashboard.php';" style="cursor: pointer;">Dashboard</span>
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
      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Team Management</h3></center>

          <table id ="customers">
            <tr>   
              <th>#</th>
              <th>Image</th>
              <th>Player Name</th>
              <th>Gender</th>
              <th>Date of Birth</th>
              <th>Address</th>
              <th>Height(in Cm)</th>
              <th>Weight (in Kg)</th>
              <th>Status</th>
            </tr>

            <?php

            $query = "SELECT `p_id`, `reg_id`, `gen_id`, `p_image`, `p_dob`, `p_address`, `p_height`, `p_weight`, `status` FROM `player_details` WHERE `status`=0";
            $row = mysqli_query($con,$query);
            while($result = mysqli_fetch_assoc($row)){
              $p_id = $result['p_id'];
              $reg_id = $result['reg_id'];
              $gen_id = $result['gen_id'];
              $p_image = $result['p_image'];
              $p_dob = $result['p_dob'];
              $p_address = $result['p_address'];
              $p_height = $result['p_height'];
              $p_weight = $result['p_weight'];

              $query1 = "SELECT `reg_name` FROM `register` WHERE `reg_id` = '$reg_id'";
              $row1 = mysqli_query($con,$query1);
              if($result1 = mysqli_fetch_assoc($row1)){
                $reg_name = $result1['reg_name'];

              $query2 = "SELECT `gen_name` FROM `gen_type` WHERE `gen_id` = '$gen_id'";
              $row2 = mysqli_query($con,$query2);
              if($result2 = mysqli_fetch_assoc($row2)){
                $gen_name = $result2['gen_name'];



            ?>
            <form method="post" action="">
            <tr>
            <td><input type="hidden" name="td_1" value="<?php echo $p_id;?>"></td>
            <td><img src="<?php echo $p_image;?>"width="50px" height="50px"></td>
            <td><?php echo $reg_name;?></td>
            <td><?php echo $gen_name;?></td>
            <td><?php echo $p_dob;?></td>
            <td><?php echo $p_address;?></td>
            <td><?php echo $p_height;?></td>
            <td><?php echo $p_weight;?></td>
            <td>
                <button type="submit" name="approved" class="btn btn-primary">Approve</button>
                <button type="submit" name="rejected" class="btn btn-primary">Reject</button>
            </td>
      </tr>
      </form>
              <?php
            }
          }
        }

          ?>

</table></div></div></div></div>
              </section>
          </body>
    </html>
