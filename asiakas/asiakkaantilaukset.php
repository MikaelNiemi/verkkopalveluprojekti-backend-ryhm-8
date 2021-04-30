<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$asnro = $parameters[1];


try {
    $db = openDb();
    selectAsJson($db,"SELECT tilausrivi.tilausnro, tuotenimi, tilausrivi.kpl
    FROM tilausrivi, tuote, tilaus
    WHERE tilausrivi.tuotenro = tuote.tuotenro AND tilausrivi.tilausnro = tilaus.tilausnro AND asnro = '$asnro'");
   
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
