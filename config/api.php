<?php
return [
    /*
     * ELABORADO POR: DARWIN EDER QUINTANA CHALA
     * FECHA: 10 de abril de 2021
     *
     * ACA VAN A ESTAR TODOS LOS VALORES GLOBALES DE NUESTRA API
     *
     * EN LO POSIBLE SE DEBE COMENTAR LA LINEA DE CODIGO O POR LO MENOS EL SEGMENTO PERO SE DEBE MENCIONAR PARA
     * QUE SE VA A UTILIZAR Y EN QUE APLICATIVOS
     *
    */
    'name' => 'API_'.env('APP_NAME'), //valor enviado por la cabecera a traves del middleware cabecera

    /******************************************utilidades para JWT****************************************/
    'JWT_SECRET' => 'lZoBVDgzPc6u7MXhGG2XxPDkQDF3duK5rUbrqv5ivxVIKNSTrtwd0oup7x9ryW0r',
    'JWT_PUBLIC_KEY' => '',
    'JWT_PRIVATE_KEY' => '',
    'JWT_PASSPHRASE' => '',
    'JWT_TTL' => 60,
    'JWT_REFRESH_TTL' => 20160,
    'JWT_ALGO' => 'HS256',
    'JWT_LEEWAY' => 0,
    'JWT_BLACKLIST_ENABLED' => true,
    'JWT_BLACKLIST_GRACE_PERIOD' => 0,

];
?>
