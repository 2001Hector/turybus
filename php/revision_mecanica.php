<?php

require_once 'database_connection.php';

class RevisionMecanica {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM revision_mecanica";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar una nueva revisión mecánica
    public function insert($id_revision, $id_matricula, $fecha_revision, $diagnostico, $procede_reparar) {
        $sql = "INSERT INTO revision_mecanica (id_revision, id_matricula, fecha_revision, diagnostico, procede_reparar) 
                VALUES ($id_revision, '$id_matricula', '$fecha_revision', '$diagnostico', $procede_reparar)";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar una revisión mecánica por su id_revision
    public function delete($id_revision) {
        $sql = "DELETE FROM revision_mecanica WHERE id_revision = $id_revision";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar una revisión mecánica por su id_revision
    public function update($id_revision, $id_matricula, $fecha_revision, $diagnostico, $procede_reparar) {
        $sql = "UPDATE revision_mecanica SET id_matricula = '$id_matricula', fecha_revision = '$fecha_revision', 
                diagnostico = '$diagnostico', procede_reparar = $procede_reparar WHERE id_revision = $id_revision";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar una revisión mecánica por su id_revision
    public function searchById($id_revision) {
        $sql = "SELECT * FROM revision_mecanica WHERE id_revision = $id_revision";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>