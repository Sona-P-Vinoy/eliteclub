  <?php
include('config.php');
session_start();
$reg_id = $_SESSION['reg_id'];

if(isset($_POST['submit']))
{
  $name = $_POST['firstname'];
  $place = $_POST['place'];
  $sub = $_POST['subject'];

  $sql = "INSERT INTO `feedback`(`reg_id`, `f_name`, `f_place`, `f_desc`) VALUES ('$reg_id','$name','$place','$sub')";
  if(mysqli_query($con,$sql)){
          echo "submitted successfully";
          header("location:display_team.php");
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
.button{
  text-decoration: none;
  background-color: #28282b;
  color: white;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #cccccc;

}

input[type=text], select, textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: crimson;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: black;
}

.container {
  width: 100%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px;
  padding-top: 5%;
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
          <li><a href="index.php" class="menu-btn">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
<div class="container">
  <form action="#" method="POST">
    <label for="fname">Your Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
    <label for="fname">Place</label>
    <input type="text" id="fname" name="place" placeholder="Your name..">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit" name="submit">
  </form>
</div>

</body>
</html>


