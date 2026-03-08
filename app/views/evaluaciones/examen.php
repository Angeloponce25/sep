<?php require APP_PATH . '/views/layouts/app_header.php'; ?>
<?php require APP_PATH . '/views/layouts/navbar.php'; ?>
<?php require APP_PATH . '/views/layouts/sidebar.php'; ?>

<?php
$preguntas = $data['preguntas'];
$id_evaluacion = $data['id_evaluacion'];
?>

<div class="content-wrapper">

<section class="content">

<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="box box-primary">

<div class="box-header">
<h3 class="box-title">Examen Psicológico</h3>
</div>

<div class="box-body">

<h4>ID Evaluación: <?php echo $id_evaluacion; ?></h4>

<pre>
<?php print_r($preguntas); ?>
</pre>

</div>

</div>

</div>
</div>

</section>

</div>