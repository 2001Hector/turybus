<?php

// Incluir los archivos de las clases de las tablas
require_once 'billete.php';

// Verificar si se proporcionó un ID de billete en la solicitud GET
if (isset($_GET['id_billete'])) {
    // Crear una instancia de la clase Billete
    $billete = new Billete();

    // Obtener el ID del billete desde la solicitud GET
    $id_billete = $_GET['id_billete'];

    // Llamar al método para eliminar el billete con el ID proporcionado
    $eliminado = $billete->delete($id_billete);
    echo $eliminado;

    // Verificar si se eliminó correctamente el billete
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de billete eliminado con exito!");
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