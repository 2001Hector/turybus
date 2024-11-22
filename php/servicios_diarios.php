<?php

require_once 'database_connection.php';

class ServiciosDiarios {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM servicios_diarios";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar un nuevo servicio diario
    public function insert($id_ruta, $ruta, $horario_salida, $demanda, $nombre_conductor, $id_matricula, $kilometros_ruta) {
        $sql = "INSERT INTO servicios_diarios (id_ruta, ruta, horario_salida, demanda, nombre_conductor, id_matricula, kilometros_ruta) 
                VALUES ($id_ruta, '$ruta', '$horario_salida', '$demanda', '$nombre_conductor', '$id_matricula', $kilometros_ruta)";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un servicio diario por su id_ruta
    public function delete($id_ruta) {
        $sql = "DELETE FROM servicios_diarios WHERE id_ruta = $id_ruta";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un servicio diario por su id_ruta
    public function update($id_ruta, $ruta, $horario_salida, $demanda, $nombre_conductor, $id_matricula, $kilometros_ruta) {
        $sql = "UPDATE servicios_diarios SET ruta = '$ruta', horario_salida = '$horario_salida', 
                demanda = '$demanda', nombre_conductor = '$nombre_conductor', id_matricula = '$id_matricula', 
                kilometros_ruta = $kilometros_ruta WHERE id_ruta = $id_ruta";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un servicio diario por su id_ruta
    public function searchById($id_ruta) {
        $sql = "SELECT * FROM servicios_diarios WHERE id_ruta = $id_ruta";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>