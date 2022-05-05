 <?php
 include('config.php');
 session_start();
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
    background-size:cover;
    background-attachment: fixed;
    display:flex;
    height: :100%;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
  }
  .container{
    margin-top: 120px;
    margin-left:20% ;
    width: 60%;
  }
  .span{
   display:block;
   margin-left:15px;
   color:red;
   font-style:italics;
 }  
 #customers {
  font-family: Arial, Helvetica, sans-serif;
  width:90%;
  border-spacing: 10px;
  margin-left: 35px;
}

#customers td, #customers th {
 border: 1px solid #ddd;
 padding: 8px;
 width:25%;
 background-color: #d3d3d3;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}


#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 30px;
  text-align: left;
  background-color: #353935;
  color: white;
  width: 20%;
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
  <div class="container">
    <center><p style="font-family:'Poppins',sans-serif; font-weight: bold;font-size: 25px;">YOUR DETAILS</p></center>

    <form action="#" method="POST" autocomplete="off" >
    </form>

    <table id ="customers">
     <?php
     $reg_email = $_SESSION['email'];
     $query = "select * from `register` where `reg_email`='$reg_email'";
     $data = mysqli_query($con,$query);

     if($res=mysqli_fetch_assoc($data))
     {
      $r_id=$res['reg_id'];
      $query1 = "select * from `register` where `reg_id`=' $r_id'";
      $data1 = mysqli_query($con,$query1);
      while($row = mysqli_fetch_assoc($data1)){
        
        ?>
        <tr><th>DOB</th><td><?php echo $row['reg_name'];?></td></tr>
        <tr><th>Address</th><td><?php echo $row['reg_email'];?></td></tr>
        <tr><th>Phone no.</th><td><?php echo $row['reg_phone'];?></td></tr>
        
  </table>
  <div class="row">
    <a href="edit_coach.php?am=<?php echo $row['reg_id'];?>">
    <input type="submit" value="Edit"></a>
  </div>
          <?php
      }
    }
    ?>
</div>
</body>
</center>
</html>
