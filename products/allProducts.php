<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

try {
    // Näytetään tuotteet ylläpitosivulla
    $db = openDb();
    selectAsJson($db,'select * from tuote');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}