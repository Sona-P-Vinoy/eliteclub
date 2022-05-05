
<?php
include('config.php');
session_start();

if(isset($_POST['log']))
{
  $email=$_POST['email'];
  $pass=md5($_POST['password']);
  
  $query="SELECT * FROM `register` WHERE `reg_email`='$email' AND `reg_pwd`='$pass' ";
  $result= mysqli_query($con,$query);

  if($res=mysqli_fetch_assoc($result))
  {
    $reg = $res['reg_id'];
    $query2 ="SELECT * FROM `login` WHERE `reg_id`='$reg' ";
    $result2= mysqli_query($con,$query2);

    if($row=mysqli_fetch_assoc($result2))
    {
     $type = $row['type_id'];
     
     $_SESSION['email']=$na;
     if(($type == 1))
     {
      header('location:dashboard.php');
    }
    elseif(($type == 2))
    {
      $query1="SELECT * FROM `player_details` WHERE `reg_id`='$reg'";
      $result1= mysqli_query($con,$query1);
      if(mysqli_num_rows($result1)>0){
        $_SESSION['email']=$email;
        header('location:view_p_det.php');
      }else{
        $_SESSION['email']=$email;
        header('location:player_details.php');
      }
    }
    elseif(($type == 3))
    {
      $_SESSION['email']=$email;
      header('location:home1sample.php');
    }
    elseif(($type == 4))

    {
     $_SESSION['email']=$email;
     header('location:display_team.php');
   }
   
   
 }

}
else{
  echo '<script type="text/javascript"> alert("Invalid Username And Password!!")</script>';
}
} 
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
  <style>
  body{
    background-color:#616d7b;
    background-size:cover;
    background-attachment: fixed;
    display:flex;
    overflow: hidden;

  }
</style>

</head>
<body>
  <nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="index.php" class="menu-btn">Home</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

   <section class="home-section">

    <div class="home-content">

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h2>Register for Selection</h2>
          <form action="addplayer.php" method="POST" autocomplete="off" onsubmit="return validate();">
            <div class="row">
              <span style="padding: 10px;"></span>
              <div class="col-25">
                <label for="pname">Name</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_name" name="p_name" placeholder="Player name..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="Email">Email</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_email" name="p_email" class="checking_email" placeholder="Email">
                <span class="error_email" style="color:red;left:17em;"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="pdob">DOB</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_phone" name="p_phone" placeholder="Phone Number..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="pphone">Phone Number</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_phone" name="p_phone" placeholder="Phone Number..">
              </div>
            </div>
           <br>
           <div class="row">
            <input type="submit" id="sub" name="reg" value="Submit">
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

    if(document.getElementById('email').value.length==0)
    {
      span[5].innerText = "Complete the registration";
      span[5].style.color = 'red';
      return false;
    }

  }
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('email');
  
  email.onkeyup = function(){
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if(regex.test(email.value) || regexo.test(email.value))
    {
      span[1].innerText = "";
      
    }
    else
    {
      span[1].innerText = "your email is invalid";
      span[1].style.color = 'red';
      
    }
  }


</script>
</body>
</html>