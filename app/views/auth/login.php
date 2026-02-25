<div class="lockscreen-wrapper">

  <!-- Nombre del centro médico -->
  <div class="lockscreen-logo">
    <a href="#"><b>Centro Médico</b> Divino Niño</a>
  </div>

  <!-- Nombre del sistema -->
  <div class="lockscreen-name text-primary text-center">
    SEP - Sistema de Evaluación Psicológica
  </div>

  <!-- Tarjeta del login -->
  <div class="lockscreen-item shadow-lg rounded">

    <!-- Imagen del sistema -->
    <div class="lockscreen-image">
      <img src="<?= BASE_URL ?>/img/psicologia.png" alt="Centro Médico Divino Niño">
    </div>

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
    <strong>Centro Médico Divino Niño</strong><br>
    Sistema SEP - Evaluación Psicológica<br>
    © <?= date("Y") ?> Todos los derechos reservados
  </div>

</div>