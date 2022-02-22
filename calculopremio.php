<?php 

include 'conexion.php';	
$pdo = new Conexion();

	function calcularPremio($boletocomprado, $boletoganador){

		if(substr($a, -5) == $b){
			$p=600000;
			echo $p;
	
	
		}elseif(substr($a, -5) == $b + 1){
		
			$p=10000;
			echo $p;
	
		}elseif(substr($a, -5) == $b - 1){
	
			$p=10000;
			echo $p;
	
		}elseif(substr($a, 0, -3) == substr($b, 0, -3)){
	
			$p=300;
			echo $p;
	
		}elseif(substr($a, -3) == substr($b, -3)){
	
			$p=300;
			echo $p;
	
	
		}elseif(substr($a, -2) == substr($b, -2)){
			$p=120;
			echo $p;
	
		}elseif(substr($a, -1) == substr($b, -1)){
			$p=60;
			echo $p;
		}

	}
	


?>

