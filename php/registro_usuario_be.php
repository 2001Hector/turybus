<?php
    include 'conexion_be.php';

    $nombre_apellido = $_POST['nombre_apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario =$_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    //PARA ENCRIPTAR LAS CONTRASEÑAS
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO viajero(nombre_apellido, telefono, correo, usuario, contrasena)
              VALUES('$nombre_apellido', '$telefono', '$correo', '$usuario', '$contrasena')";
     
    //VERIFICAR QUE NO HAYA CORREOS IGUALES
    
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM viajero WHERE correo='$correo' ");
    
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("ESTE CORREO YA ESTA REGISTRADO, REGISTRATE CON UN CORREO DIFERENTE!");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    //VERIFICAR QUE NO SE REPITAN LOS NOMBRES DE USUARIOS EN LA BD
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM viajero WHERE usuario='$usuario' ");
    
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("ESTE USUARIO YA ESTA REGISTRADO, REGISTRATE CON UN USUARIO DIFERENTE!");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }



    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("USUARIO ALMACENADO CON EXITO!");
                window.location = "../index.php";
            </script>
        ';    

    }else{
        echo '
            <script>
                alert("USUARIO NO ALMACENADO, VUELVA A INTENTAR!");
                window.location = "../index.php";
            </script> 
        
        ';
    }

    mysqli_close($conexion);
