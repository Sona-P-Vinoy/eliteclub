<?php
include('config.php');
session_start();
$id=$_GET["am"];
//echo "$id";
$edit=mysqli_query($con,"SELECT * FROM `player_details` WHERE `p_id`='$id'");
if($row=mysqli_fetch_array($edit)){
$g = $row['gen_id'];
}
$edit1=mysqli_query($con,"SELECT * FROM `gen_type` WHERE `gen_id`='$g'");
if($row1=mysqli_fetch_array($edit1)){
$g_name = $row1['gen_name'];
}


//print_r($row);
if(isset($_POST["update"]))
{
  $addr=$_POST["p_add"];
  $heg=$_POST["p_heg"];
  $weg=$_POST["p_weg"];


  //echo $name;
  $sql = "UPDATE `player_details` SET `p_address`='$addr',`p_height`='$heg',`p_weight`='$weg' WHERE `p_id`='$id'";
  if(mysqli_query($con,$sql)){
    echo 'edited successfully';
    header('location:view_p.php');
  }
  else
  {
    echo mysqli_errno($con);
  }
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Elite </title>
<link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="script.js"></script>
  <script src="scripte.js"></script>
  <style>
  
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  form .row .col-75 span{
    left: 45em;
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
  background-color: crimson;
  color: white;
}
.home-content{
  padding-top: 70px;
  width: 80%;
  padding-left: 20%;
}
</style>

</head>
<body>
  <nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        
       
        
        <li><a href="login.php" class="menu-btn">Logout</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

    <div class="home-content">

      <div class="sales-boxes">
       <div class="recent-sales box">

        <div class="container">
          <center><h3>Edit Your Details</h3></center>
          <span></span>
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
    
            <div class="row">
              <div class="col-25">
                <label for="paddress">Address</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="p_add" name="p_add" value="<?php echo $row["p_address"];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="pheight">Height(in cm)</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text"  id="p_heg" name="p_heg" value="<?php echo $row["p_height"];?>">
              </div>
            </div>
                <div class="row">
              <div class="col-25">
                <label for="pweight">Weight(in kg)</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text"  id="p_weg" name="p_weg" value="<?php echo $row["p_weight"];?>">
              </div>
            </div>
            <br>
            <div class="row">
              <input type="submit" id="sub" name="update" value="Submit" >
            </div>

          </form>
        </div>
      </div>
    </div> 
  </div>
</section>



</body>




</html>
<script type="text/javascript">


  function validate()
  {  

    if(document.getElementById('p_add').value.length==0 ||
      document.getElementById('p_heg').value.length==0 || document.getElementById('p_weg').value.length==0)
       {
      alert("Complete the registration");
      return false;
    }
  }
  let add = document.getElementById('p_add');
  let span = document.getElementsByTagName('span');
  let height = document.getElementById('p_heg');
  let weight = document.getElementById('p_weg');

  add.onkeyup = function()
  {
    var regex = /^[a-zA-Z0-9\s]{3,}$/;
    if(regex.test(add.value))
    {
      span[2].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[2].innerText = "enter a valid address";
      span[2].style.color = 'red';

      document.getElementById('sub').disabled =true;
    }
  }

height.onkeyup = function()
{
  var regex = /^[1-9]\d{1,3}$/;

  if(regex.test(height.value))
   {
    span[3].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[3].innerText = "your height is invalid";
    span[3].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}  
weight.onkeyup = function()
{
  var regex = /^[1-9]\d{1,3}$/;

  if(regex.test(weight.value))
   {
    span[4].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[4].innerText = "your weight is invalid";
    span[42].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}  


  
  
</script>