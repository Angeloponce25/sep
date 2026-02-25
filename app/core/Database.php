<?php

class Database {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // ✅ Método para ejecutar INSERT, UPDATE, DELETE
    public function execute($sql) {
        return $this->conn->query($sql);
    }

    // ✅ Método para SELECT
    public function query($sql) {
        return $this->conn->query($sql);
    }

    // (opcional) obtener conexión si algún día lo necesitas
    public function getConnection() {
        return $this->conn;
    }
}
