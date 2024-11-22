<?php

// Incluir los archivos de las clases de las tablas
require_once 'cronograma.php';

// Verificar si se proporcionó un ID de cronograma en la solicitud GET
if (isset($_GET['id_cronograma'])) {
    // Crear una instancia de la clase Cronograma
    $cronograma = new Cronograma();

    // Obtener el ID del cronograma desde la solicitud GET
    $id_cronograma = $_GET['id_cronograma'];

    // Llamar al método para eliminar el cronograma con el ID proporcionado
    $eliminado = $cronograma->delete($id_cronograma);
    echo $eliminado;

    // Verificar si se eliminó correctamente el cronograma
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de cronograma eliminado con exito!");
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