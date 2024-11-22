<?php

// Incluir los archivos de las clases de las tablas
require_once 'conductor.php';

// Verificar si se proporcionó un DNI de conductor en la solicitud GET
if (isset($_GET['dni'])) {
    // Crear una instancia de la clase A
    $conductor = new Conductor();

    // Obtener el DNI del conductor desde la solicitud GET
    $dni = $_GET['dni'];

    // Llamar al método para eliminar el conductor con el DNI proporcionado
    $eliminado = $conductor->delete($dni);
    echo $eliminado;

    // Verificar si se eliminó correctamente el conductor
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de conductor eliminado con exito!");
                    window.location = "table.php";
                </script>
        ';
        exit;
    } else {
        echo '
                <script>
                    alert("No se pudo eliminar este registro!");
                    window.location = "table.php";
                </script>
        ';
        exit;
    }
} 

?>
