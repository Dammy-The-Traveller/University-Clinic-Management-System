<?php 
//echo "hello there";
return [
    'database' => [
        'driver'   => $_ENV['Driver'] ?? 'mysql',
        'host'     => $_ENV['DB_HOST'] ?? '',
        'port'     => $_ENV['DB_PORT']?? '3306',
        'dbname'   => $_ENV['DB_DATABASE'] ?? '',
        'charset'  => 'utf8mb4',
        'collation'=> 'utf8mb4_general_ci',
        'username' =>$_ENV['DB_USERNAME'] ?? 'root',
        'password' =>$_ENV['DB_PASSWORD'] ?? '',
    ]
];

