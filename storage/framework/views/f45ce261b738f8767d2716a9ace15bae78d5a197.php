<html>
<head>
    <title>Se ha creado un usuario nuevo</title>
</head>
<body>
    <h2>Se ha creado un usuario nuevo en el sistema:</h2><br><br>
    <b>Nombre Completo:</b> <?php echo e($user->name); ?> <?php echo e($user->last_name); ?><br>
    <b>Identificaci&oacute;n: </b> <?php echo e($user->email); ?><br>
    <b>Tel&eacute;fono: </b> <?php echo e($user->movil); ?> - <?php echo e($user->telephone); ?><br>
    <b>Direcci&oacute;n: </b> <?php echo e($user->direction); ?><br>
    <b>Correo Electr&oacute;nico: </b> <?php echo e($user->email); ?><br>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\git\laravel_api\resources\views/emails/notificaCreacionUsuario.blade.php ENDPATH**/ ?>