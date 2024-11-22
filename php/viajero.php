<?php

require_once 'database_connection.php';
class Viajero {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM viajero";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar un nuevo viajero
    public function insert($dni_viajero, $nombre_apellido, $telefono, $horas_viaje) {
        $sql = "INSERT INTO viajero (dni_viajero, nombre_apellido, telefono, horas_viaje) 
                VALUES ($dni_viajero, '$nombre_apellido', '$telefono', '$horas_viaje')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un viajero por su dni_viajero
    public function delete($dni_viajero) {
        $sql = "DELETE FROM viajero WHERE dni_viajero = $dni_viajero";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un viajero por su dni_viajero
    public function update($dni_viajero, $nombre_apellido, $telefono, $horas_viaje) {
        $sql = "UPDATE viajero SET nombre_apellido = '$nombre_apellido', telefono = '$telefono', 
                horas_viaje = '$horas_viaje' WHERE dni_viajero = $dni_viajero";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un viajero por su dni_viajero
    public function searchByDni($dni_viajero) {
        $sql = "SELECT * FROM viajero WHERE dni_viajero = $dni_viajero";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>