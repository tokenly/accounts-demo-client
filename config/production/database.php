<?php

return [

	'default' => 'mysql',

	'connections' => [

        'mysql' => [
            'driver'    => 'mysql',
            'host'      => 'mariadb',
			'database'  => 'tokenly_socialite_production',
            'username'  => getenv('DB_USERNAME') ?: 'root',
            'password'  => getenv('DB_PASSWORD') ?: '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],

	],

];
