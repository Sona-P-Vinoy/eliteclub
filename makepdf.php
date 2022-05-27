<html>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 80%;
  border-radius: 40%; 
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
</html>
<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'config.php';
session_start();
$reg_id = $_SESSION['reg_id'];
echo $reg_id;
$pay=mysqli_query($con,"SELECT * FROM `tbl_booking` WHERE  `user_id`='$reg_id'");
while($p=mysqli_fetch_assoc($pay))
{
    $book_id = $p['book_id'];
    $tv_id = $p['tv_id'];
    $tvs_id = $p['tvs_id'];
    $no_seats = $p['no_seats'];
    $amount = $p['amount'];

    $pay1=mysqli_query($con,"SELECT * FROM `register` WHERE  `reg_id`='$reg_id'");
    while($p1=mysqli_fetch_assoc($pay1))
    {
      $reg_email = $p1['reg_email'];

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
                  }
                }
              }
            }
          }
        }

$mpdf = new \Mpdf\Mpdf();
$data = '';
$data .= '<div class="card"><h1>Elite Football Tournament Booking</h1>';
$data .= '<div class="crntdate"><h4 style="color:crimson;">TICKETS</h4></div>';
$data .= '<p> Book ID :' .  $book_id.'</p>';
$data .= '<p> Email :' .  $reg_email.'</p>';
$data .= '<p> Tournament :' . $teamr_name1.' vs '. $teamr_name2.'</p>';
$data .= '<p> Seat Category :' . $tick_category.'</p></div>';
$data .= '<p> Game Date :' . $tv_date.'</p></div>';
$data .= '<p> Game Time :' . $tv_start_time.'</p></div>';
$data .= '<p> No of Seats :' . $no_seats.'</p></div>';
$data .= '<p> Total Amount :' . $amount.'</p></div>';
$mpdf->WriteHTML($data);
$mpdf->Output('idcard.pdf','D');

?>