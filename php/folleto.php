<?php

require_once 'database_connection.php';

class Folleto {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->connect();
    }

    // Método para seleccionar todos los registros de la tabla autobus
    public function selectAll() {
        $sql = "SELECT * FROM folleto";
        $result = $this->conn->query($sql);

        $records = array();
        
        return $records;
    }

    // Insertar un nuevo folleto
    public function insert($id_folleto, $id_ruta, $dias_programados) {
        $sql = "INSERT INTO folleto (id_folleto, id_ruta, dias_programados) 
                VALUES ($id_folleto, $id_ruta, '$dias_programados')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Eliminar un folleto por su id_folleto
    public function delete($id_folleto) {
        $sql = "DELETE FROM folleto WHERE id_folleto = $id_folleto";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Actualizar un folleto por su id_folleto
    public function update($id_folleto, $id_ruta, $dias_programados) {
        $sql = "UPDATE folleto SET id_ruta = $id_ruta, dias_programados = '$dias_programados' 
                WHERE id_folleto = $id_folleto";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Buscar un folleto por su id_folleto
    public function searchById($id_folleto) {
        $sql = "SELECT * FROM folleto WHERE id_folleto = $id_folleto";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}

?>