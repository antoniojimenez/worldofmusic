<?php
session_start();
include ('restringirurl.php');
?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Modificar Concierto</title>
        
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

        if (!empty($_GET['idConcierto'])){        
            $query="SELECT * FROM concierto where idConcierto='".$_GET['idConcierto']."'";
            $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line2 = mysql_fetch_array($result2, MYSQL_ASSOC);
            $query = "SELECT * FROM interprete";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            
            echo "<h2>Modificar Concierto</h2>";

            echo "<form action='modificarconcierto.php' method='post'>";
            echo "<table>";
            echo "<input type='hidden' name='idConcierto' value='".$line2['idConcierto']."'>";
            echo "<tr><td>Fecha:</td><td><input type='date' class='texto' name='fecha' value='".$line2['fecha']."'></td></tr>";
            echo "<tr><td>Lugar:</td><td><input type='text' class='texto' name='lugar' value='".$line2['lugar']."'></td></tr>";
            echo "<tr><td>Intérprete:</td><td><select class='texto' name='idinter' value='".$line2['idInter']."'><option></option>";

            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                if($line2['idInter']==$line['idInt']){
                echo "<option value='".$line['idInt']."' selected>".$line['alias']."</option>";
                }else{
                echo "<option value='".$line['idInt']."'>".$line['alias']."</option>";
            }
            }
            
            echo "</tr><td colspan=2 align=center><input type='submit' class='button' name='mod' value='Modificar'></td></tr>";
            echo "</table>";
            echo "</form>";
            }

            if (isset($_POST['mod'])){
                
            $query="UPDATE concierto SET fecha='".$_POST['fecha']."', 
            lugar='".$_POST['lugar']."', idInter='".$_POST['idinter']."'
            where idConcierto='".$_POST['idConcierto']."'";

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
