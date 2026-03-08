<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>

<?php
$paciente = $data['data'];
$evaluaciones = $data['evaluaciones'];

$nombreCompleto = ($paciente['pac_nombres'] ?? '') . ' ' .
                  ($paciente['pac_primer_ape'] ?? '') . ' ' .
                  ($paciente['pac_segundo_ape'] ?? '');

$edad = '';

if (!empty($paciente['pac_fecnac'])) {
    $edad = date_diff(
        date_create($paciente['pac_fecnac']),
        date_create('today')
    )->y . ' años';
}


?>

<div class="content-wrapper">
  <section class="content">

    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-body box-profile">

            <img class="profile-user-img img-responsive img-circle"
              src="<?= BASE_URL ?>/img/user.png">

            <h3 class="profile-username text-center">
              <?= $nombreCompleto ?>
            </h3>

            <p class="text-muted text-center">Paciente</p>

            <ul class="list-group list-group-unbordered">

              <li class="list-group-item">
                <b>DNI</b>
                <span class="pull-right">
                  <?= $paciente['numero_documento'] ?? '' ?>
                </span>
              </li>

              <li class="list-group-item">
                <b>Edad</b>
                <span class="pull-right">
                  <?= $edad ?>
                </span>
              </li>

              <li class="list-group-item">
                <b>Hora de atención</b>
                <span class="pull-right">
                  <?= date('h:i A') ?>
                </span>
              </li>

              <li class="list-group-item">
                <b>Área</b>
                <span class="pull-right">Psicología</span>
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

<?php foreach($evaluaciones as $e): ?>

  <?php

  $estado = $e['estado_examen'];
  $label = '';
  $btn = '';
  $iconBtn = '';

  if($estado == 0){
    $label = 'label label-warning';
    $textoEstado = 'Pendiente';
    $btn = 'btn btn-primary';
    $iconBtn = 'fa-arrow-right';
  }

  if($estado == 1){
    $label = 'label label-primary';
    $textoEstado = 'En proceso';
    $btn = 'btn btn-warning';
    $iconBtn = 'fa-clock-o';
  }

  if($estado == 2){
    $label = 'label label-success';
    $textoEstado = 'Completado';
    $btn = 'btn btn-success';
    $iconBtn = 'fa-check';
  }

  ?>

  <div class="col-md-6">
    <div class="box box-solid examen-card">

      <div class="box-body" style="display:flex;align-items:center;">

        <div class="icono-examen">
          <i class="fa <?= $e['icono'] ?>"></i>
        </div>

        <div style="flex:1;padding-left:15px;">

          <h4><?= $e['titulo'] ?></h4>

          <p class="text-muted">
            <?= $e['descripcion'] ?>
          </p>

          <span class="<?= $label ?>">
            <?= $textoEstado ?>
          </span>

        </div>

        <a href="<?= BASE_URL ?>/examen/<?= $e['id_evaluacion'] ?>"
          class="btn <?= $btn ?> btn-lg">

          <i class="fa <?= $iconBtn ?>"></i>

        </a>

      </div>

    </div>
  </div>

  <?php endforeach; ?>

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

<?php require APP_PATH . '/views/layouts/app_footer.php'; ?>