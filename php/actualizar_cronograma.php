<?php
// Incluir la clase Cronograma
require_once 'Cronograma.php';

// Crear una instancia de la clase Cronograma
$cronograma = new Cronograma();

// Verificar si se proporcionó un ID de cronograma en la solicitud GET
if (isset($_GET['id_cronograma'])) {
    // Obtener el ID del cronograma desde la solicitud GET
    $id_cronograma = $_GET['id_cronograma'];

    // Buscar el cronograma por su ID
    $cronograma_data = $cronograma->searchById($id_cronograma);
}

// Verificar si se envió el formulario de actualización
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $id_cronograma = $_POST['id_cronograma'];
    $id_ruta = $_POST['id_ruta'];
    $lugar_relevante = $_POST['lugar_relevante'];
    $actividad = $_POST['actividad'];
    $tiempo_parada = $_POST['tiempo_parada'];
    
    
    // Actualizar el cronograma en la base de datos
    $actualizado = $cronograma->update($id_cronograma, $id_ruta, $lugar_relevante, $actividad, $tiempo_parada);

    // Verificar si se actualizó correctamente el cronograma
    if ($actualizado) {
        echo '
                <script>
                    alert("Registro de cornograma actualizado con exito!");
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
    <title>Actualizar Cronograma</title>
</head>

<body>
    <h1>Actualizar Cronograma</h1>
    <form method="POST" action="">
        ruta: <input type="text" name="id_matricula" value="<?php echo $autobus_data['id_matricula']; ?>"><br><br>

        <label for="lugares_relevantes">Lugares Relevantes:</label>
        <input type="text" name="lugares_relevantes" id="lugares_relevantes" value="<?php echo $cronograma_data['lugares_relevantes']; ?>"><br><br>

        <label for="actividad">actividad:</label>
        <input type="text" name="actividad" id="actividad" value="<?php echo $cronograma_data['actividad']; ?>"><br><br>

        <label for="tiempo_parada">Tiempo Parada:</label>
        <input type="time" name="tiempo_parada" id="tiempo_parada" value="<?php echo $cronograma_data['tiempo_parada']; ?>"><br><br>
        
        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>

</html>