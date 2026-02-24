<div class="card card-primary card-outline">

  <div class="card-body box-profile">

    <div class="text-center">
      <img class="profile-user-img img-fluid img-circle"
           src="<?= BASE_URL ?>/img/user.png">
    </div>

    <h3 class="profile-username text-center"><?= $paciente['nombre'] ?></h3>

    <p class="text-muted text-center">
      <?= $paciente['perfil'] ?> - <?= $paciente['empresa'] ?>
    </p>

    <ul class="list-group list-group-unbordered mb-3">

      <li class="list-group-item">
        <b>DNI</b> <a class="float-right"><?= $paciente['dni'] ?></a>
      </li>

      <li class="list-group-item">
        <b>Cargo</b> <a class="float-right"><?= $paciente['cargo'] ?></a>
      </li>

      <li class="list-group-item">
        <b>Hora de atención</b>
        <a class="float-right"><?= $paciente['hora'] ?></a>
      </li>

    </ul>

  </div>
</div>