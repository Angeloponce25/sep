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

        <!-- Formulario -->
    <form class="lockscreen-credentials" id="formLogin">
      <div class="input-group">
        <input 
          type="text"
          class="form-control"
          placeholder="Ingrese su DNI"
          name="username"
          id="username"
          maxlength="8"
          required
        >

        <div class="input-group-btn">
          <button 
            type="submit"
            id="login"
            name="login"
            class="btn btn-primary">
            <i class="fa fa-sign-in"></i>
          </button>
        </div>
      </div>
    </form>


    </div>
    <!-- Mensaje -->
  <div class="help-block text-center">
    Acceso al sistema de evaluaciones psicológicas del Centro Médico Divino Niño
  </div>

  <div class="text-center">
    <small class="text-muted">
      Mollendo - Perú
    </small>
  </div>
    <!-- Footer -->
    <div class="lockscreen-footer text-center">
    <strong>Centro Médico Divino Niño Mollendo</strong><br>
    Sistema SEP - Evaluación Psicológica<br>
    © <?= date("Y") ?> Todos los derechos reservados
  </div>
</div>