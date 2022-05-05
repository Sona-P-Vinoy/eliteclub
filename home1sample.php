 <?php
 include('config.php');
 session_start();
 $reg_email = $_SESSION['email'];
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
</head>
<body>
  <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
    <i class="fas fa-angle-up"></i>
  </button>
  <nav class="navbar">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="#home" class="menu-btn">Home</a></li>
        <li><a href="#about" class="menu-btn">About</a></li>
        
        <li><a href="view_coach_s.php" class="menu-btn">Your Details</a></li>
        
        <li><a href="login.php" class="menu-btn">Logout</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <!--home section start-->
  
  <section class="home" id="home">
    <div class="max-width">
      <div class="home-content">
        <div class="test-1">Welcome to </div>
        <div class="test-2">Elite Football Club</div>
        <div class="test-3">Where Legends Are Made <span class="type"></span></div>
        
      </div>
    </div>
  </section>
  
  <!--about section start-->
  
  <section class="about" id="about">
    <div class="max-width">
      <h2 class="title">About Us</h2>
      <div class="about-content">
        <div class="column left">
          <img src="img/2.jpg" alt="person4">
        </div>  
        <div class="column right">
          <div class="text">Adore it, Offer it, <span>Live it</span></div>
          <p>With over a century of football played at a prime west London location so fundamental to the birth of Chelsea Football Club in 1905, there is a great story to tell, full of ambition, star players, dramatic quests for trophy success and fashionable style, and at times even a swagger too, and we tell that tale here.Today, our desire to bring positive change to communities in Elite and across the world through football is as strong as ever.

          With support from our passionate fans, we’re using the ‘football effect’ to promote health, education and inclusion, to improve the lives of young people in Elite and all over the world. </p>
        </div>
      </div>
    </div>
  </section>
  
  
</section>

<!--footer section start-->

<footer>
  <span>Created by <a href="#">SonaVinoy</a> | <span class="far-fa-copyright"></span> 2021 All Rights Reserved</span>
</footer>

<script src="script.js"></script>
</body>
</html>