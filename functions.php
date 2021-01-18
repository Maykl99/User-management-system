<?php
require_once 'vendor/autoload.php';
require_once 'connection.php';


// ritorna il parametro
function getParam($param, $default = null)
{
    return !empty($_REQUEST[$param]) ? $_REQUEST[$param] : $default;
}   

// ritorna i dati di configurazione
function getConfig($param)
{
    $config = require 'config.php';
    return array_key_exists($param, $config) ? $config[$param] : null;
}


// generatore automatico di dati,utilizzo faker
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
    $records = [];
    $limit = getConfig('recordForPage');
    // se non trova il parametro 
    $limit ? getConfig('recordForPage') : 10; 

    $sql = "SELECT * FROM `users` LIMIT $limit";
    $res = $conn->query($sql);

    if($res): 
        while($row = $res->fetch_assoc()): 
            $records[] = $row;
        endwhile;
    endif;
    return $records;
}


//per inserire utenti attivare questa riga!
//insertRandUser(30,$GLOBALS['mysqli']);

