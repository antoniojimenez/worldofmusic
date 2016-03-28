<?php include("config.php"); ?>
    <meta charset="UTF-8">
    
    <?php
    if (!isset($_POST['anadcd'])) {
    ?>
    <div id="anadircd">
        <div class="transp"></div>
        <div id="popupAnadircd">
            <form action="anadircd.php" method="post">
                <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_anadircd()">
                <?php
                $query = "SELECT * FROM interprete";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                $query = "SELECT * FROM discografica";
                $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                $query = "SELECT * FROM estilo";
                $result3 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                echo "<table>";
                echo "<tr><td colspan='3'><h2>Añadir CD</h2></td></tr>";
                echo "<tr><td>Titulo:</td><td><input class='texto' type='text' name='tit' required></td></tr>";
                echo "<tr><td>Duración:</td><td><input class='texto' type='text' name='durac'></td></tr>";
                echo "<tr><td>Formato:</td><td><input class='texto' type='text' name='formato'></td></tr>";
                echo "<tr><td>Precio:</td><td><input class='texto' type='text' name='precio'></td></tr>";
                echo "<tr><td>Stock:</td><td><input class='texto' type='text' name='stock'></td></tr>";
                echo "<tr><td>Carátula:</td><td id='carat'><input type='file' accept='image/*' name='caratula' id='caratula'></td></tr>";
                echo "<tr><td>Discográfica:</td><td><select name='idDiscograf' class='texto' required><option></option>";
                while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)) {
                    echo "<option value='".$line['idDiscografica']."'>".$line['nombre']."</option>";
                }
                mysql_free_result($result2);

                echo "<tr><td>Intérprete:</td><td><select name='idInt' class='texto' required><option></option>";
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    echo "<option value='".$line['idInt']."'>".$line['alias']."</option>";
                }
                mysql_free_result($result);

                echo "<tr><td>Estilo:</td><td><select name='idEst' class='texto' required><option></option>";
                while ($line = mysql_fetch_array($result3, MYSQL_ASSOC)) {
                    echo "<option value='".$line['idEstilo']."'>".$line['tipo']."</option>";
                }
                mysql_free_result($result3);

                echo "<td><input class='button' type='submit' id='anadcd' name='anadcd' value='Añadir'></td></tr>";
                echo "</table>";
                ?>
            </form>
        </div>
    </div>

    <?php
    }
    // Añadimos CD
    if (isset($_POST['anadcd'])) {

        // Realizamos añadir campo
        if(empty($_POST["caratula"])){
            $query = "INSERT INTO disco values (NULL,'".$_POST["tit"]."','".$_POST["durac"]."','".$_POST["formato"]."','".$_POST["precio"]."','".$_POST["stock"]."','nodisponible.png','".$_POST["idDiscograf"]."','".$_POST["idInt"]."','".$_POST["idEst"]."');";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        }else{
            $query = "INSERT INTO disco values (NULL,'".$_POST["tit"]."','".$_POST["durac"]."','".$_POST["formato"]."','".$_POST["precio"]."','".$_POST["stock"]."','".$_POST["caratula"]."','".$_POST["idDiscograf"]."','".$_POST["idInt"]."','".$_POST["idEst"]."');";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        }

        if ($result) {
    ?>
            <script>
                    alert("Añadido Correctamente");
            </script>
    <?php
        }
         
        header("refresh:0; url=modificar.php"); 
    }
    ?>
