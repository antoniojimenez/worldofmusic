<?php
    //SACAMOS TODOS LO DATOS DEL DISCO SELECCIONADO
    $query = "SELECT * FROM disco d, interprete i, discografica g, estilo e WHERE idDisco='".$_GET['cod'].
    "' AND d.idDiscografica=g.idDiscografica AND d.idInter=i.idInt AND d.idEstilo=e.idEstilo";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $line = mysql_fetch_array($result, MYSQL_ASSOC);

    $query = "SELECT * FROM canciones WHERE idDisco='".$_GET['cod']."'";
    $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

    //COMPROBAMOS SI EXISTE SESIÓN
    if(!empty($_SESSION["usuario"])){
        //SI EXISTE SESIÓN COMPROBAMOS QUE EL USUARIO SEA ADMIN PARA MOSTRAR LOS BOTONES DE GESTIÓN
        if($_SESSION["tipo"]=="Admin"){
?>
            <div id="opDisco">
                <img src="imagenes/modificar.png" title="Modificar CD" onclick="div_show_modificarDisco()">
            </div>
<?php
        }
    }

    //MOSTRAMOS LA INFORMACIÓN DEL DISCO
    echo "<div id='discoInfo'>";
    echo "<table>";
    echo "<tr><td rowspan='6'><img src='caratulas/".$line['caratula']."'></td>";
    echo "<td>".$line['titulo']."</td>";
    echo "<td rowspan='6' id='precio'>".$line['precio']."€<br>";

    //SI EXISTE SESIÓN MOSTRAMOS EL BOTÓN PARA COMPRAR
    if(!empty($_SESSION["usuario"]) && $_SESSION["tipo"]=="Cliente" && $line['stock']!=0){
        echo "<input type='button' name='anadiraCarro' id='anadiraCarro' value='Añadir al Carrito'>";

?>
        <script>    
            $(function() {
                $("#anadiraCarro").click(function() {                                        
                    $.ajax({
                        url : "carrito.php?codigo=<?php echo $line['idDisco']; ?>",
                        })
                        .done(function(data) {
                            $("#contCarr").text(data);
                        })
                        .error(function(data) {
                            alert("No se ha podido añadir el producto a la cesta");
                        })
                    });
            });
        </script>
<?php
    }elseif (!empty($_SESSION["usuario"]) && $line['stock']==0) {
        echo "<p><b>Sin Stock</b></p>";
    }
                                    
    echo "</td></tr>";
    echo "<tr><td>".$line['name']." ".$line['apellidos']." [".$line['alias']."]</td></tr>";
    echo "<tr><td>Duración: ".$line['duracion']." min</td></tr>";
    echo "<tr><td>Discográfica: ".$line['nombre']."</td></tr>";
    echo "<tr><td>Estilo: ".$line['tipo']."</td></tr>";
    echo "<tr><td>Formato: ".$line['formato']."</td></tr></table>";
    echo "</div>";
    mysql_free_result($result);

    echo "<div id='cancionesDisco'>";
    echo "<table>";
    echo "<tr><th>Canciones</th><th>Duración</th></tr>";
    while($line2 = mysql_fetch_array($result2, MYSQL_ASSOC)){
        echo "<tr><td>".$line2['titulo']."</td><td>".$line2['duracion']." mins</td></tr>";
    }
    echo "</table>";
    echo "</div>";
    mysql_free_result($result2);                    
?>