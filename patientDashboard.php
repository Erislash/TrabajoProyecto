<?php
    if(isset($_GET['id'])):
        require_once('connection.php');

        $id = $_GET['id'];
        $sql = $connection->prepare("SELECT * FROM users WHERE id=?");
        $sql->execute([$id]);

        if($sql->rowCount() >= 1):
            $user = $sql->fetchAll();
            $user[0]["name"];
        
            $name = $user[0]["name"]." ".$user[0]["surname"];
            $diagnostics = $user[0]["diagnostics"];
            
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
    <div class="lightBox" id="lightBox">
        <div class="allData">
            <h2>Todos los Datos</h2>
            <table class="allDataTable">
                <tr>
                    <td><b>Nombre(s)</td>
                    <td><?= $user[0]["name"] ?></td>
                </tr>
                <tr>
                    <td><b>Apellido(s)</td>
                    <td><?= $user[0]["surname"] ?></td>
                </tr>
                <tr>
                    <td><b>Fecha de Nacimiento</td>
                    <td><?= $user[0]["birthDate"] ?></td>
                </tr>
                <tr>
                    <td><b>Género</td>
                    <td><?php echo(($user[0]["birthDate"]) ? "Masculino" : "Fmemenino"); ?></td>
                </tr>
                <tr>
                    <td><b>DNI</td>
                    <td><?= $user[0]["idCardNumber"] ?></td>
                </tr>
                <tr>
                    <td><b>Teléfono Fijo</td>
                    <td><?= $user[0]["homePhone"] ?></td>
                </tr>
                <tr>
                    <td><b>Teléfono Móvil</td>
                    <td><?= $user[0]["mobilePhone"] ?></td>
                </tr>
                <tr>
                    <td><b>E-Mail</td>
                    <td><?= $user[0]["email"] ?></td>
                </tr>
                <tr>
                    <td><b>Domicilio Legal</td>
                    <td><?= $user[0]["legalAddress"] ?></td>
                </tr>
                <tr>
                    <td><b>Código Postal Legal</td>
                    <td><?= $user[0]["legalPostalCode"] ?></td>
                </tr>
                <tr>
                    <td><b>Ciudad Legal</td>
                    <td><?= $user[0]["legalCity"] ?></td>
                </tr>
                <tr>
                    <td><b>Estado/Provincia Legal</td>
                    <td><?= $user[0]["legalState"] ?></td>
                </tr>
                <tr>
                    <td><b>País Legal</td>
                    <td><?= $user[0]["legalCountry"] ?></td>
                </tr>

                <tr>
                    <td><b>Domicilio de Contacto</td>
                    <td><?= $user[0]["contactAddress"] ?></td>
                </tr>
                <tr>
                    <td><b>Código Postal de Contacto</td>
                    <td><?= $user[0]["contactPostalCode"] ?></td>
                </tr>
                <tr>
                    <td><b>Ciudad de Contacto</td>
                    <td><?= $user[0]["contactCity"] ?></td>
                </tr>
                <tr>
                    <td><b>Estado/Provincia de Contacto</td>
                    <td><?= $user[0]["contactState"] ?></td>
                </tr>
                <tr>
                    <td><b>País de Contacto</td>
                    <td><?= $user[0]["contactCountry"] ?></td>
                </tr>
            </table>
        </div>
        <div class="newMedicine">
            chau
        </div>
    </div>

    <nav class="navbar">
        <div class="text">
            <a href="#" class="navbarBrand">Servicio Médico SP</a>
            <a href="#" class="">Bienvenido Doctor/a Bob!</a>
        </div>
        
        <div class="logo">
            <img src="IMG/logo.png" alt="">
        </div>
    </nav>
    <div class="containerPatient">
        <main>
            <h1>Paciente: <?= $name ?></h1>
            <h2>Diagnóstico(s): </h2>
            <ul class="diagnostics">
            <?php
                $eachDiagnostic = explode("-", $user[0]["diagnostics"]);
                foreach($eachDiagnostic as $diag){
                    echo("<li>$diag</li>");
                }
            ?>
            </ul>

            <div>
                <table class="personalDataTable">
                    <tr>
                        <td><b>DNI</td>
                        <td><?= $user[0]["idCardNumber"] ?></td>
                    </tr>
                    <tr>
                        <td><b>E-mail</td>
                        <td><?= $user[0]["email"] ?></td>
                    </tr>
                    <tr>
                        <td><b>Número de teléfono</td>
                        <td><?= $user[0]["homePhone"] ?></td>
                    </tr>
                    <tr>
                        <td><b>Número de celular</td>
                        <td><?= $user[0]["mobilePhone"] ?></td>
                    </tr>
                </table>
                <div class="showAllData">
                    Mostrar todos los datos
                </div>
            </div>
            <hr>
            <h2>Medicamentos</h2>
            <div class="newMedicineBtn">
                    <i class="fas fa-plus"></i> Nuevo Medicamento
                </div>
            <table class="medicineList">
                
                <tr>
                    <th>Medicamento</th>
                    <th>Días</th>
                </tr>
                <tr>
                    <td>Paracetamol</td>
                    <td class="daysMedicine">
                        <div>D</div>
                        <div class="active">L</div>
                        <div>M</div>
                        <div>X</div>
                        <div>J</div>
                        <div class="active">V</div>
                        <div>S</div>
                        
                    </td>
                </tr>
                <tr>
                    <td>Tafirol</td>
                    <td class="daysMedicine">
                        <div>D</div>
                        <div>L</div>
                        <div>M</div>
                        <div>X</div>
                        <div>J</div>
                        <div>V</div>
                        <div>S</div>
                    </td>
                </tr>
            </table>
            


        </main>
    </div>
</body>
</html>

<?php
else:
    
?>
    <h1>No existe un paciente con esa identificación</h1>
<?php
endif;
    else:
?>
    <h1>No se seleccionó ningún paciente</h1>
<?php
    endif;

   
?>
