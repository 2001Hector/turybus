<?php

// Incluir los archivos de las clases de las tablas
require_once 'viajero.php';

// Verificar si se proporcionó un DNI de viajero en la solicitud GET
if (isset($_GET['dni_viajero'])) {
    // Crear una instancia de la clase Viajero
    $viajero = new Viajero();

    // Obtener el DNI del viajero desde la solicitud GET
    $dni_viajero = $_GET['dni_viajero'];

    // Llamar al método para eliminar el viajero con el DNI proporcionado
    $eliminado = $viajero->delete($dni_viajero);
    echo $eliminado;

    // Verificar si se eliminó correctamente el viajero
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de viajero eliminado con exito!");
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