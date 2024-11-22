<?php

// Incluir los archivos de las clases de las tablas
require_once 'autobus.php';
require_once 'billete.php';
require_once 'conductor.php';
require_once 'cronograma.php';
require_once 'folleto.php';
//require_once 'databases/lista_reparacion.php';
//require_once 'databases/revision_mecanica.php';
require_once 'servicios_diarios.php';
require_once 'viajero.php';

// Crear instancias de cada clase
$autobus = new Autobus();
$billete = new Billete();
$conductor = new Conductor();
$cronograma = new Cronograma();
$folleto = new Folleto();
//$lista_reparacion = new ListaReparacion();
//$revision_mecanica = new RevisionMecanica();
$servicios_diarios = new ServiciosDiarios();
$viajero = new Viajero();

// Obtener todos los registros de la tabla Autobus
$records = $autobus->selectAll();
// Obtener todos los registros de la tabla Billete
$records1 = $billete->selectAll();
// Obtener todos los registros de la tabla Conductor
$records2 = $conductor->selectAll();
// Obtener todos los registros de la tabla Cronograma
$records3 = $cronograma->selectAll();
// Obtener todos los registros de la tabla Folleto
$records4 = $folleto->selectAll();
// Obtener todos los registros de la tabla ListaReparacion
//$records5 = $lista_reparacion->selectAll();
// Obtener todos los registros de la tabla RevisionMecanica
//$records6 = $revision_mecanica->selectAll();
// Obtener todos los registros de la tabla ServiciosDiarios
$records7 = $servicios_diarios->selectAll();
// Obtener todos los registros de la tabla Viajero
$records8 = $viajero->selectAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registros</title>
    
    <link rel="icon" href="../assets/images/logo.ico">
</head>

<body>
    <center>
        <!-- Start -->

        <!-- autobus -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Autobus</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Matrícula</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Fabricante</th>
                        <th scope="col">Número de Plazas</th>
                        <th scope="col">Características</th>
                        <th scope="col">KM Autobus</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $record) : ?>
                        <tr>
                            <td><?php echo $record['id_matricula']; ?></td>
                            <td><?php echo $record['modelo']; ?></td>
                            <td><?php echo $record['fabricante']; ?></td>
                            <td><?php echo $record['numero_plazas']; ?></td>
                            <td><?php echo $record['caracteristicas']; ?></td>
                            <td><?php echo $record['km_autobus']; ?></td>
                            <td><a class="btn btn-danger" href="./eliminar_autobus.php?id_matricula=<?php echo $record['id_matricula']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="./actualizar_autobus.php?id_matricula=<?php echo $record['id_matricula']; ?>" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- autobus -->

        <!-- billete -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Billete</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Billete</th>
                        <th scope="col">ID Ruta</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Hora de Llegada</th>
                        <th scope="col">DNI Viajero</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records1 as $record) : ?>
                        <tr>
                            <td><?php echo $record['id_billete']; ?></td>
                            <td><?php echo $record['id_ruta']; ?></td>
                            <td><?php echo $record['importe']; ?></td>
                            <td><?php echo $record['hora_llegada']; ?></td>
                            <td><?php echo $record['dni_viajero']; ?></td>
                            <td><a class="btn btn-danger" href="./eliminar_billete.php?id_billete=<?php echo $record['id_billete']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="./actualizar_billete.php?id_billete = <?php echo $record['id_billete']; ?>" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- billete -->

        <!-- conductor -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Conductor</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">KM Conductor</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records2 as $record) : ?>
                        <tr>
                            <td><?php echo $record['dni']; ?></td>
                            <td><?php echo $record['nombre']; ?></td>
                            <td><?php echo $record['apellido']; ?></td>
                            <td><?php echo $record['telefono']; ?></td>
                            <td><?php echo $record['dirreccion']; ?></td>
                            <td><?php echo $record['km_conductor']; ?></td>
                            <td><a class="btn btn-danger" href="./eliminar_conductor.php?dni=<?php echo $record['dni']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="./actualizar_conductor.php?dni= <?php echo $record['dni']; ?>" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- conductor -->

        <!-- cronograma -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Cronograma</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Cronograma</th>
                        <th scope="col">ID Ruta</th>
                        <th scope="col">Lugar Relevante</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Tiempo de Parada</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records3 as $record) : ?>
                        <tr>
                            <td><?php echo $record['id_cronograma']; ?></td>
                            <td><?php echo $record['id_ruta']; ?></td>
                            <td><?php echo $record['lugar_relevante']; ?></td>
                            <td><?php echo $record['actividad']; ?></td>
                            <td><?php echo $record['tiempo_parada']; ?></td>
                            <td><a class="btn btn-danger" href="./eliminar_cronograma.php?id_cronograma=<?php echo $record['id_cronograma']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="#" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- cronograma -->

        <!-- Folleto -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Folleto</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Folleto</th>
                        <th scope="col">ID Ruta</th>
                        <th scope="col">Días Programados</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records4 as $record) : ?>
                        <tr>
                            <td><?php echo $record['id_folleto']; ?></td>
                            <td><?php echo $record['id_ruta']; ?></td>
                            <td><?php echo $record['dias_programados']; ?></td>
                            <td><a class="btn btn-danger" href="./eliminar_folleto.php?id_folleto=<?php echo $record['id_folleto']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="#" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

        <!-- servicios diarios -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Servicios Diarios</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Ruta</th>
                        <th>Ruta</th>
                        <th>Horario de Salida</th>
                        <th>Demanda</th>
                        <th>Nombre del Conductor</th>
                        <th>ID Matricula</th>
                        <th>Kilómetros de la Ruta</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records7 as $record) : ?>
                        <tr>
                            <td><?php echo $record['id_ruta']; ?></td>
                            <td><?php echo $record['ruta']; ?></td>
                            <td><?php echo $record['horario_salida']; ?></td>
                            <td><?php echo $record['demanda']; ?></td>
                            <td><?php echo $record['nombre_conductor']; ?></td>
                            <td><?php echo $record['id_matricula']; ?></td>
                            <td><?php echo $record['kilometros_ruta']; ?></td>
                            <td><a class="btn btn-danger" href="./servicios_diarios.php?id_ruta=<?php echo $record['id_ruta']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="#" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- viajeros -->
        <div class="container-fluid mt-3 mb-3">
            <h1>Viajero</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>DNI del Viajero</th>
                        <th>Nombre y Apellido</th>
                        <th>Teléfono</th>
                        <th>Horas de Viaje</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records8 as $record) : ?>
                        <tr>
                            <td><?php echo $record['dni_viajero']; ?></td>
                            <td><?php echo $record['nombre_apellido']; ?></td>
                            <td><?php echo $record['telefono']; ?></td>
                            <td><?php echo $record['horas_viaje']; ?></td>
                            <td><a class="btn btn-danger" href="./eliminar_viajero.php?dni_viajero=<?php echo $record['dni_viajero']; ?>" role="button">eliminar</a></td>
                            <td><a class="btn btn-warning" href="#" role="button">actualizar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </center>
    <!-- End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>