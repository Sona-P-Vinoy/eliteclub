    <?php 
    include('config.php');
    session_start();
    $bid = $_SESSION['bid'];


    if(isset($_POST['submit']))
    {

      $sql2="UPDATE `tbl_booking` SET `status`=1 WHERE `book_id`='$bid'";
         if(mysqli_query($con,$sql2)){
              $_SESSION['bid']=mysqli_insert_id($con);
              echo "Registered successfully";
            }
             else
            {
              echo mysqli_errno($con);
            }
          }


    ?>