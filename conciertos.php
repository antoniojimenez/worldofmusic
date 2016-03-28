<?php
                include("cabecera.php");
            ?>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>The World Of Music</title>
        <?php
        if (!empty($_SESSION['tema'])){
        	$tema=$_SESSION['tema'];
        	?>
        	<?php
        	echo "<link href='css/$tema.css' rel='stylesheet' type='text/css'>";
   ?>     	
    		<?php
			}else{
				?>
			<link href="css/estilos.css" rel="stylesheet" type="text/css">
			<?php
			}
			?>
			<link href="css/estilosConciertos.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="imagenes/logoIcono.png" /> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <script src="js/javascript.js"></script>
        <link href="css/cssmodificar.css" rel="stylesheet" type="text/css">
    </head>
			
        <div id="wrapper">       
           
                      
            <!--
            ESTRUCTURA MIDDLE
            -->
            <div id="middle">
                <?php
                include("menu.php");
                ?>

                <div id="contenido">
                <?php
                    // Realizar una consulta MySQL
                    $query = "SELECT * FROM concierto c JOIN interprete i ON c.idInter=i.idInt ORDER BY fecha ASC";
                    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                    setlocale(LC_TIME, 'Spanish');

                    echo "<h2>Próximos Conciertos</h2>";

                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {                         
                        $lugar=$line['lugar'];
                        $fecha = $line['fecha'];
                        $dia = substr($fecha, -2);
                        $mes = substr($fecha, 5, 2);
                        $ano = substr($fecha, 0,4);
                        echo "<table>";
                        echo "<tr><td id='fecha'><h3>".$dia."</h3><h4>".strftime("%B",mktime(0, 0, 0, $mes, 1, 2000))."</h4><h5>".$ano."</h5></td>
                        <td id='artista'><h1>".$line['alias']."</h1></td></tr>";
                        echo "<tr><td colspan=2><iframe width='500' height='350' frameborder='0' style='border:0' 
                        src='https://www.google.com/maps/embed/v1/place?key=AIzaSyCUMcUFC6YK1ICcWMF-tbhXWBXC5qQEaiE&q=$lugar'>
                        </iframe></td>";
                        echo "</tr></table>";
                    }
                    mysql_free_result($result);
                    
                    ?>

                    
                </div>
            </div>
        </div>

        <div id="bottom">
            <p>Página realizada por:</p>
	     Jesús Mantilla Herrera (jesusmhe@gmail.com)<br>
            Antonio Jiménez Verdejo (ajv.jimenez@gmail.com)
           
        </div>