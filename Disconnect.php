
<?php
    include_once("Login.php");
if(isset($_POST["exit"])){
    session_start();
    session_unset();
    session_destroy();
   
   header("location: index.php");
}

if(isset($_POST["inicio"])){
    
   header("location: index.php");
}

