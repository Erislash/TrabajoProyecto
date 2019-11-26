<pre>
<?php

    if(isset($_POST)){

        require_once('connection.php');

        $name = (isset($_POST['name'])) ? $_POST['name'] : NULL; 
        $surname = (isset($_POST['surname'])) ? $_POST['surname'] : NULL;

        $birthDay = (isset($_POST['birthDay'])) ? $_POST['birthDay'] : NULL;
        $birthMonth = (isset($_POST['birthMonth'])) ? $_POST['birthMonth'] : NULL;
        $birthYear = (isset($_POST['birthYear'])) ? $_POST['birthYear'] : NULL;

        $gender = (isset($_POST['genderSelect'])) ? $_POST['genderSelect'] : NULL;

        $idCardNumber = (isset($_POST['id'])) ? $_POST['id'] : NULL;

        $homePhone = (isset($_POST['homePhone'])) ? $_POST['homePhone'] : NULL;
        $mobilePhone = (isset($_POST['mobilePhone'])) ? $_POST['mobilePhone'] : NULL;
        $email = (isset($_POST['email'])) ? $_POST['email'] : NULL;

        // $streetType = (isset($_POST['streetType'])) ? $_POST['streetType'] : NULL;
        $streetName = (isset($_POST['streetName'])) ? $_POST['streetName'] : NULL;
        $streetNumber = (isset($_POST['streetNumber'])) ? $_POST['streetNumber'] : NULL;
        $departamentNumber = (isset($_POST['departamentNumber'])) ? $_POST['departamentNumber'] : NULL;
        $floorNumber = (isset($_POST['floorNumber'])) ? $_POST['floorNumber'] : NULL;
        // $stairNumber = (isset($_POST['stairNumber'])) ? $_POST['stairNumber'] : NULL;
        $postalCode = (isset($_POST['postalCode'])) ? $_POST['postalCode'] : NULL;
        $city = (isset($_POST['city'])) ? $_POST['city'] : NULL;
        $state = (isset($_POST['state'])) ? $_POST['state'] : NULL;
        $country = (isset($_POST['country'])) ? $_POST['country'] : NULL;

        // $streetTypeContact = (isset($_POST['streetTypeContact'])) ? $_POST['streetTypeContact'] : NULL;
        $streetNameContact = (isset($_POST['streetNameContact'])) ? $_POST['streetNameContact'] : NULL;
        $streetNumberContact = (isset($_POST['streetNumberContact'])) ? $_POST['streetNumberContact'] : NULL;
        $departamentNumberContact = (isset($_POST['departamentNumberContact'])) ? $_POST['departamentNumberContact'] : NULL;
        $floorNumberContact = (isset($_POST['floorNumberContact'])) ? $_POST['floorNumberContact'] : NULL;
        // $stairNumberContact = (isset($_POST['stairNumberContact'])) ? $_POST['stairNumberContact'] : NULL;
        $postalCodeContact = (isset($_POST['postalCodeContact'])) ? $_POST['postalCodeContact'] : NULL;
        $cityContact = (isset($_POST['cityContact'])) ? $_POST['cityContact'] : NULL;
        $stateContact = (isset($_POST['stateContact'])) ? $_POST['stateContact'] : NULL;
        $countryContact = (isset($_POST['countryContact'])) ? $_POST['countryContact'] : NULL;

        $user = (isset($_POST['user'])) ? $_POST['user'] : NULL;
        $password = (isset($_POST['password'])) ? $_POST['password'] : NULL;
        $rePassword = (isset($_POST['rePassword'])) ? $_POST['rePassword'] : NULL;

        $hardwareId = (isset($_POST['hardwareId'])) ? $_POST['hardwareId'] : NULL;
        $function2 = (isset($_POST['function2'])) ? $_POST['function2'] : NULL;
        $function3 = (isset($_POST['function3'])) ? $_POST['function3'] : NULL;
        $function4 = (isset($_POST['function4'])) ? $_POST['function4'] : NULL;

        $diagnostics = array();
        $diagnostics = (isset($_POST['diagnostics'])) ? $_POST['diagnostics'] : NULL;

        $errors = array();

        if(empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)){
            $errors['name'] = "<div class='registerError'>Nombre Inválido</div>";
        }

        if(empty($surname) || is_numeric($surname) || preg_match("/[0-9]/", $surname)){
            $errors['surname'] = "<div class='registerError'>Apellido Inválido</div>";
        }

        if(empty($birthDay) || !is_numeric($birthDay) || !preg_match("/^[1-9][0-9]*$/", $birthDay)){
            if(empty($birthMonth) || !is_numeric($birthMonth) || !preg_match("/^[1-9][0-9]*$/", $birthMonth)){
                if(empty($birthYear) || !is_numeric($birthYear) || !preg_match("/^[1-9][0-9]*$/", $birthYear)){
                    $errors['birthDay'] = "<div class='registerError'>La fecha de nacimiento no es válida</div>";
                }
            }
        }

        if(empty($gender) || is_numeric($gender) || preg_match("/[0-9]/", $gender)){
            $errors['gender'] = "<div class='registerError'>Género Inválido</div>";
        }

        if(strlen((string)$idCardNumber) > 8 || empty($idCardNumber) || !is_numeric($idCardNumber) || !preg_match("/^[1-9][0-9]*$/", $idCardNumber)){
            $errors['idCardNumber'] = "<div class='registerError'>El Número de DNI no es Válido</div>";
        }


        if(empty($homePhone) || !is_numeric($homePhone) || !preg_match("/[0-9]/", $homePhone)){
            $errors['homePhone'] = "<div class='registerError'>El Número de Teléfono no es Válido</div>";
        }

        if(empty($mobilePhone) || !is_numeric($mobilePhone) || !preg_match("/[0-9]/", $mobilePhone)){
            $errors['mobilePhone'] = "<div class='registerError'>El Número de Teléfono Velular no es Válido</div>";
        }

        if(empty($email) || !(filter_var($email, FILTER_VALIDATE_EMAIL))){
            $errors['email'] = "<div class='registerError'>El Email no es Válido</div>";
        }

        $legalAdress = "";

        $buildingAdress = true;
        if((empty($streetNumber) || !is_numeric($streetNumber) || !(preg_match("/[0-9]/", $streetNumber))) || 
            (empty($streetName) || is_numeric($streetName) || preg_match("/[0-9]/", $streetName))){
                $errors['adress'] = "<div class='registerError'>Domicilio Legal no es Válido</div>";
                $buildingAdress = false;
        }else{
            $legalAdress = $streetNameContact." ".$streetNumberContact;
        }
        if($buildingAdress){
            $adress = $streetName." ".$streetNumber;
            if(!empty($departamentNumber)){
                if(!empty($floorNumber) || is_numeric($floorNumber) || preg_match("/[0-9]/", $floorNumber)){
                    $legalAdress .= "Departamento ".$departamentNumber." piso ".$floorNumber;
                }
            }
        }
        if(empty($postalCode) || !is_numeric($postalCode) || !preg_match("/^[1-9][0-9]*$/", $postalCode)){
            $errors['postalCode'] = "<div class='registerError'>El Código Postal no es Válido</div>";
        }
        if(empty($city) || is_numeric($city) || preg_match("/[0-9]/", $city)){
            $errors['city'] = "<div class='registerError'>Ciudad no Válida</div>";
        }
        if(empty($state) || is_numeric($state) || preg_match("/[0-9]/", $state)){
            $errors['state'] = "<div class='registerError'>La Provincia/Estado no es Válido</div>";
        }
        if(empty($country) || is_numeric($country) || preg_match("/[0-9]/", $country)){
            $errors['country'] = "<div class='registerError'>El País no es Válido</div>";
        }



        $contactBuildingAdress = true;
        if((empty($streetNumberContact) || !is_numeric($streetNumberContact) || !(preg_match("/[0-9]/", $streetNumberContact))) || 
            (empty($streetNameContact) || is_numeric($streetNameContact) || preg_match("/[0-9]/", $streetNameContact))){
                $errors['adressContact'] = "<div class='registerError'>El Domicilio de Contacto no es Válido</div>";
                $contactBuildingAdress = false;
        }
        if($contactBuildingAdress){
            $contactAdress = $streetNameContact." ".$streetNumberContact;
            if(!empty($departamentNumberContact)){
                if(!empty($floorNumberContact) || is_numeric($floorNumberContact) || preg_match("/[0-9]/", $floorNumberContact)){
                    $contactAdress .= "Departamento ".$departamentNumberContact." piso ".$floorNumberContact;
                }
            }
        }
        if(empty($postalCodeContact) || !is_numeric($postalCodeContact) || !preg_match("/^[1-9][0-9]*$/", $postalCodeContact)){
            $errors['postalCodeContact'] = "<div class='registerError'>El Código postal de Contacto no es Válido</div>";
        }
        if(empty($cityContact) || is_numeric($cityContact) || preg_match("/[0-9]/", $cityContact)){
            $errors['cityContact'] = "<div class='registerError'>La Ciudad de Contacto no es Válida</div>";
        }
        if(empty($stateContact) || is_numeric($stateContact) || preg_match("/[0-9]/", $stateContact)){
            $errors['stateContact'] = "<div class='registerError'>Provincia/Estado de Contacto Inválido</div>";
        }
        if(empty($countryContact) || is_numeric($countryContact) || preg_match("/[0-9]/", $countryContact)){
            $errors['countryContact'] = "<div class='registerError'>País de Contacto Inválido</div>";
        }



        if(empty($user)){
            $errors['user'] = "<div class='registerError'>Debe Ingresar un Usuario</div>";
        }
        if(empty($password))
            $errors['password'] = "<div class='registerError'>Debe Ingresar una Contraseña</div>";
        else{
            if(strlen((string)$password) >= 8){
                if($password != $rePassword)
                    $errors['password'] = "<div class='registerError'>Las Contraseñas no Coinciden</div>";
            }else
                $errors['password'] = "<div class='registerError'>La Contraseña Debe Tener al Menos 8 Caracteres</div>";
        }

        
        if(empty($hardwareId))
            $errors['hardwareId'] = "<div class='registerError'>Debe Asignarle al Paciente un Dispositivo</div>";
        

        if(empty($diagnostics))
            $errors['diagnostics'] = "<div class='registerError'>No Asignó Ningún Diagnóstico</div>";
        
            
        $saveUser = false;
        $message = "";


        $birthDate = "$birthYear-$birthMonth-$birthDay 12:00:00";


		if(count($errors) == 0){
            $saveUser = true;

            if(!isset($errors['password']))
            $securePassword = password_hash($password, PASSWORD_BCRYPT, ['cost'=>12]);

            

            $diag = "";
            foreach($diagnostics as $diagnostic){
                $diag .= "$diagnostic"."-";
            }
            $diag = substr($diag, 0, -1);


            $sql = $connection->prepare("INSERT INTO users VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $sql->execute([$idCardNumber,$name,$surname,$email,$user,$securePassword,$birthDate,$gender,$homePhone,$mobilePhone,$legalAdress,$postalCode,$city,$state,$country,$contactAdress,$postalCodeContact,$cityContact,$stateContact,$countryContact,$hardwareId,$function2,$function3,$function4,$diag]);
            
            $message['save'] = "Se ha Guardado el Nuevo Paciente";
        }


    }
    $_SESSION['patientRegisterErrors'] = $errors;
    $_SESSION['patientRegisterMessages'] = $message;

    echo($_SESSION['patientRegisterErrors']['name']);
    

    header('Location: medicDashboard.php');
?>
</pre>