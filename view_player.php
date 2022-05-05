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
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="home-content">


      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Player Details</h3></center>
          <form action="addplayer.php" method="POST" autocomplete="off" onsubmit="return validate();">

          </form>
          <table id ="customers">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Height</th>
              <th>Weight</th>
            </tr>
            <?php
            include('config.php');

            $query = "select * from `login` where `type_id`=2";
            $data = mysqli_query($con,$query);
            if($res=mysqli_fetch_assoc($data)){
              $type = $res['reg_id'];
              $query2 = "select * from `register` INNER JOIN `player_details` ON register.reg_id=player_details.reg_id where register.reg_status=0"; 
              $data1 = mysqli_query($con,$query2);
              while($row = mysqli_fetch_assoc($data1)){
                $gen = $row['gen_id'];
                $query3 = "select * from `gen_type` where `gen_id`='$gen'";
                $data3 = mysqli_query($con,$query3);
              while($row1 = mysqli_fetch_assoc($data3)){
                $g = $row1['gen_name'];
                ?>
                <tr>
                  <td><?php echo $row['reg_name'];?></td>
                  <td><?php echo $row['reg_email'];?></td>
                  <td><?php echo $row['reg_phone'];?></td>
                  <td><?php echo $row['p_address'];?></td>
                  <td><?php echo $g;?></td>
                  <td><?php echo $row['p_height'];?></td>
                  <td><?php echo $row['p_weight'];?></td>
                       <td>
                      <a href="del_player.php?am=<?php echo $row['reg_id'];?>">
                        <input type="button" style="background-color:grey;" value="Delete"></a>
                      </td>
                  <?php
                }
                }
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