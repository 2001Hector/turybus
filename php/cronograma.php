<?php

require_once 'database_connection.php';

class Cronograma {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM cronograma";
        $result = $this->conn->query($sql);

        $records = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Insertar un nuevo cronograma
    public function insert($id_cronograma, $id_ruta, $lugar_relevante, $actividad, $tiempo_parada) {
        $sql = "INSERT INTO cronograma (id_cronograma, id_ruta, lugar_relevante, actividad, tiempo_parada) 
                VALUES ($id_cronograma, $id_ruta, '$lugar_relevante', '$actividad', '$tiempo_parada')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un cronograma por su id_cronograma
    public function delete($id_cronograma) {
        $sql = "DELETE FROM cronograma WHERE id_cronograma = $id_cronograma";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un cronograma por su id_cronograma
    public function update($id_cronograma, $id_ruta, $lugar_relevante, $actividad, $tiempo_parada) {
        $sql = "UPDATE cronograma SET id_ruta = $id_ruta, lugar_relevante = '$lugar_relevante', actividad = '$actividad', 
                tiempo_parada = '$tiempo_parada' WHERE id_cronograma = $id_cronograma";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un cronograma por su id_cronograma
    public function searchById($id_cronograma) {
        $sql = "SELECT * FROM cronograma WHERE id_cronograma = $id_cronograma";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>