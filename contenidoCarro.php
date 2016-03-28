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
		<link rel="icon" type="image/png" href="imagenes/logoIcono.png" /> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <script src="js/javascript.js"></script>
        <link href="css/cssmodificar.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    	
        <!--
        ESTRUCTURA MIDDLE
        -->
        <div id="middle">
            <?php
                include("menu.php"); 
            ?>

            <!--
            CONTENEDOR DEL CARRITO
            -->
            <div id="contenidoCarro">              
                <?php  
                $total=0;

                if ($_SESSION["cantCarro"]!=0) {
                    echo "<h2>Contenido carrito</h2>";
                    foreach ($_SESSION["item"] as $key => $value) {
                        if ($key!=0) {
                            $query = "SELECT * FROM disco WHERE idDisco='".$key."'";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                            $line = mysql_fetch_array($result, MYSQL_ASSOC);

                            echo "<table cellspacing=10 class='discosCarro'>";
                            echo "<tr><td><img src='caratulas/".$line['caratula']."'></td>";
                            echo "<td><p>".$line['titulo']."</p>";
                            echo "<p>Precio: ".$line['precio']."€</p>";
                            echo "<p>Cantidad: ".$value."</p></td></tr>";
                            echo "<tr><td colspan=2 align=center><p>Subtotal:".($line['precio']*$value)."€</p></td></tr>";
                            echo "</table>";
                            $total+=$line['precio']*$value;
                        }                        
                    }
                    echo "<h3>Total: ".$total."€</h3>";
                    echo "<center><a href='comprar.php?total=$total'><input type='button' name='comprar' class='button' value='Realizar Compra'></a>
                        <a href='comprar.php?vaciar=1'><input type='button' name='vaciar' class='button' value='Vaciar Carro'></a></center>";
                }else{
                    echo "<h2>Carrito Vacio</h2>";
                }               
                ?> 
            </div>
        </div>
