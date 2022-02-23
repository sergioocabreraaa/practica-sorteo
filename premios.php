<?php
include 'conexion.php';	
	
$pdo1 = new Conexion();

// Transacción

//Boletos iguales
$sql = $pdo1->prepare("SELECT almacenarboleto.fecha FROM almacenarboleto INNER JOIN boletoganador ON almacenarboleto.fecha = boletoganador.fecha");
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$resultado = $sql->fetchAll();

$sql1 = $pdo1->prepare("SELECT * FROM premios");
$sql1->execute();
$sql1->setFetchMode(PDO::FETCH_ASSOC);
$resultado1 = $sql1->fetchAll();
	
echo "<br>Mostramos la información de los resultados: <br><br>";

// Mostrar resultados
 foreach ($resultado1 as $row) {
    $boletocomprado =  $row["boleto"];
    $boletoganador = $row["boleto"];
    $p = calcularPremio($boletocomprado, $boletoganador);
    $sql2 = $pdo1->prepare("UPDATE `premios` SET `cantidad` = '" . $p . "' WHERE `premios`.`boleto` = ". $boletoganador ."");
    $sql2->execute();
    $sql2->setFetchMode(PDO::FETCH_ASSOC);
    $resultado2 = $sql2->fetchAll();


}


// insert
// update premio en tabla premios 

// $row["fecha"] . " </b><br>"; // " . $row["boleto"] . " " . $row["cantidad"] . "
//Mostrar la tabla
/*
$sql = $pdo1->prepare("SELECT * FROM premios= boletos;");
$sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
$resultado = $sql->fetchAll();
	*//*
echo "<br>Mostramos la información de los resultados: <br><br>";

// Mostrar resultados
foreach ($resultado1 as $row) {

    echo "- <b>" . $row["fecha"] . " " . $row["boleto"] . " " . $row["cantidad"] . " </b><br>"; 

}
*/

//Llamamos al metodo
calcularPremio($boletocomprado, $boletoganador);


//Funcion para calcular la cantidad del premio en cada boleto
function calcularPremio($boletocomprado, $boletoganador){

    if(substr($boletocomprado, -5) == $boletoganador){
        $p=600000;
        echo $p;


    }elseif(substr($boletocomprado, -5) == $boletoganador + 1){
    
        $p=10000;
        echo $p;

    }elseif(substr($boletocomprado, -5) == $boletoganador - 1){

        $p=10000;
        echo $p;

    }elseif(substr($boletocomprado, 0, -3) == substr($boletoganador, 0, -3)){

        $p=300;
        echo $p;

    }elseif(substr($boletocomprado, -3) == substr($boletoganador, -3)){

        $p=300;
        echo $p;


    }elseif(substr($boletocomprado, -2) == substr($boletoganador, -2)){
        $p=120;
        echo $p;

    }elseif(substr($boletocomprado, -1) == substr($boletoganador, -1)){
        $p=60;
        echo $p;
    }

}



?>