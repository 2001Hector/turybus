<?php
// Incluir la clase ServiciosDiarios
require_once 'servicios_diarios.php';

// Crear una instancia de la clase ServiciosDiarios
$servicios_diarios = new ServiciosDiarios();

// Verificar si se proporcionó un ID de ruta en la solicitud GET
if (isset($_GET['id_ruta'])) {
    // Obtener el ID de la ruta desde la solicitud GET
    $id_ruta = $_GET['id_ruta'];

    // Buscar la ruta por su ID
    $servicios_diarios_data = $servicios_diarios->searchById($id_ruta);
}

// Verificar si se envió el formulario de actualización
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $id_ruta = $_POST['id_ruta'];
    $ruta = $_POST['ruta'];
    $horario_salida = $_POST['hola_salida'];
    $demanda = $_POST['demanda'];
    $nombre_conductor = $_POST['nombre_conductor'];
    $id_matricula = $_POST['id_matricula'];
    $kilometros_ruta = $_POST['kilometros_ruta'];

    // Actualizar el servicio diario en la base de datos
    $actualizado = $servicios_diarios->update($id_ruta, $ruta, $horario_salida, $demanda, $nombre_conductor, $id_matricula, $kilometros_ruta);

    // Verificar si se actualizó correctamente el servicio diario
    if ($actualizado) {
        echo '
                <script>
                    alert("Registro de servicio diario actualizado con exito!");
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
    <title>Actualizar Servicios Diarios</title>
</head>

<body>
    <h1>Actualizar Servicios Diarios</h1>
    <form method="POST" action="">
        ruta: <input type="text" name="ruta" value="<?php echo $servicios_diarios_data['ruta']; ?>"><br><br>

        <label for="horario_salida">Horario Salida:</label>
        <input type="time" name="horario_salida" id="horario_salida" value="<?php echo $servicios_diarios_data['horario_salida']; ?>"><br><br>

        <label for="demanda">Demanda:</label>
        <input type="text" name="demanda" id="demanda" value="<?php echo $servicios_diarios_data['demanda']; ?>"><br><br>

        <label for="nombre_conductor">Nombre Conductor:</label>
        <input type="text" name="nombre_conductor" id="nombre_conductor" value="<?php echo $servicios_diarios_data['nombre_conductor']; ?>"><br><br>

        <label for="id_matricula">ID Matricula:</label>
        <input type="text" name="id_matricula" id="id_matricula" value="<?php echo $servicios_diarios_data['id_matricula']; ?>"><br><br>

        <label for="kilometros_ruta">Kilometros Ruta:</label>
        <input type="text" name="kilometros_ruta" id="kilometros_ruta" value="<?php echo $servicios_diarios_data['kilometros_ruta']; ?>"><br><br>

        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>

</html>