  
        <meta charset="UTF-8">

        <?php

            include("config.php");

            $query = "SELECT * FROM cliente where usuario='".$_SESSION['usuario']."'";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);

        ?>

        <div id="modificarUsu">
            <div class="transp"></div>
            <div id="popupModificarUsu">
                <img id="close" src="imagenes/cerrar.png" onclick="div_hide_modusu()">  
                <form method="post">  
                    <?php
                        

                        echo "<table>";
                        echo "<tr><td colspan='3'><h2>Modificar Usuario</h2></td></tr>";
                        echo "<tr><td>Nombre:</td><td><input class='texto' type='text' name='nombre' value='".$line['nombre']."' /></td></tr>";
                        echo "<tr><td>Apellidos:</td><td><input class='texto' type='text' name='apellidos' value='".$line['apellidos']."' /></td></tr>";
                        echo "<tr><td>Telefono:</td><td><input class='texto' type='text' name='telefono' value='".$line['telefono']."' /></td></tr>";
                        echo "<tr><td>Direccion:</td><td><input class='texto' type='text' name='direccion' value='".$line['direccion']."' /></td>";
                        echo "<tr><td>Tema:</td><td><select class='texto' name='tema'>
                                                    <option value='tema1'>Tema por defecto</option>
                                                    <option value='tema2'>Tema 2</option>
                                                    <option value='tema3'>Tema 3</option>
                                                    </select></td>
                        <td><input class='button' type='submit' id='modUsu' name='modUsu' value='Modificar'></td></tr>";
                        echo "</table>";
                    ?>
                </form>
                
                <form method="post">
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
                $query = "UPDATE cliente SET tema='".
                    $_POST['tema']."', nombre='".
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