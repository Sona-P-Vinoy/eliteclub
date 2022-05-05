<?php
include('../config.php');
session_start();

$sql = "select count(*) AS `count` from `team_reg` where `team_status` = 1";

$all_teams = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($all_teams);
$count = $row['count'];

if(isset($_POST['submit']))
{
  $trm_name = mysqli_real_escape_string($con,$_POST['trmt_name']);
  $trm_tot = mysqli_real_escape_string($con,$_POST['Num']);
  $_SESSION['Num'] = $_POST['Num'];

  

  $sql_insert = "INSERT INTO `trm` (`trm_name`,`trm_tot_teams`)VALUES('$trm_name','$trm_tot')";

  if(mysqli_query($con,$sql_insert))
  {
    echo '<script>alert("Tournament added successfully!")</script>';
    $sql_select = "SELECT `trm_id` FROM `trm` WHERE `trm_name` = '$trm_name'";
    $query_select = mysqli_query($con,$sql_select);
    if($res_select = mysqli_fetch_assoc($query_select)){
      $trmt_id = $res_select['trm_id'];
      $_SESSION['trm_id'] = $trmt_id;
    }

    header("location:enter_team.php");
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard </title>
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
        <span class="dashboard">CREATE A NEW TOURNAMENT</span>
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
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">

            <div class="row">
              <span></span> 
              <div class="col-25">

                <label for="tname">Enter Tournament Name</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text"  id="trmt_name" name="trmt_name">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="tnum">Number of Teams</label>
              </div>
              <div class="col-75">
                <span style="padding-right: 50%;"></span> 
                <select name="Num" id ="num">
                  <option value="">Choose count</option>
                  <?php
                  for($i = 2; $i<=$count; $i++){
                        echo "<option value=".$i.">".$i."</option>";
                      }
                      ?>
                        
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <input type="submit" name="submit" id="sub" value="Submit" >
            </div>

          </form>
        </div>
      </div>
    </div> 
  </div>
</section>

<script type="text/javascript">


  function validate()
  {  

    if(document.getElementById('trmt_name').value.length==0 ||
      document.getElementById('num').value.length==0)
    {
      span[11].innerText = "Complete the registration";
      span[11].style.color = 'red';
      return false;
    }

  }
  let tname = document.getElementById('trmt_name');
  let span = document.getElementsByTagName('span');
  let tnum = document.getElementById('num');
  tname.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(tname.value))
    {
      span[12].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[12].innerText = "enter a valid name";
      span[12].style.color = 'red';

      document.getElementById('sub').disabled =true;
    }
  }

  tnum.onkeyup = function(){
   const regexn = /[0-9]/;
   if(regexn.test(tnum.value))
   {
    span[13].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[13].innerText = "your number is invalid";
    span[13].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}



</script>


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
