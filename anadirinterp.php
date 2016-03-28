
    <meta charset="UTF-8">
    
    <?php

    include("config.php");

    if (!isset($_POST['anadInt'])) {
    ?>
    <div id="interprete">
        <div class="transp"></div>
        <div id="popupInterprete">
            <form action="anadirinterp.php" method="post">
                <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_interprete()">
                <table>
                    <tr><td colspan='3'><h2>Añadir Interprete</h2></td></tr>
                    <tr><td>Nombre:</td><td><input class='texto' type='text' name='nom'></td></tr>
                    <tr><td>Apellidos:</td><td><input class='texto' type='text' name='apell'></td></tr>
                    <tr><td>Alias:</td><td><input class='texto' type='text' name='alias' required></td></tr>
                    <tr><td>Pais:</td><td><input class='texto' type='text' name='pais'></td></tr>
                    <tr><td></td><td><input class='button' type='submit' id='anadInt' name='anadInt' value='Añadir'></td></tr>
                </table>
            </form>
        </div>
    </div>

    <?php
    }
    // Añadimos Interprete
    if (isset($_POST['anadInt'])) {

        // Realizamos añadir campo
        $query = "INSERT INTO interprete values (NULL,'".$_POST["nom"]."','".$_POST["apell"]."','".$_POST["alias"]."','".$_POST["pais"]."');";
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

