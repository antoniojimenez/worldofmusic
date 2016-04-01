<?php

session_start();
include("config.php");

?>

	<meta charset="UTF-8">

	<!--
    CONEXION A LA BASE DE DATOS
    --> 	
	<?php                                
	
		$query = "SELECT idVenta FROM venta GROUP BY idVenta DESC limit 1";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_ASSOC);

        if(mysql_num_rows($result)==0){
            $line['idVenta']=1;
        }else{
            $line['idVenta']+=1;
        }

	if (!empty($_GET['total'])){
        foreach ($_SESSION["item"] as $key => $value) {
            if ($key!=0) {
                $query = "SELECT * FROM disco WHERE idDisco='".$key."'";
                $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                $line2 = mysql_fetch_array($result2, MYSQL_ASSOC);

                $query2 = "INSERT INTO venta VALUES('".$line['idVenta']."','".$line2['idDisco']."','".$_SESSION["idCliente"]."','".$value."',
                '".date("Y-m-d")."','".$_GET['total']."')";
                $result3 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());

                $line2['stock']-=$value;
                $query2 = "UPDATE disco SET stock='".$line2['stock']."' WHERE idDisco='".$key."'";
                $result3 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());                
            }                        
        }

        $_SESSION["cantCarro"]=0;
        unset($_SESSION["item"]);
        $_SESSION["item"][]=array();

        if ($result3) {
    ?>
            <script>
                    alert("Compra realizada Correctamente");
            </script>
    <?php
        }
    }

	if(!empty($_GET['vaciar'])){
		$_SESSION["cantCarro"]=0;
        unset($_SESSION["item"]);
        $_SESSION["item"][]=array();
	}

	header("refresh:0; url=index.php"); 
	?>
    
    

