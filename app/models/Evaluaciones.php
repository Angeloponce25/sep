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

    // ===============================
    // OBTENER PREGUNTAS DEL EXAMEN
    // ===============================
    public function getPreguntasExamen($id_evaluacion)
    {
        $sql = "SELECT 
                    p.id_pregunta,
                    p.pregunta,
                    o.id_opcion,
                    o.texto
                FROM piv_testpsicologico ev
                INNER JOIN psicologia_preguntas p 
                    ON p.id_test = ev.id_test
                INNER JOIN psicologia_opciones o 
                    ON o.id_pregunta = p.id_pregunta
                WHERE ev.id_evaluacion = $id_evaluacion
                ORDER BY p.id_pregunta, o.id_opcion";

        $result = $this->db->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEvaluacionInfo($id_evaluacion)
    {

        $sql = "SELECT id_paciente, id_acto_medico
                FROM piv_testpsicologico
                WHERE id_evaluacion = $id_evaluacion";

        $result = $this->db->query($sql);

        return $result->fetch_assoc();

    }
}
