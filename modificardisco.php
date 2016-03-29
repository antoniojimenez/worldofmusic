<?php
session_start();
include ('restringirurl.php');
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Modificar Disco</title>
       
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
    </head>

    <body> 
    
    <!--
    MODIFICAR
    -->
    <div id="top">
        <a href="index.php"><div id="logo"></div></a>                           
    </div>

    <!--
    ESTRUCTURA MIDDLE
    -->
    <div id="middle">
        <?php
            include("menu.php");
        ?> 

        <!--
        CONTENEDOR
        -->
        <div id="contenido"> 
        <?php  

        if(!empty($_GET['idDisco'])){
            $query="SELECT * FROM disco where idDisco='".$_GET['idDisco']."'";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);

            $query = "SELECT * FROM interprete";
            $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

            $query = "SELECT * FROM discografica";
            $result3 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

            $query = "SELECT * FROM estilo";
            $result4 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

            $query="SELECT * FROM canciones where idDisco='".$_GET['idDisco']."'";
            $result5 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
 
    
            /* MODIFICAR DISCO */             
            echo "<h2>Modificar disco</h2>";                                         
            echo "<form method='post'  action='modificardisco.php'>";
            echo "<table>";
            echo "<input type='hidden' name='idDisco' value='".$line['idDisco']."'>";
            echo "<tr><td>Titulo:</td><td><input type='text' class='texto' name='titulo' value='".$line['titulo']."' required></td></tr>";
            echo "<tr><td>Intérprete:</td><td><select class='texto' name='interp'>";
            while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
                if($line['idInter']==$line2['idInt']){
                    echo "<option value='".$line2['idInt']."' selected>".$line2['alias']."</option>";
                }else{
                    echo "<option value='".$line2['idInt']."'>".$line2['alias']."</option>";
                }
            }
            echo "<tr><td>Duración:</td><td><input type='text' class='texto' name='duracion' value='".$line['duracion']."'></td></tr>";
            echo "<tr><td>Discográfica:</td><td><select class='texto' name='discog'>";
            while ($line3 = mysql_fetch_array($result3, MYSQL_ASSOC)) {
                if($line['idDiscografica']==$line3['idDiscografica']){
                    echo "<option value='".$line3['idDiscografica']."' selected>".$line3['nombre']."</option>";
                }else{
                    echo "<option value='".$line3['idDiscografica']."'>".$line3['nombre']."</option>";
                }
            }
            echo "<tr><td>Estilo:</td><td><select class='texto' name='estilo'>";
            while ($line4 = mysql_fetch_array($result4, MYSQL_ASSOC)) {
                if($line['idEstilo']==$line4['idEstilo']){
                    echo "<option value='".$line4['idEstilo']."' selected>".$line4['tipo']."</option>";
                }else{
                    echo "<option value='".$line4['idEstilo']."'>".$line4['tipo']."</option>";
                }
            }
            echo "<tr><td>Formato:</td><td><input type='text' class='texto' name='formato' value='".$line['formato']."'></td></tr>";
            echo "<tr><td>Precio:</td><td><input type='text' class='texto' name='precio' value='".$line['precio']."'></td></tr>";
            echo "<tr><td>Stock:</td><td><input type='text' class='texto' name='stock' value='".$line['stock']."'></td></tr>";
            echo "<tr><td>Carátula:</td><td><input type='file' accept='image/*' name='caratula'></td></tr>";
            echo "<tr><td colspan=2 align=center><input type='submit' name='modif' class='button' value='Modificar'></td></tr>";
            echo "</table>";
            echo "</form>";


            /* AÑADIR CANCION AL DISCO */            
            echo "<h3>Añadir canción al Disco</h3>";
            echo "<form method='post' action='modificardisco.php'>";
            echo "<table>";
            echo "<input type='hidden' name='idDisco' value='".$line['idDisco']."'>";
            echo "<tr><td>Titulo:</td><td><input type='text' class='texto' name='titulo' required></td></tr>";           
            echo "<tr><td>Duración:</td><td><input type='text' class='texto' name='duracion' required></td></tr>";            
            echo "<tr><td colspan=2 align=center><input type='submit' name='anadirCan' class='button' value='Añadir Cancion'></td></tr>";
            echo "</table>";
            echo "</form>";

            echo "<table id='listaCa' cellspacing=10>"; 
            echo "<tr><th>Titulo</th><th>Duracion</th><th>Acción</th>";            
            while ($line5 = mysql_fetch_array($result5, MYSQL_ASSOC)) {
                $cod=$line5['idCancion'];
                echo "<tr><td>".$line5['titulo']."</td><td>".$line5['duracion']."</td>                
                <td><a href='eliminar.php?idCancion=$cod'><img src='imagenes/eliminar.png' onclick='javascript:return confirmacion();' title='Eliminar' width='35px' height='35px'></a></td></tr>";               
            }
        }
    
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
        header("refresh:0; url=modificar.php");  
    }

    /* AÑADIR CANCION */
    if (isset($_POST['anadirCan'])) {
        $query = "SELECT duracion FROM canciones WHERE idDisco='".$_POST['idDisco']."'";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
        $duracion=0;

        while($line = mysql_fetch_array($result)){
            $duracion+=$line['duracion'];
        }
        $duracion+=$_POST["duracion"];

        $query = "INSERT INTO canciones values (NULL,'".$_POST["titulo"]."','".$_POST["duracion"]."','".$_POST["idDisco"]."');";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 

        $query = "UPDATE disco SET duracion='".
                $duracion."' WHERE idDisco='".$_POST["idDisco"]."';";  
        $result2=mysql_query($query) or die('Actualizacion fallida: ' . mysql_error()); 

        if ($result) {
    ?>
            <script>
                alert("Canción añadida correctamente");
            </script>
    <?php
        } 
        header("refresh:0; url=modificar.php");  
    }
    ?>    
        </div>
    </div>
    </body>
</html>
