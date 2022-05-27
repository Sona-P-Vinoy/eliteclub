<?php
include('config.php');
if(isset($_SESSION["eliteSession"]) != session_id()){
    header("Location:index.php");
    die();
}
else{ 
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
    body{
      background-size:cover;
      background-attachment: fixed;
      display:flex;
      height: :100%;
      
      font-family: 'Poppins', sans-serif;
    }
    .container{
      margin-top: 80px;
      margin-left: 15%;
      width: 70%;
    }
    .span{
     display:block;
     margin-left:15px;
     color:red;
     font-style:italics;
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
  background-color: #36454F;
  color: white;
} 

form .row .col-75 span{
  left: 50em;
}

</style>
</head>
<body>
  <nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="index.php" class="menu-btn">Home</a></li>
        <li><a href="login.php" class="menu-btn">Logout</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <div class="container">
    <center><p style="font-family:'Poppins',sans-serif; font-weight: bold;font-size: 25px;">TEAM DETAILS</p></center>


    <table id ="customers">
     <?php
     session_start();
     $email = $_SESSION['email'];

     $sql = "SELECT `reg_id` FROM `register` WHERE `reg_email`='$email'";
     $row = mysqli_query($con,$sql);
     if($r = mysqli_fetch_assoc($row)){
      $id = $r['reg_id'];

     //echo $pname;
     $query = "SELECT `teamr_id`, `teamr_name`, `team_sec_name`, `team_sec_email`, `team_img`, `team_ground_addr`, `team_sec_phn`, `team_gen`, `team_desc`, `team_status` FROM `team_reg` WHERE `reg_team_id` = '$id'";
     $data = mysqli_query($con,$query);

     if($res=mysqli_fetch_assoc($data))
     {
      $team_id = $res['teamr_id'];
      $team_name = $res['teamr_name'];
      $team_sec_name = $res['team_sec_name'];
      $team_sec_email = $res['team_sec_email'];
      $team_img = $res['team_img'];
      $team_ground_addr = $res['team_ground_addr'];
      $team_sec_phn = $res['team_sec_phn'];
      $team_gen = $res['team_gen'];
      $team_desc = $res['team_desc'];
      $team_status = $res['team_status'];
      if($team_status == 0)
      {
        $st = 'Approval pending';
      }
      else if($team_status == 1)
      {
        $st = 'Accepted';
      }
      else{
        $st = 'Rejected';
      }

      $query1 = "SELECT `gen_id`,`gen_name` FROM `gen_type` WHERE `gen_id` = '$team_gen'";
      $data1 = mysqli_query($con,$query1);
      if($res1 = mysqli_fetch_assoc($data1))
        {
          $gender = $res1['gen_name'];
      
      ?>
        <tr><th><center><img src="<?php echo $team_img;?>" style="width:50px;height:50px;"></center></th></tr>
        <tr><th>Team Name</th><td><?php echo $team_name;?></td></tr>
        <tr><th>Team Secretary Name</th><td><?php echo $team_sec_name;?></td></tr>
        <tr><th>Team Secretary Email</th><td><?php echo $team_sec_email;?></td></tr>
        <tr><th>Team Ground Address</th><td><?php echo $team_ground_addr;?></td></tr>
        <tr><th>Team Secretary Phone no</th><td><?php echo $team_sec_phn;?></td></tr>
        <tr><th>Gender</th><td><?php echo $gender;?></td></tr>
        <tr><th>Team Description</th><td><?php echo $team_desc;?></td></tr>
        <tr><th>Status</th><td><?php echo $st;?></td></tr>
  </table>
  <div class="row">
    <a href="edit_team_reg.php?am=<?php echo $team_id;?>">
    <input type="submit" value="Edit"></a>
  </div>
          <?php
        }
      }
    }
    ?>
</div>
</body>
</html>
<?php }
?>

<script type = "text/javascript" >  
    window.history.forward();   
</script>