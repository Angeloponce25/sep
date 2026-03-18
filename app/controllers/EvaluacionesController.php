<?php

require_once '../app/models/User.php';
require_once '../app/models/Evaluaciones.php';

class EvaluacionesController extends Controller {

    private $userModel;
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
            'preguntas' => $preguntas,
            'id_evaluacion'=>$id_evaluacion
        ]);

    }

    public function guardarRespuestas()
    {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id_evaluacion = $_POST['id_evaluacion'];
            $respuestas = $_POST['respuestas'];

            // obtener datos del pivote
            $info = $this->evaluacionesModel->getEvaluacionInfo($id_evaluacion);

            if(!$info){
                echo "error";
                return;
            }

            $id_paciente = $info['id_paciente'];
            $id_acto = $info['id_acto_medico'];

            foreach($respuestas as $id_pregunta => $id_opcion){

                $this->evaluacionesModel->guardarRespuesta(
                    $id_evaluacion,
                    $id_pregunta,
                    $id_opcion,
                    $id_paciente,
                    $id_acto
                );

            }

            // marcar examen como terminado
            $this->evaluacionesModel->finalizarExamen($id_evaluacion);

            echo "success";

            $id=$_SESSION['user']['id_paciente'];
        
            $paciente = $this->userModel->getPacienteById($id);
            $evaluaciones = $this->evaluacionesModel->getEvaluacionesPaciente($id);

            $this->view('dashboard/index', [
                'title' => 'Dashboard',
                'data' => $paciente,
                'evaluaciones' => $evaluaciones
            ]);

        }

    }

}