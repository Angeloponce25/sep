<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>   <!-- Comenta si no se usa en kiosk -->
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>   <!-- Comenta si no se usa en kiosk -->

<?php
$preguntas = $data['preguntas'];
$id_evaluacion = $data['id_evaluacion'];
?>

<div class="content-wrapper" style="margin-left: 0 !important; margin-right: 0 !important; background: #fff;">

    <section class="content" style="padding: 20px 30px; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

        <div style="width: 100%; max-width: 1400px; margin: 0 auto;">

            <div class="box box-primary" style="border: none; box-shadow: none; background: transparent;">

                <div class="box-header" style="border-bottom: none; text-align: center; padding: 0 0 25px 0;">
                    <h3 class="box-title" style="font-size: 40px; font-weight: bold; color: #333;">
                        Examen Psicológico
                    </h3>
                </div>

                <div class="box-body" style="padding: 0;">

                    <div class="progress" style="height: 30px; margin-bottom: 40px; border-radius: 15px; overflow: hidden;">
                        <div id="barraProgreso" class="progress-bar progress-bar-success" style="width:0%; font-size: 20px; line-height: 30px;">
                            <!-- % opcional -->
                        </div>
                    </div>

                    <h4 id="contadorPregunta" style="font-size: 30px; text-align: center; margin-bottom: 30px; color: #555;"></h4>

                    <h4 id="preguntaTexto" style="font-size: 36px; font-weight: 600; line-height: 1.4; margin-bottom: 50px; text-align: center; color: #222;"></h4>

                    <div id="opciones" style="font-size: 28px; line-height: 1.7;"></div>

                    <div style="height: 60px;"></div>

                    <div style="text-align: center; margin-top: 50px;">
                        <button id="btnAnterior" class="btn btn-default btn-lg" style="font-size: 24px; padding: 18px 50px; min-width: 220px; margin-right: 60px; border-radius: 10px;">
                            Anterior
                        </button>

                        <button id="btnSiguiente" class="btn btn-primary btn-lg" style="font-size: 24px; padding: 18px 50px; min-width: 220px; border-radius: 10px;">
                            Siguiente
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<style>
    body, html {
        font-family: 'Segoe UI', Roboto, Arial, sans-serif !important;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        user-select: none;
    }
    .radio label {
        display: block !important;
        padding: 20px 25px !important;
        margin: 18px 0 !important;
        background: #f8f9fa;
        border: 2px solid #ccc;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .radio label:hover,
    .radio input:checked + label {
        background: #e3f2fd;
        border-color: #2196f3;
    }
    .radio input[type="radio"] {
        transform: scale(2.0);
        margin-right: 18px !important;
    }
    .progress-bar {
        background-color: #4caf50 !important;
    }
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
                <input type="radio" name="respuesta" value="${i}" ${checked} style="margin-right: 20px;">
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
    // document.getElementById("barraProgreso").textContent = Math.round(progreso) + "%";  // descomenta si quieres ver el %
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
                    title: '¡Examen finalizado!',
                    text: 'Respuestas guardadas correctamente',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#4caf50'
                }).then(() => {
                    window.location.href = "<?= BASE_URL ?>/evaluaciones";
                });
            } else {
                Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo guardar' });
            }
        },
        error: function() {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Problema de conexión' });
        }
    });
}

document.getElementById("btnSiguiente").onclick = function() {
    let seleccion = document.querySelector('input[name="respuesta"]:checked');
    if (!seleccion) {
        alert("Por favor, selecciona una opción");
        return;
    }
    respuestas[preguntaActual] = parseInt(seleccion.value);

    if (preguntaActual < examen.length - 1) {
        preguntaActual++;
        cargarPregunta();
    } else {
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