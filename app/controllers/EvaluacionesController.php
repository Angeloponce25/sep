<?php

require_once '../app/models/Evaluaciones.php';

class EvaluacionesController extends Controller {

    private $evaluacionesModel;

    public function __construct() 
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        $this->evaluacionesModel = new Evaluaciones();
    }

    public function examen($id_evaluacion)
    {

        $rows = $this->evaluacionesModel->getPreguntasExamen($id_evaluacion);

        // Convertir a estructura JS
        $preguntas = [];

        foreach($rows as $r){

            $id = $r['id_pregunta'];

            if(!isset($preguntas[$id])){
                $preguntas[$id] = [
                    "pregunta"=>$r['pregunta'],
                    "opciones"=>[]
                ];
            }

            $preguntas[$id]["opciones"][] = $r['texto'];

        }

        $preguntas = array_values($preguntas);

        $this->view('evaluaciones/examen', [
            'preguntas' => 'asdasd',
            'id_evaluacion'=>$id_evaluacion
        ]);
    }

}