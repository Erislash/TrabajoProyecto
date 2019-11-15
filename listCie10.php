<?php
    if(isset($_POST)){
        require_once('connection.php');
        $searched = (isset($_POST['search'])) ? $_POST['search'] : null;

        if($_POST['search'] != null){
            $sql = $connection->prepare("SELECT * FROM cie10 WHERE etiqueta LIKE ? LIMIT 10");
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
                    'code' => "No",
                    'tag' => ""
                );
                $jsonString = json_encode($json);
                echo($jsonString);
            }
            
        }else
            echo("No Se recibe nada");

        }

?>