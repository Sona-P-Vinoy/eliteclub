
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
  .container{
    padding-top: 10%;
  }
  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 20%;
    height: 70%;

  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }

  .container1 {
    padding: 2px 16px;
  }
</style>

</head>
<body>


  <nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="#home" class="menu-btn">Home</a></li>
        <li><a href="#about" class="menu-btn">About</a></li>
        <li><a href="#shop" class="menu-btn">Shop</a></li>
        <li><a href="#teams" class="menu-btn">Teams</a></li>
        <li><a href="#images" class="menu-btn">Images</a></li>
        <li><a href="#contact" class="menu-btn">Contact</a></li>
        <li><a href="login.php" class="menu-btn">Logout</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
 
  <div class="container">
    <?php
      include('config.php');
      session_start();
      $id=$_GET["am"];
      $t=mysqli_query($con,"SELECT * FROM `player_pos` WHERE `team_id`='$id'");
      while($row=mysqli_fetch_array($t))
      {
        $pla_id = $row['player_id'];
        $pos = $row['pos_id'];

        $query = "select * from register where $reg_id='$pla_id'";
        $data = mysqli_query($con,$query);

        while($res = mysqli_fetch_assoc($data)){
          $pname = $res['reg_name'];

             $query1 = "select * from position where $pos_id='$pos'";
             $data1 = mysqli_query($con,$query1);

            while($res1 = mysqli_fetch_assoc($data1)){
                  $posi = $res1['pos_name'];

                  $query2 = "select * from player_details where $reg_id='$pla_id'";
                  $data = mysqli_query($con,$query);

                  while($res = mysqli_fetch_assoc($data)){
        }
      }
    }

      <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container1">
          <h4><b>John Doe</b></h4> 
          <p>Architect & Engineer</p> 
        </div>
      </div>
    </div>
  </body>
  </html>