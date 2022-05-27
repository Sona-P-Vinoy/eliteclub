<?php
include 'config.php';
if(isset($_POST['submit']))
{
  $t=$_POST['te'];
  $c=$_POST['co'];
//echo $cname;
  $query="SELECT * FROM `team_reg` WHERE teamr_name='$t'";
  $data=mysqli_query($con,$query);
  if($res = mysqli_fetch_assoc($data))
  {
    $tc=$res['teamr_id'];
  }

  $query1="SELECT * FROM `register` WHERE `reg_name`='$c'";
  $data1=mysqli_query($con,$query1);

  if($row = mysqli_fetch_assoc($data1))
  {
    $type=$row['reg_id'];
  }
  $query2="SELECT * FROM `team_organizer_map` WHERE `organizer_id`='$type'";
  $data2=mysqli_query($con,$query2);
  if(mysqli_num_rows($data2)>0)
  {
    echo '<script type="text/javascript"> alert("Duplication")</script>';
  }

  else
  {

   $sql="INSERT INTO `team_organizer_map`(`team_id`,`organizer_id`) VALUES ('$tc','$type')";
   if (mysqli_query($con,$sql))
   {
           //echo "Success";
    
   }
   else
   {
     echo mysqli_errno($con);
   }
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

    <div class="home-content">
      <div class="overview-boxes">

        <div class="box"onclick="location.href='add_organizer.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">Add Organizer</div>
          </div>
        </div>
        
      </div>

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Team - Organizer Details</h3></center>
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">

            <div class="row">
              <div class="col-25">
                <label for="teamname">Teams</label>
              </div>
              <div class="col-75">
                <span></span> 
                <select required name="te" id="te">
                  <optgroup>
                    <?php
                    include 'config.php';
                    $query="SELECT * FROM `team_reg` left join `team_organizer_map` on team_reg.teamr_id=team_organizer_map.team_id where team_organizer_map.team_id is null and team_reg.team_status=1";
                    $data=mysqli_query($con,$query);
                    if($data){
                    while($res=mysqli_fetch_assoc($data))
                    {
                      ?>
                      <option><?php echo $res['teamr_name'];?></option>
                    <?php }
                  }
                    else{
                      echo mysqli_errno($con);
                    }
  
                    ?>
                  </optgroup>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="Teamdesc">Select Organizer</label>
              </div>
              <div class="col-75">
                <span></span> 
                <select required name="co" id="co">
                  <optgroup>
                    <?php
                    include 'config.php';
                    $query="SELECT * FROM `login` where `type_id`='5'";
                    $data=mysqli_query($con,$query);
                    while($res=mysqli_fetch_assoc($data))
                    {
                      $c=$res['reg_id'];
                      $query2="SELECT * FROM `register` left join `team_organizer_map` on register.reg_id=team_organizer_map.organizer_id where team_organizer_map.organizer_id is null and register.reg_id='$c'";
                      $data2=mysqli_query($con,$query2);
                      while($row=mysqli_fetch_assoc($data2)){
                        ?>
                        <option><?php echo $row['reg_name'];?></option>
                      <?php }
                    }
                  
                    ?>
                  </optgroup>
                </select>

              </div>
            </div>
            <br>
            <div class="row">
              <input type="submit" id="submit" name="submit" value="Submit" >
            </div>
          </form>
          <table id ="customers">
            <tr>
              <th>Team Name</th>
              <th>Organizer Name</th>
            </tr>
            <?php
            include('config.php');      
            $query="SELECT * from team_organizer_map left join team_reg ON team_reg.teamr_id = team_organizer_map.team_id left join register on register.reg_id = team_organizer_map.organizer_id;";
            $data = mysqli_query($con,$query);
            while($res=mysqli_fetch_assoc($data))
            {
              echo"<tr>
              <td>".$res['teamr_name']."</td>
              <td>".$res['reg_name']."</td>
              </tr>";
            }
            ?>
          </table>
        </section>

        <script type="text/javascript">

          
          function validate()
          {  
           
            if(document.getElementById('t_name').value.length==0 ||
              document.getElementById('t_desc').value.length==0)
            {
              span[5].innerText = "Complete the Fields";
              span[5].style.color = 'red';
              return false;
            }

          }
          let name = document.getElementById('t_name');
          let span = document.getElementsByTagName('span');
          let desc = document.getElementById('t_desc');
          name.onkeyup = function()
          {
            var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
            if(regex.test(name.value))
            {
              span[10].innerText = "";
              span[10].style.color = '#28fc7a';

            }
            else
            {
              span[10].innerText = "enter a valid team name";
              span[10].style.color = 'red';
            }
          }
          desc.onkeyup = function()
          {
            var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
            if(regex.test(desc.value))
            {
              span[11].innerText = "";
              span[11].style.color = '#28fc7a';

            }
            else
            {
              span[11].innerText = "enter a valid team description";
              span[11].style.color = 'red';
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
