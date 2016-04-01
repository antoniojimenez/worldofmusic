<html>
    <head>
        <meta charset="UTF-8">
        <title>The World Of Music</title>

        <link href="./css/estilos.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="../imagenes/logoIcono.png" />
    </head>

    <body>    	
		<!-- LOGIN BUILD -->
		<div id="login">
			<div class="title">
				<h1>Instalación</h1>
			</div>
			<form method="post" action="index.php" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Usuario MySQL:</td>
						<td><input type="text" name="user" placeholder="Introduce el usuario" /></td>
					</tr>
					<tr>
						<td>Contraseña MySQL:</td>
						<td><input type="password" name="password" placeholder="Introduce la contraseña" /></td>
					</tr>
					<tr>
						<td>Base de datos:</td>
						<td><input type="text" name="database" placeholder="Introduce la base de datos" /></td>
					</tr>
					<tr>
						<td>Servidor:</td>
						<td><input type="text" name="server" placeholder="Introduce el servidor" /></td>
					</tr>
					<tr>
						<td>¿Datos de ejemplo?</td>
						<td><input type="checkbox" name="datos" /></td>
					</tr>
				</table>
				<input type="submit" name="instalar" value="Instalar" />
			</form>
		</div>

		<?php
			if (isset($_POST["instalar"])) {
				$username=$_POST["user"];
              	$password=$_POST["password"];
              	$database=$_POST["database"];
              	$server=$_POST["server"];

              	$conectar = mysql_connect($server ,$username, $password); 
              	if (!$conectar) {
    				die('No pudo conectarse: ' . mysql_error());
				}else{
              		mysql_set_charset('utf8', $conectar);
					mysql_select_db($database) or die('No se pudo seleccionar la base de datos');

					include("tablas.php");

					if(isset($_POST['datos'])){
						include("datos.php");
					}
		?>
					<script>
						alert("Base de datos instalada");
					</script>                    
        <?php
                   	header("refresh:0; url=../index.php");  
				}

			}
		?>
    </body>
</html>