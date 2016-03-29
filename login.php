<?php
  session_start();
  include("config.php");
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<?php
    if(isset($_POST['logeo'])){        

        $query = "SELECT * FROM cliente WHERE usuario='".$_POST['usuario']."' AND contrasena='".md5($_POST['password'])."'";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $line = mysql_fetch_array($result, MYSQL_ASSOC);

        if(mysql_num_rows($result)!=0){   
            $_SESSION["idCliente"]=$line['idCliente'];                                    
            $_SESSION["usuario"]=$_POST['usuario'];
            $_SESSION["tipo"]=$line['tipo'];
            $_SESSION["cantCarro"]=0;
            $_SESSION["item"][]=array();
        }else{
        ?>
            <script>
                alert("Nombre de usuario o contraseña incorrectas");
            </script>
        <?php                              
        }

        header("refresh:0; url=index.php");
    }  
?> 
