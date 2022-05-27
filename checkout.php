  

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
    width: 150%;
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
            <li><a href="login.php" class="menu-btn">Logout</a>
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
          <div class="column right">
          <table id ="customers">
              <tr>   
                <th style="background-color: #343434;">Booking Number</th>
                <th style="background-color: #343434;">User Name</th>
                <th style="background-color: #343434;">Category</th>
                <th style="background-color: #343434;">Game Date</th>
                <th style="background-color: #343434;">Game Time</th>
                <th style="background-color: #343434;">No of Seats</th>
                <th style="background-color: #343434;">Price</th>
                <th style="background-color: #343434;"></th>
                <th style="background-color: #343434;"></th>
              </tr>
            <?php
              include('config.php');
              session_start();
              $bid = $_SESSION['bid'];
              $sql = "SELECT * FROM `tbl_booking` WHERE `book_id`='$bid'";
              $row = mysqli_query($con,$sql);
              while($res = mysqli_fetch_assoc($row)){
              	 $book_id = $res['book_id'];
                 $tvs_id = $res['tvs_id'];
              	 $tv_id = $res['tv_id'];
              	 $user_id = $res['user_id'];
              	 $no_seats = $res['no_seats'];
              	 $amount = $res['amount'];

              $sql1 = "SELECT * FROM `tickets` WHERE `ticket_id`='$tv_id'";
              $row1 = mysqli_query($con,$sql1);
              while($res1 = mysqli_fetch_assoc($row1)){
                 $tick_category = $res1['tick_category'];

              $sql2 = "SELECT * FROM `register` WHERE `reg_id`='$user_id'";
              $row2 = mysqli_query($con,$sql2);
              while($res2 = mysqli_fetch_assoc($row2)){
                 $reg_name = $res2['reg_name'];

              $sql3 = "SELECT * FROM `t1_vs_t2` WHERE `tv_id`='$tvs_id'";
              $row3 = mysqli_query($con,$sql3);
              while($res3 = mysqli_fetch_assoc($row3)){
                 $tv_date = $res3['tv_date'];
                 $tv_start_time = $res3['tv_start_time'];

                  ?>
            <form  action="#" method="post">
            <tr>
              <td><?php echo $book_id;?></td>
              <td><?php echo $reg_name;?></td>
              <td><?php echo $tick_category;?></td>
              <td><?php echo $tv_date;?></td>
              <td><?php echo $tv_start_time;?></td>
              <td><?php echo $no_seats;?></td>
              <td><input type="hidden" name="amount" id="hm" value="<?php echo $amount;?>"/></td>
              <td id="amount" name="amont"style="font-weight:bold;font-size:18px">
                        Rs <?php echo $amount;?></td>
              <td><input type="button" name="submit" id="btn" value="Pay Now" onclick="pay_now()"/></td>
            </tr>
          </form>
            <?php 

          }
        }
      }
    }

        
          ?>

          </div>
      </section>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script type="text/javascript">

      function pay_now(){
          var name=jQuery('#name').val();
          var a=jQuery('#hm').val();
          var amt=jQuery('#seats').val();
          
           jQuery.ajax({
                 type:'post',
                 url:'payment_process.php',
                 data:"amt="+amt+"&name="+name,
                 success:function(result){
                     var options = {
                          "key": "rzp_test_cYVC4WqRW9Xcbi", 
                          "amount": a*100, 
                          "currency": "INR",
                          "name": "Elite club",
                          "description": "Test Transaction",
                          "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                          "handler": function (response){
                             jQuery.ajax({
                                 type:'post',
                                 url:'payment_process.php',
                                 data:"payment_id="+response.razorpay_payment_id,
                                 success:function(result){
                                     window.location.href="display_team.php";
                                 }
                             });
                          }
                      };
                      var rzp1 = new Razorpay(options);
                      rzp1.open();
                 }
             });
          
          
      }
  </script>

    </body>
    </html>