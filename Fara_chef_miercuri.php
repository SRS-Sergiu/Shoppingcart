<?php
include('conectare.php');

$sql = "INSERT INTO autori (nume_autor)
		VALUES ('".$_POST['nume']."')";

mysql_query($sql); 

?>