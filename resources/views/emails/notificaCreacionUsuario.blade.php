<html>
<head>
    <title>Se ha creado un usuario nuevo</title>
</head>
<body>
    <h2>Se ha creado un usuario nuevo en el sistema:</h2><br><br>
    <b>Nombre Completo:</b> {{$user->name}} {{$user->last_name}}<br>
    <b>Identificaci&oacute;n: </b> {{$user->email}}<br>
    <b>Tel&eacute;fono: </b> {{$user->movil}} - {{$user->telephone}}<br>
    <b>Direcci&oacute;n: </b> {{$user->direction}}<br>
    <b>Correo Electr&oacute;nico: </b> {{$user->email}}<br>
</body>
</html>
