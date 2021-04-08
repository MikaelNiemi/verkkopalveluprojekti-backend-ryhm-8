<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$email = filter_input(INPUT_POST,"yll_email",FILTER_SANITIZE_STRING);
$salasana = filter_input(INPUT_POST,"yll_salasana",FILTER_SANITIZE_STRING);
$salasanahash = hash("sha256", $salasana);

try {
    $db = openDb();
    selectAsJson($db,"SELECT email, salasana FROM yllapitaja WHERE email = '$email' AND salasana = '$salasanahash'");

} catch (PDOException $pdoex) {
    returnError($pdoex);
}

// passw: matti75v