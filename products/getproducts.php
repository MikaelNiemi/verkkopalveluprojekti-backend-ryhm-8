<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$tuoteryhma_trnro = $parameters[1];

try {
    $db = openDb();
    selectAsJson($db,"select * from tuote where trnro = $tuoteryhma_trnro");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}