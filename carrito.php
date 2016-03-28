
<?php
	session_start(); 
	include("config.php");
	
	$idDisco = $_GET['codigo'];
	$cont=1;

	

	if ($_SESSION["cantCarro"]<9) {	

		if(isset($_SESSION["item"][$idDisco])){
			$query = "SELECT * FROM disco WHERE idDisco='".$idDisco."'";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);

            if ($line['stock']>$_SESSION["item"][$idDisco]) {            
				$_SESSION["item"][$idDisco]+=1;
				echo $_SESSION["cantCarro"];
			}else{
				echo $_SESSION["cantCarro"];
			}
		}else{
			$_SESSION["item"][$idDisco]=1;
			echo $_SESSION["cantCarro"]+=1;
		}

	}else{				
		echo $_SESSION["cantCarro"];
	}
?>
