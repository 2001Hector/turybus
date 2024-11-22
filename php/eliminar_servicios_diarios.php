<?php

// Incluir los archivos de las clases de las tablas
require_once 'servicios_diarios.php';

// Verificar si se proporcionó un ID de ruta en la solicitud GET
if (isset($_GET['id_ruta'])) {
    // Crear una instancia de la clase ServciosDiarios
    $autobus = new ServiciosDiarios();

    // Obtener el ID de la ruta desde la solicitud GET
    $id_ruta = $_GET['id_ruta'];

    // Llamar al método para eliminar el servicio diario con el ID proporcionado
    $eliminado = $servicio_diario->delete($id_matricula);
    echo $eliminado;

    // Verificar si se eliminó correctamente el servicio diario
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de servicio diario eliminado con exito!");
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