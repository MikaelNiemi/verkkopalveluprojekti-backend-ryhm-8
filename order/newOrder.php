<?php
session_start();
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$db = null;

// luetaan input-tiedot JSONina
$input = json_decode(file_get_contents('php://input'));
$etunimi = filter_var($input->etunimi,FILTER_SANITIZE_STRING);
$sukunimi = filter_var($input->sukunimi,FILTER_SANITIZE_STRING);
$email = filter_var($input->email,FILTER_SANITIZE_STRING);
$lahiosoite = filter_var($input->lahiosoite,FILTER_SANITIZE_STRING);
$postinro = filter_var($input->postinro,FILTER_SANITIZE_STRING);
$cart = $input->cart;
$user = $input->user;

try {
    $db = openDb();
    $db->beginTransaction();

    // katsotaan, onko asiakas kirjautunut sisään
    if ($input->user) {
        // asiakas on kirjautunut sisään, otetaan hänen asiakasnro
        $asiakasnro = $user->asnro;
    } else {
        //lisätään uusi asiakas  --> KIRJAUTUMATON ASIAKAS SAA JOKAISELLA TILAUSKERRALLA UUDEN ASIAKASNUMERON!
        $sql = "insert into asiakas (etunimi, sukunimi, email, lahiosoite, postinro) values ('$etunimi','$sukunimi','$email','$lahiosoite','$postinro')";

        //executeInsert palauttaa nyt uuden asiakkaan asiakasnron
        $asiakasnro = executeInsert($db,$sql);
    }
    
    //lisätään uusi tilaus
    $sql = "insert into tilaus (asnro) values ($asiakasnro)";
    $tilausnro = executeInsert($db,$sql);

    //lisätään tilausrivitauluun tarvittava määrä rivejä
    $rivinro = 1;
    foreach ($cart as $tuote) {
        $sql = "insert into tilausrivi (tilausnro,rivinro,tuotenro,kpl) values ($tilausnro,$rivinro,$tuote->tuotenro,$tuote->amount)";
        executeInsert($db,$sql);
        $rivinro++;
    }

    $db->commit(); // viimeistellään transaktio
    // palautetaan status 200 + asiakasnro 
    header('HTTP/1.1 200 OK');
    $data = array('asnro' => $asiakasnro);
    echo json_encode($data);   

} catch (PDOException $pdoex) {
    $db->rollback(); // virhe, perutaan transaktio
    returnError($pdoex); // palautetaan virhe 500
}