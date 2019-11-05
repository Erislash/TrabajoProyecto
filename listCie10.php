<?php
    $host = 'localhost';
    $db   = 'medical';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
         $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    if(isset($_POST)){
        $searched = (isset($_POST['search'])) ? $_POST['search'] : null;

        if($_POST['search'] != null){
            $sql = $pdo->prepare("SELECT * FROM cie10 WHERE etiqueta LIKE ?");
            $sql->execute(["%".$searched."%"]);

            

            if($sql->rowCount() >= 1){
                $diagnostics = $sql->fetchAll();
                foreach($diagnostics as $diagnostic){
                    $json[] = array(
                        'code' => $diagnostic['codigo'],
                        'tag' => $diagnostic['etiqueta']
                    );
                }

                $jsonString = json_encode($json);
                echo($jsonString);
            }else{
                $json[] = array(
                    'code' => "No hay resultado",
                    'tag' => "No se encontró ningún diagnostico que coincida con lo ingresado"
                );
                $jsonString = json_encode($json);
                echo($jsonString);
            }
            
        }else
            echo("No Se recibe nada");

        }

?>