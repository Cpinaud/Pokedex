<?php
    include_once "Login.php";
    include_once "Database.php";

    $usuario = $_POST["usuario"];
    $password = $_POST["clave"];
    
    $database= new Database("config.ini");
    $sqlConnect = $database->isConnected();
     
        $sql = "SELECT 1 FROM usuarios WHERE username = '$usuario' AND password = '$password'";
        $comando = $sqlConnect->prepare($sql);
        $comando->execute();
        $resultado = $comando->get_result();
        $userValido = $resultado->fetch_assoc();
        if(isset($userValido)){
            setcookie("cookie1",md5($password),time()+3600);
            session_start();
            $_SESSION["logueado"] = 'true';
            header("location: Index.php?valid=0");
               
            }else{
    
                header("location: Index.php?valid=1");
            }
?>


    
       
