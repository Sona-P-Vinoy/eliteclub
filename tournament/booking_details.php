<?php 
    include('../config.php');


if(isset($_POST['submit']))
{
  $cat = mysqli_real_escape_string($con,$_POST['category']);
  $desc = mysqli_real_escape_string($con,$_POST['desc']);
  $seat = mysqli_real_escape_string($con,$_POST['seat']);
  $price = mysqli_real_escape_string($con,$_POST['price']);
  
  $sql = "INSERT INTO `tickets`(`tick_category`, `tick_cat_desc`, `tick_seats`, `tick_price`,`tick_status`) VALUES ('$cat','$desc','$seat','$price',1)";
  if(mysqli_query($con,$sql))
  {
    echo '<script>alert("Ticket details added successfully!")</script>';
  }else{
    echo mysqli_errno($con);
  }
}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsive Admin Dashboard</title>
  <link rel="stylesheet" href="../style.css">
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
          
          <table id ="customers">
            <tr>   
              <th>Category</th>
              <th>Description</th>
              <th>Total Seats</th>
              <th>Price</th>
              <th></th>
            </tr>
            <form method="post" action="#">
            <tr>   
              <td><input type="text" name="category" autocomplete="off"></td>
              <td><input type="text" name="desc" autocomplete="off"></td>
              <td><input type="text" name="seat" autocomplete="off"></td>
              <td><input type="text" name="price" autocomplete="off"></td>
              <td><input type="submit" name="submit" style="color:white; background-color: #28282B;"></td>
            </tr>
          </form>
          </table><br><br>
          <h2><center>TICKET DETAILS</center></h2>
          <table id ="customers">
            
          <?php

            $sql2="SELECT `ticket_id`,`tick_category`, `tick_cat_desc`, `tick_seats`, `tick_price` FROM `tickets` WHERE `tick_status` = 1";
            $data = mysqli_query($con,$sql2);
              if(mysqli_num_rows($data)<1){
                echo"<tr>
              <td>No Records Found!</td>
              </tr>";
              }
              else{
                echo '<tr>
            <th style="background-color: #343434;">Category</th>
            <th style="background-color: #343434;">Description</th>
            <th style="background-color: #343434;">Total Seats</th>
            <th style="background-color: #343434;">Price</th>
            <th style="background-color: #343434;"></th>
          </tr>';
              
              while($res2=mysqli_fetch_assoc($data))
            {
              $t_id = $res2['ticket_id'];
              $t_cat = $res2['tick_category'];
              $t_desc = $res2['tick_cat_desc'];
              $t_seat = $res2['tick_seats'];
              $t_price = $res2['tick_price'];
            ?>

          <tr>
            <td><?php echo $t_cat;?></td>
            <td><?php echo $t_desc;?></td>
            <td><?php echo $t_seat;?></td>
            <td><?php echo $t_price;?></td>
            <td><a style="color: #343434;" href="edit_ticket.php?tm=<?php echo $t_id;?>">Edit</a>  <a style="color: darkred;"  href="del_ticket.php?tickid=<?php echo $t_id;?>">Delete</a></td>
          </tr>
          <?php 
        }
      }
      ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</body>
</html>