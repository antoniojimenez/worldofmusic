<?php
session_start();
include ('restringirurl.php');
?>

<html>
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

        <link href="css/estilosModificar.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="imagenes/logoIcono.png" /> 
        <script type="text/javascript" charset="utf8" src="js/javascript.js"></script>

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="dataTables/css/jquery.dataTables.css">
          
        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="dataTables/js/jquery.js"></script>
          
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="dataTables/js/jquery.dataTables.js"></script>
        
    </head>
    <body>
        <script>
            //DATATABLE
            $(document).ready(function(){
                $('#dataTable').DataTable();
            });
        </script>
		<!--
        ESTRUCTURA MIDDLE
        -->
        <div id="middle">
            <?php
            include("menu.php");
            ?>
            <div id="modifi">
                <form method="post" action="modificar.php">
                    <span>Seleccione la tabla que desea modificar: </span><select name='modifi'><option></option>
                    <option value="cliente">Cliente</option>
                    <option value="interprete">Intérprete</option>
                    <option value="disco">Disco</option>
                    <option value="concierto">Concierto</option>
                    <option value="discografica">Discográfica</option>
                    </select>                
                    <input type='submit' value="Enviar" name="env">
                    <br/>
                </form>
            </div>
            <div id="tablas">
                <?php
                if (isset($_POST['env'])){
                    switch ($_POST['modifi']){
                        case "cliente":
                            $query = "SELECT * FROM cliente";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                            
                            echo "<table id='dataTable'>"; 
                            echo "<thead>";
                            echo "<tr><th>Nick</th><th>Tipo</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Dirección</th><th>Acción</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$line['usuario']."</td><td>".$line['tipo']."</td><td>".$line['nombre']."</td><td>".$line['apellidos']."</td>";
                                echo "<td>".$line['telefono']."</td><td>".$line['direccion']."</td>";
                                $cod=$line['idCliente'];
                                echo "<td><a href='eliminar.php?idCliente=$cod'><img src='imagenes/eliminar.png' onclick='javascript:return confirmacion();' title='Eliminar' width='35px' height='35px'></a></td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            // Liberar resultados
                            mysql_free_result($result);
                            break;
                        
                            
                        
                        case "interprete":
                            include ('anadirinterp.php');
                            $query = "SELECT * FROM interprete";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            echo "<table id='dataTable'>";
                            echo "<thead>";
                            echo "<tr><td colspan='5'><img src='imagenes/anadirinter.png' title='Añadir Intérprete' onclick='div_show_interprete()' align='right' height='45' width='45'></td></tr>";
                            echo "<tr><th>Nombre</th><th>Apellidos</th><th>Alias</th><th>Pais</th><th>Accion</th>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$line['name']."</td><td>".$line['apellidos']."</td><td>".$line['alias']."</td><td>".$line['pais']."</td>";
                                $clav=$line['idInt'];
                                echo "<td><a href='modificarinter.php?idInt=$clav'><img src='imagenes/modificar.png' title='Modificar' width='35px' height='35px'></a>
                                 <a href='eliminar.php?idInt=$clav'><img src='imagenes/eliminar.png' onclick='javascript:return confirmacion();' title='Eliminar' width='35px' height='35px'></a></td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            // Liberar resultados
                            mysql_free_result($result);
                            break;
                            
                        case "disco":
                            include ('anadircd.php');
                            $query = "SELECT * FROM disco d,discografica c,interprete i,estilo e where d.idDiscografica=c.idDiscografica and d.idInter=i.idInt and d.idEstilo=e.idEstilo";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            echo "<table id='dataTable'>";
                            echo "<thead>";
                            echo "<tr><td colspan='10'><img src='imagenes/aniadircd.png' title='Añadir Disco' onclick='div_show_anadircd()' align='right' height='45' width='45'></td></tr>";
                            echo "<tr><th>Titulo</th><th>Duración</th><th>Formato</th><th>Precio</th><th>Stock</th><th>Caratula</th><th>Discográfica</th><th>Intérprete</th><th>Estilo</th><th>Accion</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$line['titulo']."</td><td>".$line['duracion']."</td><td>".$line['formato']."</td><td>".$line['precio']."</td><td>".$line['stock']."</td><td><img src='caratulas/".$line['caratula']."' width='50' height='50'></td><td>".$line['nombre']."</td><td>".$line['alias']."</td><td>".$line['tipo']."</td>";
                                $val=$line['idDisco'];
                                echo "<td><a href='modificardisco.php?idDisco=$val'><img src='imagenes/modificar.png' title='Modificar' width='30px' height='30px'></a> 
                                <a href='eliminar.php?idDisco=$val'><img src='imagenes/eliminar.png' onclick='javascript:return confirmacion();' title='Eliminar' width='30px' height='30px'></a></td></tr>";
                              }
                            echo "</tbody>";
                            echo "</table>";

                            // Liberar resultados
                            mysql_free_result($result);
                            break; 
                        
                        case "concierto":
                        include ('anadirconcierto.php');
                            $query = "SELECT * FROM concierto c join interprete i on c.idInter = i.idInt";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                            echo "<table id='dataTable'>";
                            echo "<thead>";
                            echo "<tr><td colspan='4'><img src='imagenes/anadirconcierto.png' title='Añadir Concierto' onclick='div_show_concierto()' align='right' height='45' width='45'></td></tr>";
                            echo "<tr><th>Fecha</th><th>Lugar</th><th>Interprete</th><th>Accion</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$line['fecha']."</td><td>".$line['lugar']."</td><td>".$line['alias']."</td>";
                                $val=$line['idConcierto'];
                                echo "<td><a href='modificarconcierto.php?idConcierto=$val'><img src='imagenes/modificar.png' title='Modificar' width='35px' height='35px'></a> 
                                <a href='eliminar.php?idConcierto=$val'><img src='imagenes/eliminar.png' onclick='javascript:return confirmacion();' title='Eliminar' width='35px' height='35px'></a></td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            // Liberar resultados
                            mysql_free_result($result);
                            break; 
                        
                        case "discografica":
                            include ('anadirdiscograf.php');
                            $query = "SELECT * FROM discografica";
                            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


                            echo "<table id='dataTable'>";
                            echo "<thead>";
                            echo "<tr><td colspan='2'><img src='imagenes/anadirdiscograf.png' title='Añadir Discográfica' onclick='div_show_discograf()' align='right' height='45' width='45'></td></tr>";
                            echo "<tr><th>Nombre</th><th>Accion</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$line['nombre']."</td>";
                                $val=$line['idDiscografica'];
                                echo "<td><a href='modificardiscograf.php?idDiscografica=$val'><img src='imagenes/modificar.png' title='Modificar' width='35px' height='35px'></a>
                                <a href='eliminar.php?idDiscografica=$val'><img src='imagenes/eliminar.png' onclick='javascript:return confirmacion();' title='Eliminar' width='35px' height='35px'></a></td></tr>";
                                }
                            echo "</tbody>";
                            echo "</table>";

                            // Liberar resultados
                            mysql_free_result($result);
                            break; 
                    }
                }
                ?>
            </div>  
        </div>
    </body>
</html>
