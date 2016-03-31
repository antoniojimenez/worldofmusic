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

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
</head>
<body>	
    <!--
    ESTRUCTURA MIDDLE
    -->
    <div id="middle">
        <?php
            include("menu.php"); 
        ?>

        <script type="text/javascript">        
            //GRAFICAS DE LOS 10 DISCOS MÁS VENDIDOS
            <?php
                $query = "SELECT SUM(cantidad), titulo FROM venta v, disco d WHERE d.idDisco=v.idDisco GROUP BY d.idDisco ORDER BY SUM(v.cantidad) DESC limit 10";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            ?>
            $(function () {
                // Create the chart
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'DISCOS MÁS VENDIDOS'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Cantidad'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.0f}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} ventas</b><br/>'
                    },

                    series: [{
                        name: 'Título',
                        colorByPoint: true,
                        data: [
                        <?php while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {?>
                        {
                            name: '<?php echo $line['titulo']; ?>',
                            y: <?php echo $line['SUM(cantidad)']; ?>
                        },
                        <?php } ?>
                        ]
                    }]        
                });
            }); 

            //GRAFICAS DE LOS 5 CLIENTES QUE MÁS COMPRAN
            <?php
                $query = "SELECT SUM(v.cantidad), c.usuario FROM venta v, cliente c WHERE v.idCliente=c.idCliente GROUP BY v.idCliente ORDER BY SUM(v.cantidad) DESC limit 5";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            ?>
            $(function () {
                // Create the chart
                $('#container2').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'MEJORES CLIENTES'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Discos'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.0f}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f} discos</b><br/>'
                    },

                    series: [{
                        name: 'Cliente',
                        colorByPoint: true,
                        data: [
                        <?php while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {?>
                        {
                            name: '<?php echo $line['usuario']; ?>',
                            y: <?php echo $line['SUM(v.cantidad)']; ?>
                        },
                        <?php } ?>
                        ]
                    }]
                });
            });           
        </script>

        <!--
        CONTENEDOR PARA LAS GRAFICAS
        -->
        <div id="contenidoGraficas">              
            <!--GRAFICAS DE DISCOS MÁS VENDIDOS -->
            <div id="container" style="min-width: 310px; height: 400px; margin-top: 20px;"></div>

            <!--GRAFICAS DE USUARIOS QUE MÁS COMPRAN-->            
            <div id="container2" style="min-width: 310px; height: 400px; margin-top: 50px;"></div>

        </div>
    </div>
</body>