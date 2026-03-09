<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>   <!-- Comenta si no necesitas navbar en kiosk -->
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>   <!-- Comenta la sidebar completamente en kiosk -->

<?php
$preguntas = $data['preguntas'];
$id_evaluacion = $data['id_evaluacion'];
?>

<div class="content-wrapper" style="margin-left: 0 !important; margin-right: 0 !important; background: #fff;">

    <section class="content" style="padding: 20px 40px; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

        <div style="width: 100%; max-width: 1600px; margin: 0 auto;">  <!-- Ajusta max-width según resolución de la máquina -->

            <div class="box box-primary" style="border: none; box-shadow: none; background: transparent;">

                <div class="box-header" style="border-bottom: none; text-align: center; padding: 0 0 30px 0;">
                    <h3 class="box-title" style="font-size: 48px; font-weight: bold; color: #333;">
                        Examen Psicológico
                    </h3>
                </div>

                <div class="box-body" style="padding: 0;">

                    <div class="progress" style="height: 40px; margin-bottom: 50px; border-radius: 20px; overflow: hidden;">
                        <div id="barraProgreso" class="progress-bar progress-bar-success" style="width:0%; font-size: 24px; line-height: 40px;">
                            <!-- Progreso visible opcional -->
                        </div>
                    </div>

                    <h4 id="contadorPregunta" style="font-size: 36px; text-align: center; margin-bottom: 40px; color: #555;"></h4>

                    <h4 id="preguntaTexto" style="font-size: 42px; font-weight: 600; line-height: 1.4; margin-bottom: 60px; text-align: center; color: #222;"></h4>

                    <div id="opciones" style="font-size: 34px; line-height: 1.8;"></div>

                    <div style="height: 80px;"></div> <!-- Espacio -->

                    <div style="text-align: center; margin-top: 60px;">
                        <button id="btnAnterior" class="btn btn-default btn-lg" style="font-size: 32px; padding: 20px 60px; min-width: 280px; margin-right: 80px; border-radius: 12px;">
                            Anterior
                        </button>

                        <button id="btnSiguiente" class="btn btn-primary btn-lg" style="font-size: 32px; padding: 20px 60px; min-width: 280px; border-radius: 12px;">
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
        -webkit-touch-callout: none; /* Evita menú contextual en touch */
        -webkit-user-select: none;
        user-select: none;
    }
    .radio label {
        display: block !important;
        padding: 25px 30px !important;
        margin: 20px 0 !important;
        background: #f8f9fa;
        border: 3px solid #ddd;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .radio label:hover,
    .radio input:checked + span {  /* Mejor visibilidad */
        background: #e3f2fd;
        border-color: #2196f3;
    }
    .radio input[type="radio"] {
        transform: scale(2.2);  /* Radio buttons más grandes */
        margin-right: 20px !important;
    }
    .progress-bar {
        background-color: #4caf50 !important; /* Verde visible */
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
                <input type="radio" name="respuesta" value="${i}" ${checked} style="margin-right: 25px;">
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
    // Opcional: mostrar % dentro de la barra
    document.getElementById("barraProgreso").textContent = Math.round(progreso) + "%";
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
                    confirmButtonColor: '#4caf50',
                    customClass: { popup: 'swal2-kiosk' }
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

// Opcional: fullscreen en kiosk (si el navegador lo permite)
if (document.documentElement.requestFullscreen) {
    // document.documentElement.requestFullscreen();  // Descomenta si quieres forzar fullscreen al cargar
}

</script>

<?php require '../app/views/layouts/app_footer.php'; ?>