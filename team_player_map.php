<?php
include 'config.php';
$id=$_GET["am"];
session_start();
$email=$_SESSION['email'];
if(isset($_POST['submit']))
{
  $c=$_POST['co'];
  $p=$_POST['pos'];
//echo $cname;

  $query="SELECT * FROM `team_reg` WHERE teamr_id='$id'";
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
    $query2="SELECT * FROM `position` WHERE `pos_name`='$p'";
  $data2=mysqli_query($con,$query2);

  if($row1 = mysqli_fetch_assoc($data2))
  {
    $pos=$row1['pos_id'];
  }
  $query2="SELECT * FROM `player_pos` WHERE `player_id`='$type'";
  $data2=mysqli_query($con,$query2);
  if(mysqli_num_rows($data2)>0)
  {
    echo '<script type="text/javascript"> alert("Duplication")</script>';
  }

  else
  {

   $sql="INSERT INTO `player_pos`(`player_id`,`pos_id`,`team_id`) VALUES ('$type','$pos','$tc')";
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
        <div class="box"onclick="location.href='view_team.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">Back</div>
          </div>
        </div>
        
      </div>
    </div>
      <div class="sales-boxes">
       <div class="recent-sales box">
        <?php
        include'config.php';
        $query="SELECT * FROM `team_reg` WHERE teamr_id='$id'";
        $data = mysqli_query($con,$query);
        if($res3 = mysqli_fetch_assoc($data)){
        ?>
        <div class="container">
          <center><h3>Team - Player Details</h3></center>
          <h3><?php echo $res3['teamr_name'];?></h3>
          <?php
        }?>
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
            <div class="row">
              <div class="col-25">
                <label for="Teamdesc">Select Player</label>
              </div>
              <div class="col-75">
                <span></span> 
                <select required name="co" id="co">
                  <optgroup>
                    <?php
                    include 'config.php';
                    $query = "select * from `team_reg` where teamr_id='$id'";
                    $data = mysqli_query($con,$query);
                    while($res = mysqli_fetch_assoc($data)){
                      $g = $res['team_gen'];
                      $query1 = "select * from `player_details` where gen_id='$g' and `status`=1";
                      $data1 = mysqli_query($con,$query1);
                      while($res1 = mysqli_fetch_assoc($data1)){
                        $r = $res1['reg_id'];
                        $query2 = "select * from `register` left join `player_pos` on register.reg_id=player_pos.player_id where player_pos.player_id is null and register.reg_id='$r'";
                        $data2=mysqli_query($con,$query2);
                        while($res2 = mysqli_fetch_assoc($data2)){

                        ?>
                        <option><?php echo $res2['reg_name'];?></option>
                      <?php }
                    }
                    }
                  
                    ?>
                  </optgroup>
                </select>

              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="Teamdesc">Select Position</label>
              </div>
              <div class="col-75">
                <span></span> 
                <select required name="pos" id="pos">
                  <optgroup>
                    <?php
                    include 'config.php';
                    $query="SELECT * FROM `position`";
                    $data=mysqli_query($con,$query);
                    while($res=mysqli_fetch_assoc($data))
                      {
                        ?>
                        <option><?php echo $res['pos_name'];?></option>
                      <?php }
                    
                  
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
              <th>Player Name</th>
              <th>Position</th>
            </tr>
            <?php
            include('config.php'); 
            $id=$_GET["am"];     
            $query="SELECT * from player_pos where `team_id`='$id'";
            $data = mysqli_query($con,$query);
            while($res=mysqli_fetch_assoc($data))
            {
              $pla=$res['player_id'];
              $pos=$res['pos_id'];
              $query1="SELECT * from `register` where `reg_id`='$pla'";
               $data1 = mysqli_query($con,$query1);
              while($row=mysqli_fetch_assoc($data1))
              {
                $pla_name=$row['reg_name'];
                $query2="SELECT * from `position` where `pos_id`='$pos'";
               $data2 = mysqli_query($con,$query2);
              while($res=mysqli_fetch_assoc($data2))
              {
                $posname=$res['pos_name'];
              echo"<tr>
              <td>".$pla_name."</td>
              <td>".$posname."</td>
              </tr>";
            }
          }
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
