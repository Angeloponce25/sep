<div class="lockscreen-wrapper">
  
  <!-- Logo de la clínica -->
  <div class="lockscreen-logo">
    <a href="#"><b>Clínica</b> Salud+</a>
  </div>

  <!-- Nombre del sistema -->
  <div class="lockscreen-name text-primary">
    Sistema de Acceso Clínico
  </div>

  <!-- TARJETA DEL LOGIN -->
  <div class="lockscreen-item shadow-lg rounded">

    <!-- Imagen del usuario o logo -->
    <div class="lockscreen-image">
      <img src="<?= BASE_URL ?>/img/doctor.png" alt="Usuario">
    </div>

    <!-- FORMULARIO -->
    <form class="lockscreen-credentials" id="formLogin">
      <div class="input-group">
        <input 
          type="text" 
          class="form-control" 
          placeholder="Ingrese su DNI"
          name="username" 
          id="username"
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

  <!-- MENSAJE -->
  <div class="help-block text-center">
    Ingrese su DNI para acceder al sistema clínico
  </div>

  <div class="text-center">
    <a href="login.html" class="text-info">
      Acceder con otro usuario
    </a>
  </div>

  <!-- FOOTER -->
  <div class="lockscreen-footer text-center">
    <strong>Sistema Clínico</strong><br>
    © <?= date("Y") ?> Todos los derechos reservados
  </div>

</div>