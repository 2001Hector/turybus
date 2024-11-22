<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empresa Turismo</title>
    <link rel="icon" href="../assets/images/logo.ico">
    <link rel ="stylesheet" href="../assets/css/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .thumbnail {
            max-width: 100px;
            height: auto;
        }
    </style>
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

    // Verificar si el dni_viajero está presente en GET o POST
    if (isset($_GET['dni_viajero'])) {
        $dni_viajero = $_GET['dni_viajero'];
    } elseif (isset($_POST['dni_viajero'])) {
        $dni_viajero = $_POST['dni_viajero'];
    } else {
        echo '
            <script>
                alert("No se ha proporcionado un DNI de viajero válido.");
                window.location = "pagina_anterior.php"; // Redirige a la página anterior o una página de error
            </script>
        ';
        die();
    }
?>

<header id="main-header">
    <i><a id="logo-header" href="#">
        <span class="site-name">TURYBUS</span>
        <span class="site-desc">Turismo / Viajes / Experiencias </span>
    </a></i>
    <br>
    <a href="../php/cerrar_sesion.php" class="shadow-effect">SALIR</a><br>
</header>
<br>

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
            echo "<option value=''>No hay vehículos disponibles</option>";
        }
        ?>
    </select>
    <br><br>
    importe: <input type="text" name="importe" value="<?php echo rand(100000, 500000); ?>" readonly>
    <?php
    $hora = rand(0, 23);
    $minuto = rand(0, 59);
    $hora_llegada = sprintf('%02d:%02d:00', $hora, $minuto);
    ?>
    Hora llegada: <input type="time" name="hora_llegada" value="<?php echo $hora_llegada; ?>" readonly><br><br>
    dni_viajero: <input type="text" name="dni_viajero" value="<?php echo $dni_viajero; ?>" readonly><br>
    <input type="submit" name="submit_billete" value="comprar billete" class="shadow-effect">
</form>

<?php
if (isset($_POST['submit_billete'])) {
    // Obtener datos del formulario de clientes
    $id_ruta = $_POST['id_ruta'];
    $importe = $_POST['importe'];
    $hora_llegada = $_POST['hora_llegada'];
    $dni_viajero = $_POST['dni_viajero'];

    // Validar los campos
    $errors = [];
    if (empty($id_ruta)) {
        $errors[] = "* Seleccione el id de la ruta";
    }
    if (empty($importe)) {
        $errors[] = "* Ingrese el importe del billete";
    }
    if (empty($hora_llegada)) {
        $errors[] = "* Ingrese la hora de llegada de la ruta";
    }
    if (empty($dni_viajero)) {
        $errors[] = "* Ingrese el dni del viajero";
    }

    if (empty($errors)) {
        // Consulta SQL para insertar un nuevo billete
        $sql = "INSERT INTO billete (id_ruta, importe, hora_llegada, dni_viajero) VALUES ('$id_ruta', '$importe', '$hora_llegada', '$dni_viajero')";

        if ($conn->query($sql) === TRUE) {
            echo "Billete agregado correctamente.";
        } else {
            echo "Error al agregar billete: " . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    dni_viajero: <input type="text" name="dni_viajero" value="<?php echo $dni_viajero; ?>" readonly><br>
    <input type="submit" name="ver_billete" value="Ver billete y cronograma1" class="shadow-effect">
</form>

<?php
if (isset($_POST['ver_billete'])) {
    $dni_viajero = $_POST['dni_viajero'];

    // Consulta SQL para mostrar el billete del cliente correspondiente
    $sql = "SELECT billete.*, servicios_diarios.ruta AS nombre_ruta, servicios_diarios.horario_salida AS horario_salida, viajero.nombre_apellido AS nombre_cliente
            FROM billete
            JOIN servicios_diarios ON billete.id_ruta = servicios_diarios.id_ruta
            JOIN viajero ON billete.dni_viajero = viajero.dni_viajero
            WHERE billete.dni_viajero = '$dni_viajero'
            ORDER BY billete.id_billete DESC
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr>
                  <th colspan='5'>Billete</th>
              </tr>
              <tr>
                  <th>Ruta</th>
                  <th>Horario de salida</th>
                  <th>Importe</th>
                  <th>Hora llegada</th>
                  <th>Cliente</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>" . $row["nombre_ruta"] . "</td>
                  <td>" . $row["horario_salida"] . "</td>
                  <td>" . $row["importe"] . "</td>
                  <td>" . $row["hora_llegada"] . "</td>
                  <td>" . $row["nombre_cliente"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron billetes para este cliente.";
    }

    $sql = "SELECT cronograma.*, servicios_diarios.ruta AS ruta_billete 
            FROM cronograma
            JOIN billete ON cronograma.id_ruta = billete.id_ruta
            JOIN servicios_diarios ON billete.id_ruta = servicios_diarios.id_ruta
            WHERE billete.dni_viajero = '$dni_viajero'
            ORDER BY cronograma.id_cronograma DESC
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr>
                  <th colspan='5'>Cronograma</th>
              </tr>
              <tr>
                  <th>Ruta</th>
                  <th>Lugar relevante</th>
                  <th>Actividad</th>
                  <th>Tiempo parada</th>
                  <th>Imagen</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            $ruta_imagen = $row["ruta"];
            echo "<tr>
                  <td>" . $row["ruta_billete"] . "</td>
                  <td>" . $row["lugar_relevante"] . "</td>
                  <td>" . $row["actividad"] . "</td>
                  <td>" . $row["tiempo_parada"] . "</td>
                  <td><img src='$ruta_imagen' alt='Imagen subida' class='thumbnail'></td>
                  </tr>";
        }
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
                <h3>Servicios</h3>
                <div class="links">
                    <a href="#">- Experiencias de Viaje Inolvidables</a>
                    <a href="#">- Líderes en la Industria Turística</a>
                    <a href="#">- Planificación Personalizada de Vacaciones</a>
                    <a href="#">- Experiencias Únicas y Memorables</a>
                </div>
            </div>

            <div class="col" id="useful-links">
                <h3>Políticas</h3>
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
                    <p>Maicao-La Guajira <br> COLOMBIA</p>
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
