<?php
include('../config.php');
session_start();
$trmid = $_SESSION['trm_id'];
$tround = $_GET['ttm'];
//echo $tround;
//echo $trmid;

if(isset($_POST["submit"]))
   {  
    $tdate = $_POST['date']; 
    $start_time = $_POST['timea'];  
    $tvenue=$_POST['venue'];
   

     $tquery = "SELECT `tl_trmt_id`, `tv_round`, `tv_home_id`, `tv_away_id` FROM `t1_vs_t2` WHERE `tl_trmt_id` = '$trmid' AND `tv_round` ='$tround'";
            $tdata = mysqli_query($con,$tquery);
            while($tres=mysqli_fetch_assoc($tdata)){
              $t1 = $tres['tv_home_id'];
              $t2 = $tres['tv_away_id'];
            


    $tquery1 = "UPDATE `t1_vs_t2` SET `tv_date`='$tdate',`tv_start_time`='$start_time',`tv_end_time`=0,`tv_venue`='$tvenue' WHERE `tl_trmt_id` = '$trmid' AND `tv_round` = '$tround' AND `tv_home_id`= '$t1' AND `tv_away_id` = '$t2'";

     if(mysqli_query($con,$tquery1)){

          //echo "Registered successfully";
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
  <title> Responsiive Admin Dashboard </title>
  
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="../datepicker.js"></script>

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
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='../leave_application.php';" style="cursor: pointer;">Leave Application</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='../training_programme.php';" style="cursor: pointer;">Training Programme</span>
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
        <img src="../image/david.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Player Details</h3></center>
          
          <table id ="customers">
            <tr>
              
              <th>Team A</th>
              <th>Team B</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>Venue</th>
              <th></th>
            </tr>
            <form method="post" action="#">
             <?php

            $query = "SELECT `tl_trmt_id`, `tv_round`, `tv_home_id`, `tv_away_id` FROM `t1_vs_t2` WHERE `tl_trmt_id` = '$trmid' AND `tv_round` ='$tround'";
            $data = mysqli_query($con,$query);
            while($res=mysqli_fetch_assoc($data)){
              $t1 = $res['tv_home_id'];
              $t2 = $res['tv_away_id'];
            

              $query1 = "SELECT `teamr_name`, `team_img` FROM `team_reg` WHERE `teamr_id` = '$t1'"; 
              $data1 = mysqli_query($con,$query1);
              while($res1 = mysqli_fetch_assoc($data1)){
                $t1name = $res1['teamr_name'];
                $t1logo = $res1['team_img'];

                $query2 = "SELECT `teamr_name`, `team_img` FROM `team_reg` WHERE `teamr_id` = '$t2'";
                $data2 = mysqli_query($con,$query2);
              while($res2 = mysqli_fetch_assoc($data2)){
                $t2name = $res2['teamr_name'];
                $t2logo = $res2['team_img'];

                $query3 = "SELECT * FROM `t1_vs_t2` WHERE `tl_trmt_id` = '$trmid' AND `tv_round` ='$tround' AND `tv_home_id` = '$t1' AND `tv_away_id` = '$t2'";
                $data3 = mysqli_query($con,$query3);
              while($res3 = mysqli_fetch_assoc($data3)){
                $tvid = $res3['tv_id'];
                $tvdate = $res3['tv_date'];
                $tvstarttime = $res3['tv_start_time'];
                $tvendtime = $res3['tv_end_time'];
                $tvvenue = $res3['tv_venue'];
                if($tvdate == 0){
                  ?>
                  <tr>
                  <td><?php echo $t1name;?></td>
                  <td><?php echo $t2name;?></td>
                  <td><input type="date" name="date" autocomplete="off"></td>
                  <td><input type="time" name="timea" id="timefrom" autocomplete="off"></td>
                  <td><select required name="venue" id="co">
                  <optgroup>
                    <?php
                    include '../config.php';
                    $query = "select * from `stadium` where s_status=1";
                    $data = mysqli_query($con,$query);
                    while($res = mysqli_fetch_assoc($data)){
                      $s_name = $res['s_name'];
                        ?>
                        <option><?php echo $s_name;?></option>
                      <?php }
                    
                  
                    ?>
                  </optgroup>
                </select></td>
                  <td><input type="submit" name="submit" style="color:white; background-color: #28282B;"></td>
                </tr>
              </form>

                  <?php
                }
                else{
                  ?>
                  <tr>
                  <td><?php echo $t1name;?></td>
                  <td><?php echo $t2name;?></td>
                  <td><?php echo $tvdate;?></td>
                  <td><?php echo $tvstarttime;?>AM</td>
                  <td><?php echo $tvvenue;?></td>
                  <td><a href="edit_vs_trmt.php?tm=<?php echo $tvid;?>">Edit
                  </a></td>

                </tr>
                  <?php

                    }
                  }
                }
              }
            }

              ?>
            </table>

            <div class="container" style="padding-top: 40px;">
              <center><h3>CHECK PLAYER AVAILABILITY</h3></center>

          <div class="card-body">
          <div class="row">
              <div class="col-md-7">

                  <form action="search_team.php" method="POST">
                      <div class="input-group mb-3">
                          <input type="text" name="search" required value="<?php echo $tvdate; ?>" class="form-control" placeholder="Search data" readonly>
                              <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                  </form>
              </div>
            </div>
          </div>
          <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Player Name</th>
                                    <th>Email</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   

                                    if(isset($_POST['search']))
                                    {
                                        $filtervalues = $_POST['search'];
                                        //echo $filtervalues;
                                            $query1 = "SELECT * FROM `leaves` WHERE CONCAT(fromdate,todate) LIKE '%$filtervalues%' and `status`='Accepted'";
                                            $query_run = mysqli_query($con, $query1);
                                            while($res = mysqli_fetch_assoc($query_run)){
                                              $pid = $res['pid'];
                                              echo $pid;
                                            

                                            $query2 = "SELECT * FROM `player_pos` WHERE NOT `player_id`='$pid'";
                                            $query_run1 = mysqli_query($con, $query2);
                                            while($res1 = mysqli_fetch_assoc($query_run1)){
                                              $player_id = $res1['player_id'];
                                              $team_id = $res1['team_id'];
                                              echo $team_id;
                                              //echo $player_id;
                                            

                                          $query3 = "SELECT * FROM `register` WHERE `reg_id`='$player_id'";
                                            $query_run2 = mysqli_query($con, $query3);
                                            while($res2 = mysqli_fetch_assoc($query_run2)){
                                              $reg_id=$res2['reg_id'];
                                              $reg_name = $res2['reg_name'];
                                              //echo $reg_name;

                                            $query4 = "SELECT * FROM `player_details` WHERE `reg_id`='$reg_id'";
                                            $query_run3 = mysqli_query($con, $query4);
                                            while($res3 = mysqli_fetch_assoc($query_run3)){
                                              $p_image=$res3['p_image'];



                                        if(mysqli_num_rows($query_run2) > 0)
                                        {

                                            foreach($query_run2 as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><img src='../<?php echo $p_image;?>'width="50px" height="50px"></td>
                                                    
                                                    <td><?= $items['reg_name']; ?></td>
                                                    <td><?= $items['reg_email']; ?></td>
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }

                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                          }
                                        }
                                      }
                                    }
                                  }
                                }

                                      
                                    

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<script type="text/javascript">
  var today = new Date();
    today = new Date(today.setDate(today.getDate() + 2)).toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', today);
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
<script type="text/javascript">

var timefrom = new Date();
temp = $('#timefrom').val().split(":");
timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timefrom.setMinutes(parseInt(temp[1]));

var timeto = new Date();
temp = $('#timeto').val().split(":");
timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timeto.setMinutes(parseInt(temp[1]));

if (timeto < timefrom){
    alert('start time should be smaller than end time!');
}
</script>

</html>
