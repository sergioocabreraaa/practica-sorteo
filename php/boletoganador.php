<html>
    <head>
    
    <title>¡Enviado!</title>
    <link rel="stylesheet" href="../css/php.css">
    <!-- Etiqueta para ver Ñ/accentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    </head>
    <body>


        <?php
        //Conexion a la bdd
        include 'conexion.php';	
        $pdo = new Conexion();

        //Insertar registro
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {   //Almacenamos boleto en la tabla almacenarganador
            $sql = "INSERT INTO almacenarganador (boletoGanador, fecha) VALUES(:boleto, :fecha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':boleto', $_POST['boleto']);
            $stmt->bindValue(':fecha', $_POST['fecha']);
            $prueba = $stmt->execute();
            if($prueba)
            {
                header("HTTP/1.1 200 Ok");
                echo "Se ha insertado el boleto ganador correctamente";
                echo"<br><br><a href='../boletofecha.html'><button>Volver al menu</button></a>";
                exit;
            }else{

                echo "No se ha insertado el boleto ganador correctamente";

            }
        }
            
            ?>    
        
  
    </body>
</html>



