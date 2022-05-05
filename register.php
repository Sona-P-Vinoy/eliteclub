<?php
include('config.php');

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
  $name = mysqli_real_escape_string($con,$_POST['username']);
  $mail = mysqli_real_escape_string($con,$_POST['email']);
  $mob = mysqli_real_escape_string($con,$_POST['phone']);
  $pass = mysqli_real_escape_string($con,$_POST['password']);
  $cpass = mysqli_real_escape_string($con,$_POST['cpassword']);

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
      $query2="SELECT * FROM `user_type` WHERE `type_name`='user' ";
      $data2 = mysqli_query($con,$query2);
      
      if($row=mysqli_fetch_assoc($data2))
      {
        $re=$res['reg_id'];
        $type = $row['type_id'];
        
                //echo $ker;
        $sql2="INSERT INTO `login` (`reg_id`,`type_id`) VALUES('$re','$type')";
        
        if(mysqli_query($con,$sql2)){

          echo "Registered successfully";
          header("location:login.php");
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
    background-color:#616d7b;
    background-size:cover;
    background-attachment: fixed;
    display:flex;
    height: :100%;
    overflow: hidden;
  }
  span{
    color: red;
    font-size: 12px;
    padding-top: 0;
    overflow:hidden;
    border:0;
    margin-top: 0;

  }


</style>
</head>
<body>
  <nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="#home" class="menu-btn">Home</a></li>
        <li><a href="display_team.php" class="menu-btn">Teams</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <section class="register" id="register">
    <div class="max-width">
      <div class="login-content"> 
        <div class="column left">
          <div class="contact-wrapper">
           <header class="login-cta">
             <h2>Register here</h2>
           </header>
           <form action="register.php" method="POST" autocomplete="off" onsubmit="return validate();">
            <div class="form-row">
              <span></span> 
              <input type="text" name="username" placeholder="Username" id="username" required> 
            </div> 
            <div class="form-row">
              <span></span> 
              <input type="text" name="email" class="checking_email" placeholder="Email" id="email"required> <br>
              <span class="error_email" style="color:red;left:17em;"></span>
            </div>
            
            <div class="form-row">
              <span></span> 
              <input type="text" name="phone" placeholder="Phone" id="phone" required> 
            </div>
            
            <div class="form-row">
              <input type="password" name="password" placeholder="Password" id="password" required>
            </div>
            <div class="form-row">
              <span></span>
              <input type="password" name="cpassword" placeholder="Confirm password" id="cpassword" required>
            </div>
            <div class="form-row"></div>
            <div class="form-row">
              <button type="submit" name="reg" value="register" id="sub">Register!</button>
            </div>
            <div class="other"><a href="login.php">Already have an account?Login here!</a></div>
            
          </form>
        </div>
      </div>
      <div class="column right">
        <img src="img/204.jpg" alt="football">
      </div>
    </div>
  </div>
</section>
</body>

<script type="text/javascript">


  function validate()
  {  

    if(document.getElementById('username').value.length==0 ||
      document.getElementById('email').value.length==0 || document.getElementById('phone').value.length==0 ||
      document.getElementById('password').value.length==0 || document.getElementById('cpassword').value.length==0)
    {
      span[5].innerText = "Complete the registration";
      span[5].style.color = 'red';
      return false;
    }

  }
  let name = document.getElementById('username');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('email');
  let phn = document.getElementById('phone');
  let pass1 = document.getElementById('password');
  let pass2 = document.getElementById('cpassword');
  name.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(name.value))
    {
      span[1].innerText = "";
      document.getElementById("sub").disabled=false;
    }
    else
    {
      span[1].innerText = "enter a valid name";
      span[1].style.color = 'red';
      document.getElementById("sub").disabled=true;
    }
  }
  
  email.onkeyup = function(){
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if(regex.test(email.value) || regexo.test(email.value))
    {
      span[2].innerText = "";
      document.getElementById("sub").disabled=false;
    }
    else
    {
      span[2].innerText = "your email is invalid";
      span[2].style.color = 'red';
      document.getElementById("sub").disabled=true;
    }
  }

  phn.onkeyup = function(){
   const regexn = /^[0-9]{10}$/;
   if(regexn.test(phn.value))
   {
    span[4].innerText = "";
    document.getElementById("sub").disabled=false;
  }
  else
  {
    span[4].innerText = "your number is invalid";
    span[4].style.color = 'red';
    document.getElementById("sub").disabled=true;
  }
}

  pass2.onkeyup = function(){
    if (document.getElementById('password').value==document.getElementById('cpassword').value)
      {
        span[5].innerText = "";
        document.getElementById("sub").disabled=false;
      }
    else
      {
       span[5].innerText = "password doesn't match";
       span[5].style.color = 'red';
       document.getElementById("sub").disabled=true;
      }
  }

</script>


</html>

