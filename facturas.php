<?php  
    session_start();
    include ('restringirurlUser.php');
    include("cabecera.php");
?>  
 <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>The World Of Music</title>
    
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
        CONTENEDOR PARA LAS FACTURAS
        -->
        <div id="contenidoFacturas">            
            <?php
                $query = "SELECT idVenta, SUM(cantidad), fecha, precioTotal FROM venta WHERE idCliente = '".$_SESSION["idCliente"]."' GROUP BY idVenta ORDER BY idVenta DESC";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                if(mysql_num_rows($result)!=0){
                    echo "<h2>FACTURAS</h2>";
                    $cont = mysql_num_rows($result)+1;

                    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                        $idVenta = $line['idVenta'];
                        $cont--;
                        echo "<table cellspacing=10 class='facturas'>";  
                        echo "<tr><td>Nº Factura:</td><td>".$cont."</td></tr>";
                        echo "<tr><td>Fecha:</td><td>".date("d-m-Y", strtotime($line['fecha']))."</td></tr>";
                        echo "<tr><td>Cantidad:</td><td>".$line['SUM(cantidad)']."</td></tr>";
                        echo "<tr><td>Precio Total:</td><td>".$line['precioTotal']."€</td></tr>";
                        echo "<tr><td colspan='2' align='center'><a href='pdf.php?&idVenta=$idVenta&nFact=$cont' target='_blank'><input type='button' class='button' value='Generar PDF'></a></td></tr>";
                        echo "</table>";
                    }
                }else{
                    echo "<h2>No has realizado ninguna compra aún</h2>";
                }
            ?>
        </div>
    </div>
</body>