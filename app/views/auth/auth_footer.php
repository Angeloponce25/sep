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

</body>
</html>


<script>
        $(document).ready(function(){

            // Enviar login con AJAX
            $('#formLogin').on('submit', function(e){
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "<?= BASE_URL ?>/auth/doLogin",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response){

                        console.log(response);

                    },
                    error: function(){
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error de conexión con el servidor'
                        });
                    }
                });

            });

        });
    </script>