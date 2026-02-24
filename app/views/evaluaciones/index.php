<?php require '../app/views/layouts/app_header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>
<?php require '../app/views/layouts/sidebar.php'; ?>
<div class="content-wrapper">

  <section class="content">
        <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
            
            <div class="box-header with-border">
                <h3 class="box-title">Test Psicológico – Demo</h3>
            </div>

            <div class="box-body">

                <!-- BARRA DE PROGRESO -->
                <div class="progress">
                <div id="barraProgreso" class="progress-bar progress-bar-success"
                    style="width:20%">Pregunta 1 de 5</div>
                </div>

                <!-- PREGUNTA -->
                <h4 id="preguntaTexto"></h4>

                <!-- OPCIONES -->
                <div id="opciones"></div>

                <br>

                <!-- BOTÓN -->
                <button id="btnSiguiente" class="btn btn-primary pull-right">
                Siguiente <i class="fa fa-arrow-right"></i>
                </button>

            </div>

            </div>

        </div>
        </div>
    </section>
</div>
<script>

const examen = [
  {
    pregunta: "¿Con qué frecuencia te has sentido nervioso o ansioso?",
    opciones: ["Nunca", "Algunos días", "Más de la mitad de los días", "Casi todos los días"]
  },
  {
    pregunta: "¿Tienes dificultad para dormir?",
    opciones: ["Nunca", "A veces", "Frecuentemente", "Siempre"]
  },
  {
    pregunta: "¿Te sientes desmotivado en tus actividades?",
    opciones: ["Nunca", "Pocas veces", "Muchas veces", "Siempre"]
  },
  {
    pregunta: "¿Te cuesta concentrarte?",
    opciones: ["Nada", "Un poco", "Bastante", "Mucho"]
  },
  {
    pregunta: "¿Te has sentido triste últimamente?",
    opciones: ["Nunca", "Algunos días", "Casi todos los días", "Todos los días"]
  }
];

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

  let progreso = ((preguntaActual + 1) / examen.length) * 100;

  document.getElementById("barraProgreso").style.width = progreso + "%";

  document.getElementById("barraProgreso").innerHTML =
    `Pregunta ${preguntaActual + 1} de ${examen.length}`;
}

document.getElementById("btnSiguiente").addEventListener("click", () => {

  let seleccion = document.querySelector('input[name="respuesta"]:checked');

  if (!seleccion) {
    alert("Selecciona una opción");
    return;
  }

  respuestas.push(seleccion.value);

  preguntaActual++;

  if (preguntaActual < examen.length) {
    cargarPregunta();
  } else {
    finalizarExamen();
  }

});

function finalizarExamen() {

  document.querySelector(".box-body").innerHTML = `
    <div class="alert alert-success text-center">
      <h3><i class="fa fa-check"></i> Examen finalizado</h3>
      <p>Gracias por completar el test psicológico</p>
    </div>
  `;
}

cargarPregunta();

</script>
<?php require '../app/views/layouts/app_footer.php'; ?>