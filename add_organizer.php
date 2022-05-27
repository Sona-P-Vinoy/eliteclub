<?php
include('config.php');
session_start();


if(isset($_POST['check_submit_btn']))
{
  $email = $_POST['email_id'];

  $emailQuery = "select * from `register` where `reg_email`='$email' ";
  $query = mysqli_query($con,$emailQuery);

  if(mysqli_num_rows($query) > 0){
    echo "Email already taken";
  }
  else{
    echo "";
  }
  exit();
}

if(isset($_POST['reg']))
{

  $name = mysqli_real_escape_string($con,$_POST['p_name']);
  $mail = mysqli_real_escape_string($con,$_POST['p_email']);
  $mob = mysqli_real_escape_string($con,$_POST['p_phone']);
  $pass = mysqli_real_escape_string($con,$_POST['p_pwd']);
  $cpass = mysqli_real_escape_string($con,$_POST['p_cpwd']);

  $pas = md5($pass);
  $cpas = md5($cpass);

  $emailQuery = "select * from `register` where `reg_email`='$mail' ";
  $query = mysqli_query($con,$emailQuery);

  if(mysqli_num_rows($query) > 0){
    $_SESSION['status'] = "Email already taken.";
  }
  else{
   $sql = "INSERT INTO `register`(`reg_name`, `reg_email`, `reg_phone`, `reg_pwd`, `reg_status`)
   VALUES ('$name','$mail','$mob','$pas',0)";

   if (mysqli_query($con,$sql)) 
   {
    $query1="SELECT * FROM `register` WHERE `reg_email`='$mail' "; 
    $data1 = mysqli_query($con,$query1);

    if($res=mysqli_fetch_assoc($data1))
    {
      $query2="SELECT * FROM `user_type` WHERE `type_name`='organizer' ";
      $data2 = mysqli_query($con,$query2);

      if($row=mysqli_fetch_assoc($data2))
      {
        $re=$res['reg_id'];
        $type = $row['type_id'];

                //echo $ker;
        $sql2="INSERT INTO `login` (`reg_id`,`type_id`) VALUES('$re','$type')";

        if(mysqli_query($con,$sql2))
        {
          echo '<script type="text/javascript"> alert("Successfully added")</script>';
          header("location:add_organizer.php");
        }
        else
        {
          echo mysqli_errno($con);
        }
      }
    }
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
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='training_programme.php';" style="cursor: pointer;">Training Programme</span>
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
        <div class="box" onclick="location.href='view_organizer.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">View Organizers</div>
          </div>
        </div>
        <div class="box" onclick="location.href='team_organizer_map.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">Assign Organizer</div>
          </div>
        </div>
      </div>

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h2>Add Organizer</h2>
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
            <div class="row">
              <span style="padding: 10px;"></span>
              <div class="col-25">
                <label for="pname">Name</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_name" name="p_name" placeholder="Organizer name..">
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
                <label for="pphone">Phone Number</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_phone" name="p_phone" placeholder="Phone Number..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="pwd">Password</label>
              </div>
              <div class="col-75">
                <input type="password" id="p_pwd" name="p_pwd" placeholder="Password">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="p_cpwd">Confirm Password</label>
              </div>
              <div class="col-75">
               <span></span> 
               <input type="password" id="p_cpwd" name="p_cpwd" placeholder="Confirm Password">
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

    if(document.getElementById('p_name').value.length==0 ||
      document.getElementById('p_email').value.length==0 || document.getElementById('p_phone').value.length==0 ||
      document.getElementById('p_pwd').value.length==0 || document.getElementById('p_cpwd').value.length==0)
    {
      span[13].innerText = "Complete the registration";
      span[13].style.color = 'red';
      return false;
    }

  }
  let name = document.getElementById('p_name');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('p_email');
  let phn = document.getElementById('p_phone');
  let pass1 = document.getElementById('p_pwd');
  let pass2 = document.getElementById('p_cpwd');
  name.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(name.value))
    {
      span[16].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[16].innerText = "enter a valid name";
      span[16].style.color = 'red';

      document.getElementById('sub').disabled =true;
    }
  }

  email.onkeyup = function(){
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if(regex.test(email.value) || regexo.test(email.value))
    {
      span[17].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[17].innerText = "your email is invalid";
      span[17].style.color = 'red';
      document.getElementById('sub').disabled =true;
    }
  }
  phn.onkeyup = function(){
   const regexn = /^[6789]\d{9}$/;
   if(regexn.test(phn.value))
   {
    span[19].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[19].innerText = "your number is invalid";
    span[19].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}

pass2.onkeyup = function(){
 if (document.getElementById('p_pwd').value==document.getElementById('p_cpwd').value)

 {
  span[20].innerText = "";
  document.getElementById('sub').disabled =false;
}
else
{
  span[20].innerText = "password doesn't match";
  span[20].style.color = 'red';
  document.getElementById('sub').disabled =true;
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
