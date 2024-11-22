<?php

// Incluir los archivos de las clases de las tablas
require_once 'autobus.php';

// Verificar si se proporcionó un ID de autobús en la solicitud GET
if(isset($_GET['id_matricula'])) {
    // Crear una instancia de la clase Autobus
    $autobus = new Autobus();

    // Obtener el ID del autobús desde la solicitud GET
    $id_matricula = $_GET['id_matricula'];

    // Llamar al método para eliminar el autobús con el ID proporcionado
    $eliminado = $autobus->delete($id_matricula);
    echo $eliminado;

    // Verificar si se eliminó correctamente el autobús
    if ($eliminado) {
        echo '
                <script>
                    alert("Registro de autobús eliminado con exito!");
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