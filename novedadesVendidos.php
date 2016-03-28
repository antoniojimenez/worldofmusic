<?php
    if(!isset($_GET['est']) && empty($_POST['busq'])){
        //CONSULTA PARA SACAR LOS ÚLTIMOS 10 DISCOS INSERTADOS
        $query = "SELECT * FROM disco d, interprete i WHERE d.idInter=i.idInt ORDER BY idDisco DESC limit 10";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());                     

        //CONSULTA PARA SACAR LOS 10 DISCOS MÁS VENDIDOS
        $query = "SELECT * FROM venta v, disco d, interprete i WHERE d.idDisco=v.idDisco AND d.idInter=i.idInt GROUP BY d.idDisco ORDER BY SUM(v.cantidad) DESC limit 10";
        $result2 = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        //Imprimir los 10 últimos resultados para novedades
        echo "<h2>Últimas Novedades</h2>";
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo "<div class='discos'>";
            echo "<a href='index.php?cod=".$line['idDisco']."'><img src='caratulas/".$line['caratula']."' title='".$line['titulo']."'></a>";
            echo "<h4>".$line['titulo']."</h4>";
            echo "<h5>".$line['alias']."</h5>";
            echo "</div>";
        }
        mysql_free_result($result);

        //Imprimir los 10 resultados de los más vendidos
        echo "<h2>Los más Vendidos</h2>";
        while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)) {
            echo "<div class='discos'>";
            echo "<a href='index.php?cod=".$line['idDisco']."'><img src='caratulas/".$line['caratula']."' title='".$line['titulo']."'></a>";
            echo "<h4>".$line['titulo']."</h4>";
            echo "<h5>".$line['alias']."</h5>";
            echo "</div>";
        }
        mysql_free_result($result2);

        //SI HEMOS SELECCIONADO UN ESTILO, Y NO BUSCADO UN DISCO, LO MOSTRAMOS 
    }else if(isset($_GET['est']) && empty($_POST['busq'])){
        $query = "SELECT * FROM disco d, estilo e WHERE d.idEstilo='".$_GET['est']."' AND d.idEstilo=e.idEstilo";
        $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

        //SI EL ESTILO NOS DEVUELVE UN VALOR O MAS MOSTRAMOS LOS DISCOS CON ESE ESTILO
        if(mysql_num_rows($result)!=0){
            while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                echo "<div class='discos'>";
                echo "<a href='index.php?cod=".$line['idDisco']."'><img src='caratulas/".$line['caratula']."' title='".$line['titulo']."'></a>";
                echo "</div>";
            }
            mysql_free_result($result);
        //SI NO MOSTRAMOS UN MENSAJE DE INFORMACIÓN
        }else{
            $query = "SELECT * FROM estilo WHERE idEstilo='".$_GET['est']."'";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
            $line = mysql_fetch_array($result, MYSQL_ASSOC);
            echo "<h3>No existen discos del estilo ".$line['tipo']."</h3>";
            mysql_free_result($result);
        }

        //SI HEMOS REALIZADO UNA BÚSQUEDA MOSTRAMOS LOS RESULTADOS
    }else{
        //SI EL CAMPO BÚSQUEDA NO ESTA VACIO REALIZAMOS LA CONSULTA                            
        if (!empty($_POST['busq'])){
            $query = "SELECT * FROM disco d, interprete i WHERE (d.titulo LIKE '%".$_POST['busq']."%' OR i.alias LIKE '%".$_POST['busq']."%') 
                        AND d.idInter=i.idInt";
            $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

            //SI EL RESULTADO NOS DEVUELVE UNO O MÁS VALORES LOS MOSTRAMOS
            if(mysql_num_rows($result)!=0){
                echo "<h2>Resultados:</h2>";
                while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
                    echo "<div class='discos'>";
                    echo "<a href='index.php?cod=".$line['idDisco']."'><img src='caratulas/".$line['caratula']."' title='".$line['titulo']."'></a>";
                    echo "</div>";
                }
                mysql_free_result($result);
            //SI NO MOSTRAMOS UN MENSAJE DE INFORMACIÓN
            }else{
                echo "<h3>No se han encontrado resultados</h3>";
            }
        }
    }
?>