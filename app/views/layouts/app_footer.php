
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?=VERSION?>
    </div>    
    <strong>© 2023 - <?=date('Y')?> <a href="#"><?= SYSTEM_NAME ?></a>. Todos los derechos reservados.</strong>
  </footer>

</div>
<!-- jQuery 3 -->
<script src="<?= BASE_URL ?>/assets/adminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= BASE_URL ?>/assets/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= BASE_URL ?>/assets/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= BASE_URL ?>/assets/adminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_URL ?>/assets/js/adminlte.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Agrega la biblioteca DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>



<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>