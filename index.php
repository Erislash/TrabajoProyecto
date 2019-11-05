<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome!</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
  <!-- font-family: 'Open Sans', sans-serif; -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="form">
      <ul class="selectAction">
        <li id="signBtn" class="btnSelect active">Registro</li>
        <li id="logBtn" class="btnSelect">Inicio</li>
      </ul>

      <form action="#" id="signUp" method="POST">
        <div class="sign">
          <div class="formGroup">
            <div class="field">
              <label for="firstName">Nombre</label>
              <input type="text" name="firstName" id="firstName">
            </div>
            <div class="field">
              <label for="lastName">Apellido</label>
              <input type="text" name="lastName" id="lastName">
            </div>
          </div>
          <div class="formGroup">
            <div class="field">
              <label for="id">DNI</label>
              <input type="text" name="id" id="id">
            </div> 
          </div>
          <div class="formGroup">
            <div class="field">
              <label for="email">E-mail</label>
              <input type="text" name="email" id="email">
            </div> 
          </div>
          <div class="formGroup">
              <div class="field">
                <label for="usernameSign">Usuario</label>
                <input type="text" name="usernameSign" id="usernameSign">
              </div>
          </div>
          <div class="formGroup">
              <div class="field">
                <label for="passwordSign">Contraseña</label>
                <input type="password" name="passwordSign" id="passwordSign">
              </div>
          </div>
          
          <button class="logBtn">COMENZAR</button>
        </div>
      </form>

      <form action="#" id="logIn" method="POST">
        <div class="log">
          <div class="formGroup">
              <div class="field">
                <label for="usernameLog">Usuario o DNI</label>
                <input type="text" name="usernameLog" id="usernameLog">
              </div>
          </div>
          <div class="formGroup">
              <div class="field">
                <label for="passwordLog">Contraseña</label>
                <input type="password" name="passwordLog" id="passwordLog">
              </div>
          </div>
          <button class="logBtn">INICIAR SESIÓN</button>
        </div>
        
      </form>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="JS.js"></script>

</html>