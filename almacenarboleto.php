<?php
include 'conexion.php';
	
	$pdo = new Conexion();

//Insertar registro
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $sql = "INSERT INTO almacenarboleto (boleto, fecha) VALUES(:boleto, :fecha)";
    $sql1 = "INSERT INTO premios (boleto, fecha) VALUES(:boleto, :fecha)";
    $stmt = $pdo->prepare($sql);
    $stmt1 = $pdo->prepare($sql1);
    $stmt->bindValue(':boleto', $_POST['boleto']);
    $stmt->bindValue(':fecha', $_POST['fecha']);
    $stmt1->bindValue(':boleto', $_POST['boleto']);
    $stmt1->bindValue(':fecha', $_POST['fecha']);
    $prueba = $stmt->execute();
    $prueba1 = $stmt1->execute();
    if($prueba and $prueba1)
    {
        header("HTTP/1.1 200 Ok");
        echo"Se ha insertado el boleto correctamente";
        exit;
    }else{

        echo"No se ha insertado el boleto correctamente";
    
    }
}


    ?>