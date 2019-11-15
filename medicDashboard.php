<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medic Dashboard</title>
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
            <ul class="panelBtn">
                <li id="patientsBtn" class = "articleSelector active">Pacientes</li>
                <li id="notificationsBtn" class = "articleSelector">Notificaciones</li>
                <li id="addPatientBtn" class = "articleSelector">Añadir Nuevo Paciente</li>
            </ul>
            <section class="dashboard">
                <article id = "patients" class="patients">
                    <h2>PACIENTES</h2>
                    <form class="patientSearcher">
                        <input type="search" name="" id="search" class="" placeholder="Search Patient ID">
                    </form>
                    <table class="patientsTable">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>E-MAIL</th>
                                <th>TELÉFONO</th>
                                <th>DNI</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    $sql = $connection->prepare("SELECT id, name, surname, email, mobilePhone, idCardNumber FROM users");
                                    $sql->execute();
                        
                                    if($sql->rowCount() >= 1):
                                        $users = $sql->fetchAll();
                                        foreach($users as $user){
                                ?>
                                    <tr onclick="window.location='patientDashboard.php?id=<?= $user['id'] ?>';">
                                        <td><?= $user['surname'].", ".$user['name']?></td>
                                        <td><?= $user['email']?></td>
                                        <td><?= $user['mobilePhone']?></td>
                                        <td>
                                            <?php
                                                $dnis = explode ("-", $user['idCardNumber']); 
                                                foreach($dnis as $dni){
                                                    echo("$dni");
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                    endif;
                                ?>
    
                                
                        </tbody>
                    </table>
                </article>

                <article id="notifications" class="notifications">
                <h2>NOTIFICACIONES</h2>
                <table>
                    <thead>
                        <th>DNI</th>
                        <th>NOMBRE</th>
                        <th>AVISO</th>
                    </thead>  
                    <tbody>
                        <tr>
                            <td>
                                20390243
                            </td>
                            <td>Marcos Andino</td>
                            <td>
                                <ul>
                                    <li>No tomó la aspirineta a las 12:30</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>  
                </table>
                </article>

                <article id="addPatient" class="addPatient">
                <h2>AÑADIR NUEVO PACIENTE</h2>
                    <form action="savePatient.php" class="newPatient" id="registrationForm" method="POST">
                        <div class="contactData">
                            <h3>Datos Personales</h3>
                            <?= (isset($_SESSION['patientRegisterErrors']['name'])) ? $_SESSION['patientRegisterErrors']['name'] : null ?>
                            <input type="text" name="name" placeholder="Nombre(s)">
                            <?= (isset($_SESSION['patientRegisterErrors']['surname'])) ? $_SESSION['patientRegisterErrors']['surname'] : null ?>
                            <input type="text" name="surname" placeholder="Apellido(s)">                            
                            <h5>Fecha de Nacimiento</h5>
                            <?= (isset($_SESSION['patientRegisterErrors']['birthDay'])) ? $_SESSION['patientRegisterErrors']['birthDay'] : null ?>
                            <div class="dateBirth">
                                <select class="" name="birthDay" id="birthDay">
                                    <option class="selectDefault" value="">Día</option>
                                    <?php
                                        for ($i=1; $i<=28; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        } 
                                    ?>
                                </select>
                                <select class="selectBirth" name="birthMonth" id="birthMonth">
                                    <option class="selectDefault" value="">Mes</option>
                                    <?php 
                                        for ($i=1; $i<=11; $i++) {
                                            $month = date('F', mktime(0,0,0,$i, 1, date('Y')));
                                            echo "<option value='$i'>$month</option>";
                                        }     
                                    ?>                     
                                </select>
                                <select class="selectBirth" name="birthYear" id="birthYear">
                                    <option class="selectDefault" value="">Año</option>
                                    <?php 
                                        $year = date("Y");
                                        for ($i=1; $i<=120; $i++) {
                                            echo "<option value='$i'>$year</option>";
                                            $year--;
                                        }     
                                    ?>                           
                                </select>
                            </div>

                            <?= (isset($_SESSION['patientRegisterErrors']['gender'])) ? $_SESSION['patientRegisterErrors']['gender'] : null ?>
                            <select name="genderSelect" id="genderSelect">
                                <option class="selectDefault" value="">Seleccione su Género</option>
                                <option value="male">Hombre</option>
                                <option value="female">Mujer</option>
                            </select>
                            <h3>Identificadores</h3>
                            <?= (isset($_SESSION['patientRegisterErrors']['idCardNumber'])) ? $_SESSION['patientRegisterErrors']['idCardNumber'] : null ?>

                            <input type="number" name="id"  placeholder="DNI">

                            <h3>Datos de Contacto</h3>
                            <?= (isset($_SESSION['patientRegisterErrors']['homePhone'])) ? $_SESSION['patientRegisterErrors']['homePhone'] : null ?>
                            <input type="number" name="homePhone" placeholder="Teléfono de Casa">
                            <?= (isset($_SESSION['patientRegisterErrors']['mobilePhone'])) ? $_SESSION['patientRegisterErrors']['mobilePhone'] : null ?>
                            <input type="number" name="mobilePhone" placeholder="Teléfono Móvil">
                            <?= (isset($_SESSION['patientRegisterErrors']['email'])) ? $_SESSION['patientRegisterErrors']['email'] : null ?>
                            <input type="text" name="email" placeholder="Correo Electrónico">

                            <h3>Datos de Dirección</h3>
                            <h5>Dirección de Empadronamiento</h5>
                            <?= (isset($_SESSION['patientRegisterErrors']['adress'])) ? $_SESSION['patientRegisterErrors']['adress'] : null ?>
                            <!-- <input type="text" name="streetType" placeholder="Tipo de Vía"> -->
                            <input type="text" name="streetName" placeholder="Nombre de la Vía">
                            <input type="text" name="streetNumber" placeholder="Número">
                            <input type="text" name="departamentNumber" placeholder="Número de Departamento">
                            <input type="number" name="floorNumber" placeholder="Piso">
                            <!-- <input type="text" name="stairNumber" placeholder="Escalera"> -->
                            <?= (isset($_SESSION['patientRegisterErrors']['postalCode'])) ? $_SESSION['patientRegisterErrors']['postalCode'] : null ?>
                            <input type="text" name="postalCode" placeholder="Código Postal">
                            <?= (isset($_SESSION['patientRegisterErrors']['city'])) ? $_SESSION['patientRegisterErrors']['city'] : null ?>
                            <input type="text" name="city" placeholder="Ciudad">
                            <?= (isset($_SESSION['patientRegisterErrors']['state'])) ? $_SESSION['patientRegisterErrors']['state'] : null ?>
                            <input type="text" name="state" placeholder="Provincia">
                            <?= (isset($_SESSION['patientRegisterErrors']['country'])) ? $_SESSION['patientRegisterErrors']['country'] : null ?>
                            <input type="text" name="country" placeholder="País">

                            <h5>Dirección de Contacto</h5>
                            <!-- <input type="text" name="streetTypeContact" placeholder="Tipo de Vía"> -->
                            <?= (isset($_SESSION['patientRegisterErrors']['adressContact'])) ? $_SESSION['patientRegisterErrors']['adressContact'] : null ?>
                            <input type="text" name="streetNameContact" placeholder="Nombre de la Vía">
                            <input type="number" name="streetNumberContact" placeholder="Número">
                            <input type="number" name="departamentNumberContact" placeholder="Número de Departamento">
                            <input type="number" name="floorNumberContact" placeholder="Piso">
                            <!-- <input type="text" name="stairNumberContact" placeholder="Escalera"> -->
                            <?= (isset($_SESSION['patientRegisterErrors']['postalCodeContact'])) ? $_SESSION['patientRegisterErrors']['postalCodeContact'] : null ?>
                            <input type="text" name="postalCodeContact" placeholder="Código Postal">
                            <?= (isset($_SESSION['patientRegisterErrors']['cityContact'])) ? $_SESSION['patientRegisterErrors']['cityContact'] : null ?>
                            <input type="text" name="cityContact" placeholder="Ciudad">
                            <?= (isset($_SESSION['patientRegisterErrors']['stateContact'])) ? $_SESSION['patientRegisterErrors']['stateContact'] : null ?>
                            <input type="text" name="stateContact" placeholder="Provincia">
                            <?= (isset($_SESSION['patientRegisterErrors']['countryContact'])) ? $_SESSION['patientRegisterErrors']['countryContact'] : null ?>
                            <input type="text" name="countryContact" placeholder="País">


                            <h3>Datos de Acceso</h3>
                            <?= (isset($_SESSION['patientRegisterErrors']['user'])) ? $_SESSION['patientRegisterErrors']['user'] : null ?>
                            <input type="text" name="user" placeholder="Usuario">
                            <?= (isset($_SESSION['patientRegisterErrors']['password'])) ? $_SESSION['patientRegisterErrors']['password'] : null ?>
                            <input type="password" name="password" placeholder="Contraseña">
                            <input type="password" name="rePassword" placeholder="Confirmar Contraseña">

                            <button class="createPatientBtn" id="createPatientBtn">Crear Paciente</button>
                        </div>


                        <div class="medicalData">
                            <div>
                                <h3>Asignación de Dispositivo</h3>
                                <h4>Dispositivo</h4>
                                <?= (isset($_SESSION['patientRegisterErrors']['hardwareId'])) ? $_SESSION['patientRegisterErrors']['hardwareId'] : null ?>
                                <select name="hardwareId">
                                    <option class="selectDefault" value="">Seleccionar ID del Dispositivo</option>
                                    <option value="12345678">12345678</option>
                                    <option value="12354332">12354332</option>
                                    <option value="48483934">48483934</option>
                                    <option value="3483">3483</option>
                                </select>
                                <h4>Funciones</h4>
                                <hr>
                                <h5>Botón 1:</h5>
                                <p>Aviso de Consumo</p><br>
                                <h5>Botón 2:</h5>
                                <select name="function2">
                                    <option class="selectDefault" value="">Seleccionar función 2</option>
                                    <option value="">No asignar</option>
                                    <option value="Lorem1">Lorem1</option>
                                    <option value="Lorem2">Lorem2</option>
                                    <option value="Lorem3">Lorem3</option>
                                    <option value="Lorem4">Lorem4</option>
                                </select><br><br>
                                <h5>Botón 3:</h5>
                                <select name="function3">
                                    <option class="selectDefault" value="">Seleccionar función 3</option>
                                    <option value="">No asignar</option>
                                    <option value="Lorem1">Lorem1</option>
                                    <option value="Lorem2">Lorem2</option>
                                    <option value="Lorem3">Lorem3</option>
                                    <option value="Lorem4">Lorem4</option>
                                </select><br><br>
                                <h5>Botón 4:</h5>
                                <select name="function4">
                                    <option class="selectDefault" value="">Seleccionar función 4</option>
                                    <option value="">No asignar</option>
                                    <option value="Lorem1">Lorem1</option>
                                    <option value="Lorem2">Lorem2</option>
                                    <option value="Lorem3">Lorem3</option>
                                    <option value="Lorem4">Lorem4</option>
                                </select><br><br>
                            </div>
                            <div class="cieSearcher">
                                <h3>Diagnósticos Según CIE-10</h3>
                                <?= (isset($_SESSION['patientRegisterErrors']['diagnostics'])) ? $_SESSION['patientRegisterErrors']['diagnostics'] : null ?>
                                <input type="search" id="diagnosticSearcher" placeholder="Busque el diagnóstico">
                                <div class="diagnosticsDropbox">
                                    <button type="button" id="buttonDropbox" class="buttonDropbox">
                                        Seleccione el Diagnóstico
                                        <i class="fas fa-angle-down fa-1x"></i>
                                    </button>
                                    <!-- <select class="diagnostics" id="diagnostics">
                                        <option class="selectDefault" value="">Seleccione el Diagnóstico</option>
                                    </select> -->
                                    <ul class="diagnostics" id="diagnostics">

                                    </ul>
                                </div>
                            </div>  
                            
                            <table class="actualDiagnostics" id="cieList">
                                
                            </table>
                        </div>
                        
                    </form>
                </article>
            </section>
        </main>
        <aside>

        </aside>
    </div>
</body>
<script src="JQuery.js"></script>
<script src="DashboardJS.js"></script>
</html>