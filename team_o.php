
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
          <span class="links_name"onclick="location.href='team_o.php';" style="cursor: pointer;">Teams</span>
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
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='view_coach.php';" style="cursor: pointer;">Coach</span>
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

      
          <center><h3>Team Details</h3></center>
          <table id ="customers">
            <tr>
              <th>Team Name</th>
              <th>Team Secretary Name</th>
              <th>Secretary Email</th>
              <th>Logo</th>
              <th>Ground Address</th>
              <th>Secretary Phone</th>
              <th>Description</th>
            </tr>

            <?php
            include 'config.php';
            $query = "SELECT `teamr_id`, `teamr_name`, `team_sec_name`, `team_sec_email`, `team_img`, `team_ground_addr`, `team_sec_phn`, `team_gen`, `team_desc`, `team_status` FROM `team_reg` WHERE `team_status` = 1";
            $row = mysqli_query($con,$query);
            while($result = mysqli_fetch_assoc($row)){
              $team_id = $result['teamr_id'];
              $team_name = $result['teamr_name'];
              $team_sec_name = $result['team_sec_name'];
              $team_sec_email = $result['team_sec_email'];
              $team_img = $result['team_img'];
              $team_ground_addr = $result['team_ground_addr'];
              $team_sec_phn = $result['team_sec_phn'];
              $team_gen = $result['team_gen'];
              $team_desc = $result['team_desc'];
              $team_status = $result['team_status'];
            ?>
                <tr>
                  <td><?php echo $team_name;?></td>
                  <td><?php echo $team_sec_name;?></td>
                  <td><?php echo $team_sec_email;?></td>
                  <td><img src="<?php echo $team_img;?>"width="50px" height="50px"></td>
                  <td><?php echo $team_ground_addr;?></td>
                  <td><?php echo $team_sec_phn;?></td>
                  <td><?php echo $team_desc;?></td>

                    </tr>   
                    <?php
                  }
                  
                  ?>
                </table>
              </section>        
          </body>
       </html>
