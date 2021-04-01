<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$input = json_decode(file_get_contents('php://input'));
$search = filter_var($input->tuotenimi,FILTER_SANITIZE_STRING);

try {
    $db = openDb();
    selectAsJson($db,'SELECT tuotenimi, hinta, kuvaus, kuva, trnimi FROM tuote, tuoteryhma where tuoteryhma.trnro = tuote.trnro AND tuotenimi LIKE "%' . $search . '%"');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
