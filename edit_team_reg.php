   <?php
 include('config.php');
 session_start();
 $trid=$_GET["am"];


   if(isset($_POST["submit"]))
   {  
    $pname = $_POST['p_name']; 
    echo $pname;
    $sname = $_POST['s_name']; 
    echo $sname;
    $pemail = $_POST['p_email']; 
    echo $pemail;
    $address=$_POST['address'];
    echo $address;
    $p_phn=$_POST['phn'];
    echo $p_phn;
    $gender=$_POST['gen'];

    $desc=$_POST['t_desc'];

        $sql2 = "SELECT * FROM `gen_type` WHERE `gen_name`='$gender'";
        $data = mysqli_query($con,$sql2);
        if($res=mysqli_fetch_assoc($data))
        {
            $gend=$res['gen_id'];

            $sql3 = "UPDATE `team_reg` SET `teamr_name`='$pname',`team_sec_name`='$sname',`team_sec_email`='$pemail',`team_ground_addr`='$address',`team_sec_phn`='$p_phn',`team_gen`='$gend',`team_desc`='$desc' WHERE `teamr_id` = '$trid'";
            if (mysqli_query($con,$sql3))
              {
                $_SESSION['p_name'] = $pname;
              echo "Success";
              header("location:view_team_reg.php");
              }
              else
              {
                echo mysqli_errno($con);
              }
            }
          }
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
      
      font-family: 'Poppins', sans-serif;
    }
    .container{
      margin-top: 80px;
      margin-left: 15%;
      width: 70%;
    }
    .span{
     display:block;
     margin-left:15px;
     color:red;
     font-style:italics;
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

form .row .col-75 span{
  left: 50em;
}

</style>
</head>
<body>

  <nav class="navbar-login">
    <div class="max-width">
      <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
      <ul class="menu">
        <li><a href="index.php" class="menu-btn">Home</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
  <div class="container">
    <center><h2>Edit Team Registration form</h2></center><br>

    <form action="#" method="POST" autocomplete="off" onsubmit="return validate();" enctype="multipart/form-data">

      <?php


    $edit = "SELECT `teamr_id`, `teamr_name`, `team_sec_name`, `team_sec_email`, `team_img`, `team_ground_addr`, `team_sec_phn`, `team_gen`, `team_desc`, `team_status` FROM `team_reg` WHERE `teamr_id` = '$trid'";
     $data = mysqli_query($con,$edit);

     if($res=mysqli_fetch_assoc($data))
     {
      $team_id = $res['teamr_id'];
      $team_name = $res['teamr_name'];
      $team_sec_name = $res['team_sec_name'];
      $team_sec_email = $res['team_sec_email'];
      $team_img = $res['team_img'];
      $team_ground_addr = $res['team_ground_addr'];
      $team_sec_phn = $res['team_sec_phn'];
      $team_gen = $res['team_gen'];
      $team_desc = $res['team_desc'];
      $team_status = $res['team_status'];

            ?>
      <div class="row">
        <span style="padding-bottom: 20px;"></span>
        <div class="col-25">
          <label for="pname">Proposed club name:</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_name" name="p_name" value="<?php echo $team_name;?>">
        </div>
      </div>
      <div class="row">
        <span style="padding-bottom: 20px;"></span>
        <div class="col-25">
          <label for="sname">Club Secretary name:</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="s_name" name="s_name" value="<?php echo $team_sec_name;?>">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="Email">Secretary Email</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_email" name="p_email" class="checking_email" value="<?php echo $team_sec_email;?>">
          <span class="error_email" style="color:red;left:17em;"></span>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="Address">Full address of training ground:</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_address" name="address" value="<?php echo $team_ground_addr;?>">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          
          <label for="Phone">Club Secretary contact phone number:</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_phn" name="phn" value="<?php echo $team_sec_phn;?>">

        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pgender">Gender of players in the club: </label>
        </div>
        <div class="col-75">
          <span></span> 
          <select required name="gen" id="p_gen">
            <optgroup>
              <?php
              include 'config.php';
              $query="SELECT * FROM `gen_type`";
              $data=mysqli_query($con,$query);
              while($row=mysqli_fetch_assoc($data))
              {
                ?>
                <option><?php echo $row['gen_name'];?></option>
              <?php }

              ?>
            </optgroup>
          </select>
        </div>
      </div>
        <div class="row">
              <div class="col-25">
                <label for="Teamdesc">Team Description: </label>
              </div>
              <div class="col-75">
                <span></span> 
                <input type="text" id="te_desc" name="t_desc" value="<?php echo $team_desc;?>">
              </div>
            </div>
     <br>
     <div class="row">
      <input type="submit" id="sub" name="submit"value="Submit" >
    </div>
  </form>
<?php 
}
?>

      
</div>
</body>
</html>

    <script type="text/javascript">
    function validate()
    {  

    if(document.getElementById('p_name').value.length==0 ||document.getElementById('s_name').value.length==0 ||document.getElementById('p_email').value.length==0||document.getElementById('image').value.length==0||document.getElementById('p_dob').value.length==0||document.getElementById('p_address').value.length==0||document.getElementById('p_phn').value.length==0||document.getElementById('p_gen').value.length==0||document.getElementById('te_desc').value.length==0)
    {
      alert("Complete the registration");
      return false;
    }
  }

  let name = document.getElementById('p_name');
  let sname = document.getElementById('s_name');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('p_email');
  let img = document.getElementById('image');
  let add = document.getElementById('p_address');
  let phn = document.getElementById('p_phn');
  let gen = document.getElementById('p_gen');
  let tdesc = document.getElementById('te_desc');
    name.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(name.value))
    {
      span[2].innerText = "";
      document.getElementById('sub').disabled =false;
    }
       else
    {
      span[2].innerText = "enter a valid name";
      span[2].style.color = 'red';
      document.getElementById('sub').disabled =true;
    }
  }
      sname.onkeyup = function()
  {
    var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(regex.test(name.value))
    {
      span[4].innerText = "";
      document.getElementById('sub').disabled =false;
    }
       else
    {
      span[4].innerText = "enter a valid name";
      span[4].style.color = 'red';
      document.getElementById('sub').disabled =true;
    }
  }
    email.onkeyup = function(){
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if(regex.test(email.value) || regexo.test(email.value))
    {
      span[5].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[5].innerText = "your email is invalid";
      span[5].style.color = 'red';
      document.getElementById('sub').disabled =true;
    }
  }

  function getAge(){
    var dateString = document.getElementById('p_dob').value;
    var today = new Date();
    var year = today.getFullYear()-18;
      var month = 0;
      if(today.getMonth()<10){
        month="0"+(today.getMonth()+1);
      }
      else{
        month=(today.getMonth()+1);
      }
      var day = 0;
      if(today.getDate()<10){
        day="0"+today.getDate();
      }
      else{
        day=today.getDate();
      }
    var str = year+"-"+month+"-"+day;
    var date1 = new Date();
    date1 = str;
    if(dateString>str){
        alert("Invalid");
        document.getElementById('sub').disabled =true;
    }
    else{
      alert("Able");
      document.getElementById('sub').disabled =false;
    }
}
add.onkeyup = function()
  {
    var regex = /^[a-zA-Z0-9\s]{3,}$/;
    if(regex.test(add.value))
    {
      span[8].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[8].innerText = "enter a valid address";
      span[8].style.color = 'red';

      document.getElementById('sub').disabled =true;
    }
  }
phn.onkeyup = function()
{
  var regex = /^[6789]\d{9}$/;
  if(regex.test(phn.value))
   {
    span[9].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[9].innerText = "your number is invalid";
    span[9].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}
  
tdesc.onkeyup = function()
                {
                  var regex = /^([A-Za-z\.\!]+ )+[A-Za-z\.\!]+$|^[A-Za-z]+$/;
                  if(regex.test(tdesc.value))
                  {
                    span[11].innerText = "";
                    span[11].style.color = '#28fc7a';
                    document.getElementById('sub').disabled =false;
                  }
                  else
                  {
                    span[11].innerText = "enter a valid team description";
                    span[11].style.color = 'red';
                    document.getElementById('sub').disabled =true;
                  }
                }

 
</script>