 <?php
 ?>
 <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
  <title> Responsive Admin Dashboard</title>
  
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="datepicker.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
      <i class="fas fa-angle-up"></i>
    </button>
    <nav class="navbar" style="background-color: black;">
      <div class="max-width">
        <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
        <ul class="menu">
          <li><a href="#home" class="menu-btn">Home</a></li>
          <li><a href="#about" class="menu-btn">About</a></li>
          <li><a href="login.php" class="menu-btn">Login</a>
          </li>
        </ul>
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

<section class="about" id="about">
    <div class="max-width">
      <h2 class="title">Ticket Billing Details</h2>
      <div class="about-content">
        <div class="column left" style="margin-left: 30%;">
          <center>
       <div class="sales-boxes">
       <div class="recent-sales box">
        
        <div class="container" style="padding-bottom: 20px;">
            <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
<span style="margin-left: 20%;"></span>
              <div class="row">
                
                <div class="col-25">
                  <label for="pname">Name on Card:</label>
                </div>
                <div class="col-75">
                  <span style="margin-left: 20%;"></span> 
                  <input type="text" id="f_name" name="c_name">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="number">Card Number:</label>
                </div>
                <div class="col-75">
                  <span  style="margin-left: 20%;"></span> 
                  <input type="text" id="card_n" name="l_name">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="Date">Expiry Date:</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" name="date" class="form-control datepicker" id ="calendar" autocomplete="off">
                  
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="pphone">CVV:</label>
                </div>
                <div class="col-75">
                  <span style="margin-left: 20%;"></span> 
                  <input type="text" id="cvv" name="t_phone">
                </div>
              </div>
               <br>
                       <div class="row">
              <input type="submit" id="sub" name="reg" value="Submit" >
            </div>
            
             </form>
        </div>

      </div>
    </div>
</center>

<script type="text/javascript">


  function validate()
  {  

    if(document.getElementById('f_name').value.length==0 ||
      document.getElementById('card_n').value.length==0 ||
      document.getElementById('cvv').value.length==0)
    {
      span[1].innerText = "Complete the registration";
      span[1].style.color = 'red';
      return false;
    }

  }
  let name = document.getElementById('f_name');
  let span = document.getElementsByTagName('span');
  let phn = document.getElementById('card_n');
  let pass2 = document.getElementById('cvv');
  name.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(name.value))
    {
      span[2].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[2].innerText = "enter a valid name";
      span[2].style.color = 'red';

      document.getElementById('sub').disabled =true;
    }
  }

  phn.onkeyup = function(){
   const regexn = /^[0-9]\d{9}$/;
   if(regexn.test(phn.value))
   {
    span[3].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[3].innerText = "number is invalid";
    span[3].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}
  pass2.onkeyup = function(){
   const regexn = /^[0-9]\d{2}$/;
   if(regexn.test(pass2.value))
   {
    span[5].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[5].innerText = "number is invalid";
    span[5].style.color = 'red';
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