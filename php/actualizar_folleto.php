<?php
// Incluir la clase Folleto
require_once 'folleto.php';

// Crear una instancia de la clase Folleto
$folleto = new Folleto();

// Verificar si se proporcionó un ID de folleto en la solicitud GET
if (isset($_GET['id_folleto'])) {
    // Obtener el ID del folleto desde la solicitud GET
    $id_folleto = $_GET['id_folleto'];

    // Buscar el folleto por su ID
    $folleto_data = $folleto->searchById($id_folleto);
}

// Verificar si se envió el formulario de actualización
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $id_folleto = $_POST['id_folleto'];
    $id_ruta = $_POST['id_ruta'];
    $dias_programados = $_POST['dias_programados'];
    

    // Actualizar el folleto en la base de datos
    $actualizado = $folleto->update($id_folleto, $id_ruta, $dias_programados);

    // Verificar si se actualizó correctamente el folleto
    if ($actualizado) {
        echo '
                <script>
                    alert("Registro de folleto actualizado con exito!");
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
    <title>Actualizar Folleto</title>
</head>

<body>
    <h1>Actualizar Folleto</h1>
    <form method="POST" action="">
        id_matricula:<input type="text" name="id_matricula" value="<?php echo $autobus_data['id_matricula']; ?>"><br><br>

        <label for="dias_programados">Dias programados:</label>
        <input type="text" name="dias_programados" id="dias_programados" value="<?php echo $autobus_data['dias_programados']; ?>"><br><br>        

        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>

</html>