<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$tuotenro=filter_input(INPUT_POST,'tuotenro',FILTER_SANITIZE_NUMBER_INT);
$tuotenimi=filter_input(INPUT_POST,'tuotenimi',FILTER_SANITIZE_STRING);
$hinta=filter_input(INPUT_POST,'hinta',FILTER_SANITIZE_STRING);
$kuvaus=filter_input(INPUT_POST,'kuvaus',FILTER_SANITIZE_STRING);
$trnro=filter_input(INPUT_POST,'trnro',FILTER_SANITIZE_NUMBER_INT);

try {
    $db = openDb();
    
    $kysely = $db->prepare("UPDATE tuote SET tuotenimi = :tuotenimi, hinta = :hinta, kuvaus = :kuvaus, trnro = :trnro WHERE tuotenro = :tuotenro");
    
    $kysely->bindValue(':tuotenro',$tuotenro,PDO::PARAM_INT);
    $kysely->bindValue(':tuotenimi',$tuotenimi,PDO::PARAM_STR);
    $kysely->bindValue(':hinta',$hinta,PDO::PARAM_STR);
    $kysely->bindValue(':kustannus',$kustannus,PDO::PARAM_STR);
    $kysely->bindValue(':trnro',$trnro,PDO::PARAM_INT);
    
    // selectAsJson($db,"UPDATE tuote SET tuotenimi = '$tuotenimi', hinta = '$hinta', kuvaus = '$kuvaus', trnro = '$trnro' WHERE tuotenro = '$tuotenro'");

    header("Location: http://localhost:3000/MuokkaaTuotteita");
    exit();
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}