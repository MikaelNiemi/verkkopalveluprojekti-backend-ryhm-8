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
    selectAsJson($db,"UPDATE tuote SET tuotenimi = '$tuotenimi', hinta = '$hinta', kuvaus = '$kuvaus', trnro = '$trnro' WHERE tuotenro = '$tuotenro'");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}