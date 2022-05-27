  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <span class="links_name"onclick="location.href='tournament/trmt.php';" style="cursor: pointer;">Tournament</span>
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
      <div class="container">
            <center><h3>Player Details</h3></center>
            <form action="" method="POST">
                <select name="leaveId">
                      <option value="">Select Player</option>
                      <?php 
                      include 'config.php';
                        $query ="SELECT reg_id FROM player_details WHERE status=1";

                        $result = mysqli_query($con,$query);
                        if(mysqli_num_rows($result)>0){
                            while($optionData=mysqli_fetch_assoc($result)){
                            $option =$optionData['reg_id'];

                            $query1 ="SELECT reg_id,reg_name FROM register WHERE `reg_id`='$option'";
                            $result1 = mysqli_query($con,$query1);
                            while($optionData1=mysqli_fetch_assoc($result1)){
                              $pname =$optionData1['reg_name'];

                        ?>
                      <option value="<?php echo $option; ?>" ><?php echo $pname; ?> </option>
                     <?php
                      }}}
                      ?>
                </select>
                <input type="submit" name="submit" value="Check">
            </form>
            <br><br>
            <table id ="customers">
              <tr>
                <th>#</th>
                <th>Player</th>
                <th>Leave Application</th>
                <th>Days</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status</th>
              </tr>
              <tr>
                <?php
                  /// edit data
                  if(isset($_POST['leaveId']) && isset($_POST['submit'])){
                      $leaveId= $_POST['leaveId'];
                      $query ="SELECT `id`, `pid`, `pname`, `descr`, `fromdate`, `todate`, `status` FROM `leaves` WHERE `pid`='$leaveId'";
                      $result = mysqli_query($con,$query);
                      if(mysqli_num_rows($result)>0){
                        $cnt=1;
                        while($row = mysqli_fetch_array($result)){               
                          $datetime1 = new DateTime($row['fromdate']);
                                  $datetime2 = new DateTime($row['todate']);
                                  $interval = $datetime1->diff($datetime2);
                                  echo "<tr>
                                          <td>$cnt</td>
                                          <td>{$row['pname']}</td>
                                          <td>{$row['descr']}</td>
                                          <td>{$interval->format('%a Day/s')}</td>
                                          <td>{$datetime1->format('Y/m/d')}</td>
                                          <td>{$datetime2->format('Y/m/d')}</td>
                                          <td><b>{$row['status']}</b></td>
                                        </tr>";
                               $cnt++; }
                              }else{
                    echo"<tr class='text-center'><td colspan='12'><b>PLAYER DON'T HAVE ANY LEAVE HISTORY!!</b></td></tr>";
                  }
                }

                  ?>
              </tr>
              </table>
            </div>
          </section>
        </body>
        </html>

