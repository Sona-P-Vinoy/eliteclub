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
.container {
    border-radius: 5px;
    background-color: white;
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
          <li><a href="index.php" class="menu-btn">Home</a></li>
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
        <div class="column left">
       <div class="sales-boxes">
       <div class="recent-sales box">
        <div class="container" style="padding-bottom: 20px;">
            <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
              <div class="row">
                <div class="col-25">
                  <label for="pname">First Name:</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="f_name" name="c_name">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="Email">Last Name:</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="l_name" name="l_name">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="Email">Email:</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="c_email" name="c_email" class="checking_email">
                  <span class="error_email" style="color:red;left:17em;"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="pphone">Phone Number:</label>
                </div>
                <div class="col-75">
                  <span style="float: 55em;"></span> 
                  <input type="text" id="t_phone" name="t_phone">
                </div>
              </div>
             <br>
        </div>
      </div>
    </div>
          
        </div>  
        <div class="column right">
                <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container" >
              <div class="row">
                <div class="col-25">
                  <label for="pname">Address:</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="c_name" name="c_name">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="Email">City</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="c_email" name="c_email" class="checking_email">
                  <span class="error_email" style="color:red;left:17em;"></span>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="pphone">State</label>
                </div>
                <div class="col-75">
                  <span style="float: 55em;"></span> 
                  <input type="text" id="c_phone" name="c_phone">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="pwd">ZIP/Pincode</label>
                </div>
                <div class="col-75">
                  <span></span> 
                  <input type="text" id="c_pwd" name="c_pwd">
                </div>
              </div>
             <br>
             <div class="row">
              <input type="submit" id="sub" name="reg" value="Submit" >
            </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>


  </body>
  </html>
  <script type="text/javascript">

  
  function validate()
  {  
   
    if(document.getElementById('f_name').value.length==0 ||
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
