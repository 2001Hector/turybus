<?php
// Incluir la clase Autobus
require_once 'autobus.php';

// Crear una instancia de la clase Autobus
$autobus = new Autobus();

// Verificar si se proporcionó un ID de autobús en la solicitud GET
if(isset($_GET['id_matricula'])) {
    // Obtener el ID del autobús desde la solicitud GET
    $id_matricula = $_GET['id_matricula'];

    // Buscar el autobús por su ID
    $autobus_data = $autobus->searchById($id_matricula);
}

// Verificar si se envió el formulario de actualización
if(isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $id_matricula = $_POST['id_matricula'];
    $modelo = $_POST['modelo'];
    $fabricante = $_POST['fabricante'];
    $numero_plazas = $_POST['numero_plazas'];
    $caracteristicas = $_POST['caracteristicas'];
    $km_autobus = $_POST['km_autobus'];

    // Actualizar el autobús en la base de datos
    $actualizado = $autobus->update($id_matricula, $modelo, $fabricante, $numero_plazas, $caracteristicas, $km_autobus);

    // Verificar si se actualizó correctamente el autobús
    if($actualizado) {
        echo '
            <script>
                alert("Registro de autobus actualizado con exito!");
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
    <title>Actualizar Autobús</title>
    <link rel="icon" href="../assets/images/logo.ico">
</head>
<body>
    <h1>Actualizar Autobús</h1>
    <form method="POST" action="">
        id_matricula: <input type="text" name="id_matricula" value="<?php echo $autobus_data['id_matricula']; ?>"><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="<?php echo $autobus_data['modelo']; ?>"><br><br>

        <label for="fabricante">Fabricante:</label>
        <input type="text" name="fabricante" id="fabricante" value="<?php echo $autobus_data['fabricante']; ?>"><br><br>

        <label for="numero_plazas">Número de Plazas:</label>
        <input type="number" name="numero_plazas" id="numero_plazas" value="<?php echo $autobus_data['numero_plazas']; ?>"><br><br>

        <label for="caracteristicas">Características:</label><br>
        <textarea name="caracteristicas" id="caracteristicas"><?php echo $autobus_data['caracteristicas']; ?></textarea><br><br>

        <label for="km_autobus">Kilómetros del Autobús:</label>
        <input type="number" name="km_autobus" id="km_autobus" value="<?php echo $autobus_data['km_autobus']; ?>"><br><br>

        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>
</html>
