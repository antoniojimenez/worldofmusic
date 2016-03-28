
    <meta charset="UTF-8">
    
    <?php
    include("config.php");
    if (!isset($_POST['anadCon'])) {
    ?>
    <div id="concierto">
        <div class="transp"></div>
        <div id="popupConcierto">
            <form action="anadirconcierto.php" method="post">
                <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_concierto()">
                <?php 
                $query = "SELECT * FROM interprete";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

                echo "<table>";
                echo "<tr><td colspan='2'><h2>Añadir Concierto</h2></td></tr>";
                echo "<tr><td>Fecha:</td><td><input class='texto' type='date' name='fecha' required></td></tr>";
                echo "<tr><td>Lugar:</td><td><input class='texto' type='text' name='lugar' required></td></tr>";
                echo "<tr><td>Intérprete:</td><td><select name='idinter' class='texto' required><option></option>";

                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    echo "<option value='".$line['idInt']."'>".$line['alias']."</option>";
                }   
                mysql_free_result($result);

                echo "</tr><td></td><td><input class='button' type='submit' id='anadCon' name='anadCon' value='Añadir'></td></tr>";
                echo "</table>";
                ?>    
            </form>
        </div>
    </div>
    
    
    <?php
    }
    // Pulsamos enviar
    if (isset($_POST['anadCon'])) {

        // Realizamos añadir campo
        $query = "INSERT INTO concierto values (NULL,'".$_POST["fecha"]."','".$_POST["lugar"]."','".$_POST["idinter"]."');";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

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

