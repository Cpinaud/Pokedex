
<?php
    include_once("Login.php");
if(isset($_POST["exit"])){
    session_start();
    session_unset();
    session_destroy();
   echo"estoy aca";
   header("location: index.php");
}

