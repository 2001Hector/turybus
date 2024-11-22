<?php

require_once 'database_connection.php';

class Conductor {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM conductor";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar un nuevo conductor
    public function insert($dni, $nombre, $apellido, $telefono, $direccion, $km_conductor) {
        $sql = "INSERT INTO conductor (dni, nombre, apellido, telefono, dirreccion,) 
                VALUES ('$dni', '$nombre', '$apellido', '$telefono', '$direccion', $km_conductor)";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un conductor por su dni
    public function delete($dni) {
        $sql = "DELETE FROM conductor WHERE dni = '$dni'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un conductor por su dni
    public function update($dni, $nombre, $apellido, $telefono, $direccion, $km_conductor) {
        $sql = "UPDATE conductor SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono',
                dirreccion = '$direccion', km_conductor = $km_conductor WHERE dni = '$dni'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un conductor por su dni
    public function searchByDni($dni) {
        $sql = "SELECT * FROM conductor WHERE dni = '$dni'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>