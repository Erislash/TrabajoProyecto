<?php
    if(isset($_GET['id'])):
        require_once('connection.php');

        $id = $_GET['id'];
        $sql = $connection->prepare("SELECT * FROM users WHERE id=?");
        $sql->execute([$id]);

        if($sql->rowCount() >= 1){
            $user = $sql->fetchAll();
            $user[0]["name"];
        }
        $name = $user[0]["name"]." ".$user[0]["surname"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $name ?></title>
    <link rel="stylesheet" href="Dashboard.css">
    <script src="https://kit.fontawesome.com/5bf93b33ff.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbarBrand">Medical Service</a>
        <a href="#" class="">Bienvenido Doctor/a Bob!</a>
    </nav>
    <div class="container">
        <main>
            <h2>Paciente: </h2>
            <h3><?= $name ?></h3>
        </main>
    </div>
</body>
</html>

<?php
    endif;
?>