<link rel="stylesheet" href="../assets/css/style.css">
<?php

require_once 'database_connection.php';

class Autobus {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM autobus";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar un nuevo autobús
    public function insert($id_matricula, $modelo, $fabricante, $numero_plazas, $caracteristicas, $km_autobus) {
        $sql = "INSERT INTO autobus (id_matricula, modelo, fabricante, numero_plazas, caracteristicas, km_autobus) 
                VALUES ('$id_matricula', '$modelo', '$fabricante', $numero_plazas, '$caracteristicas', $km_autobus)";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un autobús por id_matricula
    public function delete($id_matricula) {
        
        $sql = "DELETE FROM autobus WHERE id_matricula = '$id_matricula'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un autobús por id_matricula
    public function update($id_matricula, $modelo, $fabricante, $numero_plazas, $caracteristicas, $km_autobus) {
        $sql = "UPDATE autobus SET modelo = '$modelo', fabricante = '$fabricante', numero_plazas = $numero_plazas,
                caracteristicas = '$caracteristicas', km_autobus = $km_autobus WHERE id_matricula = '$id_matricula'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un autobús por id_matricula
    public function searchById($id_matricula) {
        $sql = "SELECT * FROM autobus WHERE id_matricula = '$id_matricula'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>