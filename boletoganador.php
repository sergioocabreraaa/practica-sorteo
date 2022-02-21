<?php
include 'conexion.php';
	
	$pdo = new Conexion();

//Insertar registro
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $sql = "INSERT INTO boletoganador (boleto, fecha) VALUES(:boleto, :fecha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':boleto', $_POST['boleto']);
    $stmt->bindValue(':fecha', $_POST['fecha']);
    $stmt->execute();
    $idPost = $pdo->lastInsertId(); 
    if($idPost)
    {
        header("HTTP/1.1 200 Ok");
        echo "Se ha añadido el boleto ganador a la base de datos.<br> Boleto numero: ";    
        echo json_encode($idPost);
        exit;
    }
}
    
    ?>