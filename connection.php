<?php
// connessione al db
$config = require 'config.php';

$mysqli =new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password'],
    $config['mysql_db']
);

// meglio non lasciare variabili globali
unset($config); 

if($mysqli->connect_error): 
    die($mysqli->connect_error);
else: 
    echo 'connessione riuscita'.'<br>';
    //var_dump($mysqli);
endif;



