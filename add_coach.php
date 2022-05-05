<?php
include('config.php');
session_start();

if(isset($_POST['reg']))
{
  $name = mysqli_real_escape_string($con,$_POST['c_name']);
  $mail = mysqli_real_escape_string($con,$_POST['c_email']);
  $mob = mysqli_real_escape_string($con,$_POST['c_phone']);
  $pass = mysqli_real_escape_string($con,$_POST['c_pwd']);
  $cpass = mysqli_real_escape_string($con,$_POST['c_cpwd']);

  $pas = md5($pass);
  $cpas = md5($cpass);

  $emailQuery = "select * from `register` where `reg_email`='$mail' ";
  $query = mysqli_query($con,$emailQuery);

  if(mysqli_num_rows($query) > 0){
    $_SESSION['status'] = "Email already taken.";
  }
  
   $sql = "INSERT INTO `register`(`reg_name`, `reg_email`, `reg_phone`, `reg_pwd`, `reg_status`)
   VALUES ('$name','$mail','$mob','$pas',0)";

   if (mysqli_query($con,$sql)) 
   {
    $query1="SELECT * FROM `register` WHERE `reg_email`='$mail' "; 
    $data1 = mysqli_query($con,$query1);

    if($res=mysqli_fetch_assoc($data1))
    {
      $query2="SELECT * FROM `user_type` WHERE `type_name`='coach' ";
      $data2 = mysqli_query($con,$query2);
      
      if($row=mysqli_fetch_assoc($data2))
      {
        $re=$res['reg_id'];
        $type = $row['type_id'];
        
                //echo $ker;
        $sql2="INSERT INTO `login` (`reg_id`,`type_id`) VALUES('$re','$type')";
        
        if(mysqli_query($con,$sql2)){
          echo "Registered successfully";
          header("location:view_coach.php");
        }
        else
        {
          echo mysqli_errno($con);
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
  <title> Responsive Admin Dashboard </title>
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
          <span class="links_name">Dashboard</span>
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
          <span class="links_name"onclick="location.href='view_player.php';" style="cursor: pointer;">Players</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='view_coach.php';" style="cursor: pointer;">Coach</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Tickets</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name">Tournament</span>
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
          <i class='bx bx-book-alt' ></i>
          <span class="links_name"onclick="location.href='view_team.php';" style="cursor: pointer;">Assign Player</span>
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
        <span class="admin_name">Admin</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box" onclick="location.href='view_coach.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">View Coach</div>
          </div>
        </div>
        <div class="box" onclick="location.href='team_coach_map.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">Assign Coach</div>
          </div>
        </div>
      </div>

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Enter Coach Details</center>
            <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
              <div class="row">
                <div class="col-25">
                  <label for="pname">Name</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="c_name" name="c_name" placeholder="Coach name..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="Email">Email</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="c_email" name="c_email" class="checking_email" placeholder="Email">
                  <span class="error_email" style="color:red;left:17em;"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="pphone">Phone Number</label>
                </div>
                <div class="col-75">
                  <span style="float: 55em;"></span> 
                  <input type="text" id="c_phone" name="c_phone" placeholder="Phone Number..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="pwd">Password</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="password" id="c_pwd" name="c_pwd" placeholder="Password">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="c_cpwd">Confirm Password</label>
                </div>
                <div class="col-75">
                 <span></span> 
                 <input type="password" id="c_cpwd" name="c_cpwd" placeholder="Confirm Password">
               </div>
             </div>
             <br>
             <div class="row">
              <input type="submit" id="sub" name="reg"value="Submit" >
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
   
    if(document.getElementById('c_name').value.length==0 ||
      document.getElementById('c_email').value.length==0 || document.getElementById('c_phone').value.length==0 ||
      document.getElementById('c_pwd').value.length==0 || document.getElementById('c_cpwd').value.length==0)
    {
      span[5].innerText = "Complete the registration";
      span[5].style.color = 'red';
      return false;
    }

  }
  let name = document.getElementById('c_name');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('c_email');
  let phn = document.getElementById('c_phone');
  let pass1 = document.getElementById('c_pwd');
  let pass2 = document.getElementById('c_cpwd');
  name.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(name.value))
    {
      span[12].innerText = "";
      document.getElementById("sub").disabled=false;

    }
    else
    {
      span[12].innerText = "enter a valid name";
      span[12].style.color = 'red';
      document.getElementById("sub").disabled=true;
    }
  }
  
  email.onkeyup = function(){
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if(regex.test(email.value) || regexo.test(email.value))
    {
      span[14].innerText = "";
      document.getElementById("sub").disabled=false;


    }
    else
    {
      span[14].innerText = "your email is invalid";
      span[14].style.color = 'red';
      document.getElementById("sub").disabled=true;
    }
  }
  phn.onkeyup = function(){
   const regexn = /^[0-9]{10}$/;
   if(regexn.test(phn.value))
   {
    span[15].innerText = "";
    document.getElementById("sub").disabled=false;
  }
  else
  {
    span[15].innerText = "your number is invalid";
    span[15].style.color = 'red';
    document.getElementById("sub").disabled=true;
  }
}

pass2.onkeyup = function(){
 if (document.getElementById('c_pwd').value==document.getElementById('c_cpwd').value)
   
 {
  span[16].innerText = "";
  document.getElementById("sub").disabled=false;
}
else
{
  span[16].innerText = "password doesn't match";
  span[16].style.color = 'red';
  document.getElementById("sub").disabled=true;
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
