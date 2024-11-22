<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("PRIMERO INICIA SESION!");
            window.location = "../index.php";
        </script>
    
    ';
    session_destroy();
    die();
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Turismo</title>
    <link rel="icon" href="../assets/images/logo.ico">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-----  ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <?php
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyecto_final";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    ?>

    <header id="main-header">

        <i><a id="logo-header" href="#">
                <span class="site-name">TURYBUS</span>
                <span class="site-desc">turismo / Viajes / Experiencias </span>
            </a> </i>
        <BR>
        <a href="../php/cerrar_sesion.php " class="shadow-effect">SALIR </a><br>
        <a class="shadow-effect" href="table.php" >Table</a>
    </header>


    <h1>ADMINISTRADOR </h1>
    







    <h2>Formulario de Clientes</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Dni viajero <input type="text" name="dni_viajero"><br>
        Nombre y Apellido <input type="text" name="nombre_apellido"><br>

        telefono <input type="text" name="telefono"><br><br>
        <input type="submit" name="submit_cliente" value="Agregar Cliente1" class="shadow-effect">
    </form>
    <h2>Formulario de vehiculo</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        ID matricula <input type="text" name="id_matricula"><br>
        Modelo <input type="text" name="modelo"><br>
        Fabricante <input type="text" name="fabricante"><br>
        Numero_plazas <input type="int" name="numero_plazas" class="number-input"><br>
        Caracteristicas <input type="text" name="caracteristicas"><br>
        <input type="submit" name="submit_autobus" value="agregar vehiculo" class="shadow-effect">
    </form>
    <h2>Formulario de conductor</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Dni <input type="text" name="dni"><br>
        Nombre <input type="text" name="nombre"><br>
        Apellido <input type="text" name="apellido"><br>
        Telefono <input type="text" name="telefono"><br>
        Direccion <input type="text" name="dirreccion"><br>
        <input type="submit" name="submit_conductor" value="Agregar conductor" class="shadow-effect">

    </form>
    <h2>Rutas</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        Ruta <input type="text" name="ruta"><br><br>
        Fecha de salida <input type="date" name="fecha_salida" class="date-input"><br><br>
        Hora de salida <input type="time" name="horario_salida"><br><br>
        Demanda <input type="text" name="demanda"><br><br>
        Kilometros en ruta <input type="number" name="kilometros_ruta"><br><br>
        Conductor
        <select name="nombre_conductor">
            <?php

            // Consulta SQL para obtener nombres de conductores
            $sql = "SELECT dni, nombre FROM conductor";
            $result = $conn->query($sql);

            // Generar opciones para la lista desplegable
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["dni"] . "'>" . $row["nombre"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay conductores disponibles</option>";
            }



            ?>
        </select>
        <br><br>
        Matricula bus
        <select name="id_matricula">
            <?php

            // Consulta SQL para obtener nombres de conductores
            $sql = "SELECT id_matricula, modelo FROM autobus";
            $result = $conn->query($sql);

            // Generar opciones para la lista desplegable
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_matricula"] . "'>" . $row["id_matricula"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vehiculos disponibles</option>";
            }



            ?>
        </select>


        <br><br>
        <input type="submit" name="submit_ruta" value="Agregar ruta" class="shadow-effect">
    </form>
    <h2>Folleto</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Ruta
        <select name="id_ruta">
            <?php

            // Consulta SQL para obtener nombres de conductores
            $sql = "SELECT id_ruta, ruta FROM servicios_diarios";
            $result = $conn->query($sql);

            // Generar opciones para la lista desplegable
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_ruta"] . "'>" . $row["ruta"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vehiculos disponibles</option>";
            }



            ?>
        </select>
        <br><br>
        Dias disponibles <input type="text" name="dias_programados"><br><br>
        <input type="submit" name="submit_folleto" value="guardar" class="shadow-effect">
    </form>
    <h2>Billete</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Ruta
        <select name="id_ruta">
            <?php

            // Consulta SQL para obtener nombres de conductores
            $sql = "SELECT id_ruta, ruta FROM servicios_diarios";
            $result = $conn->query($sql);

            // Generar opciones para la lista desplegable
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_ruta"] . "'>" . $row["ruta"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vehiculos disponibles</option>";
            }



            ?>
        </select>
        <br><br>
        Importe <input type="text" name="importe"> <br><br>
        Hora llegada <input type="time" name="hora_llegada"><br><br>
        Cliente
        <select name="dni_viajero">
            <?php

            // Consulta SQL para obtener nombres de conductores
            $sql = "SELECT dni_viajero, nombre_apellido FROM viajero";
            $result = $conn->query($sql);

            // Generar opciones para la lista desplegable
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["dni_viajero"] . "'>" . $row["nombre_apellido"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vehiculos disponibles</option>";
            }



            ?>
        </select>
        <input type="submit" name="submit_billete" value="comprar billete" class="shadow-effect">
    </form>

    <h2>Cronograma</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
        Ruta
        <select name="id_ruta">
            <?php

            // Consulta SQL para obtener nombres de conductores
            $sql = "SELECT id_ruta, ruta FROM servicios_diarios";
            $result = $conn->query($sql);

            // Generar opciones para la lista desplegable
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id_ruta"] . "'>" . $row["ruta"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay vehiculos disponibles</option>";
            }



            ?>
        </select>
        <br><br>
        lugares relevantes <input type="text" name="lugar_relevante">
        Actividad <input type="text" name="actividad"><br>
        Tiempo parada <input type="time" name="tiempo_parada"><br><br>
        <input type="file" name="imagen" accept="image/*">
        <input type="submit" name="submit_actividad" value="Agregar actividad" class="shadow-effect">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $totalFiles = count($_FILES['fileImg']['name']);
        $filesArray = array();

        for ($i = 0; $i < $totalFiles; $i++) {
            $imageName = $_FILES["fileImg"]["name"][$i];
            $tmpName = $_FILES["fileImg"]["tmp_name"][$i];

            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = uniqid() . '.' . $imageExtension;

            move_uploaded_file($tmpName, 'uploads/' . $newImageName);
            $filesArray[] = $newImageName;
        }

        $filesArray = json_encode($filesArray);
        $query = "INSERT INTO tb_images VALUES('', '$name', '$filesArray')";
        mysqli_query($conn, $query);
        echo
        "
  <script>
    alert('Añadido exitosamente');
   
  </script>
  ";
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        descripción
        <input type="text" name="name" required> <br>
        Imagen
        <div style="position: relative;">
            <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple style="
    padding: 10px 20px;
    border: 2px solid #4CAF50;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
    opacity: 0; /* Oculta el input de archivo */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
  ">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                <span style="color: white;" class="shadow-effect">Elegir archivo</span><br>
            </div><br><br>
        </div>
        <br><br>
        <button type="submit" name="submit" class="shadow-effect">Guardar</button>
    </form>
    <br>





    <br><br>
    <h1>MUESTRAS DE TABLAS</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 20%; padding: 10px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); margin: 0 auto; text-align: center; margin-bottom: 20px;">
        <input type="submit" name="ver_consulta" value="Ver rutas" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_folleto" value="Ver folleto" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_billete" value="Ver billete" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_cronograma" value="Ver cronograma" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_media" value="Ver media de viajeros" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_km" value="Km rrecorridos por conductores" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_autobus" value="Km recorridos por buses" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_autobus_mas_recorrido" value="Buses con mas km recorridos" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_cliente_mas_viajo" value="Clientes que mas han viajado" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_chofer_mas_km" value="Conductores que mas han viajado" class="shadow-effect" style="margin-right: 10px;"><br><br>
        <input type="submit" name="ver_horas" value="Horas viajadas por clientes" class="shadow-effect">
    </form>
    <br><br>

    <?php


    // Procesamiento de los formularios


    if (isset($_POST['submit_cliente'])) {
        // Obtener datos del formulario de clientes
        $dni_viajero = $_POST['dni_viajero'];
        $nombre_apellido = $_POST['nombre_apellido'];
        $telefono = $_POST['telefono'];

        // Consulta SQL para insertar un nuevo cliente
        if (empty($dni_viajero)) {
            echo "<p class='error'>* Agrege su dni </p>";
        }
        if (empty($nombre_apellido)) {
            echo "<p class='error'>* Agrege sus nombres y apellidos </p>";
        }
        if (empty($telefono)) {
            echo "<p class='error'>* Agrege su telefono </p>";
        }

        if (!empty($_POST['dni_viajero']) && !empty($_POST['nombre_apellido']) && !empty($_POST['telefono'])) {
            $sql = "INSERT INTO viajero (dni_viajero,nombre_apellido,telefono)
            VALUES ('$dni_viajero','$nombre_apellido', '$telefono')";
            echo "Cliente agregado correctamente.";
            if ($conn->query($sql) === TRUE) {
                // Asignar el valor de dni_viajero al campo de texto del formulario "Ver billete"
                echo "<script>document.getElementById('dni_viajero_ver_billete').value = '1010130961';</script>";
            }
        }
    }


    if (isset($_POST['submit_autobus'])) {
        // Obtener datos del formulario de autobus
        $id_matricula = $_POST['id_matricula'];
        $modelo = $_POST['modelo'];
        $fabricante = $_POST['fabricante'];
        $numero_plazas = $_POST['numero_plazas'];
        $caracteristicas = $_POST['caracteristicas'];

        // Consulta SQL para insertar un nuevo autobus
        if (empty($id_matricula)) {
            echo "<p class='error'>* Agregar la matricula del autobus </p>";
        }
        if (empty($modelo)) {
            echo "<p class='error'>* Agregar el modelo del autobus </p>";
        }
        if (empty($numero_plazas)) {
            echo "<p class='error'>* Agregar el numero de plazar del autobus </p>";
        }
        if (empty($caracteristicas)) {
            echo "<p class='error'>* Agregar las caracteristicas del autobus </p>";
        }

        if (!empty($_POST['id_matricula']) && !empty($_POST['fabricante']) && !empty($_POST['numero_plazas']) && !empty($_POST['caracteristicas'])) {
            $sql = "INSERT INTO autobus (id_matricula,modelo,fabricante,numero_plazas,caracteristicas)
                VALUES ('$id_matricula','$modelo', '$fabricante', '$numero_plazas','$caracteristicas')";

            if ($conn->query($sql) === TRUE) {
                echo "autobus agregado correctamente.";
            }
        } else {
            echo "Error al agregar autobus: " . $conn->error;
        }
    }


    if (isset($_POST['submit_conductor'])) {
        // Obtener datos del formulario de autobus
        // Obtener datos del formulario de clientes
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['dirreccion'];

        if (empty($dni)) {
            echo "<p class='error'>* Agregar el dni del conductor </p>";
        }
        if (empty($nombre)) {
            echo "<p class='error'>* Agregar el nombre del conductor </p>";
        }
        if (empty($apellido)) {
            echo "<p class='error'>* Agregar el apellido del conductor </p>";
        }
        if (empty($telefono)) {
            echo "<p class='error'>* Agregar el telefono del conductor </p>";
        }
        if (empty($direccion)) {
            echo "<p class='error'>* Agregar la direccion de la residencia del conductor </p>";
        }

        if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['dirreccion'])) {
            $sql = "INSERT INTO conductor (dni,nombre,apellido,telefono,dirreccion)
            VALUES ('$dni', '$nombre', '$apellido', '$telefono','$direccion')";

            if ($conn->query($sql) === TRUE) {
                echo "condctor agregado correctamente.";
            }
        } else {
            echo "Error al agregar conductor: " . $conn->error;
        }
    }


    if (isset($_POST['submit_ruta'])) {
        // Obtener datos del formulario de clientes

        $ruta = $_POST['ruta'];
        $fecha_salida = $_POST['fecha_salida'];
        $horario_salida = $_POST['horario_salida'];
        $demanda = $_POST['demanda'];
        $nombre_conductor = $_POST['nombre_conductor'];
        $id_matricula = $_POST['id_matricula'];
        $kilometros_ruta = $_POST['kilometros_ruta'];

        //$id_ruta = rand(1,1000);
        // Consulta SQL para insertar un nueva ruta
        if (empty($ruta)) {
            echo "<p class='error'>* Agregar el nomre de la ruta </p>";
        }
        if (empty($horario_salida)) {
            echo "<p class='error'>* Seleccione la hora de salida de la ruta </p>";
        }
        if (empty($demanda)) {
            echo "<p class='error'>* Agregar la demanda de la ruta </p>";
        }
        if (empty($nombre_conductor)) {
            echo "<p class='error'>* Seleccione el nombre del conductor </p>";
        }
        if (empty($id_matricula)) {
            echo "<p class='error'>* Seleccione la matricula del autobus ";
        }
        if (empty($kilometros_ruta)) {
            echo "<p class='error'>* Agregar la cantidad de kilometros de la ruta </p>";
        }

        if (!empty($_POST['ruta']) && !empty($_POST['horario_salida']) && !empty($_POST['demanda']) && !empty($_POST['nombre_conductor']) && !empty($_POST['id_matricula']) && !empty($_POST['kilometros_ruta'])) {
            $sql = "INSERT INTO servicios_diarios (ruta,horario_salida,demanda,nombre_conductor,id_matricula,kilometros_ruta)
                VALUES ('$ruta','$horario_salida','$demanda', '$nombre_conductor' ,'$id_matricula',$kilometros_ruta)";

            if ($conn->query($sql) === TRUE) {
                echo "Ruta agregada correctamente.";
            }
        } else {
            echo "Error al agregar ruta: " . $conn->error;
        }
    }

    if (isset($_POST['submit_folleto'])) {
        // Obtener datos del formulario de clientes
        $id_ruta = $_POST['id_ruta'];
        $dias_programados = $_POST['dias_programados'];


        if (empty($id_ruta)) {
            echo "<p class='error'>* Seleccione el id e la ruta </p>";
        }
        if (empty($dias_programados)) {
            echo "<p class='error'>* Agregarlos dias disponibles de la ruuta </p>";
        }
        //validacion si algun dato falta en el formulario el contador aumentara y no se gardara la informacion en la base de datos
        if (!empty($_POST['id_ruta']) && !empty($_POST['dias_programados'])) {
            $sql = "INSERT INTO folleto (id_ruta,dias_programados)
            VALUES ('$id_ruta','$dias_programados')";

            if ($conn->query($sql) === TRUE) {
                echo "Folleto agregado correctamente.";
            }
        } else {
            echo "Error al agregar folleto: " . $conn->error;
        }
    }


    if (isset($_POST['submit_billete'])) {
        // Obtener datos del formulario de clientes
        $id_ruta = $_POST['id_ruta'];
        $importe = $_POST['importe'];
        $hora_llegada = $_POST['hora_llegada'];
        $dni_viajero = $_POST['dni_viajero'];

        if (empty($id_ruta)) {
            echo "<p class='error'>* Seleccione el id e la ruta </p>";
        }
        if (empty($importe)) {
            echo "<p class='error'>* Ingrese el importe del billete </p>";
        }
        if (empty($hora_llegada)) {
            echo "<p class='error'>* Ingrese la hora de llegada de la ruta </p>";
        }
        if (empty($dni_viajero)) {
            echo "<p class='error'>* Ingrese el dni del viajero </p>";
        }
        // Consulta SQL para insertar un nuevo billete
        if (!empty($_POST['id_ruta']) && !empty($_POST['importe']) && !empty($_POST['hora_llegada']) && !empty($_POST['dni_viajero'])) {
            $sql = "INSERT INTO billete (id_ruta,importe,hora_llegada,dni_viajero)
                VALUES ('$id_ruta','$importe','$hora_llegada','$dni_viajero')";

            if ($conn->query($sql) === TRUE) {
                echo "Billete agregado correctamente.";
            }
        } else {
            echo "Error al agregar billete: " . $conn->error;
        }
    }
    if (isset($_POST['submit_actividad'])) {
        if(isset($_FILES['imagen'])) {
            $id_ruta = $_POST['id_ruta'];
            $lugar_relevante = $_POST['lugar_relevante'];
            $actividad = $_POST['actividad'];
            $tiempo_parada = $_POST['tiempo_parada'];
            // Establecer la carpeta donde se guardarán las imágenes
            $carpeta_destino = 'C:/xampp/htdocs/images/'; // Ruta completa al directorio de imágenes
    
            // Obtener el nombre y la ruta temporal del archivo subido
            $nombre_imagen = $_FILES['imagen']['name'];
            $ruta_temporal = $_FILES['imagen']['tmp_name'];
    
            // Crear la ruta completa de destino para mover la imagen
            $ruta_destino = $carpeta_destino . $nombre_imagen;
    
            // Mover la imagen a la carpeta destino
            if(move_uploaded_file($ruta_temporal, $ruta_destino)) {
                // Guardar la ruta de la imagen en la base de datos
                $ruta_db = 'images/' . $nombre_imagen; // Ruta relativa
               
    
                $sql = "INSERT INTO cronograma (id_ruta,lugar_relevante,actividad,tiempo_parada, ruta) VALUES ('$id_ruta','$lugar_relevante','$actividad','$tiempo_parada', '$ruta_db')";
    
                if ($conn->query($sql) === TRUE) {
                    echo "Imagen subida exitosamente.<br>";
                } else {
                    echo "Error al subir la imagen a la base de datos: " . $conn->error;
                }
            } else {
                echo "Error al mover la imagen a la carpeta de destino.";
            }
        } else {
            echo "No se ha seleccionado ninguna imagen.";
        }
    }


    // Ver la consulta

    if (isset($_POST['ver_consulta'])) {
        // Consulta SQL para mostrar pedidos con información de clientes


        $sql = "SELECT servicios_diarios.*, conductor.nombre AS nombre_conductor
        FROM servicios_diarios
        JOIN conductor ON servicios_diarios.nombre_conductor = conductor.dni";


        $result = $conn->query($sql);


        // Mostrar resultados en una tabla
        if ($result->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            echo "<table border='1'>
            <tr>
            <th>Ruta</th>
            <th>Horario de Salida</th>
            <th>Demanda</th>
            <th>Nombre del Conductor</th>
            <th>ID de la Matrícula</th>
            <th>kilometrs</th>
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ruta"] . "</td>";
                echo "<td>" . $row["horario_salida"] . "</td>";
                echo "<td>" . $row["demanda"] . "</td>";
                echo "<td>" . $row["nombre_conductor"] . "</td>";
                echo "<td>" . $row["id_matricula"] . "</td>";
                echo "<td>" . $row["kilometros_ruta"] . "</td>";
                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
    if (isset($_POST['ver_folleto'])) {
        // Consulta SQL para mostrar pedidos con información de clientes




        $sql = "SELECT folleto.*, servicios_diarios.ruta AS nombre_ruta
        FROM folleto
        JOIN servicios_diarios ON folleto.id_ruta = servicios_diarios.id_ruta";

        $result = $conn->query($sql);


        // Mostrar resultados en una tabla
        if ($result->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='2'>Folleto</th>
            </tr>
            <tr>
            <th>Ruta</th>
            <th>dia de salida</th>
            
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["nombre_ruta"] . "</td>";
                echo "<td>" . $row["dias_programados"] . "</td>";
                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
    if (isset($_POST['ver_billete'])) {
        // Consulta SQL para mostrar pedidos con información de clientes


        $sql = "SELECT billete.*, servicios_diarios.ruta AS nombre_ruta,servicios_diarios.horario_salida AS horario_salida,viajero.nombre_apellido AS nombre_cliente
        FROM billete
        JOIN servicios_diarios ON billete.id_ruta = servicios_diarios.id_ruta
        JOIN viajero ON billete.dni_viajero = viajero.dni_viajero";





        $result = $conn->query($sql);


        // Mostrar resultados en una tabla
        if ($result->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'>billete</th>
            </tr>
            <tr>
            <th>Ruta</th>
            <th>horario de salida</th>
            <th>importe</th>
            <th>hora llegada</th>
            <th>cliente</th>
            
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["nombre_ruta"] . "</td>";
                echo "<td>" . $row["horario_salida"] . "</td>";
                echo "<td>" . $row["importe"] . "</td>";
                echo "<td>" . $row["hora_llegada"] . "</td>";
                echo "<td>" . $row["nombre_cliente"] . "</td>";

                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
    if (isset($_POST['ver_cronograma'])) {


        $sql = "SELECT cronograma.*, servicios_diarios.ruta AS ruta_billete 
        FROM cronograma
        JOIN billete ON cronograma.id_ruta= billete.id_ruta
        join servicios_diarios on billete.id_ruta= servicios_diarios.id_ruta";




        $result = $conn->query($sql);


        // Mostrar resultados en una tabla
        if ($result->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'></th>
            </tr>
            <tr>
            <th>Ruta</th>
            <th>lugar_relevante</th>
            <th>actividad</th>
            <th>tiempo parada</th>
            
            
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["ruta_billete"] . "</td>";
                echo "<td>" . $row["lugar_relevante"] . "</td>";
                echo "<td>" . $row["actividad"] . "</td>";
                echo "<td>" . $row["tiempo_parada"] . "</td>";

                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
    if (isset($_POST['ver_media'])) {




        $sql = "SELECT servicios_diarios.ruta AS ruta_billete, COUNT(billete.dni_viajero) AS cantidad_clientes
        FROM billete
        JOIN servicios_diarios ON billete.id_ruta = servicios_diarios.id_ruta
        GROUP BY servicios_diarios.ruta";




        $result = $conn->query($sql);


        // Mostrar resultados en una tabla
        if ($result->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'></th>
            </tr>
            <tr>
            <th>Rutas</th>
            <th>personas que compraron esa ruta</th>
            
            
            
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["ruta_billete"] . "</td>";
                echo "<td>" . $row["cantidad_clientes"] . "</td>";


                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }


    if (isset($_POST['ver_cliente_mas_viajo'])) {
        $sql = "SELECT 
        viajero.nombre_apellido AS nombre_apellido,
        billete.dni_viajero,
        COUNT(billete.id_billete) AS cantidad_viajes,
        SUM(servicios_diarios.kilometros_ruta) AS kilometros_recorridos
    FROM 
        billete
    JOIN 
        viajero ON billete.dni_viajero = viajero.dni_viajero
    JOIN 
        servicios_diarios ON billete.id_ruta = servicios_diarios.id_ruta
    GROUP BY 
        nombre_apellido, billete.dni_viajero
    ORDER BY 
        cantidad_viajes DESC
    LIMIT 10;";




        $result = $conn->query($sql);


        // Mostrar resultados en una tabla
        if ($result->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'></th>
            </tr>
            <tr>
            <th>nombres y apellido</th>
            <th>dni_viajero</th>
            <th> de viajes</th>
            <th>kilometros recorridos</th>
            
            
            
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row["nombre_apellido"] . "</td>";
                echo "<td>" . $row["dni_viajero"] . "</td>";
                echo "<td>" . $row["cantidad_viajes"] . "</td>";
                echo "<td>" . $row["kilometros_recorridos"] . "</td>";


                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }

    if (isset($_POST['ver_chofer_mas_km'])) {




        $sql = "SELECT 
        c.dni AS dni, 
        c.nombre AS nombre, 
        SUM(sd.kilometros_ruta) AS total_kilometros
    FROM 
        conductor c
    JOIN 
        servicios_diarios sd ON c.dni = sd.nombre_conductor
    GROUP BY 
        c.dni, 
        c.nombre
    ORDER BY 
        total_kilometros DESC
    LIMIT 10;";


$result = $conn->query($sql);


// Mostrar resultados en una tabla
if ($result->num_rows > 0) {
    // Imprimir los resultados en una tabla HTML
    echo "<table border='1'>
    <tr>
    <th colspan='4'></th>
    </tr>
    <tr>
    <th>dni</th>
    <th>nombre del chofer</th>
    <th>kilometros recorridos</th>
    
    
    
    </tr>";

    // Iterar sobre los resultados y mostrar cada fila en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $row["dni"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["total_kilometros"] . "</td>";


        echo "</tr>";
    }

    // Cerrar la tabla
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
    }




    if (isset($_POST['ver_km'])) {




        $sql = "UPDATE conductor AS c
        SET km_conductor = km_conductor + (
            SELECT SUM(kilometros_ruta)
            FROM servicios_diarios AS sd
            WHERE sd.nombre_conductor = c.dni
        )";

        $result = $conn->query($sql);
        $sql2 = "SELECT nombre, km_conductor FROM conductor";
        $result2 = $conn->query($sql2);


        // Mostrar resultados en una tabla
        if ($result2->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            // Mostrar la tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'></th>
            </tr>
            <tr>
            <th>nombre conductor</th>
            <th>KM Totales del conductor</th>
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result2->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["km_conductor"] . "</td>";
                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }

    

    if (isset($_POST['ver_autobus_mas_recorrido'])) {




        $sql = "SELECT 
        a.id_matricula AS matricula, 
        a.fabricante AS fabricante, 
        SUM(sd.kilometros_ruta) AS total_kilometros
    FROM 
        autobus a
    JOIN 
        servicios_diarios sd ON a.id_matricula = sd.id_matricula
    GROUP BY 
        a.id_matricula, 
        a.fabricante
    ORDER BY 
        total_kilometros DESC
    LIMIT 10;";


$result = $conn->query($sql);


// Mostrar resultados en una tabla
if ($result->num_rows > 0) {
    // Imprimir los resultados en una tabla HTML
    echo "<table border='1'>
    <tr>
    <th colspan='4'></th>
    </tr>
    <tr>
    <th>matricula</th>
    <th>fabricante</th>
    <th>kilometros recorridos</th>
    
    
    
    </tr>";

    // Iterar sobre los resultados y mostrar cada fila en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $row["matricula"] . "</td>";
        echo "<td>" . $row["fabricante"] . "</td>";
        echo "<td>" . $row["total_kilometros"] . "</td>";


        echo "</tr>";
    }

    // Cerrar la tabla
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
    }


    if (isset($_POST['ver_autobus'])) {




        $sql = "UPDATE autobus AS a
        SET km_autobus = km_autobus + (
            SELECT SUM(kilometros_ruta)
            FROM servicios_diarios AS sd
            WHERE sd.id_matricula = a.id_matricula
        )";

        $result = $conn->query($sql);
        $sql2 = "SELECT id_matricula, km_autobus FROM autobus";
        $result2 = $conn->query($sql2);


        // Mostrar resultados en una tabla
        if ($result2->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            // Mostrar la tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'></th>
            </tr>
            <tr>
            <th>matricula</th>
            <th>KM Totales del Autobús</th>
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result2->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_matricula"] . "</td>";
                echo "<td>" . $row["km_autobus"] . "</td>";
                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }
    if (isset($_POST['ver_horas'])) {




        $sql = "UPDATE viajero 
        SET horas_viaje =horas_viaje + (
            SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(
                CASE
                    WHEN billete.hora_llegada >= servicios_diarios.horario_salida THEN
                        TIMEDIFF(billete.hora_llegada, servicios_diarios.horario_salida)
                    ELSE
                        TIMEDIFF(servicios_diarios.horario_salida, billete.hora_llegada)
                END
            )))
            FROM servicios_diarios
            JOIN billete ON servicios_diarios.id_ruta = billete.id_ruta
            WHERE viajero.dni_viajero = billete.dni_viajero
        )
        WHERE EXISTS (
            SELECT 1
            FROM servicios_diarios
            JOIN billete ON servicios_diarios.id_ruta = billete.id_ruta
            WHERE viajero.dni_viajero = billete.dni_viajero
        )";


        $result = $conn->query($sql);
        $sql2 = "SELECT nombre_apellido, horas_viaje FROM viajero";
        $result2 = $conn->query($sql2);


        // Mostrar resultados en una tabla
        if ($result2->num_rows > 0) {
            // Imprimir los resultados en una tabla HTML
            // Mostrar la tabla HTML
            echo "<table border='1'>
            <tr>
            <th colspan='4'></th>
            </tr>
            <tr>
            <th>nombre cliente</th>
            <th>horas totales de viaje</th>
            </tr>";

            // Iterar sobre los resultados y mostrar cada fila en la tabla
            while ($row = $result2->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre_apellido"] . "</td>";
                echo "<td>" . $row["horas_viaje"] . "</td>";
                echo "</tr>";
            }

            // Cerrar la tabla
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }
    }




    ?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col" id="company">
                    <img src="img/logo.png" alt="" class="logo">
                    <p>
                        Conéctate con nosotros en nuestras redes sociales y descubre destinos inolvidables
                    </p>
                    <div class="social">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>


                <div class="col" id="services">
                    <h3>servicios</h3>
                    <div class="links">
                        <a href="#">- Experiencias de Viaje Inolvidables</a>
                        <a href="#">- Líderes en la Industria Turística</a>
                        <a href="#">- Planificación Personalizada de Vacaciones</a>
                        <a href="#">- Experiencias Únicas y Memorables</a>
                    </div>
                </div>

                <div class="col" id="useful-links">
                    <h3>Politicas</h3>
                    <div class="links">
                        <a href="#">Seguridad</a>
                        <a href="#">Integridad</a>
                        <a href="#">Transparencia</a>
                        <a href="#">Autenticidad</a>
                    </div>
                </div>

                <div class="col" id="contact">
                    <h3>Contacto y Ubicación</h3>
                    <div class="contact-details">
                        <i class="fa fa-location"></i>
                        <p> Maicao-La Guajira <br> COLOMBIA </p>
                    </div>
                    <div class="contact-details">
                        <i class="fa fa-phone"></i>
                        <p>+1-8755856858</p>
                    </div>
                </div>
            </div>

            <br><br><br>


            <p>&copy; 2024 <a href="http://fturisBus.com">turisBus.com</a></p>

        </div>
    </footer>
</body>

</html>