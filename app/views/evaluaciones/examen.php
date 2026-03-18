<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>

<?php
$preguntas = $data['preguntas'];
$id_evaluacion = $data['id_evaluacion'];
?>

<div class="content-wrapper">

    <section class="content">

        <div style="max-width: 100%; margin: 0 auto 30px auto;">

            <div class="box box-primary">

                <div class="box-header with-border text-center">
                    <h3 class="box-title" style="font-size: 2.2em; font-weight: bold; margin: 0;">Examen Psicológico</h3>
                </div>

                <div class="box-body" style="padding: 30px;">

                    <div class="progress" style="height: 30px; margin-bottom: 35px; border-radius: 15px;">
                        <div id="barraProgreso" class="progress-bar progress-bar-success" style="width:0%; font-size: 1.1em; line-height: 30px; font-weight: bold;"></div>
                    </div>

                    <h4 id="contadorPregunta" class="text-center" style="font-size: 1.4em; font-weight: bold; margin-bottom: 30px; color: #333;"></h4>

                    <h4 id="preguntaTexto" class="text-bold" style="font-size: 1.6em; line-height: 1.45; margin-bottom: 40px; font-weight: 600; color: #222;"></h4>

                    <div id="opciones" style="font-size: 1.4em; line-height: 2.0;"></div>

                    <div style="margin: 50px 0;"></div>

                    <div class="text-center">
                        <button id="btnAnterior" class="btn btn-default btn-lg" style="font-size: 1.3em; padding: 15px 40px; min-width: 180px; margin-right: 40px;">
                            Anterior
                        </button>

                        <button id="btnSiguiente" class="btn btn-primary btn-lg" style="font-size: 1.3em; padding: 15px 40px; min-width: 180px;">
                            Siguiente
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<style>
    .radio label {
        display: block;
        padding: 18px 25px;
        margin: 20px 0;
        background: #f9f9f9;
        border: 2px solid #ccc;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.25s;
        font-weight: 500;
    }
    .radio label:hover {
        background: #e8f4fd;
        border-color: #4a90e2;
    }
    .radio input[type="radio"] {
        transform: scale(1.6);
        margin-right: 15px;
    }
    /* Mejora contraste general */
    body { color: #111; background: #fff; }
</style>

<script>

const examen = <?= json_encode($preguntas, JSON_UNESCAPED_UNICODE); ?>;
const idEvaluacion = <?= $id_evaluacion ?>;

let preguntaActual = 0;
let respuestas = [];

function cargarPregunta() {
    let p = examen[preguntaActual];

    document.getElementById("contadorPregunta").innerHTML =
        "Pregunta " + (preguntaActual + 1) + " de " + examen.length;

    document.getElementById("preguntaTexto").innerHTML = p.pregunta;

    let html = "";

    p.opciones.forEach((op, i) => {
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

function actualizarBarra() {
    let progreso = ((preguntaActual + 1) / examen.length) * 100;
    document.getElementById("barraProgreso").style.width = progreso + "%";
    // Opcional: mostrar porcentaje dentro de la barra
    // document.getElementById("barraProgreso").textContent = Math.round(progreso) + "%";
}

function guardarExamen() {
    $.ajax({
        url: "<?= BASE_URL ?>/evaluaciones/guardarRespuestas",
        type: "POST",
        data: {
            id_evaluacion: idEvaluacion,
            respuestas: respuestas
        },
        success: function(response) {
            if (response.trim() === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Examen finalizado',
<<<<<<< HEAD
                    text: 'Las respuestas fueron guardadas correctamente'
                }).then(()=>{
                    window.location.href = "<?= BASE_URL ?>/dashboard";
=======
                    text: 'Las respuestas fueron guardadas correctamente',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = "<?= BASE_URL ?>/evaluaciones";
>>>>>>> c2a61df16f0ed407ad2dad5845af0a2723a6f0ae
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar el examen'
                });
            }
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error de conexión con el servidor'
            });
        }
    });
}

document.getElementById("btnSiguiente").onclick = function() {
    let seleccion = document.querySelector('input[name="respuesta"]:checked');

    if (!seleccion) {
        return Swal.fire({
            icon: 'warning',
            title: '¡Atención!',
            text: 'Por favor, seleccione una respuesta antes de continuar.'
        });
    }

    respuestas[preguntaActual] = parseInt(seleccion.value);

    if (preguntaActual < examen.length - 1) {
        preguntaActual++;
        cargarPregunta();
    } else {
        console.log("Respuestas finales:", respuestas);
        guardarExamen();
    }
};

document.getElementById("btnAnterior").onclick = function() {
    if (preguntaActual > 0) {
        preguntaActual--;
        cargarPregunta();
    }
};

cargarPregunta();

</script>

<?php require '../app/views/layouts/app_footer.php'; ?>