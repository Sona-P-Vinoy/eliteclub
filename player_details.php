   <?php
   include('config.php');
   session_start();
   $email=$_SESSION['email'];
   if(isset($_POST["submit"]))
   {  
    $pname = $_POST['p_name']; 
    echo $pname;
    $pemail = $_POST['p_email']; 
    $dob=date('Y-m-d',strtotime($_POST['dob']));
    $address=$_POST['address'];
    $p_phn=$_POST['phn'];
    $gender=$_POST['gen'];
    $height=$_POST['p_height'];
    $weight=$_POST['p_weight'];

    $fileName = $_FILES['Photo']['name'];
    $tmpName  = $_FILES['Photo']['tmp_name'];
    $fileSize = $_FILES['Photo']['size'];
    $fileType = $_FILES['Photo']['type'];
    $folder = 'image/';
    $filePath = $folder.$fileName;

    $resu = move_uploaded_file($tmpName, $filePath);
    if (!$resu) {
      ECHO "File already exist"; 
    }
 

   $sql = "SELECT * FROM `register` WHERE `reg_email`='$email'";
   $data1 = mysqli_query($con,$sql);

    if($res=mysqli_fetch_assoc($data1))
    {
      $query2="SELECT * FROM `user_type` WHERE `type_name`='player' ";
      $data2 = mysqli_query($con,$query2);
      
      if($row=mysqli_fetch_assoc($data2))
      {
        $re=$res['reg_id'];
        //echo $re;
        $type = $row['type_id'];
        //echo $type;
                
        $sql2="INSERT INTO `login` (`reg_id`,`type_id`) VALUES('$re','$type')";

      if (mysqli_query($con,$sql2)) 
       {
        $query3="SELECT * FROM `gen_type` WHERE `gen_name`='$gender' "; 
         $data3 = mysqli_query($con,$query3);

       if($res3=mysqli_fetch_assoc($data3))
         {
          $genid=$res3['gen_id'];
          
          $query4="INSERT into `player_details` (`reg_id`,`gen_id`,`p_image`,`p_dob`,`p_address`,`p_height`,`p_weight`,`status`) VALUES('$re','$genid','$filePath','$dob','$address','$height','$weight',0)"; 
          
        if(mysqli_query($con,$query4)){

          echo "Registered successfully";
          $_SESSION['email']=$email;
          header("location:view_p_det.php");
        }
        else
        {
          echo mysqli_errno($con);
        }
      }
    }
  }
}
}


?>




  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Elite Club</title>

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
        <li><a href="index.php" class="menu-btn">Logout</a></li>
      </ul>
      <div class="menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <div class="container">
    <center><h2>Registration form</h2></center>
    <center><h2><?php echo $email; ?></h2></center>
    <form action="#" method="POST" autocomplete="off" onsubmit="return validate();" enctype="multipart/form-data">
      <div class="row">
        <div class="col-25">
          <label for="Image">Image</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="file" id="image" name="Photo"size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <span></span> 
          <label for="pdob">Date of Birth</label>
        </div>  
        <div class="col-75">
          <span></span> 
          <input type="date" id="p_dob"  name="dob" class="datepicker">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="Address">Address</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_address" name="address" placeholder="Your address">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          
          <label for="Phone">Phone</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_phn" name="phn" placeholder="Your Phone no.">

        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="pgender">Gender</label>
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
          <label for="pheight">Height(in cm)</label>
        </div>
        <div class="col-75">
          <span></span> 
          <input type="text" id="p_height" name="p_height" placeholder="Height">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="p_weight">Weight (in kg)</label>
        </div>
        <div class="col-75">
         <span></span> 
         <input type="text" id="p_weight" name="p_weight" placeholder="Weight">
       </div>
     </div>
     <br>
     <div class="row">
      <input type="submit" id="sub" name="submit"value="Submit" >
    </div>
  </form>



      
</div>
</body>
</html>

    <script type="text/javascript">
    function validate()
    {  

    if(document.getElementById('p_name').value.length==0 ||document.getElementById('p_email').value.length==0||document.getElementById('image').value.length==0||document.getElementById('p_dob').value.length==0||document.getElementById('p_address').value.length==0||document.getElementById('p_phn').value.length==0||document.getElementById('p_gen').value.length==0||document.getElementById('p_height').value.length==0||document.getElementById('p_weight').value.length==0)
    {
      alert("Complete the registration");
      return false;
    }
  }
  let span = document.getElementsByTagName('span');
  let img = document.getElementById('image');
  let dob = document.getElementById('p_dob');
  let add = document.getElementById('p_address');
  let phn = document.getElementById('p_phn');
  let gen = document.getElementById('p_gen');
  let height = document.getElementById('p_height');
  let weight = document.getElementById('p_weight');

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
      span[4].innerText = "";
      document.getElementById('sub').disabled =false;
    }
    else
    {
      span[4].innerText = "enter a valid address";
      span[4].style.color = 'red';

      document.getElementById('sub').disabled =true;
    }
  }
phn.onkeyup = function()
{
  var regex = /^[6789]\d{9}$/;
  if(regex.test(phn.value))
   {
    span[5].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[5].innerText = "your number is invalid";
    span[5].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}
  
height.onkeyup = function()
{
  var regex = /^[1-9]\d{1,3}$/;

  if(regex.test(height.value))
   {
    span[7].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[7].innerText = "your height is invalid";
    span[7].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}  
weight.onkeyup = function()
{
  var regex = /^[1-9]\d{1,3}$/;

  if(regex.test(weight.value))
   {
    span[8].innerText = "";
    document.getElementById('sub').disabled =false;
  }
  else
  {
    span[8].innerText = "your weight is invalid";
    span[8].style.color = 'red';
    document.getElementById('sub').disabled =true;
  }
}  
</script>