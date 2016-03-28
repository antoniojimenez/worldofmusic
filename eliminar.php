<?php
session_start();
include ('restringirurl.php');
include("config.php");
?>

	<meta charset="UTF-8">
 	
	<?php                        
	
	
	if (!empty($_GET['idDisco'])){
	$query= "DELETE FROM disco where idDisco='".$_GET['idDisco']."'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	}

	if (!empty($_GET['idInt'])){
	$query= "DELETE FROM interprete where idInt='".$_GET['idInt']."'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	}

	if (!empty($_GET['idCliente'])){
	$query= "DELETE FROM cliente where idCliente='".$_GET['idCliente']."'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	}

	if (!empty($_GET['idConcierto'])){
	$query= "DELETE FROM concierto where idConcierto='".$_GET['idConcierto']."'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	}

	if (!empty($_GET['idDiscografica'])){
	$query= "DELETE FROM discografica where idDiscografica='".$_GET['idDiscografica']."'";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	}

	if (!empty($_GET['idCancion'])){
		$query= "DELETE FROM canciones WHERE idCancion='".$_GET['idCancion']."'";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	}

	if ($result) {
    ?>
        <script>
                alert("Eliminado Correctamente");
        </script>
    <?php
    }
	header("refresh:0; url=modificar.php"); 
	?>
    
    

