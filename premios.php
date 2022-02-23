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

    echo "- <b>" . $row["fecha"] . " " . $row["boleto"] . " " . $row["cantidad"] . " </b><br>"; 

}


echo "<br>Mostramos la información de los resultados: <br><br>";

// Mostrar resultados
 foreach ($resultado1 as $row) {
    $boletoComprado =  $row["boleto"];
    $boletoGanador = $row["boleto"];
    $p = calcularPremio($boletoComprado, $boletoGanador);
    //No funciona el update
    
    $sql2 = $pdo1->prepare("UPDATE `premios` SET `cantidad` = " . $p . " WHERE `boleto` = ". $boletoGanador ."");
    $sql2->execute();
    $sql2->setFetchMode(PDO::FETCH_ASSOC);
    $resultado2 = $sql2->fetchAll();

}






//Funcion para calcular la cantidad del premio en cada boleto
function calcularPremio($boletoComprado, $boletoGanador){

    if(substr($boletoComprado, -5) == $boletoGanador){
        $p=600000;
        echo $p;
        


    }elseif(substr($boletoComprado, -5) == $boletoGanador + 1){
    
        $p=10000;
        echo $p;
        

    }elseif(substr($boletoComprado, -5) == $boletoGanador - 1){

        $p=10000;
        echo $p;
        

    }elseif(substr($boletoComprado, 0, -3) == substr($boletoGanador, 0, -3)){

        $p=300;
        echo $p;
        
    }elseif(substr($boletoComprado, -3) == substr($boletoGanador, -3)){

        $p=300;
        echo $p;
        


    }elseif(substr($boletoComprado, -2) == substr($boletoGanador, -2)){
        $p=120;
        echo $p;
        

    }elseif(substr($boletoComprado, -1) == substr($boletoGanador, -1)){
        $p=60;
        echo $p;
        
    }
    return $p;
}



?>