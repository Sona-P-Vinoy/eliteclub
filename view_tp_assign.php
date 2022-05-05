<?php
include 'config.php';
if(isset($_POST['submit']))
{
  $t=$_POST['te'];
  $c=$_POST['co'];
//echo $cname;
  $query="SELECT * FROM `team` WHERE team_name='$t'";
  $data=mysqli_query($con,$query);
  if($res = mysqli_fetch_assoc($data))
  {
    $tc=$res['team_id'];
  }

  $query1="SELECT * FROM `register` WHERE `reg_name`='$c'";
  $data1=mysqli_query($con,$query1);

  if($row = mysqli_fetch_assoc($data1))
  {
    $type=$row['reg_id'];
  }
  $query2="SELECT * FROM `player_team_map` WHERE `player_id`='$type'";
  $data2=mysqli_query($con,$query2);
  if(mysqli_num_rows($data2)>0)
  {
    echo '<script type="text/javascript"> alert("Duplication")</script>';
  }

  else
  {

   $sql="INSERT INTO `player_team_map`(`team_id`,`player_id`) VALUES ('$tc','$type')";
   if (mysqli_query($con,$sql))
   {
           //echo "Success";

   }
   else
   {
     echo mysqli_errno($con);
   }
 }
}

?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsive Admin Dashboard</title>
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
  label {
    padding: 5px 12px 5px 0;
    display: inline-block;
  }
  #left{
    border-radius:7px;
    padding-left: 50px;
    margin-top: 0;
    
    float:center;
    
    width:25%;
    height:280px;
  }
  #center{
     border-radius:7px;
    padding-left: 50px;
    margin-top: 0;
    margin-left: 20%;
    float:center;
    
    width:50%;
    height:280px;
  }
  #right{
    border-radius:7px;
    padding: 10px;
    float:right;
    
    width:25%;
    height:280px;
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
          <span class="links_name"onclick="location.href='team.php';" style="cursor: pointer;">Teams</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='view_player.php';" style="cursor: pointer;">Players</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name"onclick="location.href='view_coach.php';" style="cursor: pointer;">Coach</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Tickets</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name">Tournament</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group' ></i>
          <span class="links_name"onclick="location.href='team_coach_map.php';" style="cursor: pointer;">Assign Coach</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name"onclick="location.href='team_player_map.php';" style="cursor: pointer;">Assign Player</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name"onclick="location.href='login.php';" style="cursor: pointer;">Log out</span>
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
 <form action="#" method="POST" autocomplete="off" onsubmit="return validate();">
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box" style="cursor: pointer;">
          <div class="right-side">

            <div class="box-topic">Choose team</div>
                    <select required name="te" id="te">
                  <optgroup>
                    <?php
                    include 'config.php';
                    $query="SELECT * FROM `team`";
                    $data=mysqli_query($con,$query);
                    if($data){
                    while($res=mysqli_fetch_assoc($data))
                    {
                      $team = $res['team_id'];
                      $query2 = "select * from `player_team_map` where `team_id`='$team'"; 
                      $data1 = mysqli_query($con,$query2);
                      while($row = mysqli_fetch_assoc($data1)){
                        $player=$row['player_id'];
                      ?>
                      <option><?php echo $res['team_name'];?></option>
                    <?php }
                  }
                }
                    else{
                      echo mysqli_errno($con);
                    }
  
                    ?>
                  </optgroup>
                </select>
          </div>
        </div>
        <div class="box" onclick="location.href='team_coach_map.php';" style="cursor: pointer;">
          <div class="right-side">
            <div class="box-topic">Assign Coach</div>
          </div>
        </div>
      </div>
    </div>


          <div class="container">
          <div id="left">
              <span></span> 
              
         
     
                <input type = 'submit' name = 'submit' value = Submit>
                </form>
              </div>
            </div>
       
            


          <div id="center">
            <div class="row">
              <div class="col-25">

              </div>
              <div class="col-75">
                <span></span> 
                        <table id ="customers">
            <tr>
              <th>Team Name</th>
            </tr>
                          <?php
                    include 'config.php';

                    $query="SELECT * FROM `register` where `reg_id`=$player";
                    $data2=mysqli_query($con,$query);
                 
                      while($row=mysqli_fetch_assoc($data2)){
                        
              echo"<tr>
              
              <td>".$row['reg_name']."</td>
              </tr>";
            }
            ?>
          </table>

                  </div>
                  </div>
                  </div>


      </section>

      <script type="text/javascript">


        function validate()
        {  

          if(document.getElementById('p_name').value.length==0 ||
            document.getElementById('p_email').value.length==0 || document.getElementById('p_phone').value.length==0 ||
            document.getElementById('p_pwd').value.length==0 || document.getElementById('p_cpwd').value.length==0)
          {
            span[5].innerText = "Complete the registration";
            span[5].style.color = 'red';
            return false;
          }

        }
        let name = document.getElementById('p_name');
        let span = document.getElementsByTagName('span');
        let email = document.getElementById('p_email');
        let phn = document.getElementById('p_phone');
        let pass1 = document.getElementById('p_pwd');
        let pass2 = document.getElementById('p_cpwd');
        name.onkeyup = function()
        {
          var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
          if(regex.test(name.value))
          {
            span[14].innerText = "";
            span[14].style.color = '#28fc7a';

          }
          else
          {
            span[14].innerText = "enter a valid name";
            span[14].style.color = 'red';
          }
        }

        email.onkeyup = function(){
          const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
          const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
          if(regex.test(email.value) || regexo.test(email.value))
          {
            span[15].innerText = "";
            span[15].style.color = '#28fc7a';


          }
          else
          {
            span[15].innerText = "your email is invalid";
            span[15].style.color = 'red';
          }
        }
        phn.onkeyup = function(){
         const regexn = /^[0-9]{10}$/;
         if(regexn.test(phn.value))
         {
          span[17].innerText = "";
          span[17].style.color = '#28fc7a';
        }
        else
        {
          span[17].innerText = "your number is invalid";
          span[17].style.color = 'red';
        }
      }

      pass2.onkeyup = function(){
       if (document.getElementById('p_pwd').value==document.getElementById('p_cpwd').value)

       {
        span[18].innerText = "";
        span[18].style.color = '#28fc7a';
      }
      else
      {
        span[18].innerText = "password doesn't match";
        span[18].style.color = 'red';
      }
    }

  </script>




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
