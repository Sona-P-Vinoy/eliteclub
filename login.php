
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
    $_SESSION['eliteSession']=session_id();
    $reg = $res['reg_id'];
    $query2 ="SELECT * FROM `login` WHERE `reg_id`='$reg' ";
    $result2= mysqli_query($con,$query2);

    if($row=mysqli_fetch_assoc($result2))
    {
     $_SESSION['eliteSession']=session_id();
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
        $_SESSION['eliteSession']=session_id();
        $_SESSION['email']=$email;
        $_SESSION['status'] = true;
        header('location:display_team.php');
      }else{
        $_SESSION['eliteSession']=session_id();
        $_SESSION['email']=$email;
        $_SESSION['status'] = true;
        header('location:display_team.php');
      }
    }
    elseif(($type == 3))
    {
      $_SESSION['eliteSession']=session_id();
      $_SESSION['email']=$email;
      $_SESSION['status'] = true;
      header('location:home1sample.php');
    }
    elseif(($type == 4))

    {
      $_SESSION['eliteSession']=session_id();
     $_SESSION['email']=$email;
     $_SESSION['status'] = true;
     header('location:display_team.php');
   }
    elseif(($type == 5))

    {
    $_SESSION['eliteSession']=session_id();
     $_SESSION['email']=$email;
     $_SESSION['status'] = true;
     header('location:dashboard1.php');
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

  <section class="login" id="login">
    <div class="max-width">
      <div class="login-content"> 
        <div class="column left">
          <div class="contact-wrapper">
           <header class="login-cta">
             <h2>Account Login</h2>
           </header>
           <form action="#" method="POST" onsubmit="return validate();">
            <div class="form-row">
              <span style="font-size: 13px";></span>
              <input type="text" name="email" id="email" placeholder="enter email">
            </div>
            <div class="form-row">
              <input type="password" name="password" placeholder="enter password" >
            </div>
            <div class="form-row"></div>
            <div class="form-row">
              <button type="submit"name="log" value="login" id ="sub" >Login to your Account!</button>

            </div>
          </form>
          <div class="other">
            <!--      Forgot Password button-->
            <!--     Sign Up button -->
            <a href="register.php"><button id="button" class="btn submits sign-up">Sign Up 
              <i class="fa fa-user-plus" aria-hidden="true"></i>
            </button>
            </a>
            <!--      End Other the Division -->
          </div>

        </div>
      </div>
      <div class="column right">
        <img src="img/204.jpg" alt="football">
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
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>
</body>
</html>
