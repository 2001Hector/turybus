<link rel="stylesheet" href="../assets/css/style.css">
<?php

require_once 'database_connection.php';

class Billete {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM billete";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar un nuevo billete
    public function insert($id_billete, $id_ruta, $importe, $hora_llegada, $dni_viajero) {
        $sql = "INSERT INTO billete (id_billete, id_ruta, importe, hora_llegada, dni_viajero) 
                VALUES ($id_billete, $id_ruta, '$importe', '$hora_llegada', '$dni_viajero')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un billete por id_billete
    public function delete($id_billete) {
        $sql = "DELETE FROM billete WHERE id_billete = $id_billete";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un billete por id_billete
    public function update($id_billete, $id_ruta, $importe, $hora_llegada, $dni_viajero) {
        $sql = "UPDATE billete SET id_ruta = '$id_ruta', importe = '$importe', hora_llegada = '$hora_llegada', 
                dni_viajero = $dni_viajero WHERE id_billete = $id_billete";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un billete por id_billete
    public function searchById($id_billete) {
        $sql = "SELECT * FROM billete WHERE id_billete = $id_billete";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>