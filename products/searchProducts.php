<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$criteria = $parameters[1];

try {
    $db = openDb();
    selectAsJson($db,"SELECT tuotenimi, hinta, kuvaus, image, trnimi FROM tuote, tuoteryhma where tuoteryhma.trnro = tuote.trnro AND (tuotenimi LIKE '%$criteria%' OR trnimi LIKE '%$criteria%')");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
