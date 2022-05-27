  <?php
include('config.php');
session_start();
$reg_id = $_SESSION['reg_id'];
?>
 <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <title>Elite Football Club and Academy</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script type="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="scroll.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <style>
      p{
        display: inline;
        word-wrap: break-word;
      }
 #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  padding-top: 30px;
  margin-top: 40px;
  width: 100%;
}

#customers td, #customers th {
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
.button{
  text-decoration: none;
  background-color: #28282b;
  color: white;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #cccccc;

}
</style>
  </head>
  <body>
    <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
      <i class="fas fa-angle-up"></i>
    </button>
    <nav class="navbar" style="background-color: black;">
      <div class="max-width">
        <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
        <ul class="menu">
          <li><a href="display_team.php" class="menu-btn">Home</a>
          <li><a href="index.php" class="menu-btn">Logout</a>
          </li>
        </ul>
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

<div class="container" style="padding-top: 10%; font-weight: bold;">
          <center><h3>Ticket Details</h3></center>
             <?php
              $query1 = "select * from `register` WHERE `reg_id`='$reg_id'";
              $data1 = mysqli_query($con,$query1);
              while($res1=mysqli_fetch_assoc($data1)){
                $reg_name = $res1['reg_name'];
                

                ?>
                <center><h3><?php echo $reg_name;?></h3></center>
              <?php } ?>
          <table id ="customers">
            <tr>
              <th>Booking ID</th>
              <th>Tournament</th>
              <th>Seat Category</th>
              <th>Game Date</th>
              <th>Game Time</th>
              <th>No of seats</th>
              <th>Price</th>
              <th>Print</th>
            </tr>
            <?php
              include('config.php');

              $query = "select * from `tbl_booking` WHERE `user_id`='$reg_id'";
              $data = mysqli_query($con,$query);
              while($res=mysqli_fetch_assoc($data)){
                $book_id = $res['book_id'];
                $tv_id = $res['tv_id'];
                $tvs_id = $res['tvs_id'];
                $user_id = $res['user_id'];
                $no_seats = $res['no_seats'];
                $amount = $res['amount'];

              $sql1 = "SELECT * FROM `tickets` WHERE `ticket_id`='$tv_id'";
              $row1 = mysqli_query($con,$sql1);
              while($res1 = mysqli_fetch_assoc($row1)){
                 $tick_category = $res1['tick_category'];

              $sql3 = "SELECT * FROM `t1_vs_t2` WHERE `tv_id`='$tvs_id'";
              $row3 = mysqli_query($con,$sql3);
              while($res3 = mysqli_fetch_assoc($row3)){
                 $tv_home_id = $res3['tv_home_id'];
                 $tv_away_id = $res3['tv_away_id'];
                 $tv_date = $res3['tv_date'];
                 $tv_start_time = $res3['tv_start_time'];
                 //echo $tv_home_id;
                 //echo $tv_away_id;

                 $sql4 = "SELECT * FROM `team_reg` WHERE `teamr_id`='$tv_home_id'";
                 $row4 = mysqli_query($con,$sql4);
                 while($res4 = mysqli_fetch_assoc($row4)){
                  $teamr_name1 = $res4['teamr_name'];
                  //echo $teamr_name1;

                 $sql5 = "SELECT * FROM `team_reg` WHERE `teamr_id`='$tv_away_id'";
                 $row5 = mysqli_query($con,$sql5);
                 while($res5 = mysqli_fetch_assoc($row5)){
                  $teamr_name2 = $res5['teamr_name'];

           ?>
                <tr>
                  <td><?php echo $res['book_id'];?></td>
                  <td><?php echo $teamr_name1;?> vs <?php echo $teamr_name2;?></td>
                  <td><?php echo $tick_category;?></td>
                  <td><?php echo $tv_date;?></td>
                  <td><?php echo $tv_start_time;?></td>
                  <td><?php echo $res['no_seats'];?></td>
                  <td>Rs.<?php echo $res['amount'];?></td>
                  <td><a href="makepdf.php"><i class="fa fa-print" aria-hidden="true"></i></a></td>
                  
                    </tr>
                    <?php
                    }
                  }
                }
              }
            }      
                ?>
              </table>
            </div>
          </div>
        </div>
