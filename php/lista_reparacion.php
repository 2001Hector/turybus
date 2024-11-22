<?php

require_once 'database_connection.php';

class ListaReparacion {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM lista_reparacion";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar una nueva reparación en la lista de reparaciones
    public function insert($id_reparacion, $id_revision, $codigo_reparacion, $tiempo_empleado, $coment_reparacion) {
        $sql = "INSERT INTO lista_reparacion (id_reparacion, id_revision, codigo_reparacion, tiempo_empleado, coment_reparacion) 
                VALUES ('$id_reparacion', $id_revision, '$codigo_reparacion', $tiempo_empleado, '$coment_reparacion')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar una reparación de la lista por su id_reparacion
    public function delete($id_reparacion) {
        $sql = "DELETE FROM lista_reparacion WHERE id_reparacion = '$id_reparacion'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar una reparación de la lista por su id_reparacion
    public function update($id_reparacion, $id_revision, $codigo_reparacion, $tiempo_empleado, $coment_reparacion) {
        $sql = "UPDATE lista_reparacion SET id_revision = $id_revision, codigo_reparacion = '$codigo_reparacion', 
                tiempo_empleado = $tiempo_empleado, coment_reparacion = '$coment_reparacion' 
                WHERE id_reparacion = '$id_reparacion'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar una reparación en la lista por su id_reparacion
    public function searchById($id_reparacion) {
        $sql = "SELECT * FROM lista_reparacion WHERE id_reparacion = '$id_reparacion'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>