 <header class="main-header">
    <!-- Logo -->
    <a href="<?= BASE_URL ?>/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?= SYSTEM_NAME ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= SYSTEM_NAME ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->           
          <li class="dropdown messages-menu">
            <li style="padding:8px 10px;">
                
            </li>

                       
          </li>
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= BASE_URL ?>/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['user']['numero_documento'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Inicio</a>
                </div>
                <div class="pull-right">
                  <a href="<?= BASE_URL ?>/auth/logout" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>          
        </ul>
      </div>
    </nav>
  </header>