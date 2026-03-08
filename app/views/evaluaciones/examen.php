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

<form method="post" action="">

<?php foreach($preguntas as $index => $p): ?>

<div class="form-group">

<h4>
<?php echo ($index + 1) . ". " . $p['pregunta']; ?>
</h4>

<?php foreach($p['opciones'] as $i => $op): ?>

<div class="radio">
<label>
<input type="radio"
       name="pregunta_<?php echo $index; ?>"
       value="<?php echo $i; ?>">

<?php echo $op; ?>
</label>
</div>

<?php endforeach; ?>

</div>

<hr>

<?php endforeach; ?>

<button type="submit" class="btn btn-success">
Enviar examen
</button>

</form>

</div>

</div>

</div>
</div>

</section>

</div>