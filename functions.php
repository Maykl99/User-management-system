<?php
require_once 'vendor/autoload.php';
require_once 'connection.php';


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

insertRandUser(30,$GLOBALS['mysqli']);