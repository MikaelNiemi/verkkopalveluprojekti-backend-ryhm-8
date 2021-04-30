<?php
require_once '../inc/functions.php';
require_once '../inc/headers.php';

$asnro = filter_input(INPUT_POST,"asnro",FILTER_SANITIZE_NUMBER_INT);
$sukunimi = filter_input(INPUT_POST,"sukunimi",FILTER_SANITIZE_STRING);
$etunimi = filter_input(INPUT_POST,"etunimi",FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
$lahiosoite = filter_input(INPUT_POST,"lahiosoite",FILTER_SANITIZE_STRING);
$postinro = filter_input(INPUT_POST,"postinro",FILTER_SANITIZE_NUMBER_INT);

try {
    $db = openDb();
    selectAsJson($db,"UPDATE asiakas SET sukunimi = '$sukunimi', etunimi = '$etunimi', email = '$email', lahiosoite = '$lahiosoite', postinro = '$postinro' WHERE asnro = $asnro");

    $kysely->bindValue(':sukunimi',$sukunimi,PDO::PARAM_STR);
    $kysely->bindValue(':etunimi',$etunimi,PDO::PARAM_STR);
    $kysely->bindValue(':email',$email,PDO::PARAM_STR);
    $kysely->bindValue(':lahiosoite',$lahiosoite,PDO::PARAM_STR);
    $kysely->bindValue(':postinro',$postinro,PDO::PARAM_INT);
    $kysely->execute();
    header('Location: http://localhost:3000/Asiakas');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}
