<?php
    session_start();
    unset($_SESSION["usuario"]); 
    session_destroy();
    mysql_close($conectar);
    header("Location: index.php");
    exit;
?>