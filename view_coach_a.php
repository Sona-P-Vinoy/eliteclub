
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
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='training_programme.php';" style="cursor: pointer;">Training Programme</span>
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
      <div class="overview-boxes">
     
      </div>
      <div class="sales-boxes">

       <div class="recent-sales box">

        <div class="container">
          <center><h3>Coach Details</h3></center>
          <form action="addplayer.php" method="POST" autocomplete="off" onsubmit="return validate();">

          </form>
          <table id ="customers">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th></th>
            </tr>
            <?php
              include('config.php');

              $query = "select * from `login` where `type_id`=3";
              $data = mysqli_query($con,$query);
              while($res=mysqli_fetch_assoc($data)){
                $type = $res['reg_id'];
                $query2 = "select * from `register` where `reg_id`='$type' and `reg_status` = 0"; 
                $data1 = mysqli_query($con,$query2);
                while($row = mysqli_fetch_assoc($data1)){
                ?>
                <tr>
                  <td><?php echo $row['reg_name'];?></td>
                  <td><?php echo $row['reg_email'];?></td>
                  <td><?php echo $row['reg_phone'];?></td>
                  <td>
                      <a href="del_coach.php?am=<?php echo $row['reg_id'];?>">
                        <input type="button" style="background-color:grey;" value="Delete"></a>
                      </td>
                    </tr>
                    <?php
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
