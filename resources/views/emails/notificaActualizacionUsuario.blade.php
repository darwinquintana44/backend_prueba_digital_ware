<html>
<head>
    <title>Se ha actualizado un usuario nuevo</title>
</head>
<body>
    <h2>Se ha actualizado un usuario en el sistema:</h2><br><br>

    <b>Id interno:</b> {{$user->id}}<br>
    <b>Nombre Completo:</b> {{$user->name}} {{$user->last_name}}<br>
    <b>Identificaci&oacute;n: </b> {{$user->email}}<br>
    <b>Tel&eacute;fono: </b> {{$user->movil}} - {{$user->telephone}}<br>
    <b>Direcci&oacute;n: </b> {{$user->direction}}<br>
    <b>Correo Electr&oacute;nico: </b> {{$user->email}}<br><br>

    <h2>Datos anteriores</h2><br><br>

    <b>Id interno:</b> {{$userOld->id}}<br>
    <b>Nombre Completo:</b> {{$userOld->name}} {{$userOld->last_name}}<br>
    <b>Identificaci&oacute;n: </b> {{$userOld->email}}<br>
    <b>Tel&eacute;fono: </b> {{$userOld->movil}} - {{$userOld->telephone}}<br>
    <b>Direcci&oacute;n: </b> {{$userOld->direction}}<br>
    <b>Correo Electr&oacute;nico: </b> {{$userOld->email}}<br><br>
</body>
</html>
