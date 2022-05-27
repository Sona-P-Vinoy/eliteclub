    <?php 
    include('config.php');
    session_start();
    $reg_id = $_SESSION['reg_id'];
    $tvid = $_GET['tvd'];


    if(isset($_POST['submit']))
    {
      $ticketid = $_POST['ticketid'];
      $venue = $_POST['venue'];
      $seats = $_POST['seats'];
      $amount = $_POST['amount'];
      $sub_total = ($_POST['seats'] * $_POST['amount']);
       

      $sql2="INSERT INTO `tbl_booking`(`tv_id`,`tvs_id`, `user_id`, `no_seats`, `amount`, `status`) VALUES ('$ticketid','$tvid','$reg_id','$seats','$sub_total',0)";
         if(mysqli_query($con,$sql2)){
              $_SESSION['bid']=mysqli_insert_id($con);
              echo "Registered successfully";
              header("location:checkout.php");
            }
             else
            {
              echo mysqli_errno($con);
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
              <li><a href="display_team.php" class="menu-btn">Home</a></li>
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
          <h2 class="title">Venue</h2>
          <div class="about-content">
            <div class="column left">
              <img src="img/best_available_seating.com.png.png" alt="person4">
            </div>  
            <div class="column right">
            <table id ="customers">
                <tr>   
                  <th style="background-color: #343434;">Category</th>
                  <th style="background-color: #343434;">Description</th>
                  <th style="background-color: #343434;">Total Seats</th>
                  <th style="background-color: #343434;">No of Seats</th>
                  <th style="background-color: #343434;">Price</th>
                  <th style="background-color: #343434;"></th>
                  <th style="background-color: #343434;"></th>
                </tr>
              <?php
                $sql = "SELECT `ticket_id`, `tick_category`, `tick_cat_desc`, `tick_seats`, `tick_price`, `tick_status` FROM `tickets` WHERE `tick_status` = 1";
                $data = mysqli_query($con,$sql);
                  while($row=mysqli_fetch_assoc($data))
                  {
                    $tiid = $row['ticket_id'];
                    $cat=$row['tick_category'];
                    $desc=$row['tick_cat_desc'];
                    $seat=$row['tick_seats'];
                    $price=$row['tick_price'];

                $av=mysqli_query($con,"select sum(no_seats) from tbl_booking where book_id='$tiid'");
                while($avl=mysqli_fetch_array($av)){


                    ?>
              <form  action="#" method="post">
              <tr>   
                <input type="hidden" name="ticketid" value="<?php echo $tiid;?>"/>
                <td><?php echo $cat;?></td>
                <td><?php echo $desc;?></td>
                <td><?php echo $seat;?></td>
                 
                <td><input type="number" required tile="Number of Seats" max="<?php echo $seat-$avl[0];?>" min="1" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/></td>
                <td><input type="hidden" name="amount" id="hm" value="<?php echo $price;?>"/></td>
                <td id="amount" name="amont"style="font-weight:bold;font-size:18px;">
                          Rs <?php echo $price;?></td>
                <td><input type="submit" name="submit" id="btn" value="Checkout"/></td>
              </tr>
            </form>
              <?php 
            }
          }
           ?>
    </table>
        </div>
        </section>

      </body>
      </html>