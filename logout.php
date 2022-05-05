<?php
session_start();
unset($_SESSION["eliteSession"]);
session_destroy();
header("Location:index.php");
?>