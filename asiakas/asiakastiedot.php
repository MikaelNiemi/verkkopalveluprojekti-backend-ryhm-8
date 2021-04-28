<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$asnro=filter_input(INPUT_POST,"asnro",FILTER_SANITIZE_NUMBER_INT);

try {
    $db = openDb();
    selectAsJson($db,"SELECT * FROM asiakas WHERE asnro = '$asnro'");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
