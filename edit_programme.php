<?php
include('config.php');
session_start();
$id=$_GET["am"];
//echo "$id";
$edit=mysqli_query($con,"SELECT * FROM `training_programme` WHERE `tp_id`='$id'");
$row=mysqli_fetch_array($edit);
//print_r($row);
if(isset($_POST["update"]))
{
  $name=$_POST["p_name"];
  $start_date=$_POST["start_date"];
  $end_date=$_POST["end_date"];
  $desc=$_POST["desc"];
  //echo $name;
  $sql = "UPDATE `training_programme` SET `tp_name`='$name',`tp_start_date`='$start_date',`tp_end_date`='$end_date',`tp_desc`='$desc' WHERE `tp_id`='$id'";
  if(mysqli_query($con,$sql)){
    echo 'edited successfully';
    header('location:view_programmes.php');
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
  <title> Elite Admin Dashboard</title>
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

  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width:90%;

  }
  .container{
    margin-top: 10%;
    width: 60%;
    margin-left: 20%;
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
</style>

</head>
<body>

<nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="#home" class="menu-btn">Home</a></li>
        <li><a href="#about" class="menu-btn">About</a></li>
       
        
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
          <center><h3>Edit Programme Details</h3></center>
          <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">

            <div class="row">
              <div class="col-25">
                <label for="pname">Programme Name</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text"  id="p_name" name="p_name" value="<?php echo $row["tp_name"];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="fromdate">Start Date</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="date" id="start_date" name="start_date" value="<?php echo $row["tp_start_date"];?>"placeholder="Start Date">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="todate">End Date</label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="date" id="end_date" name="end_date" value="<?php echo $row["tp_end_date"];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="p_cpwd">Description</label>
              </div>
              <div class="col-75">
               <span></span> 
               <input type="text" id="desc" name="desc" rows="4" cols="50" value="<?php echo $row["tp_desc"];?>">
             </div>
           </div>
            <br>
            <div class="row">
              <input type="submit" id="submit" name="update" value="Edit" >
            </div>

          </form>
        </div>
      </div>
    </div> 
  </div>
</section>


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
