<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$tuotenro = $parameters[1];

try {
  $db = openDb();
  selectAsJson($db, "SELECT * from tuote WHERE tuotenro = $tuotenro");
} catch (PDOException $pdoex) {
  returnError($pdoex);
}

?>