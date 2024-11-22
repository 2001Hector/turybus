<?php
// Incluir la clase Billete
require_once 'billete.php';

// Crear una instancia de la clase Billete
$billete = new Billete();

// Verificar si se proporcionó un ID de billete en la solicitud GET
if (isset($_GET['id_billete'])) {
    // Obtener el ID del billete desde la solicitud GET
    $id_billte = $_GET['id_billete'];

    // Buscar el billete por su ID
    $billete_data = $billete->searchById($id_billete);
}

// Verificar si se envió el formulario de actualización
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario 
    $id_billete = $_POST['id_billete'];
    $id_ruta = $_POST['id_ruta'];
    $importe = $_POST['importe'];
    $hora_llegada = $_POST['hora_llegada'];
    $dni_viajero = $_POST['dni_viajero'];

    // Actualizar el billete en la base de datos
    $actualizado = $billete->update($id_billete, $id_ruta, $importe, $hora_llegada, $dni_viajero);

    // Verificar si se actualizó correctamente el billete
    if ($actualizado) {
        echo '
                <script>
                    alert("Registro de billete actualizado con exito!");
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
    <title>Actualizar Billete</title>
</head>

<body>
    <h1>Actualizar billete</h1>
    <form method="POST" action="">
        id_billete: <input type="text" name="id_billete" value="<?php echo $billete_data['id_billete']; ?>"><br><br>

        <label for="importe">Importe:</label>
        <input type="text" name="importe" id="importe" value="<?php echo $billete_data['importe']; ?>"><br><br>

        <label for="hora_llegada">Hora_Llegada:</label>
        <input type="time" name="hora_llegada" id="hora_llegada" value="<?php echo $billete_data['hora_llegada']; ?>"><br><br>
        
        <input type="submit" name="submit" value="Actualizar">
    </form>
</body>

</html>