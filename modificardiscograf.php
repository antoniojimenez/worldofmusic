<?php
session_start();
include ('restringirurl.php');
include("config.php");
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Modificar Discográfica</title>
        <?php
        if (!empty($_SESSION['tema'])){
        	$tema=$_SESSION['tema'];
        	?>
        	<?php
        	echo "<link href='css/$tema.css' rel='stylesheet' type='text/css'>";
   ?>     	
    		<?php
			}else{
				?>
			<link href="css/estilos.css" rel="stylesheet" type="text/css">
			<?php
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
    
        if (!empty($_GET['idDiscografica'])){
            $query="SELECT * from discografica where idDiscografica='".$_GET['idDiscografica']."'";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);  

            echo "<form action='modificardiscograf.php' method='post'>";
            echo "<h2>Modificar Discográfica</h2><br>";
            echo "<table>";
            echo "<input type='hidden' name='idDiscografica' value='".$line['idDiscografica']."'>";
            echo "<tr><td>Nombre:</td><td><input type='text' class='texto' name='nombre' value='".$line['nombre']."'></td></tr>";
            echo "<tr><td colspan=2 align=center><input type='submit' value='Modificar' class='button' name='modif'></td></tr>";
            echo "</table>";
            echo "</form>";    
        }

        if (isset($_POST['modif'])){    
            $query="UPDATE discografica SET nombre='".$_POST['nombre']."' 
            where idDiscografica='".$_POST['idDiscografica']."'";
            $result=mysql_query($query) or die('Actualizacion fallida: ' . mysql_error());
            
            if ($result) {
        ?>
                <script>
                        alert("Modificado Correctamente");
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
