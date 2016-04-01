<div id="menu">
    <?php              
        // Realizar una consulta MySQL
        $query = "SELECT * FROM estilo";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    ?>
    <ul id="menuIzq">
        <li><a href="index.php">Inicio</a></li>
        <li><a>Géneros</a>
            <ul>
                <?php
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    echo "<li><a href='index.php?est=".$line['idEstilo']."'><span>".$line['tipo']."</span></a></li>";
                }
                mysql_free_result($result);
                ?>
            </ul>
        </li>
        <li><a href="conciertos.php">Conciertos</a></li>
    </ul>

    <ul id="menuDer">
        <li>
            <form action="#" method="post">
                <input class="texto" type="text" id="busq" name="busq" placeholder="Búsqueda">
            </form>
        </li>

        <?php
        if(!empty($_SESSION["usuario"])){
            if($_SESSION["tipo"]=="Admin"){                                
        ?>                        
                <li><a href="modificar.php"><img src="imagenes/modificarDatos.png" title="Modificar Datos"></a></li>
                <li><a href="graficas.php"><img src="imagenes/grafica.png" title="Mostrar Gráficas"></a></li>
        <?php
            }else{
        ?>                
                <a href="contenidoCarro.php"><li id="carrito"><span id="contCarr"><?php echo $_SESSION["cantCarro"] ?></span></li></a>
                <li><a href="graficas.php"><img src="imagenes/grafica.png" title="Mostrar Gráficas"></a></li>
                <li><a href="facturas.php"><img src="imagenes/factura.png" title="Mostrar Facturas"></a></li>
        <?php
            }
        }
        ?>
    </ul>                    
</div> 