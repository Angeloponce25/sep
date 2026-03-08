<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>

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

</div>

<script>

const examen = <?= $preguntas ?>;

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

function actualizarBarra() {

let progreso = ((preguntaActual+1)/examen.length)*100;

document.getElementById("barraProgreso").style.width = progreso+"%";

}

document.getElementById("btnSiguiente").addEventListener("click",()=>{

let seleccion=document.querySelector('input[name="respuesta"]:checked');

if(!seleccion){
alert("Selecciona una opción");
return;
}

respuestas.push(seleccion.value);

preguntaActual++;

if(preguntaActual < examen.length){

cargarPregunta();

}else{

finalizarExamen();

}

});

function finalizarExamen(){

document.querySelector(".box-body").innerHTML=`
<div class="alert alert-success text-center">
<h3><i class="fa fa-check"></i> Examen finalizado</h3>
<p>Gracias por completar la evaluación</p>
</div>
`;

}

cargarPregunta();

</script>