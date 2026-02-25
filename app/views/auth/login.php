<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="../../index2.html"><b>Sistema de Evaluacion Psicologica</b>LTE</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">Luis Bernedo Prueba</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="<?= BASE_URL ?>/img/user1-128x128.jpg" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" id="formLogin">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="DNI" name="username" id="username">

                <div class="input-group-btn">
                    <button type="submit" id="login" name="login" class="btn"><i
                            class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="login.html">Or sign in as a different user</a>
    </div>
    <!-- Footer -->
    <div class="lockscreen-footer text-center">
    <strong>Centro Médico Divino Niño</strong><br>
    Sistema SEP - Evaluación Psicológica<br>
    © <?= date("Y") ?> Todos los derechos reservados
  </div>
</div>