<?php

// Incluir los archivos de las clases de las tablas
require_once 'folleto.php';

// Verificar si se proporcionó un ID de folleto en la solicitud GET
if (isset($_GET['id_folleto'])) {
    // Crear una instancia de la clase Folleto
    $folleto = new Folleto();

    // Obtener el ID del folleto desde la solicitud GET
    $id_folleto = $_GET['id_folleto'];

    // Llamar al método para eliminar el folleto con el ID proporcionado
    $eliminado = $folleto->delete($id_folleto);
    echo $eliminado;

    // Verificar si se eliminó correctamente el folleto
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de folleto eliminado con exito!");
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