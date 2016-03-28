<meta charset="UTF-8">
<link rel="icon" type="image/png" href="imagenes/logoIcono.png" />
<?php
session_start();
?>

  <div id="top">
            <a href="index.php"><div id="logo"></div></a>              
            <!--
            POPUP LOGIN
            -->
            <div id="login">
                <div class="transp"></div>
                <div id="popupLogin">
                    <form method="post" action="login.php"> 
                        <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_login()">
                        <table>
                            <tr><td><h2>Iniciar Sesión</h2></td></tr>
                            <tr><td><input type="text" class="texto" name="usuario" placeholder="Usuario" required></td></tr>
                            <tr><td><input type="password" class="texto" name="password" placeholder="Password" required></td></tr>
                            <tr><td><input class="button" type="submit" id="logeo" name="logeo" value="Entrar"></td></tr>
                        </table>             
                    </form>                        
                </div>
            </div>
            
            <!--
            POPUP REGISTRO
            -->
            <div id="registro">
                <div class="transp"></div>
                <div id="popupRegistro">
                    <form method="post" action="registro.php">
                        <img id="close" src="imagenes/cerrar.png" onclick ="div_hide_registro()">
                        <table>
                            <tr><td colspan="2"><h2>Registro</h2></td></tr>
                            <tr><td>Nick:*</td><td><input class="texto" type="text" name="nick" required></td></tr>
                            <tr><td>Contraseña:*</td><td><input class="texto" type="password" name="contra" required></td></tr>
                            <tr><td>Nombre:</td><td><input class="texto" type="text" name="nombre"></td></tr>
                            <tr><td>Apellidos:</td><td><input class="texto" type="text" name="apellidos"></td></tr>
                            <tr><td>Teléfono:</td><td><input class="texto" type="text" name="tel"></td></tr>
                            <tr><td>Dirección:</td><td><input class="texto" type="text" name="dir"></td></tr>
                            <tr><td colspan="2"><input class="button" type="submit" id="regis" name="regis" value="Registrar"></td></tr>
                            <tr><td></td></tr>
                        </table> 
                        * Campos requeridos                            
                    </form>
                </div>
            </div>
                    
            <!--
            BOTONES LOGIN Y REGISTRO
            -->
            <div id="logReg">
            <?php
                if(empty($_SESSION["usuario"])){
            ?>
                <input class="button" type="button" id="log" value="Conectate" onclick="div_show_login()">
                o
                <input class="button" type="button" id="reg" value="Registrate" onclick="div_show_registro()">                
            <?php
            }else{
                echo "<w>Bienvenido:</w> <a href='#' id='nomUsu' name='nomUsu' onclick='div_show_modusu()'>".$_SESSION["usuario"]."</a><br>";
                echo "<br><a href='cerrarSesion.php'>Cerrar Sesión</a>";
                }
            ?>
            </div>

            <!--
            POPUP MODIFICAR USUARIO
            -->
            <?php
                include("modUsuario.php");
            ?>
        </div>