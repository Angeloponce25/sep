<?php

require_once '../app/core/Database.php';

class Evaluaciones {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getEvaluacionesPaciente($id)
    {
        $sql = "SELECT 
                    p.id_evaluacion,
                    p.estado_examen,
                    t.titulo,
                    t.descripcion,
                    t.icono
                FROM piv_testpsicologico p
                INNER JOIN testpsicologico t 
                    ON t.id_test = p.id_test
                WHERE p.id_paciente = $id
                AND t.estado = 1";

        $result = $this->db->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
