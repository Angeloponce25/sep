<?php

require_once '../app/core/Database.php';

class Evaluaciones {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getEvaluacionesPaciente($id)
    {
        $sql = "SELECT * FROM piv_testpsicologico WHERE id_paciente = $id";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();
    }
}
