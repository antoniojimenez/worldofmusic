
<meta charset="UTF-8">
<?php include("config.php"); ?>

<?php
// Pulsamos enviar
if (isset($_POST['regis'])) {
        

        $query = "SELECT * FROM cliente WHERE usuario='".$_POST['nick']."'";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $line = mysql_fetch_array($result, MYSQL_ASSOC);

        if(mysql_num_rows($result)==0){
            // Realizamos añadir campo
            $query = "INSERT INTO cliente values (NULL,'".$_POST["nick"]."','".md5($_POST["contra"])."','tema1','Cliente','".$_POST["nombre"]."','".$_POST["apellidos"]."','".$_POST["tel"]."','".$_POST["dir"]."');";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    ?>
            <script>
                alert("Registrado Correctamente");
            </script>
    <?php
        }else{
    ?>
            <script>
                alert("Nick no disponible");
            </script>
    <?php                                 
        }
        
        header("refresh:0; url=index.php");
    }
?>
