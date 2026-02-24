<?php $url = explode('/', CURRENT_URL)[0]; ?>

<aside class="main-sidebar">
  <section class="sidebar">

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENÚ PACIENTE</li>

      <!-- DASHBOARD -->
      <li class="<?= $url=='dashboard'?'active':'' ?>">
        <a href="<?= BASE_URL ?>/dashboard">
          <i class="fa fa-home fa-lg text-blue"></i>
          <span style="font-size:15px;">Inicio</span>
        </a>
      </li>

      <!-- MIS EVALUACIONES -->
      <li class="<?= $url=='evaluaciones'?'active':'' ?>">
        <a href="<?= BASE_URL ?>/evaluaciones">
          <i class="fa fa-clipboard fa-lg text-aqua"></i>
          <span style="font-size:15px;">Mis Evaluaciones</span>
        </a>
      </li>
      
      <!-- CERRAR SESIÓN -->
      <li>
        <a href="<?= BASE_URL ?>/auth/logout">
          <i class="fa fa-sign-out fa-lg text-red"></i>
          <span style="font-size:15px;">Cerrar Sesión</span>
        </a>
      </li>

    </ul>

  </section>
</aside>