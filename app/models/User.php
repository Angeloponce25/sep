<?php

require_once '../app/core/Database.php';

class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // ✅ Método que el AuthController está esperando
    public function findByUsername($username) {
        $username = $this->db->getConnection()->real_escape_string($username);

        $sql = "SELECT * FROM paciente WHERE numero_documento = '$username' LIMIT 1";
        $result = $this->db->query($sql);

        return $result->fetch_assoc(); // devuelve un solo usuario
    }

    public function getPacienteById($id)
    {
        $id = (int)$id;

        $sql = "SELECT * FROM paciente WHERE id_paciente = $id LIMIT 1";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }
}
