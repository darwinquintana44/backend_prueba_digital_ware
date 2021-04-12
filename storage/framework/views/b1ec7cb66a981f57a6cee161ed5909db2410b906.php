<html>
<head>
    <title>Se ha actualizado un usuario nuevo</title>
</head>
<body>
    <h2>Se ha actualizado un usuario en el sistema:</h2><br><br>

    <b>Id interno:</b> <?php echo e($user->id); ?><br>
    <b>Nombre Completo:</b> <?php echo e($user->name); ?> <?php echo e($user->last_name); ?><br>
    <b>Identificaci&oacute;n: </b> <?php echo e($user->email); ?><br>
    <b>Tel&eacute;fono: </b> <?php echo e($user->movil); ?> - <?php echo e($user->telephone); ?><br>
    <b>Direcci&oacute;n: </b> <?php echo e($user->direction); ?><br>
    <b>Correo Electr&oacute;nico: </b> <?php echo e($user->email); ?><br><br>

    <h2>Datos anteriores</h2><br><br>

    <b>Id interno:</b> <?php echo e($userOld->id); ?><br>
    <b>Nombre Completo:</b> <?php echo e($userOld->name); ?> <?php echo e($userOld->last_name); ?><br>
    <b>Identificaci&oacute;n: </b> <?php echo e($userOld->email); ?><br>
    <b>Tel&eacute;fono: </b> <?php echo e($userOld->movil); ?> - <?php echo e($userOld->telephone); ?><br>
    <b>Direcci&oacute;n: </b> <?php echo e($userOld->direction); ?><br>
    <b>Correo Electr&oacute;nico: </b> <?php echo e($userOld->email); ?><br><br>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\git\laravel_api\resources\views/emails/notificaActualizacionUsuario.blade.php ENDPATH**/ ?>