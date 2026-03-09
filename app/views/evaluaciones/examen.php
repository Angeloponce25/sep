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
<div id="barraProgreso" class="progress-bar progress-bar-success" style="width:0%"></div>
</div>

<h4 id="contadorPregunta"></h4>

<h4 id="preguntaTexto"></h4>

<div id="opciones"></div>

<br>

<button id="btnAnterior" class="btn btn-default">Anterior</button>

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

function cargarPregunta(){

    let p = examen[preguntaActual];

    document.getElementById("contadorPregunta").innerHTML =
        "Pregunta " + (preguntaActual + 1) + " de " + examen.length;

    document.getElementById("preguntaTexto").innerHTML = p.pregunta;

    let html = "";

    p.opciones.forEach((op,i)=>{

        let checked = respuestas[preguntaActual] == i ? "checked" : "";

        html += `
        <div class="radio">
            <label>
                <input type="radio" name="respuesta" value="${i}" ${checked}>
                ${op}
            </label>
        </div>
        `;

    });

    document.getElementById("opciones").innerHTML = html;

    actualizarBarra();

}

function actualizarBarra(){

    let progreso = ((preguntaActual+1)/examen.length)*100;

    document.getElementById("barraProgreso").style.width =
        progreso + "%";

}

function guardarExamen(){

    $.ajax({

        url: "<?= BASE_URL ?>/evaluaciones/guardarRespuestas",
        type: "POST",

        data:{
            id_evaluacion: idEvaluacion,
            respuestas: respuestas
        },

        success: function(response){            
            
            if(response.trim() === "success"){

                Swal.fire({
                    icon: 'success',
                    title: 'Examen finalizado',
                    text: 'Las respuestas fueron guardadas correctamente'
                }).then(()=>{
                    window.location.href = "<?= BASE_URL ?>/evaluaciones";
                });

            }else{

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar el examen'
                });

            }

        },

        error: function(){

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error de conexión con el servidor'
            });

        }

    });

}

document.getElementById("btnSiguiente").onclick = function(){

    let seleccion = document.querySelector('input[name="respuesta"]:checked');

    if(!seleccion){
        alert("Selecciona una opción");
        return;
    }

    respuestas[preguntaActual] = seleccion.value;

    if(preguntaActual < examen.length-1){

        preguntaActual++;

        cargarPregunta();

    }else{

        console.log("Respuestas:", respuestas);

        guardarExamen();

    }

}

document.getElementById("btnAnterior").onclick = function(){

    if(preguntaActual > 0){

        preguntaActual--;

        cargarPregunta();

    }

}

cargarPregunta();

</script>
<?php require '../app/views/layouts/app_footer.php'; ?>