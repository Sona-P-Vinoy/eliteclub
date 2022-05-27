  <?php
  include 'config.php';
  session_start();
  $email = $_SESSION['email'];
  global $row;

  if(!isset($_SESSION["eliteSession"])){
    header("Location: index.php");
  }
  else{
  ?>

  <?php 
    $reasonErr = $absenceErr = "";
    global $leaveApplicationValidate;
    if(isset($_POST['submit'])){
      if(empty($_POST['absence'])){
        $absenceErr = "Please select absence type";
        $leaveApplicationValidate = false;
      }
      else{
        $arr = $_POST['absence'];
        $absence = implode(",",$arr);
        $leaveApplicationValidate = true;
      }

      if(empty($_POST['fromdate'])){
        $fromdateErr = "Please Enter starting date";
        $leaveApplicationValidate = false;
      }
      else{
        $fromdate = mysqli_real_escape_string($con,$_POST['fromdate']);
        $leaveApplicationValidate = true;
      }

      if(empty($_POST['todate'])){
        $todateErr = "Please Enter ending date";
        $leaveApplicationValidate = false;
      }
      else{
        $todate = mysqli_real_escape_string($con,$_POST['todate']);
        $leaveApplicationValidate = true;
      }

      
      $reason = mysqli_real_escape_string($con,$_POST['reason']);
      if(empty($reason)){
        $reasonErr = "Please give reason for the leave in detail";
        $leaveApplicationValidate = false;
      }
      else{
        $absencePlusReason = $absence." : ".$reason;
        $leaveApplicationValidate = true;
      }
      
      $status = "Pending";
      
      if($leaveApplicationValidate){
        //for eid
        $eid_query = mysqli_query($con,"SELECT reg_id FROM register WHERE reg_email='".$email."'");
        
        $row = mysqli_fetch_array($eid_query);
        
        $query = "INSERT INTO leaves(pid, pname, descr, fromdate, todate, status) VALUES({$row['reg_id']},'{$email}','$absencePlusReason', '$fromdate', '$todate', '$status')";
        $execute = mysqli_query($con,$query);
        if($execute){
          echo '<script>alert("Leave Application Submitted. Please wait for approval status!")</script>';
        }
        else{
          echo "Query Error : " . $query . "<br>" . mysqli_error($con);;
        }
      }
    }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>Leave Application</title>
    <style>
    .navbar,.navbar-login{
    position:fixed;
    width:100%;
    z-index:999;
    padding:30px 0;
    font-family:'Ubuntu', sans-serif;
    transition:all 0.3s ease;
  }
  .navbar.sticky,.navbar-login{
    padding:15px 0;
    background:crimson;
  }
  .navbar .max-width,.navbar-login .max-width{
    display:flex;
    align-items:center;
    justify-content:space-between;
  }
  .navbar .logo a,.navbar-login .logo a{
    color:#fff;
    font-size:35px;
    font-weight:600;
  }
  .navbar .logo a span{
    color:crimson;
    transition:all 0.3s ease;
  }
  .navbar.sticky .logo a span{
    color:#fff;
  }
  .navbar .menu li,.navbar-login .menu li{
    list-style:none;
    display:inline-block;
  }
  .navbar .menu li a,.navbar-login .menu li a{
    display:block;
    color:#fff;
    font-size:18px;
    font-weight:500;
    margin-left:25px;
    transition:color 0.3s ease;
  }
  .navbar .menu li a:hover{
    color:crimson;
    transition:color 0.3s ease;
  }
  .navbar.sticky .menu li a:hover,.navbar-login.sticky .menu li a:hover{
    color:#fff;
  }

      h1 {
        text-align: center;
        font-size: 2.5em;
        font-weight: bold;
        padding-top: 1em;
        margin-bottom: -0.5em;
      }

      form {
        padding: 40px;
      }

      input,
      textarea {
        margin: 5px;
        font-size: 1.1em !important;
        outline: none;
      }

      label {
        margin-top: 2em;
        font-size: 1.1em !important;
      }

      label.form-check-label {
        margin-top: 0px;
      }

      #err {
        display: none;
        padding: 1.5em;
        padding-left: 4em;
        font-size: 1.2em;
        font-weight: bold;
        margin-top: 1em;
      }

      table{
        width: 90% !important;
        margin: 1.5rem auto !important;
        font-size: 1.1em !important;
      }

      .error{
        color: #FF0000;
      }
    </style>

    <script>
      const validate = () => {

        let desc = document.getElementById('leaveDesc').value;
        let checkbox = document.getElementsByClassName("form-check-input");
        let errDiv = document.getElementById('err');

        let checkedValue = [];
        for (let i = 0; i < checkbox.length; i++) {
          if(checkbox[i].checked === true)
            checkedValue.push(checkbox[i].id);
        }

        let errMsg = [];

        if (desc === "") {
          errMsg.push("Please enter the reason and date of leave");
        }

        if(checkedValue.length < 1){
          errMsg.push("Please select the type of Leave");
        }

        if (errMsg.length > 0) {
          errDiv.style.display = "block";
          let msgs = "";

          for (let i = 0; i < errMsg.length; i++) {
            msgs += errMsg[i] + "<br/>";
          }

          errDiv.innerHTML = msgs;
          scrollTo(0, 0);
          return;
        }
      }
    </script>

  </head>

  <body>
      <nav class="navbar-login" style="background-color: crimson;">
      <div class="max-width">
        <div class="logo"><a href="#">Elite<span>'s.</span></a></div>
        <ul class="menu" style="padding-left: 40%;">
         <li><a href="myhistory.php" class="menu-btn">My Leave History</a></li>
         <li><a href="login.php" class="menu-btn">Logout</a></li>
        </ul>
        <div class="menu-btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>

    <h1 style="padding-top: 80px;">Leave Application</h1>

    <div class="container">
      <div class="alert alert-danger" id="err" role="alert">
      </div>
    
      <form method="POST">
        
    
        <label><b>Select Leave Type :</b></label>
        <!-- error message if type of absence isn't selected -->
        <span class="error"><?php echo "&nbsp;".$absenceErr ?></span><br/>
        <div class="form-check">
          <input class="form-check-input" name="absence[]" type="checkbox" value="Sick" id="Sick">
          <label class="form-check-label" for="Sick">
            Sick
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" name="absence[]" type="checkbox" value="Casual" id="Casual">
          <label class="form-check-label" for="Casual">
            Casual
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" name="absence[]" type="checkbox" value="Vacation" id="Vacation">
          <label class="form-check-label" for="Vacation">
            Vacation
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" name="absence[]" type="checkbox" value="Bereavement" id="Bereavement">
          <label class="form-check-label" for="Bereavement">
            Bereavement
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" name="absence[]" type="checkbox" value="Other" id="Other">
          <label class="form-check-label" for="Other">
            Others
          </label>
        </div>
    
        <div class="mb-3 ">
          <label for="dates"><b>From -</b></label>
          <input type="date" name="fromdate">
    
          <label for="dates"><b>To -</b></label>
          <input type="date" name="todate">
        </div>
    
        <div class="mb-3">
          
          <label for="leaveDesc" class="form-label"><b>Please mention reasons for your leave days :</b></label>
          <!-- error message if reason of the leave is not given -->
          <span class="error"><?php echo "&nbsp;".$reasonErr ?></span>
          <textarea class="form-control" name="reason" id="leaveDesc" rows="4" placeholder="Enter Here..."></textarea>
        </div>
    
    
        <input type="submit" name="submit" value="Submit Leave Request" class="btn btn-success" style="background-color: black;">
      </form>
    
      
    </div>

    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
      <div>
      <p class="text-center">&copy; <?php echo date("Y"); ?> </p>
        
      </div>
    </footer>

  </body>

  </html>

  <?php
  }

  ini_set('display_errors', true);
  error_reporting(E_ALL);
  ?>