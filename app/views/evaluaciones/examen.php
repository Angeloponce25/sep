<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>

<?php
$preguntas = $data['preguntas'];
$id_evaluacion = $data['id_evaluacion'];
?>

<div class="content-wrapper">

<section class="content">

<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="box box-primary">

<div class="box-header">
<h3 class="box-title">Examen Psicológico</h3>
</div>

<div class="box-body">

<div class="progress">
<div id="barraProgreso" class="progress-bar progress-bar-success" style="width:0%">
</div>
</div>

<br>

<h4 id="preguntaTexto"></h4>

<div id="opciones"></div>

<br>

<button id="btnSiguiente" class="btn btn-primary pull-right">
Siguiente
</button>

</div>

</div>

</div>
</div>

</section>

</div>

<script>

const examen = <?= json_encode($preguntas, JSON_UNESCAPED_UNICODE); ?>;
const idEvaluacion = <?= $id_evaluacion ?>;

let preguntaActual = 0;
let respuestas = [];

function cargarPregunta() {

    let pregunta = examen[preguntaActual];

    document.getElementById("preguntaTexto").innerHTML =
        (preguntaActual + 1) + ". " + pregunta.pregunta;

    let html = "";

    pregunta.opciones.forEach((op, i) => {

        html += `
        <div class="radio">
            <label>
                <input type="radio" name="respuesta" value="${i}">
                ${op}
            </label>
        </div>
        `;

    });

    document.getElementById("opciones").innerHTML = html;

    actualizarBarra();

}

function actualizarBarra(){

    let progreso = ((preguntaActual) / examen.length) * 100;

    document.getElementById("barraProgreso").style.width = progreso + "%";

}

document.getElementById("btnSiguiente").addEventListener("click", function(){

    let seleccion = document.querySelector('input[name="respuesta"]:checked');

    if(!seleccion){

        alert("Selecciona una opción");

        return;

    }

    respuestas[preguntaActual] = seleccion.value;

    preguntaActual++;

    if(preguntaActual >= examen.length){

        document.getElementById("barraProgreso").style.width = "100%";

        console.log("Respuestas:", respuestas);

        alert("Examen terminado");

        return;

    }

    cargarPregunta();

});

cargarPregunta();

</script>