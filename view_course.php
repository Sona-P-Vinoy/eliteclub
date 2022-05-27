  <?php
include('config.php');
session_start();
$email = $_SESSION['email'];
//echo $email;

if(isset($_POST['submit']))
{
  $c=$_POST['c'];
  $sql = "SELECT * FROM `register` WHERE `reg_email`='$email'";
  $row = mysqli_query($con,$sql);
  if($res = mysqli_fetch_assoc($row)){
    $reg_id = $res['reg_id'];

  $query2="SELECT * FROM `course_enroll` WHERE `course_id`='$c'";
  $data2=mysqli_query($con,$query2);
  if(mysqli_num_rows($data2)>0)
  {
    echo '<script type="text/javascript"> alert("Duplication")</script>';
  }

  else
  {


    $sql1 = "INSERT INTO `course_enroll`(`course_id`, `reg_id`) VALUES ('$c','$reg_id')";
       if (mysqli_query($con,$sql1))
   {
           //echo "Success";

   }
   else
   {
     echo mysqli_errno($con);
   }
  }
}
}
?>
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
          <li><a href="display_team.php" class="menu-btn">Home</a>
            <li><a href="view_enrolled_course.php" class="menu-btn">Enrolled Course</a>
          <li><a href="index.php" class="menu-btn">Logout</a>
          </li>
        </ul>
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

<div class="container" style="padding-top: 10%; font-weight: bold;">
          <center><h3>Course Details</h3></center>
          <form action="#" method="POST">
             <?php
              $query1 = "select * from `training_programme`";
              $data1 = mysqli_query($con,$query1);
              while($res1=mysqli_fetch_assoc($data1)){
                $tp_id = $res1['tp_id'];
                $tp_name = $res1['tp_name'];
                $tp_start_date = $res1['tp_start_date'];
                $tp_end_date = $res1['tp_end_date'];
                $tp_desc = $res1['tp_desc'];
                

                ?>
                <center><h3></h3></center>
          <table id ="customers">
            <tr>
              <th></th>
              <th>Programme Name</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Description</th>
              <th>Enroll</th>
            </tr>
                <tr>
                  
                  <td><input type="hidden"name="c" value="<?php echo $tp_id;?>"></td>
                  <td><?php echo $tp_name;?></td>
                  <td><?php echo $tp_start_date;?></td>
                  <td><?php echo $tp_end_date;?></td>
                  <td><?php echo $tp_desc;?></td>
                  <td><input type="submit" name="submit" value="enroll"></td>
                  </tr>
                    <?php
                    }     
                ?>
              </table>
            </form>
            </div>
          </div>
        </div>
