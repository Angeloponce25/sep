<?php

class Database {

    private $conn;

    public function __construct() {
        $this->conn = new mysqli("192.168.1.151", "webmaster", "super", "gperu_cmdn");

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
