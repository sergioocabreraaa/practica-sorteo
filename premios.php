<?php 
include 'conexion.php';
	
$pdo = new Conexion();



	// Ejecutamos una sentencia SQL
	
	// consulta SQL que queremos ejecutar
	$sentencia = "SELECT almacenarboleto.fecha FROM almacenarboleto INNER JOIN boletoganador ON almacenarboleto.fecha = boletoganador.fecha;";
	$resultado = mysqli_query($pdo,$sentencia);



?>

