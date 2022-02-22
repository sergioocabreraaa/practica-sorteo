
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
    $prueba = $stmt->execute();
    if($prueba)
    {
        header("HTTP/1.1 200 Ok");
        echo "Se ha insertado el boleto ganador correctamente";
        exit;
    }else{

        echo "No se ha insertado el boleto ganador correctamente";

    }
}
    
    ?>   


