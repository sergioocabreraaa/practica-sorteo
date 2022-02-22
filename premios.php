<?php
include 'conexion.php';	
$pdo1 = new Conexion();












$boletocomprado= 434;
$boletoganador= 435;
calcularPremio($boletocomprado, $boletoganador);
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