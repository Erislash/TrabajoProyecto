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
                    <form class="newPatient" action="" method="POST">
                        <div class="contactData">
                            <h3>Datos Personales</h3>
                            <input type="text" name="firstName"  placeholder="Nombre(s)">
                            <input type="text" name="lastName"  placeholder="Apellido(s)">
                            <h5>Fecha de Nacimiento</h5>
                            <div class="dateBirth">
                                
                                <select class="" name="" id="birthDay">
                                    <option value="">Día</option>
                                    <?php
                                        for ($i=1; $i<=28; $i++) {
                                            echo "<option value='$i'>$i</option>";
                                        } 
                                    ?>
                                </select>
                                <select class="selectBirth" name="" id="birthMonth">
                                    <option id="birthMonthPlaceHolder" value="">Mes</option>
                                    <?php 
                                        for ($i=1; $i<=11; $i++) {
                                            $month = date('F', mktime(0,0,0,$i, 1, date('Y')));
                                            echo "<option value='$i'>$month</option>";
                                        }     
                                    ?>                     
                                </select>
                                <select class="selectBirth" name="" id="birthYear">
                                    <option id="birthYearPlaceHolder" value="">Año</option>
                                    <?php 
                                        $year = date("Y");
                                        for ($i=1; $i<=120; $i++) {
                                            echo "<option value='$i'>$year</option>";
                                            $year--;
                                        }     
                                    ?>                           
                                </select>
                            </div>

                            <select name="" id="genderSelect">
                                <option id="genderPlaceHolder" value="">Género</option>
                                <option value="">Hombre</option>
                                <option value="">Mujer</option>
                            </select>
                            <h3>Identificadores</h3>
                            <input type="number" name="id"  placeholder="DNI">

                            <h3>Datos de Contacto</h3>
                            <input type="text" name="" placeholder="Teléfono de Casa">
                            <input type="text" name="" placeholder="Teléfono Móvil">
                            <input type="text" name="" placeholder="Correo Electrónico">

                            <h3>Datos de Dirección</h3>
                            <h5>Dirección de Empadronamiento</h5>
                            <input type="text" name="" placeholder="Tipo de Vía">
                            <input type="text" name="" placeholder="Nombre de la Vía">
                            <input type="text" name="" placeholder="Número">
                            <input type="text" name="" placeholder="Piso">
                            <input type="text" name="" placeholder="Escalera">
                            <input type="text" name="" placeholder="Código Postal">
                            <input type="text" name="" placeholder="Municipio">
                            <input type="text" name="" placeholder="Población">
                            <input type="text" name="" placeholder="Provincia">
                            <input type="text" name="" placeholder="País">

                            <h5>Dirección de Contacto</h5>
                            <input type="text" name="" placeholder="Tipo de Vía">
                            <input type="text" name="" placeholder="Nombre de la Vía">
                            <input type="text" name="" placeholder="Número">
                            <input type="text" name="" placeholder="Piso">
                            <input type="text" name="" placeholder="Escalera">
                            <input type="text" name="" placeholder="Código Postal">
                            <input type="text" name="" placeholder="Municipio">
                            <input type="text" name="" placeholder="Población">
                            <input type="text" name="" placeholder="Provincia">
                            <input type="text" name="" placeholder="País">


                            <h3>Datos de Acceso</h3>
                            <input type="text" name="" placeholder="Usuario">
                            <input type="password" name="" placeholder="Contraseña">
                            <input type="password" name="" placeholder="Confirmar Contraseña">
                        </div>


                        <div class="medicalData">
                            <div class="cieSearcher">
                                <h3>Diagnósticos Según CIE-10</h3>
                                <input type="search" id="diagnosticSearcher" placeholder="Busque el diagnóstico">
                                <select class="diagnostics" id="diagnostics" name="diagnostic">
                                    <option value="">Seleccione el Diagnóstico</option>
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