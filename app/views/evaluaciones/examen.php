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
<pre>
<?php print_r($data); ?>
</pre>
</div>

<script>

const examen = <?= $data['preguntas'] ?>;

let preguntaActual = 0;
let respuestas = [];

function cargarPregunta() {

  document.getElementById("preguntaTexto").innerHTML =
    examen[preguntaActual].pregunta;

  let html = "";

  examen[preguntaActual].opciones.forEach((op, i) => {

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

cargarPregunta();

</script>