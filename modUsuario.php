  
        <meta charset="UTF-8">

        <?php include("config.php"); ?>

        <div id="modificarUsu">
            <div class="transp"></div>
            <div id="popupModificarUsu">
                <img id="close" src="imagenes/cerrar.png" onclick="div_hide_modusu()">  
                <form method="post" action="index.php">  
                    <?php
                        $query = "SELECT * FROM cliente where usuario='".$_SESSION['usuario']."'";
                        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                        $line = mysql_fetch_array($result, MYSQL_ASSOC);

                        echo "<table>";
                        echo "<tr><td colspan='3'><h2>Modificar Usuario</h2></td></tr>";
                        echo "<tr><td>Nombre:</td><td><input class='texto' type='text' value='".$line['nombre']."' name='nombre'></td></tr>";
                        echo "<tr><td>Apellidos:</td><td><input class='texto' type='text' value='".$line['apellidos']."' name='apellidos'></td></tr>";
                        echo "<tr><td>Telefono:</td><td><input class='texto' type='text' value='".$line['telefono']."' name='telefono'></td></tr>";
                        echo "<tr><td>Direccion:</td><td><input class='texto' type='text' value='".$line['direccion']."' name='direccion'></td>
                        <td><input class='button' type='submit' id='modUsu' name='modUsu' value='Modificar'></td></tr>";
                        echo "</table>";
                        mysql_free_result($result);
                    ?>
                </form>
                
                <form method="post" action="index.php">
                    <?php
                    echo "<table>";
                    echo "<tr><td colspan='3'><h2>Modificar Contraseña</h2></td></tr>";
                    echo "<tr><td>Contraseña Actual:</td><td><input class='texto' type='password' name='contrasenaAct'></td></tr>";
                    echo "<tr><td>Contraseña Nueva:</td><td><input class='texto' type='password' name='contranueva'></td></tr>";
                    echo "<tr><td>Repite Contraseña:</td><td><input class='texto' type='password' name='repitecontra'></td>
                    <td><input class='button'type='submit' value='Password' id='modPass' name='modPass'></td></tr>";
                    echo "</table>";
                    ?>            
                </form>
            </div>
        </div>
    
        <?php
            if(isset($_POST['modUsu'])){
                $query = "UPDATE cliente SET nombre='".
                    $_POST['nombre']."', apellidos='".
                    $_POST['apellidos']."', telefono='".
                    $_POST['telefono']."',direccion='".
                    $_POST['direccion']."' WHERE usuario='".$_SESSION['usuario']."'";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());  
                
                if($result){
        ?>
                <script>
                    alert("Modificado Correctamente");
                </script>
        <?php
                }        
            }

            if(isset($_POST['modPass'])){
                $query = "SELECT contrasena FROM cliente WHERE usuario='".$_SESSION['usuario']."'";
                $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_ASSOC);
                
                    if($line['contrasena']==md5($_POST["contrasenaAct"])){
                        if($_POST['contranueva']==$_POST['repitecontra']){
                            $query= "UPDATE cliente SET contrasena='".md5($_POST['contranueva'])."' WHERE usuario='".$_SESSION['usuario']."'";
                            $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());                        
        ?>
                            <script>
                                alert("Modificado correctamente");
                            </script>
        <?php
                        }else{
        ?>
                        <script>
                            alert("Las contraseñas nuevas no coinciden");
                        </script>
        <?php
                        }
                    }else{
        ?>
                        <script>
                            alert("La contraseña actual no coincide");
                        </script>
        <?php
                    }
                mysql_free_result($result);   
            }
        ?>