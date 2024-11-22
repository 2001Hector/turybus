<?php
// Incluir la clase Viajero
require_once 'viajero.php';

// Crear una instancia de la clase Viajero
$autobus = new Viajero();

// Verificar si se proporcionó un DNI de viajero en la solicitud GET
if (isset($_GET['dni_viajero'])) {
    // Obtener el DNI del viajero desde la solicitud GET
    $dni_viajero = $_GET['dni_viajero'];

    // Buscar el viajero por su DNI
    $viajero_data = $viajero->searchByDni($id_matricula);
}

// Verificar si se envió el formulario de actualización
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $dni_viajero = $_POST['dni_viajero'];
    $nombre_apellido = $_POST['nombre_apellido'];
    $telefono = $_POST['telefono'];
    $horas_viaje = $_POST['horas_viaje'];

    // Actualizar el viajero en la base de datos
    $actualizado = $viajero->update($dni_viajero, $nombre_apellido, $telefono, $horas_viaje);

    // Verificar si se actualizó correctamente el viajero
    if ($actualizado) {
        echo '
                <script>
                    alert("Registro de viajero actualizado con exito!");
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
    <title>Actualizar Viajero</title>
</head>

<body>
    <h1>Actualizar Viajero</h1>
    <form method="POST" action="">
        dni_viajero: <input type="text" name="dni_viajero" value="<?php echo $viajero_data['dni_viajero']; ?>"><br><br>

        <label for="nombre_apellido">Nombre Apellido:</label>
        <input type="text" name="nombre_apellido" id="nombre_apellido" value="<?php echo $viajero_data['nombre_apellido']; ?>"><br><br>

        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $viajero_data['telefono']; ?>"><br><br>

        <label for="horas_viaje">Horas Viaje:</label>
        <input type="time" name="horas_viaje" id="horas_viaje" value="<?php echo $autobus_data['horas_viaje']; ?>"><br><br>

        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>

</html>