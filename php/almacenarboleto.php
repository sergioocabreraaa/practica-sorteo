<html>
    <head>
    <title>¡Enviado!</title>
    <link rel="stylesheet" href="../css/php.css">
    </head>
    <body>
        
        <?php
        //Conexion a la bdd
        include 'conexion.php';
            
            $pdo = new Conexion();

        //Insertar registro
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Almacenamos boleto en la tabla almacenarboleto
            $sql = "INSERT INTO almacenarboleto (boletoComprado, fecha) VALUES(:boleto, :fecha)";
            //Almacenamos boleto en la tabla premios
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
                echo"<br><br><a href='../boletofecha.html'><button>Volver al menu</button></a>";
                exit;
            }else{

                echo"No se ha insertado el boleto correctamente";
            
            }
        }


        
            ?>

    </body>
</html>

