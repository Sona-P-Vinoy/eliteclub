    <?php
    include('../config.php');
    session_start();
    $id=$_GET["tm"];
    //echo "$id";
    $edit=mysqli_query($con,"SELECT `ticket_id`, `tick_category`, `tick_cat_desc`, `tick_seats`, `tick_price`, `tick_status` FROM `tickets` WHERE `ticket_id` = '$id'");
    $row=mysqli_fetch_array($edit);
    //print_r($row);
    if(isset($_POST["update"]))
    {
      $cat=$_POST["t_cat"];
      $desc=$_POST["t_desc"];
      $seat = $_POST['t_seat'];
      $price = $_POST['t_price'];
      //echo $name;
      $sql = "UPDATE `tickets` SET `tick_category`='$cat',`tick_cat_desc`='$desc',`tick_seats`='$seat',`tick_price`='$price' WHERE `ticket_id` = '$id'";
      if(mysqli_query($con,$sql)){
        echo 'edited successfully';
        header('location:booking_details.php');
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
      <link rel="stylesheet" href="../style.css">
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
          <span class="links_name"onclick="location.href='../team.php';" style="cursor: pointer;">Teams</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='../view_player_a.php';" style="cursor: pointer;">View Players</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='../view_coach_a.php';" style="cursor: pointer;">All Coaches</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name"onclick="location.href='../add_organizer.php';" style="cursor: pointer;">Add Organizer</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name"onclick="location.href='booking_details.php';" style="cursor: pointer;">Tickets</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name"onclick="location.href='view_trmt_a.php';" style="cursor: pointer;">Tournament</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='../team_coach_map_a.php';" style="cursor: pointer;">View Coach</span>
        </a>
      </li>
       <li>
        <a href="#">
          <i class='bx bx-book-alt'></i>
          <span class="links_name"onclick="location.href='../view_team_a.php';" style="cursor: pointer;">View Team</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name" onclick="location.href='../login.php';" style="cursor: pointer;">Log out</span>
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

          <div class="sales-boxes">
           <div class="recent-sales box">

            <div class="container">
              <center><h3>Edit Booking Details</h3></center>
              <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">

                <div class="row">
                  <div class="col-25">
                    <label for="tname">Category</label>
                  </div>
                  <div class="col-75">
                    <span></span> 
                    <input type="text"  id="t_name" name="t_cat" value="<?php echo $row["tick_category"];?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="tdesc">Description</label>
                  </div>
                  <div class="col-75">
                    <span style="padding-right: 50%;"></span> 
                    <input type="text"  id="t_desc" name="t_desc" value="<?php echo $row["tick_cat_desc"];?>">
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-25">
                    <label for="tname">Ticket Seats</label>
                  </div>
                  <div class="col-75">
                    <span></span> 
                    <input type="text"  id="t_name" name="t_seat" value="<?php echo $row["tick_seats"];?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label for="tname">Ticket Price</label>
                  </div>
                  <div class="col-75">
                    <span></span> 
                    <input type="text"  id="t_name" name="t_price" value="<?php echo $row["tick_price"];?>">
                  </div>
                </div>
                <div class="row">
                  <input type="submit" name="update" id="sub" value="Submit" >
                </div>

              </form>
            </div>
          </div>
        </div> 
      </div>
    </section>

    <!-- <script type="text/javascript">

                    function validate()
                    {  

                      if(document.getElementById('t_name').value.length==0 ||
                        document.getElementById('t_desc').value.length==0)
                      {
                        span[15].innerText = "Complete the Fields";
                        span[15].style.color = 'red';
                        return false;
                      }

                    }
                    let name = document.getElementById('t_name');
                    let span = document.getElementsByTagName('span');
                    let desc = document.getElementById('t_desc');
                    name.onkeyup = function()
                    {
                      var regex = /^([a-zA-Z]+\s)*[a-zA-Z]+$/;
                      
                      if(regex.test(name.value))
                      {
                        span[12].innerText = "";
                        span[12].style.color = '#28fc7a';
                        document.getElementById('sub').disabled =false;
                      }
                      else
                      {
                        span[12].innerText = "enter a valid team name";
                        span[12].style.color = 'red';
                        document.getElementById('sub').disabled =true;
                      }
                    }
                    desc.onkeyup = function()
                    {
                      var regex = /^([A-Za-z\.\!]+ )+[A-Za-z\.\!]+$|^[A-Za-z]+$/;
                      if(regex.test(desc.value))
                      {
                        span[14].innerText = "";
                        span[14].style.color = '#28fc7a';
                        document.getElementById('sub').disabled =false;
                      }
                      else
                      {
                        span[14].innerText = "enter a valid team description";
                        span[14].style.color = 'red';
                        document.getElementById('sub').disabled =true;
                      }
                    }



                  </script>-->


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
