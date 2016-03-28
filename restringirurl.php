<?php
if ($_SESSION["tipo"]!='Admin'){
header("refresh:0; url=index.php");
}
?>