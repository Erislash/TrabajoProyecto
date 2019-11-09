<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medic Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
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
                <table>
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>E-MAIL</th>
                            <th>TELÉFONO</th>
                            <th>DIAGNÓSTICO (CIE-10)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Melandri, Marcos</td>
                            <td>mar@mel.com</td>
                            <td>+54 (2222)3224563</td>
                            <td>Insert CODE</td>
                        </tr>
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
                            <input type="text" name="name" placeholder="Nombre(s)">
                            <input type="text" name="surname" placeholder="Apellido(s)">                            <h5>Fecha de Nacimiento</h5>
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

                            <select name="genderSelect" id="genderSelect">
                                <option class="selectDefault" value="">Seleccione su Género</option>
                                <option value="">Hombre</option>
                                <option value="">Mujer</option>
                            </select>
                            <h3>Identificadores</h3>
                            <input type="number" name="id"  placeholder="DNI">

                            <h3>Datos de Contacto</h3>
                            <input type="text" name="homePhone" placeholder="Teléfono de Casa">
                            <input type="text" name="mobilePhone" placeholder="Teléfono Móvil">
                            <input type="text" name="email" placeholder="Correo Electrónico">

                            <h3>Datos de Dirección</h3>
                            <h5>Dirección de Empadronamiento</h5>
                            <input type="text" name="streetType" placeholder="Tipo de Vía">
                            <input type="text" name="streetName" placeholder="Nombre de la Vía">
                            <input type="text" name="streetNumber" placeholder="Número">
                            <input type="text" name="floorNumber" placeholder="Piso">
                            <input type="text" name="stairNumber" placeholder="Escalera">
                            <input type="text" name="postalCode" placeholder="Código Postal">
                            <input type="text" name="city" placeholder="Ciudad">
                            <input type="text" name="state" placeholder="Provincia">
                            <input type="text" name="country" placeholder="País">

                            <h5>Dirección de Contacto</h5>
                            <input type="text" name="streetTypeContact" placeholder="Tipo de Vía">
                            <input type="text" name="streetNameContact" placeholder="Nombre de la Vía">
                            <input type="text" name="streetNumberContact" placeholder="Número">
                            <input type="text" name="floorNumberContact" placeholder="Piso">
                            <input type="text" name="stairNumberContact" placeholder="Escalera">
                            <input type="text" name="postalCodeContact" placeholder="Código Postal">
                            <input type="text" name="cityContact" placeholder="Municipio">
                            <input type="text" name="stateContact" placeholder="Provincia">
                            <input type="text" name="countryContact" placeholder="País">


                            <h3>Datos de Acceso</h3>
                            <input type="text" name="user" placeholder="Usuario">
                            <input type="password" name="password" placeholder="Contraseña">
                            <input type="password" name="rePassword" placeholder="Confirmar Contraseña">

                            <button class="createPatientBtn" id="createPatientBtn">Crear Paciente</button>
                        </div>


                        <div class="medicalData">
                            <div>
                                <h3>Asignación de Dispositivo</h3>
                                <h4>Dispositivo</h4>
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
                                <input type="search" id="diagnosticSearcher" placeholder="Busque el diagnóstico">
                                <select class="diagnostics" id="diagnostics">
                                    <option class="selectDefault" value="">Seleccione el Diagnóstico</option>
                                </select>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="DashboardJS.js"></script>
</html>