<?php
// Incluir la clase Conductor
require_once 'conductor.php';

// Crear una instancia de la clase Conductor
$conductor = new Conductor();

// Verificar si se proporcionó un ID de conductor en la solicitud GET
if (isset($_GET['dni'])) {
    // Obtener el dni del conductor desde la solicitud GET
    $dni = $_GET['dni'];

    // Buscar el conductor por su DNI
    $conductor_data = $conductor->searchByDni($dni);
}

// Verificar si se envió el formulario de actualización
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['dirreccion'];
    //$km_conductor = $_POST['km_conductor'];

    // Actualizar el conductor en la base de datos
    $actualizado = $conductor->update($dni, $nombre, $apellido, $telefono, $direccion, $km_conductor);

    // Verificar si se actualizó correctamente el conductor
    if ($actualizado) {
        echo '
                <script>
                    alert("Registro de conductor actualizado con exito!");
                    window.location = "table.php";
                </script>
        ';
        exit;
    } else {
        echo '
                <script>
                    alert("No se pudo actualizar este registro!");
                    window.location = "table.php";
                </script>
        ';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Conductor</title>
</head>

<body>
    <h1>Actualizar Conductor</h1>
    <form method="POST" action="">
        dni_conductor: <input type="text" name="dni" value="<?php echo $conductor_data['dni']; ?>"><br><br>

        <label for="nombre">nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $conductor_data['nombre']; ?>"><br><br>

        <label for="apellido">apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo $conductor_data['apellido']; ?>"><br><br>

        <label for="telefono">telefono:</label>x
        <input type="text" name="telefono" id="telefono" value="<?php echo $conductor_data['telefono']; ?>"><br><br>

        <label for="direccion">direccion:</label>
        <input type="text" name="dirreccion" id="direccion" value="<?php echo $conductor_data['dirreccion']; ?>"><br><br>
        
        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>

</html>