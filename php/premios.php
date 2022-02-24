<html>
    <head>
    <!--Titulo-->  
    <title>Premios</title>
    <!--Estilo Css-->
    <link rel="stylesheet" href="../css/premios.css">
    </head>
<body>

    <?php
    //Conexion a la base de datos
    include 'conexion.php';
    //Variable para la conexion	
    $pdo1 = new Conexion();

            //Select para sacar el boleto comprado con el boleto ganador correspondiente
            $sql3 = $pdo1->prepare("SELECT almacenarboleto.boletoComprado, almacenarganador.boletoGanador FROM almacenarboleto INNER JOIN almacenarganador ON almacenarboleto.fecha = almacenarganador.fecha");
            $sql3->execute();
            $sql3->setFetchMode(PDO::FETCH_ASSOC);
            $resultado3 = $sql3->fetchAll();

            //Update para actulizar la cantidad correspondiente para el premio
        foreach ($resultado3 as $row) {
            $boletoComprado =  $row["boletoComprado"];
            $boletoGanador = $row["boletoGanador"];
            $dinero = calcularPremio($boletoComprado, $boletoGanador);
            $sql4 = $pdo1->prepare("UPDATE premios SET cantidad = " . $dinero . " WHERE boleto = ". $boletoComprado ."");
            $sql4->execute();
            $sql4->setFetchMode(PDO::FETCH_ASSOC);
            $resultado4 = $sql4->fetchAll();
    }

            //Select para sacar las fechas que son iguales en el sorteo
            $sql = $pdo1->prepare("SELECT almacenarboleto.fecha FROM almacenarboleto INNER JOIN almacenarganador ON almacenarboleto.fecha = almacenarganador.fecha");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $resultado = $sql->fetchAll();


            //Select para mostrar la tablas de premios por pantalla
            $sql1 = $pdo1->prepare("SELECT * FROM premios");
            $sql1->execute();
            $sql1->setFetchMode(PDO::FETCH_ASSOC);
            $resultado1 = $sql1->fetchAll();
        

        // Mostrar resultados    
        echo "<br><b>Boletos Comprados:</b><br><br>";
        
        foreach ($resultado1 as $row) {
            
            echo " <b>" . $row["fecha"] . " | " . $row["boleto"] . " | " . $row["cantidad"] . "€ </b><br>"; 
          

    }
    echo"<br><br><a href='../boletofecha.html'><button>Volver al menu</button></a>";


    //Funcion para calcular la cantidad del premio en cada boleto
    function calcularPremio($boletoComprado, $boletoGanador){

        //Utilizamos el metodo sbstr para realizar los calculos segun el boleto del sorteo
        if(substr($boletoComprado, -5) == $boletoGanador){
            $dinero=600000; //Añadimos el dinero si se cumple
        
            


        }elseif(substr($boletoComprado, -5) == $boletoGanador + 1){
            $dinero=10000;//Añadimos el dinero si se cumple
        
            


        }elseif(substr($boletoComprado, -5) == $boletoGanador - 1){
            $dinero=10000;//Añadimos el dinero si se cumple
        
            


        }elseif(substr($boletoComprado, 0, -3) == substr($boletoGanador, 0, -3)){
            $dinero=300;//Añadimos el dinero si se cumple
        


            
        }elseif(substr($boletoComprado, -3) == substr($boletoGanador, -3)){
            $dinero=300;//Añadimos el dinero si se cumple
        
            


        }elseif(substr($boletoComprado, -2) == substr($boletoGanador, -2)){
            $dinero=120;//Añadimos el dinero si se cumple
        
            


        }elseif(substr($boletoComprado, -1) == substr($boletoGanador, -1)){
            $dinero=60;//Añadimos el dinero si se cumple
            
            
        }

        return $dinero; //Retornamos la variable con el resultado
    }
    ?>
  
</body>
</html>

