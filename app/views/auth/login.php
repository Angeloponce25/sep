<div class="lockscreen-wrapper modern-login">

    <!-- Contenedor principal -->
    <div class="login-card">

        <!-- Lado izquierdo -->
        <div class="login-left">
            <img src="<?= BASE_URL ?>/img/doctor_logo-Photoroom.png" alt="Sistema">
        </div>

        <!-- Lado derecho -->
        <div class="login-right">

            <!-- Nombre del centro médico -->
            <div class="lockscreen-logo">
                <a href="#"><b>Centro Médico</b> Divino Niño Mollendo</a>
            </div>

            <!-- Nombre sistema -->
            <div class="lockscreen-name">
                SEP - Sistema de Evaluación Psicológica
            </div>

            <!-- Logo -->
            <div class="logo-center">
                <img src="<?= BASE_URL ?>/img/logoclinica.png">
            </div>

            <!-- Formulario -->
            <form id="formLogin">

                <div class="input-group input-modern">
                    <input type="text" class="form-control" placeholder="Ingrese su DNI" name="username" id="username"
                        maxlength="8" required>

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-sign-in"></i>
                        </button>
                    </div>
                </div>

            </form>

            <!-- Mensaje -->
            <div class="help-block text-center">
                Acceso al sistema de evaluaciones psicológicas
            </div>
            <div class="soporte-login">
                ¿No puede acceder al sistema?<br>
                Contáctenos por WhatsApp o teléfono<br>
                <strong>📞 959 123 456</strong>
            </div>

        </div>

    </div>

</div>