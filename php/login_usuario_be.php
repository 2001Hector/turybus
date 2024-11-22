<?php
    session_start();
    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);
    
    
    $validar_admin = mysqli_query($conexion, "SELECT* FROM viajero where correo = 'admin1@gmail.com'
    and contrasena='$contrasena'");


    $validar_login = mysqli_query($conexion, "SELECT * FROM viajero where correo='$correo'
    and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_admin) > 0){
        $_SESSION['usuario'] = 'admin1@gmail.com';
        header("location: ../php/index1.php");
        exit;
    }

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        $usuario = mysqli_fetch_assoc($validar_login);
        header("location: ../php/FOLLETOCL.php?dni_viajero=" . $usuario['dni_viajero']);
        exit;
    }else{
        echo '
            <script>
                alert("CORREO O CONTRASEÑA INCORRECTA, VERIFIQUE SUS DATOS O REGISTRATE!");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }