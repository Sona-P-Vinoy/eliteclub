<?php
include('config.php');
session_start();
$reg_id = $_SESSION['reg_id'];
//echo $reg_id;
if(isset($_SESSION["eliteSession"]) != session_id()){
    header("Location:index.php");
    die();
}
else{ 
?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale =1.0">
  <title>Personal Portfolio Website</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    color: black;
    
  }

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  padding-top: 30px;
  margin-top: 40px;
  width: 100%;
  background-color:#f5f5f5;
}

#customers td, #customers th {
  border: 1px solid #fff0f5;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #fff0f5;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 30px;
  padding-bottom: 12px;
  text-align: left;
  background-color: crimson;
  color: white;
}
.teams{
  background-color: #faf9f6;
}
.btn{
  text-decoration: none;
  background-color: #28282b;
  color: white;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #cccccc;

}
</style>
  </head>
  <body>
    <nav class="navbar" style="background-color: black; padding-bottom: 10px;">
      <div class="max-width">
        <div class="logo"><a href="#">Elite<span>'s</span></a></div>
        <ul class="menu">
          <li><a href="display_team.php">Home</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

    

    <!--team section start-->
    
    <section class="teams" id="teams">
      <div class="max-width">
                <?php
                  $tid = $_GET['tid'];

                 $query = "SELECT `trm_name` FROM `trm` WHERE `trm_id` = '$tid'";
                 $data = mysqli_query($con,$query);
                while($result = mysqli_fetch_assoc($data))
                  {
                    $tname = $result['trm_name'];
                ?>
        <h2 class="title" style="padding-top: 20px;"><?php echo $tname;?></h2>
                <?php
                }
              ?>

            <table id ="customers">
            <tr>
              
              <th colspan="2">TEAM A</th>
              
              <th colspan="2">TEAM B</th>
              <th>Start Time</th>
              <th>Venue</th>
              <th>BOOK</th>
            </tr>


              <?php

              $sql = "SELECT `tv_id`,`tl_trmt_id`, `tv_round`, `tv_home_id`, `tv_away_id`, `tv_date`, `tv_start_time`, `tv_end_time`, `tv_venue` FROM `t1_vs_t2` WHERE `tl_trmt_id` = '$tid' AND `tv_date` !=0";
              $row = mysqli_query($con,$sql);
              while($res = mysqli_fetch_assoc($row))
                  {
                    $tvid = $res['tv_id'];
                    $tid = $res['tl_trmt_id'];
                    $tround = $res['tv_round'];
                    $thomeid = $res['tv_home_id'];
                    $tawayid = $res['tv_away_id'];
                    $tstartime = $res['tv_start_time'];
                    $tendtime = $res['tv_end_time'];
                    $tvenue = $res['tv_venue'];


              $sql1 = "SELECT `teamr_id`, `teamr_name`, `team_img` FROM `team_reg` WHERE `teamr_id` = '$thomeid'";
              $row1 = mysqli_query($con,$sql1);
              while($res1 = mysqli_fetch_assoc($row1))
                  {
                    $t1name = $res1['teamr_name'];
                    $t1logo = $res1['team_img'];


              $sql2 = "SELECT `teamr_id`, `teamr_name`, `team_img` FROM `team_reg` WHERE `teamr_id` = '$tawayid'";
              $row2 = mysqli_query($con,$sql2);
              while($res2 = mysqli_fetch_assoc($row2))
                  {
                    $t2name = $res2['teamr_name'];
                    $t2logo = $res2['team_img'];

              ?>

              <tr>
                  <td><?php echo $t1name;?></td>
                  <td><img src="<?php echo $t1logo;?>"width="50px" height="50px"></td>
                  <td><?php echo $t2name;?></td>
                  <td><img src="<?php echo $t2logo;?>"width="50px" height="50px"></td>
                  <td><?php echo $tstartime;?></td>
                  <td><?php echo $tvenue;?></td>
                  <td><a href="ticket_booking.php?tvd=<?php echo $tvid;?>" class="btn">BUY TICKET</a></td>
              </tr>

              <?php
              }
            }
          }
        ?>
            </table>

           
      </div>
    </section>
    
    
    
    
    <script src="script.js"></script>
  </body>
  </html>

  <?php } ?>