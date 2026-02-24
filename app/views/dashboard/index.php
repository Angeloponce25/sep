<?php require '../app/views/layouts/app_header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>
<?php require '../app/views/layouts/sidebar.php'; ?>

<div class="content-wrapper">

  <section class="content">

    <!-- ================= PERFIL DEL PACIENTE ================= -->
    <div class="row">

      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-body box-profile">

            <img class="profile-user-img img-responsive img-circle"
              src="<?= BASE_URL ?>/img/user.png">

            <h3 class="profile-username text-center">Juan Pérez Quispe</h3>

            <p class="text-muted text-center">
              Operario - Empresa ABC
            </p>

            <ul class="list-group list-group-unbordered">

              <li class="list-group-item">
                <b>DNI</b> <span class="pull-right">45896521</span>
              </li>

              <li class="list-group-item">
                <b>Edad</b> <span class="pull-right">29 años</span>
              </li>

              <li class="list-group-item">
                <b>Hora de atención</b> <span class="pull-right">08:30 AM</span>
              </li>

              <li class="list-group-item">
                <b>Área</b> <span class="pull-right">Psicología</span>
              </li>

            </ul>

          </div>
        </div>

      </div>

</div>

<!-- ================= ALERTA ================= -->

<div class="alert alert-info">
  <h4><i class="icon fa fa-info"></i> Bienvenido al SEP</h4>
  Tienes <b>3 evaluaciones psicológicas pendientes</b> por completar.
</div>

<!-- ================= EXÁMENES ================= -->

<div class="row">

  <!-- EXAMEN -->
  <div class="col-md-6">

    <div class="box box-solid examen-card">

      <div class="box-body" style="display:flex;align-items:center;">

        <div class="icono-examen">
          <i class="fa fa-user"></i>
        </div>

        <div style="flex:1;padding-left:15px;">
          <h4>Test de Estrés Laboral</h4>
          <p class="text-muted">
            Evalúa el nivel de estrés en el entorno de trabajo.
          </p>
          <span class="label label-warning">Pendiente</span>
        </div>

        <button class="btn btn-primary btn-lg">
          <i class="fa fa-arrow-right"></i>
        </button>

      </div>
    </div>

  </div>

  <!-- EXAMEN -->
  <div class="col-md-6">

    <div class="box box-solid examen-card">

      <div class="box-body" style="display:flex;align-items:center;">

        <div class="icono-examen">
          <i class="fa fa-bed"></i>
        </div>

        <div style="flex:1;padding-left:15px;">
          <h4>Test de Calidad de Sueño</h4>
          <p class="text-muted">
            Mide hábitos y problemas relacionados al descanso.
          </p>
          <span class="label label-success">Completado</span>
        </div>

        <button class="btn btn-success btn-lg">
          <i class="fa fa-check"></i>
        </button>

      </div>
    </div>

  </div>

  <!-- EXAMEN -->
  <div class="col-md-6">

    <div class="box box-solid examen-card">

      <div class="box-body" style="display:flex;align-items:center;">

        <div class="icono-examen">
          <i class="fa fa-heartbeat"></i>
        </div>

        <div style="flex:1;padding-left:15px;">
          <h4>Test de Ansiedad</h4>
          <p class="text-muted">
            Identifica síntomas físicos y emocionales de ansiedad.
          </p>
          <span class="label label-warning">Pendiente</span>
        </div>

        <button class="btn btn-primary btn-lg">
          <i class="fa fa-arrow-right"></i>
        </button>

      </div>
    </div>

  </div>

  <!-- EXAMEN -->
  <div class="col-md-6">

    <div class="box box-solid examen-card">

      <div class="box-body" style="display:flex;align-items:center;">

        <div class="icono-examen">
          <i class="fa fa-users"></i>
        </div>

        <div style="flex:1;padding-left:15px;">
          <h4>Test de Clima Laboral</h4>
          <p class="text-muted">
            Analiza la percepción del ambiente de trabajo.
          </p>
          <span class="label label-primary">En proceso</span>
        </div>

        <button class="btn btn-warning btn-lg">
          <i class="fa fa-clock-o"></i>
        </button>

      </div>
    </div>

  </div>

</div>

</section>
</div>

<style>
  .examen-card {
    border-radius: 15px;
    transition: 0.3s;
  }

  .examen-card:hover {
    transform: scale(1.02);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
  }

  .icono-examen i {
    font-size: 45px;
    color: #00a7d0;
  }
</style>

<?php require '../app/views/layouts/app_footer.php'; ?>