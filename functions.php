<?php
require_once 'vendor/autoload.php';
require_once 'connection.php';


// ritorna il parametro
function getParam($param, $default = null)
{
    return !empty($_REQUEST[$param]) ? $_REQUEST[$param] : $default;
}   

// ottieni i dati di configurazione
function getConfig($param)
{
    $config = require 'config.php';
    return array_key_exists($param, $config) ? $config[$param] : null;
}


// generatore automatico di dati,utilizzo libreria faker, ritorna i valori richiesti dal table users
function getRandName_Email_Password()
{
    $listaDati=[];
    $faker = Faker\Factory::create();
    $get= getRandFiscalCode();
    array_push($listaDati,$faker->name,$faker->email,mt_rand(18,99),$get);
    return $listaDati;
}

// generatore di codice fiscale
function getRandFiscalCode()
{
    $n = 16;
    $res= '';
    while($n>0): 
        $res .= chr(mt_rand(65,90));
        $n--;
    endwhile;
    return $res;
}

// query insert dati user, totale è il numero di utenti da creare
function insertRandUser($totale, mysqli $conn)
{
    while($totale > 0): 

        $listaDati = getRandName_Email_Password();

        $username= $listaDati[0];
        $email= $listaDati[1];
        $fiscalcode= $listaDati[3];
        $age= $listaDati[2];
    
        $sql = "INSERT INTO users(user_name,email,fiscalcode,age) VALUES ";
        $sql .= "('$username','$email','$fiscalcode','$age')";
    
        $result = $conn->query($sql);
        if(!$result):
            echo $conn->error;
        else: 
            $totale--;
        endif;

    endwhile;
}

// ottieni utenti dal db
function getUsers(array $list = [])
{
    /**
     * @var $conn mysqli
     */

    $conn = $GLOBALS['mysqli'];

    // ORDER BY
    $orderBy = array_key_exists('orderBy', $list) ? $list['orderBy'] : 'user_name';
    $orderDir = array_key_exists('orderDir', $list) ? $list['orderDir'] : 'ASC';
    $limit = (int) array_key_exists('recordForPage', $list) ? $list['recordForPage'] : 10;

    // evitiamo che ci passano parametri strani 
    if($orderDir !== 'ASC' && $orderDir !== 'DESC'):
        $orderDir = 'ASC';
    endif;

    $records = [];

    $sql = "SELECT * FROM `users` ORDER BY $orderBy $orderDir LIMIT 0, $limit"; // limit non funziona?!
    $res = $conn->query($sql);
    echo $sql;

    if($res): 
        while($row = $res->fetch_assoc()): 
            $records[] = $row;
        endwhile;
    endif;
    
    return $records;
}



//per inserire utenti attivare questa riga!
//insertRandUser(30,$GLOBALS['mysqli']);

