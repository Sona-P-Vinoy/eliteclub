  <?php
  include 'config.php';
  session_start();
  $email = $_SESSION['email'];

  global $row;
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="script.js"></script>
    <script src="scripte.js"></script>

    <style>
  .container1{
    padding-left:7%;
    display:flex;
    flex-wrap:wrap;
    justify-content:space between;
  }
  .container1 .box{
    position:relative;
    width:350px;
    padding:40px;
    background:#fff;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    border-radius:5%;
    margin:20px;
    box-sizing:border-box;
    overflow:hidden;
    text-align:center;
  }
  .container1 .box:before{
    content:'';
    width:50%;
    height:100%;
    position:absolute;
    top:0;
    left:0;
    background:rgbga(255,255,255,.2);
    z-index:2;
  }
  .container1 .box .icon{
    position:relative;
    width:80px;
    height:80px;
    color:#fff;
    background:#000;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:0 auto;
    border-radius:50%;
    font-size:40px;
    font-weight:700;
    transition:1s;
  }
  .icon img
  .container1 .box:nth-child(odd) .icon{
    box-shadow:0 0 0 0 #e91e63;
    background:#71797E;
  } 
  .container1 .box:nth-child(odd):hover .icon{
    box-shadow:0 0 0 400px #71797E;
  }
  .container1 .box:nth-child(even) .icon{
    box-shadow:0 0 0 0 #848884;
    background:#848884;
  } 
  .container1 .box:nth-child(even):hover .icon{
    box-shadow:0 0 0 400px #848884;
  }

  .container1 .box .content{
    position:relative;
    z-index: 1;
    transition: 0.5s;
  }
  .container1 .box:hover .content{
    color:#fff;
  }
  .container1 .box .content h3{
    font-size:20px;
    margin:10px 0;
    padding:0;
  }
  .container1 .box .content p{
    margin:0;
    padding:0;
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
        background-color: black;
        color: white;
      }

  </style>

  </head>
  <body>

  <nav class="navbar-login">
      <div class="max-width">
        <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
        <ul class="menu">
          <li><a href="display_team.php" class="menu-btn">Home</a></li>
          <li><a href="view_p_det.php" class="menu-btn">Player Info</a></li>
          <li><a href="leaveapplicationform.php" class="menu-btn">Apply Leave</a></li>
          <li><a href="login.php" class="menu-btn">Logout</a></li>

        </ul>
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>
        <div class="home-content">
        <div class="sales-boxes">
         <div class="recent-sales box">

          <div class="container" style="padding-top:90px;">
            <center><h1 style="padding-top: 20px;">My Leave History</h1></center>

            <table id ="customers">
              <tr>   
                <th>#</th>
                <th>Leave Application</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Status</th>
                <th></th>
              </tr>
              <tr>
                <?php
                $sql = "SELECT * FROM `register` WHERE `reg_email` = '$email'";
                $row1 = mysqli_query($con,$sql);
                if($res1 = mysqli_fetch_assoc($row1)){
                  $reg_id = $res1['reg_id'];
                    $leaves = mysqli_query($con,"SELECT * FROM leaves WHERE pid='$reg_id' and status<>'cancelled'");
                    if($leaves){
                      $numrow = mysqli_num_rows($leaves);
                      if($numrow!=0){
                        $cnt=1;
                        while($row1 = mysqli_fetch_array($leaves)){
                          $pid = $row1['pid'];
                          $todate = $row1['todate'];
                          echo "<tr>
                                  <td>$cnt</td>
                                  <td>{$row1['descr']}</td>
                                  <td>{$row1['fromdate']}</td>
                                  <td>{$row1['todate']}</td>
                                  <td><b>{$row1['status']}</b></td>"?>
                                  <?php
                                      $date_now = date('Y-m-d');
                                      //echo $date_now; 
                                      $endDate = date("Y-m-d", strtotime($todate));  
                                      //echo $endDate;
                                      if($endDate > $date_now){
                                   
                                  echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\"href='del_leave.php?am=".$pid."'><i class='fa fa-times' aria-hidden='true'style='color:crimson;font-size:20px;'></i></a></td>
                                </tr>";
                                 }
                       $cnt++; }
                      } else {
                        echo"<tr class='text-center'><td colspan='12'><b>YOU DON'T HAVE ANY LEAVE HISTORY! PLEASE APPLY TO VIEW YOUR STATUS HERE!</b></td></tr>";
                      }
                    }
                  }
                    else{
                      echo "Query Error : " . "SELECT descr,status FROM leaves WHERE pid='".$reg_id."'" . "<br>" . mysqli_error($con);;
                    }

                ?>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
