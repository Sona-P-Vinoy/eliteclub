<?php
          include('config.php');
            session_start();
            $teamr_id=$_SESSION['teamr_id'];
            $email=$_SESSION['email'];

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

  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width:90%;
  }

  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    width:50%;
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
          <span class="links_name"onclick="location.href='team_coach_map.php';" style="cursor: pointer;">Assign Coach</span>
        </a>
      </li>
          <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='view_team.php';" style="cursor: pointer;">Assign Players</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name"onclick="location.href='login.php';" style="cursor: pointer;">Log out</span>
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

    <div class="home-content">
      <div class="overview-boxes">

 
      </div>

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Player Details(Men)</h3></center>
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">

          </form>
          <table id ="customers">
            <tr>
              <th>Team Name</th>
              <th>Team Description</th>
              <th></th>
            </tr>
            <?php
            $query = "select * from `team_reg` where team_gen=1 and team_status = 1 and teamr_id='$teamr_id'";
            $data = mysqli_query($con,$query);
              while($row = mysqli_fetch_assoc($data)){
                $team = $row['teamr_id'];
                ?>
                <tr>
                  <td><?php echo $row['teamr_name'];?></td>
                  <td><?php echo $row['team_desc'];?></td>
                  <td>
                    <a href="team_player_map.php?am=<?php echo $row['teamr_id'];?>">
                      <input type="button" style="background-color:black;color:white;width:90px;" value="Add player"></a>
                      </td>
                    </tr>
                  <?php
                }
              
              ?>
            </table>
          </div>
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
</html>
