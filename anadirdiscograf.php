    <meta charset="UTF-8">
    
    <?php
    include("config.php");
    if (!isset($_POST['anadDis'])) {
    ?>
    <div id="discografica">
        <div class="transp"></div>
        <div id="popupDiscograf">
            <form action="anadirdiscograf.php" method="post">
                <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_discograf()">
                <table>
                    <tr><td colspan='2'><h2>Añadir Discográfica</h2></td></tr>
                    <tr><td>Nombre:</td><td><input class='texto' type='text' name='nom' required></td></tr>
                    <tr><td></td><td><input class='button' type='submit' id='anadDis' name='anadDis' value='Añadir'></td></tr>
                </table>
            </form>
        </div>
    </div>
    
    <?php
    }
    // Pulsamos enviar
    if (isset($_POST['anadDis'])) {

        // Realizamos añadir campo
        $query = "INSERT INTO discografica values (NULL,'".$_POST["nom"]."');";
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

