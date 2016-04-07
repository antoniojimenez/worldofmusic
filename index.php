<?php

    foreach ($_POST as &$string) {
        $string = str_replace('"','',$string);
        $string = str_replace("'","",$string);
        $string = mysql_real_escape_string($string);
    }

    $configdb = 'configdb.php';

    if (!file_exists($configdb)) {
        header("refresh:0; url=./instalacion/index.php");
    }

    session_start();
?>
	
<html>
    <head>
        <meta charset="UTF-8">
        <title>The World Of Music</title>
     
        <?php
            include("config.php");
            /*
            ESTRUCTURA SUPERIOR
            */
            include("cabecera.php");

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
		
        <link rel="icon" type="image/png" href="imagenes/logoIcono.png" /> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <script src="js/javascript.js"></script>
    </head>
    
    <body>
    
        <div id="wrapper">
            <!--
            ESTRUCTURA MIDDLE
            -->
            <div id="middle">
                <!--
                POPUP AÑADIR CD
                -->
                <?php
                    include("menu.php");
                ?>
                                                
                <!--
                CONTENEDOR DE LOS DISCOS
                -->
                <div id="contenido">
                    <?php
                    //SI NO HEMOS SELECCIONADO NINGÚN DISCO MOSTRAMOS NOVEDADES Y MÁS VENDIDOS
                    if (!isset($_GET['cod'])) {
                        //SI NO HEMOS SELECCIONADO NINGÚN ESTILO Y BUSCADO ALGÚN DISCO MOSTRAMOS NOVEDADES Y MÁS VENDIDOS
                        include("novedadesVendidos.php");                    
                    }else{
                        //SI HEMOS SELECCIONADO ALGÚN DISCO MOSTRAMOS SU INFORMACIÓN
                        include("infoDisco.php");
                    }
                    ?>
                    
                    <!--
                    MODIFICAR DISCO
                    -->
                    <?php
                        include("modDisco.php");
                    ?>                    
                </div>           
            </div>
        </div>

        <div id="bottom">
            <p>Página realizada por:</p>
            Jesús Mantilla Herrera (jesusmhe@gmail.com)<br>
            Antonio Jiménez Verdejo (ajv.jimenez@gmail.com)
        </div>
</body>
</html>