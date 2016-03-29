<?php
session_start();
include ('restringirurl.php');
?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Modificar Intérprete</title>
        
        <?php
            include("config.php");
            
            if(!empty($_SESSION["usuario"])){
                $query = "SELECT tema FROM cliente WHERE usuario='".$_SESSION["usuario"]."'";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_ASSOC);
            }

            switch ($line["tema"]) {
                case 'tema2':
        ?>
                    <link href="css/tema2.css" rel="stylesheet" type="text/css">
        <?php
                    break;
                case 'tema3':
        ?>
                    <link href="css/tema3.css" rel="stylesheet" type="text/css">
        <?php
                    break;
                default:
        ?>
                    <link href="css/estilos.css" rel="stylesheet" type="text/css">
        <?php
                    break;
            }
        ?>

        <link href="css/estilosModificar.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="imagenes/logoIcono.png" /> 
        <script type="text/javascript" charset="utf8" src="js/javascript.js"></script>
</head>

<body>
    
    <!--
    MODIFICAR
    -->
    <div id="top">
        <a href="index.php"><div id="logo"></div></a>                           
    </div>

    <!--
    ESTRUCTURA MIDDLE
    -->
    <div id="middle">
        <?php
            include("menu.php");
        ?>

        <!--
        CONTENEDOR
        -->
        <div id="contenido"> 
        <?php
        if (!empty($_GET['idInt'])){
            $query="SELECT * from interprete where idInt='".$_GET['idInt']."'";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);


            echo "<h2>Modificar Interprete</h2>";

            echo "<form action='modificarinter.php' method='post'>";
            echo "<table>";
            echo "<input type='hidden' name='idInt' value='".$line['idInt']."'>";
            echo "<tr><td>Nombre:</td><td><input type='text' class='texto' name='nombre' value='".$line['name']."'></td></tr>";
            echo "<tr><td>Apellidos:</td><td><input type='text' class='texto' name='apellidos' value='".$line['apellidos']."'></td></tr>";
            echo "<tr><td>Alias:</td><td><input type='text' class='texto' name='alias' value='".$line['alias']."'></td></tr>";
            echo "<tr><td>Pais:</td><td><input type='text' class='texto' name='pais' value='".$line['pais']."'></td></tr>";
            echo "<tr><td colspan=2 align=center><input type='submit' value='Modificar' class='button' name='modif'></td></tr>";
            echo "</table>";
            echo "</form>";
        }
    
        if (isset($_POST['modif'])){
            $query="UPDATE interprete SET name='".$_POST['nombre']."', 
            apellidos='".$_POST['apellidos']."', alias='".$_POST['alias']."',
            pais='".$_POST['pais']."' where idInt='".$_POST['idInt']."'";
            $result=mysql_query($query) or die('Actualizacion fallida: ' . mysql_error());
            
            if ($result) {
        ?>
            <script>
                    alert("Modificado Correctamente");
            </script>
        <?php
            }
        header("refresh:0; url=modificar.php"); 
        }
        ?>
        </div>
    </div>
</body>
</html>
