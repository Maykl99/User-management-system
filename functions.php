<?php
require_once 'vendor/autoload.php';


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

//var_dump(getRandName_Email_Password());

function insertRandUser($totale, mysqli $conn)
{
    
}