    <meta charset="UTF-8">

    <?php include("config.php"); ?>
    
    <?php
        
        $query = "SELECT * FROM interprete";
        $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $query = "SELECT * FROM discografica";
        $result3 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $query = "SELECT * FROM estilo";
        $result4 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    ?>
    
    <div id="modificarDisco">
        <div class="transp"></div>
        <div id="popupModificacion">                                                
            <form method="post" action="index.php">
                <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_modificarDisco()">
                <?php
                echo "<table>";
               
                echo "<tr><td colspan='3'><h2>Modificar disco</h2></td></tr>";
                echo "<input type='hidden' name='idDisco' value='".$line['idDisco']."'>";
                echo "<tr><td>Titulo:</td><td><input class='texto' type='text' name='titulo' value='".$line['titulo']."' required>                                  </td></tr>";
                echo "<tr><td>Intérprete:</td><td><select name='interp' class='texto'>";
                while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
                    if($line['alias']==$line2['alias']){
                        echo "<option value='".$line2['idInt']."' selected>".$line2['alias']."</option>";
                    }else{
                        echo "<option value='".$line2['idInt']."'>".$line2['alias']."</option>";
                    }
                }
                echo "<tr><td>Duración:</td><td><input class='texto' type='text' name='duracion' value='".$line['duracion']."'></td></tr>";
                echo "<tr><td>Discográfica:</td><td><select name='discog' class='texto'>";
                while ($line3 = mysql_fetch_array($result3, MYSQL_ASSOC)) {
                    if($line['nombre']==$line3['nombre']){
                        echo "<option value='".$line3['idDiscografica']."' selected>".$line3['nombre']."</option>";
                    }else{
                        echo "<option value='".$line3['idDiscografica']."'>".$line3['nombre']."</option>";
                    }
                }
                echo "<tr><td>Estilo:</td><td><select name='estilo' class='texto'>";
                while ($line4 = mysql_fetch_array($result4, MYSQL_ASSOC)) {
                    if($line['tipo']==$line4['tipo']){
                        echo "<option value='".$line4['idEstilo']."' selected>".$line4['tipo']."</option>";
                    }else{
                        echo "<option value='".$line4['idEstilo']."'>".$line4['tipo']."</option>";
                    }
                }
                echo "<tr><td>Formato:</td><td><input class='texto' type='text' name='formato' value='".$line['formato']."'></td></tr>";
                echo "<tr><td>Precio:</td><td><input class='texto' type='text' name='precio' value='".$line['precio']."'></td></tr>";
                echo "<tr><td>Stock:</td><td><input class='texto' type='text' name='stock' value='".$line['stock']."'></td></tr>";
                echo "<tr><td>Carátula:</td><td id='carat'><input type='file' accept='image/*'  name='caratula' id='caratula'></td><td><input                   class='button' type='submit' id='modif' name='modif' value='Modificar'></td></tr>";
                echo "</table>";
                ?>
            </form>
        </div>
    </div>
    
    <?php
    // Pulsamos enviar
    if (isset($_POST['modif'])) {


        if(!empty($_POST["caratula"])){
            // Actualizar una fila MySQL
            $query = "UPDATE disco SET titulo='".
                $_POST["titulo"]."', duracion='".
                $_POST["duracion"]."', formato='".
                $_POST["formato"]."', precio='".
                $_POST["precio"]."', stock='".
                $_POST["stock"]."', caratula='".
                $_POST["caratula"]."', idDiscografica='".
                $_POST["discog"]."', idInter='".
                $_POST["interp"]."', idEstilo='".
                $_POST["estilo"]."' WHERE idDisco='".$_POST["idDisco"]."';";

            $result=mysql_query($query) or die('Actualizacion fallida: ' . mysql_error());
            mysql_free_result($result);            
        }else{
            $query = "SELECT caratula FROM disco WHERE idDisco='".$_POST["idDisco"]."';";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);

            // Actualizar una fila MySQL
            $query = "UPDATE disco SET titulo='".
                $_POST["titulo"]."', duracion='".
                $_POST["duracion"]."', formato='".
                $_POST["formato"]."', precio='".
                $_POST["precio"]."', stock='".
                $_POST["stock"]."', caratula='".
                $line["caratula"]."', idDiscografica='".
                $_POST["discog"]."', idInter='".
                $_POST["interp"]."', idEstilo='".
                $_POST["estilo"]."' WHERE idDisco='".$_POST["idDisco"]."';";

            $result=mysql_query($query) or die('Actualizacion fallida: ' . mysql_error());
        }

        if ($result) {
    ?>
            <script>
                alert("Modificado Correctamente");
            </script>
    <?php
        } 
    }
    ?>

