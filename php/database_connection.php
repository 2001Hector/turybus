<?php

class DatabaseConnection {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "proyecto_final";
    private $conn;

    // Método para conectar a la base de datos
    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    // Método para cerrar la conexión
    public function close() {
        $this->conn->close();
    }
}

?>