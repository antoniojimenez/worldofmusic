<?php

    foreach ($_POST as &$string) {
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = mysql_real_escape_string($string);
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
                        //include("novedadesVendidos.php"); 
                        //SI EL CAMPO BÚSQUEDA NO ESTA VACIO REALIZAMOS LA CONSULTA                            
                        if (!empty($_POST['busq'])){
                            $query = "SELECT * FROM disco d JOIN interprete i WHERE (d.titulo LIKE '%".$_POST['busq']."%' OR i.alias LIKE '%".$_POST['busq']."%') 
                                        AND d.idInter=i.idInt";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            var_dump($result);
                            //SI EL RESULTADO NOS DEVUELVE UNO O MÁS VALORES LOS MOSTRAMOS
                            if(mysql_num_rows($result)!=0){
                                echo "<h2>Resultados:</h2>";
                                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    echo "<div class='discos'>";
                                    echo "<a href='index.php?cod=".$line['idDisco']."'><img src='caratulas/".$line['caratula']."' title='".$line['titulo']."'></a>";
                                    echo "<h4>".$line['titulo']."</h4>";
                                    echo "</div>";
                                }
                                mysql_free_result($result);
                            //SI NO MOSTRAMOS UN MENSAJE DE INFORMACIÓN
                            }else{
                                echo "<h3>No se han encontrado resultados</h3>";
                            }
                        }                   
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